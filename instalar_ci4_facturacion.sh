#!/bin/bash

set -e

echo "🔄 Actualizando el sistema..."
sudo apt update && sudo apt upgrade -y

echo "🧱 Instalando Apache..."
sudo apt install apache2 -y

echo "🗃️ Instalando MariaDB..."
sudo apt install mariadb-server mariadb-client -y
sudo systemctl enable mariadb
sudo systemctl start mariadb

echo "🛡️ Configurando base de datos..."
sudo mariadb <<EOF
CREATE DATABASE IF NOT EXISTS facturacion;
CREATE USER IF NOT EXISTS 'facturacion'@'localhost' IDENTIFIED BY 'ci4jcpos$$';
GRANT ALL PRIVILEGES ON facturacion.* TO 'facturacion'@'localhost';
FLUSH PRIVILEGES;
EOF

echo "🐘 Instalando PHP y extensiones necesarias..."
sudo apt install php php-mysql php-intl php-curl php-xml php-mbstring php-cli php-sqlite3 php-gd unzip -y

echo "🧩 Activando mod_rewrite..."
sudo a2enmod rewrite
sudo systemctl restart apache2

echo "🎼 Instalando Composer..."
cd ~
curl -sS https://getcomposer.org/installer -o composer-setup.php
HASH=$(curl -sS https://composer.github.io/installer.sig)
php -r "if (hash_file('sha384', 'composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
rm composer-setup.php

echo "📁 Instalando el proyecto ci4jcpox en /var/www/html/facturacion..."
cd /var/www/html
sudo rm -rf facturacion
sudo composer create-project julio101290/ci4jcpox facturacion
sudo chown -R www-data:www-data facturacion
sudo chmod -R 755 facturacion

echo "🔄 Verificando archivo env..."
cd facturacion
if [ -f "env" ] && [ ! -f ".env" ]; then
    echo "🔄 Renombrando archivo 'env' a '.env'..."
    mv env .env
fi

echo "⚙️ Configurando archivo .env..."
sed -i "s|CI_ENVIRONMENT = .*|CI_ENVIRONMENT = production|g" .env
sed -i "s|database.default.hostname = .*|database.default.hostname = localhost|g" .env
sed -i "s|database.default.database = .*|database.default.database = facturacion|g" .env
sed -i "s|database.default.username = .*|database.default.username = facturacion|g" .env
sed -i "s|database.default.password = .*|database.default.password = ci4jcpos$$|g" .env
sed -i "s|database.default.DBDriver = .*|database.default.DBDriver = MySQLi|g" .env

echo "🌐 Configurando VirtualHost para facturacion..."
VHOST_PATH="/etc/apache2/sites-available/facturacion.conf"

sudo bash -c "cat > $VHOST_PATH" <<EOL
<VirtualHost *:80>
    ServerAdmin webmaster@localhost
    DocumentRoot /var/www/html/facturacion/public
    ServerName facturacion.local

    <Directory /var/www/html/facturacion/public>
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog \${APACHE_LOG_DIR}/facturacion_error.log
    CustomLog \${APACHE_LOG_DIR}/facturacion_access.log combined
</VirtualHost>
EOL

sudo a2ensite facturacion.conf
sudo a2dissite 000-default.conf
sudo systemctl reload apache2

echo "🔐 Ajustando /etc/hosts para entorno local (opcional)..."
echo "127.0.0.1 facturacion.local" | sudo tee -a /etc/hosts

echo "🧪 Ejecutando migraciones y Seeder..."
sudo -u www-data php spark migrate
sudo -u www-data php spark db:seed BoilerplateSeeder

echo "✅ Instalación completada. Accede desde tu navegador:"
echo "👉 http://<TU_IP_PUBLICA>/ (si no usas dominio)"
echo "👉 http://facturacion.local/ (si estás en entorno local)"
