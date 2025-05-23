# Sistema de Gestión Empresarial Modular (CFDI 4.0, Inventarios, Carta Porte, Complemento de Pago)

Este repositorio representa un conjunto de módulos **modulares y extensibles** desarrollados por Julio101290, diseñados para cubrir funcionalidades esenciales en la gestión empresarial en México, incluyendo **inventarios, facturación electrónica (CFDI 4.0), complemento de pago y gestión para Carta Porte**.

Aunque el repositorio `ci4jcposv2` original no es accesible públicamente, esta descripción se basa en los componentes modulares y públicos que el desarrollador ha puesto a disposición y que, en conjunto, ofrecen las funcionalidades solicitadas.

---

## 🚀 Características Principales

Este ecosistema de módulos, construidos con **CodeIgniter 4**, proporciona las siguientes capacidades:

### 📦 Gestión de Inventarios
* **`boilerplateproducts`**: Permite la **administración de productos y categorías (CRUD)** por empresa. Incluye campos para la administración de inventario y la integración con catálogos del SAT, lo que facilita la vinculación de productos con requisitos de CFDI 4.0.
* **`boilerplateStorages`**: Módulo CRUD para la **gestión de almacenes o ubicaciones de almacenamiento**. Fundamental para organizar y rastrear el inventario físico dentro de diferentes ubicaciones de la empresa.

### 🧾 Facturación CFDI 4.0
* **`boilerplateCFDI`**: Una biblioteca robusta para la **administración de Comprobantes Fiscales Digitales por Internet (CFDI)**. Soporta la impresión, carga, descarga y gestión general de facturas electrónicas mexicanas conforme a la especificación CFDI 4.0.

### 💰 Complemento de Pago
* **`boilerplateComplementoPago`**: Biblioteca dedicada a la **generación del Complemento de Pago CFDI 4.0**. Este complemento es esencial para la correcta contabilidad de pagos recibidos por facturas en parcialidades o diferidas.

### 🚚 Carta Porte
* **`boilerplateDrivers`**: Módulo CRUD para la **captura y gestión de información de conductores**. Está diseñado específicamente para su uso con facturas y la **Carta Porte de México**, un documento fiscal requerido para el transporte de mercancías.

---

## 🛠️ Tecnologías y Dependencias Clave

El desarrollo está basado en:
* **CodeIgniter 4**: Framework PHP que proporciona la estructura MVC.
* **PHP**: Lenguaje de programación principal.
* **`PhpCfdi\SatCatalogos`**: Dependencia crucial para interactuar con los catálogos oficiales del SAT, asegurando la validez fiscal de los CFDI y otros documentos relacionados.
* **`hermawan/codeigniter4-datatables`**: Para una interfaz de usuario eficiente en la visualización y gestión de datos tabulares.
* **`julio101290/boilerplatelog`**: Para la gestión de registros y auditoría.
* Otros módulos de boilerplate (e.g., `boilerplatecompanies`, `boilerplatebranchoffice`) que proporcionan una base común para la gestión de entidades empresariales.

---

## 🚀 Instalación y Uso (Ejemplo General)

Cada módulo se instala de forma independiente a través de Composer y requiere la ejecución de comandos `php spark` para migraciones y seeders.

**Pasos Generales:**

1.  **Requisitos**: Asegúrate de tener un entorno PHP compatible con CodeIgniter 4 y Composer instalado.
2.  **Instalar Dependencias**: Utiliza Composer para instalar los módulos y sus dependencias.
    ```bash
    composer require phpcfdi/sat-catalogos
    composer require hermawan/codeigniter4-datatables
    composer require julio101290/boilerplatelog
    # Y los módulos específicos que necesites (ej. boilerplatecfdi, boilerplateproducts, etc.)
    composer require julio101290/boilerplatecfdi
    composer require julio101290/boilerplateproducts
    composer require julio101290/boilerplatecomplementopago
    composer require julio101290/boilerplatedrivers
    # Otros módulos base necesarios como companies, storages, etc.
    composer require julio101290/boilerplatecompanies
    composer require julio101290/boilerplatestorages
    ```
3.  **Ejecutar Migraciones y Seeders**:
    ```bash
    php spark migrate
    php spark db:seed
    # Y ejecutar los comandos específicos de instalación de cada módulo (ej.
    # php spark boilerplatecompanies:installcompaniescrud
    # php spark boilerplatecfdi:installcfdi
    # php spark boilerplateproducts:installproducts
    # php spark boilerplatecomplementopago:installcomplementopago
    # php spark boilerplatedrivers:installdrivers
    )
    ```
4.  **Configuración de Catálogos SAT**: Para módulos de CFDI, es crucial descargar y configurar la base de datos de catálogos del SAT (`catalogossat.db`) en la ruta especificada por el módulo (`writable/database/`).

Para obtener instrucciones detalladas sobre el uso de cada módulo (rutas, controladores y vistas), se recomienda revisar el código fuente de cada repositorio individual.

---

## 📈 Estado del Proyecto y Contribuciones

Los módulos se encuentran en un estado activo de desarrollo, con versiones estables (`v1.0.x`) y actualizaciones recientes (con fechas de mayo de 2025).

* **Licencia**: La mayoría de los proyectos están bajo la licencia MIT, lo que permite su uso y modificación.
* **Contribuciones**: Se alienta a la comunidad a revisar, probar y contribuir a estos módulos para mejorar su funcionalidad y estabilidad.

---

## ⚠️ Nota Importante

Este README describe un **ecosistema de módulos individuales**. El repositorio `https://github.com/julio101290/ci4jcposv2` no es accesible públicamente. La información proporcionada aquí se basa en la evaluación de los proyectos públicos del desarrollador que abordan las funcionalidades solicitadas (inventarios, facturación CFDI 4.0, Carta Porte, complemento de pago).

---
