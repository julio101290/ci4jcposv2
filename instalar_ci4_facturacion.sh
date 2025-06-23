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
export COMPOSER_ALLOW_SUPERUSER=1
sudo composer create-project julio101290/ci4jcpox facturacion
sudo chown -R www-data:www-data facturacion
sudo chmod -R 755 facturacion

echo "🔧 Reemplazando configuración de base de datos para MariaDB..."
cat <<EOL | sudo tee /var/www/html/facturacion/app/Config/Database.php > /dev/null
<?php

namespace Config;

use CodeIgniter\Database\Config;

class Database extends Config
{
    public string \$filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;
    public string \$defaultGroup = 'default';

    public array \$default = [
        'DSN'          => '',
        'hostname'     => '127.0.0.1',
        'username'     => 'facturacion',
        'password'     => 'ci4jcpos$$',
        'database'     => 'facturacion',
        'DBDriver'     => 'MySQLi',
        'DBPrefix'     => '',
        'pConnect'     => false,
        'DBDebug'      => true,
        'charset'      => 'utf8mb4',
        'DBCollat'     => 'utf8mb4_general_ci',
        'swapPre'      => '',
        'encrypt'      => false,
        'compress'     => false,
        'strictOn'     => false,
        'failover'     => [],
        'port'         => 3306,
        'numberNative' => false,
        'dateFormat'   => [
            'date'     => 'Y-m-d',
            'datetime' => 'Y-m-d H:i:s',
            'time'     => 'H:i:s',
        ],
    ];

    public array \$tests = [
        'DSN'         => '',
        'hostname'    => '127.0.0.1',
        'username'    => '',
        'password'    => '',
        'database'    => ':memory:',
        'DBDriver'    => 'SQLite3',
        'DBPrefix'    => 'db_',
        'pConnect'    => false,
        'DBDebug'     => true,
        'charset'     => 'utf8',
        'DBCollat'    => '',
        'swapPre'     => '',
        'encrypt'     => false,
        'compress'    => false,
        'strictOn'    => false,
        'failover'    => [],
        'port'        => 3306,
        'foreignKeys' => true,
        'busyTimeout' => 1000,
        'dateFormat'  => [
            'date'     => 'Y-m-d',
            'datetime' => 'Y-m-d H:i:s',
            'time'     => 'H:i:s',
        ],
    ];

    public function __construct()
    {
        parent::__construct();
        if (ENVIRONMENT === 'testing') {
            \$this->defaultGroup = 'tests';
        }
    }
}
EOL

echo "🌐 Configurando VirtualHost para facturacion..."
cat <<EOF | sudo tee /etc/apache2/sites-available/facturacion.conf > /dev/null
<VirtualHost *:80>
    ServerAdmin webmaster@localhost
    DocumentRoot /var/www/html/facturacion/public

    <Directory /var/www/html/facturacion/public>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog \${APACHE_LOG_DIR}/facturacion_error.log
    CustomLog \${APACHE_LOG_DIR}/facturacion_access.log combined
</VirtualHost>
EOF

sudo a2ensite facturacion.conf
sudo systemctl reload apache2

echo "🧪 Ejecutando migraciones y Seeder..."
cd /var/www/html/facturacion
sudo -u www-data php spark migrate
sudo -u www-data php spark db:seed BoilerplateSeeder

echo "✅ Instalación completa. Visita: http://$(curl -s http://checkip.amazonaws.com)/"
