<?php

namespace App\Database\Seeds;

use CodeIgniter\Config\Services;
use CodeIgniter\Database\Seeder;
use Myth\Auth\Entities\User;
use Myth\Auth\Models\UserModel;

/**
 * Class BoilerplateSeeder.
 */
class BoilerplateSeeder extends Seeder {

    /**
     * @var Authorize
     */
    protected $authorize;

    /**
     * @var Db
     */
    protected $db;

    /**
     * @var Users
     */
    protected $users;

    public function __construct() {
        $this->authorize = Services::authorization();
        $this->db = \Config\Database::connect();
        $this->users = new UserModel();
    }

    public function run() {
        // User
        $this->users->save(new User([
                    'email' => 'admin@admin.com',
                    'username' => 'admin',
                    'password' => 'super-admin',
                    'active' => '1',
        ]));

        $this->users->save(new User([
                    'email' => 'user@user.com',
                    'username' => 'user',
                    'password' => 'super-user',
                    'active' => '1',
        ]));

        // Role
        $this->authorize->createGroup('admin', 'Administrators. The top of the food chain.');
        $this->authorize->createGroup('member', 'Member everyday member.');

        // Permission

        $auth_permissions = array(
            array('id' => '1', 'name' => 'back-office', 'description' => 'User can access to the administration panel.'),
            array('id' => '2', 'name' => 'manage-user', 'description' => 'User can create, delete or modify the users.'),
            array('id' => '3', 'name' => 'role-permission', 'description' => 'User can edit and define permissions for a role.'),
            array('id' => '4', 'name' => 'menu-permission', 'description' => 'User cand create, delete or modify the menu.'),
            array('id' => '5', 'name' => 'log-permission', 'description' => 'Permissions for logs'),
            array('id' => '6', 'name' => 'empresas-permisos', 'description' => 'Permissions for backups'),
            array('id' => '7', 'name' => 'settings-permissions', 'description' => 'Permissions for settings'),
            array('id' => '8', 'name' => 'backups-permissions', 'description' => 'Permissions for backups'),
            array('id' => '9', 'name' => 'branchoffices-permission', 'description' => 'Permissions for backups'),
            array('id' => '10', 'name' => 'products-permission', 'description' => 'Permissions for products'),
            array('id' => '11', 'name' => 'categorias-permission', 'description' => 'Permissions for products'),
            array('id' => '12', 'name' => 'storages-permission', 'description' => 'Permissions for storages'),
            array('id' => '13', 'name' => 'proveedores-permission', 'description' => 'Supplier catalog permission'),
            array('id' => '14', 'name' => 'tipos_movimientos_inventario-permission', 'description' => 'Permissions for types movement inventory'),
            array('id' => '15', 'name' => 'custumers-permission', 'description' => 'Permission for add, update and delete for custumers.'),
            array('id' => '16', 'name' => 'inventory-permission', 'description' => 'Permission to view inventory list'),
            array('id' => '17', 'name' => 'quotes-permission', 'description' => 'Permission to view quotes list'),
            array('id' => '18', 'name' => 'comprobantes_rd-permission', 'description' => 'Supplier Republic Dominican Invoices'),
            array('id' => '19', 'name' => 'sells-permission', 'description' => 'Permission to view sells list'),
            array('id' => '20', 'name' => 'vehiculos-permission', 'description' => 'Permission for Vehicles'),
            array('id' => '21', 'name' => 'tipovehiculo-permission', 'description' => 'Permission for Vehicles'),
            array('id' => '22', 'name' => 'choferes-permission', 'description' => 'Permission for drivers'),
            array('id' => '23', 'name' => 'arqueocaja-permission', 'description' => 'Cash Tonnage Permission'),
            array('id' => '24', 'name' => 'xml-permission', 'description' => 'CFDI XML CRUD ACCESS '),
            array('id' => '25', 'name' => 'listapagos-permission', 'description' => 'Permission to payment complement CFDI4.0'),
            array('id' => '26', 'name' => 'seriesfacturaelectronica-permission', 'description' => 'CFDI Electronic Series '),
            array('id' => '27', 'name' => 'cartasporte-permission', 'description' => 'Permission to letter port'),
            array('id' => '28', 'name' => 'ubicaciones-permission', 'description' => 'Permission for locations letter port CFDI4.0'),
            array('id' => '29', 'name' => 'remolques-permission', 'description' => 'Permission for remolques letter port CFDI4.0'),
            array('id' => '30', 'name' => 'cartaporte-permission', 'description' => 'Permiso para la lista de cartaporte'),
            array('id' => '31', 'name' => 'sapservicelayer-permission', 'description' => 'Permiso para la lista de sapservicelayer')
        );

        foreach ($auth_permissions as $key => $value) {
            $this->db->table('auth_permissions')->replace($value);
        }


        $this->db->table('auth_users_permissions')->emptyTable();

        $auth_users_permissions = array(
            array('user_id' => '1', 'permission_id' => '1'),
            array('user_id' => '1', 'permission_id' => '2'),
            array('user_id' => '1', 'permission_id' => '3'),
            array('user_id' => '1', 'permission_id' => '4'),
            array('user_id' => '1', 'permission_id' => '5'),
            array('user_id' => '1', 'permission_id' => '6'),
            array('user_id' => '1', 'permission_id' => '7'),
            array('user_id' => '1', 'permission_id' => '8'),
            array('user_id' => '1', 'permission_id' => '9'),
            array('user_id' => '1', 'permission_id' => '10'),
            array('user_id' => '1', 'permission_id' => '11'),
            array('user_id' => '1', 'permission_id' => '12'),
            array('user_id' => '1', 'permission_id' => '13'),
            array('user_id' => '1', 'permission_id' => '14'),
            array('user_id' => '1', 'permission_id' => '15'),
            array('user_id' => '1', 'permission_id' => '16'),
            array('user_id' => '1', 'permission_id' => '17'),
            array('user_id' => '1', 'permission_id' => '18'),
            array('user_id' => '1', 'permission_id' => '19'),
            array('user_id' => '1', 'permission_id' => '20'),
            array('user_id' => '1', 'permission_id' => '21'),
            array('user_id' => '1', 'permission_id' => '22'),
            array('user_id' => '1', 'permission_id' => '23'),
            array('user_id' => '1', 'permission_id' => '24'),
            array('user_id' => '1', 'permission_id' => '25'),
            array('user_id' => '1', 'permission_id' => '26'),
            array('user_id' => '1', 'permission_id' => '27'),
            array('user_id' => '1', 'permission_id' => '27'),
            array('user_id' => '1', 'permission_id' => '27'),
            array('user_id' => '1', 'permission_id' => '28'),
            array('user_id' => '1', 'permission_id' => '29'),
            array('user_id' => '1', 'permission_id' => '30'),
            array('user_id' => '1', 'permission_id' => '31'),
            array('user_id' => '2', 'permission_id' => '1')
        );

        foreach ($auth_users_permissions as $key => $value) {
            $this->db->table('auth_users_permissions')->insert($value);
        }

        $menu = array(
            array('id' => '1', 'parent_id' => '0', 'active' => '1', 'title' => 'Dashboard', 'icon' => 'fas fa-tachometer-alt', 'route' => 'admin', 'sequence' => '1', 'created_at' => '2024-12-29 02:37:20', 'updated_at' => '2025-03-12 19:07:18'),
            array('id' => '2', 'parent_id' => '0', 'active' => '1', 'title' => 'User Management', 'icon' => 'fas fa-user', 'route' => '#', 'sequence' => '23', 'created_at' => '2024-12-29 02:37:20', 'updated_at' => '2025-03-12 19:07:18'),
            array('id' => '3', 'parent_id' => '2', 'active' => '1', 'title' => 'User Profile', 'icon' => 'fas fa-user-edit', 'route' => 'admin/user/profile', 'sequence' => '24', 'created_at' => '2024-12-29 02:37:20', 'updated_at' => '2025-03-12 19:07:18'),
            array('id' => '4', 'parent_id' => '2', 'active' => '1', 'title' => 'Users', 'icon' => 'fas fa-users', 'route' => 'admin/user/manage', 'sequence' => '25', 'created_at' => '2024-12-29 02:37:20', 'updated_at' => '2025-03-12 19:07:18'),
            array('id' => '5', 'parent_id' => '2', 'active' => '1', 'title' => 'Permissions', 'icon' => 'fas fa-user-lock', 'route' => 'admin/permission', 'sequence' => '26', 'created_at' => '2024-12-29 02:37:20', 'updated_at' => '2025-03-12 19:07:18'),
            array('id' => '6', 'parent_id' => '2', 'active' => '1', 'title' => 'Roles', 'icon' => 'fas fa-users-cog', 'route' => 'admin/role', 'sequence' => '27', 'created_at' => '2024-12-29 02:37:20', 'updated_at' => '2025-03-12 19:07:18'),
            array('id' => '7', 'parent_id' => '2', 'active' => '1', 'title' => 'Menu', 'icon' => 'fas fa-stream', 'route' => 'admin/menu', 'sequence' => '28', 'created_at' => '2024-12-29 02:37:20', 'updated_at' => '2025-03-12 19:07:18'),
            array('id' => '8', 'parent_id' => '0', 'active' => '1', 'title' => 'Configuraciones', 'icon' => 'fas fa-cogs', 'route' => '#', 'sequence' => '29', 'created_at' => '2024-12-29 02:51:11', 'updated_at' => '2025-03-12 19:07:18'),
            array('id' => '9', 'parent_id' => '8', 'active' => '1', 'title' => 'Bitacora', 'icon' => 'fas fa-bars', 'route' => 'admin/log', 'sequence' => '30', 'created_at' => '2024-12-29 02:52:31', 'updated_at' => '2025-03-12 19:07:18'),
            array('id' => '10', 'parent_id' => '8', 'active' => '1', 'title' => 'Empresas', 'icon' => 'fas fa-building', 'route' => 'admin/empresas', 'sequence' => '31', 'created_at' => '2024-12-29 02:53:54', 'updated_at' => '2025-03-12 19:07:18'),
            array('id' => '11', 'parent_id' => '8', 'active' => '1', 'title' => 'Globales', 'icon' => 'fas fa-globe-asia', 'route' => 'admin/settings', 'sequence' => '32', 'created_at' => '2024-12-29 03:08:09', 'updated_at' => '2025-03-12 19:07:18'),
            array('id' => '12', 'parent_id' => '8', 'active' => '1', 'title' => 'Respaldos', 'icon' => 'fas fa-database', 'route' => 'admin/backups', 'sequence' => '33', 'created_at' => '2025-01-07 21:02:47', 'updated_at' => '2025-03-12 19:07:18'),
            array('id' => '13', 'parent_id' => '8', 'active' => '1', 'title' => 'Sucursales', 'icon' => 'fas fa-hotel', 'route' => 'admin/branchoffices', 'sequence' => '34', 'created_at' => '2025-01-08 20:32:40', 'updated_at' => '2025-03-12 19:07:18'),
            array('id' => '14', 'parent_id' => '0', 'active' => '1', 'title' => 'Inventarios', 'icon' => 'fas fa-boxes', 'route' => '#', 'sequence' => '11', 'created_at' => '2025-01-08 20:44:50', 'updated_at' => '2025-03-12 19:07:18'),
            array('id' => '15', 'parent_id' => '14', 'active' => '1', 'title' => 'Categorias', 'icon' => 'fas fa-list', 'route' => 'admin/categorias', 'sequence' => '12', 'created_at' => '2025-01-08 20:45:56', 'updated_at' => '2025-03-12 19:07:18'),
            array('id' => '16', 'parent_id' => '14', 'active' => '1', 'title' => 'Productos', 'icon' => 'fas fa-box-open', 'route' => 'admin/products', 'sequence' => '13', 'created_at' => '2025-01-08 20:48:02', 'updated_at' => '2025-03-12 19:07:18'),
            array('id' => '17', 'parent_id' => '14', 'active' => '1', 'title' => 'Almacenes', 'icon' => 'fas fa-store-alt', 'route' => 'admin/storages', 'sequence' => '14', 'created_at' => '2025-01-12 05:03:59', 'updated_at' => '2025-03-12 19:07:18'),
            array('id' => '18', 'parent_id' => '14', 'active' => '1', 'title' => 'Proveedores', 'icon' => 'fas fa-user-friends', 'route' => 'admin/proveedores', 'sequence' => '15', 'created_at' => '2025-02-10 02:08:36', 'updated_at' => '2025-03-12 19:07:18'),
            array('id' => '19', 'parent_id' => '14', 'active' => '1', 'title' => 'Tipos de movimiento', 'icon' => 'fas fa-adjust', 'route' => 'admin/tipos_movimientos_inventario', 'sequence' => '16', 'created_at' => '2025-02-10 04:19:17', 'updated_at' => '2025-03-12 19:07:18'),
            array('id' => '20', 'parent_id' => '14', 'active' => '1', 'title' => 'Clientes', 'icon' => 'fas fa-users', 'route' => 'admin/custumers', 'sequence' => '17', 'created_at' => '2025-02-10 21:13:12', 'updated_at' => '2025-03-12 19:07:18'),
            array('id' => '21', 'parent_id' => '14', 'active' => '1', 'title' => 'Inventarios', 'icon' => 'fas fa-box-open', 'route' => 'admin/inventory', 'sequence' => '18', 'created_at' => '2025-02-10 21:16:34', 'updated_at' => '2025-03-12 19:07:18'),
            array('id' => '22', 'parent_id' => '0', 'active' => '1', 'title' => 'Cotizaciones', 'icon' => 'fas fa-book-reader', 'route' => '#', 'sequence' => '2', 'created_at' => '2025-02-11 04:06:37', 'updated_at' => '2025-03-12 19:07:18'),
            array('id' => '23', 'parent_id' => '22', 'active' => '1', 'title' => 'Lista Cotizaciones', 'icon' => 'fas fa-headset', 'route' => 'admin/quotes', 'sequence' => '3', 'created_at' => '2025-02-11 04:07:22', 'updated_at' => '2025-03-12 19:07:18'),
            array('id' => '24', 'parent_id' => '0', 'active' => '1', 'title' => 'Ventas', 'icon' => 'fab fa-sellcast', 'route' => '#', 'sequence' => '4', 'created_at' => '2025-02-12 21:03:48', 'updated_at' => '2025-03-12 19:07:18'),
            array('id' => '25', 'parent_id' => '24', 'active' => '1', 'title' => 'Lista de Ventas', 'icon' => 'fas fa-list', 'route' => 'admin/sells', 'sequence' => '5', 'created_at' => '2025-02-12 21:12:01', 'updated_at' => '2025-03-12 19:07:18'),
            array('id' => '26', 'parent_id' => '0', 'active' => '1', 'title' => 'Vehiculos', 'icon' => 'fas fa-shuttle-van', 'route' => '#', 'sequence' => '19', 'created_at' => '2025-02-12 21:15:08', 'updated_at' => '2025-03-12 19:07:18'),
            array('id' => '27', 'parent_id' => '26', 'active' => '1', 'title' => 'Tipo Vehiculo', 'icon' => 'fas fa-list', 'route' => 'admin/tipovehiculo', 'sequence' => '20', 'created_at' => '2025-02-12 21:16:24', 'updated_at' => '2025-03-12 19:07:18'),
            array('id' => '28', 'parent_id' => '26', 'active' => '1', 'title' => 'Lista de Vehiculos', 'icon' => 'fas fa-car', 'route' => 'admin/vehiculos', 'sequence' => '21', 'created_at' => '2025-02-12 21:17:36', 'updated_at' => '2025-03-12 19:07:18'),
            array('id' => '29', 'parent_id' => '26', 'active' => '1', 'title' => 'Lista de Choferes', 'icon' => 'fas fa-users', 'route' => 'admin/choferes', 'sequence' => '22', 'created_at' => '2025-02-12 21:20:40', 'updated_at' => '2025-03-12 19:07:18'),
            array('id' => '30', 'parent_id' => '24', 'active' => '1', 'title' => 'Arqueo de Caja', 'icon' => 'fas fa-clipboard-check', 'route' => 'admin/arqueoCaja', 'sequence' => '6', 'created_at' => '2025-02-16 04:01:27', 'updated_at' => '2025-03-12 19:07:18'),
            array('id' => '31', 'parent_id' => '0', 'active' => '1', 'title' => 'Factura CFDI', 'icon' => 'fas fa-stamp', 'route' => '#', 'sequence' => '8', 'created_at' => '2025-02-16 04:09:41', 'updated_at' => '2025-03-12 19:07:18'),
            array('id' => '32', 'parent_id' => '31', 'active' => '1', 'title' => 'Lista CFDI', 'icon' => 'fas fa-file-pdf', 'route' => 'admin/xml', 'sequence' => '9', 'created_at' => '2025-02-16 04:10:29', 'updated_at' => '2025-03-12 19:07:18'),
            array('id' => '33', 'parent_id' => '24', 'active' => '1', 'title' => 'List Comp Pago', 'icon' => 'fas fa-list', 'route' => 'admin/listCompPag', 'sequence' => '7', 'created_at' => '2025-02-16 04:13:44', 'updated_at' => '2025-03-12 19:07:18'),
            array('id' => '34', 'parent_id' => '8', 'active' => '1', 'title' => 'Series Electronicas CFDI', 'icon' => 'fas fa-vote-yea', 'route' => 'admin/seriesfacturaelectronica', 'sequence' => '35', 'created_at' => '2025-02-16 04:19:14', 'updated_at' => '2025-03-12 19:07:18'),
            array('id' => '35', 'parent_id' => '0', 'active' => '1', 'title' => 'Envios', 'icon' => 'fas fa-car-alt', 'route' => '#', 'sequence' => '10', 'created_at' => '2025-03-12 19:06:33', 'updated_at' => '2025-03-12 19:07:18'),
            array('id' => '36', 'parent_id' => '35', 'active' => '1', 'title' => 'Carta Porte', 'icon' => 'fas fa-share-square', 'route' => 'admin/cartasPorte', 'sequence' => '36', 'created_at' => '2025-03-12 19:15:28', 'updated_at' => '2025-03-12 19:15:28'),
            array('id' => '37', 'parent_id' => '35', 'active' => '1', 'title' => 'Ubicaciones', 'icon' => 'fas fa-location-arrow', 'route' => 'admin/ubicaciones', 'sequence' => '37', 'created_at' => '2025-03-12 19:19:45', 'updated_at' => '2025-03-12 19:19:45'),
            array('id' => '38', 'parent_id' => '8', 'active' => '1', 'title' => 'SAP Service Layer', 'icon' => 'fas fa-plug', 'route' => 'admin/sapservicelayer', 'sequence' => '38', 'created_at' => '2025-03-31 19:23:45', 'updated_at' => '2025-03-31 19:23:45')
        );

        foreach ($menu as $key => $value) {
            $this->db->table('menu')->replace($value);
        }

        $groups_menu = array(
            array('id' => '1', 'group_id' => '1', 'menu_id' => '1'),
            array('id' => '2', 'group_id' => '1', 'menu_id' => '2'),
            array('id' => '3', 'group_id' => '1', 'menu_id' => '3'),
            array('id' => '4', 'group_id' => '1', 'menu_id' => '4'),
            array('id' => '5', 'group_id' => '1', 'menu_id' => '5'),
            array('id' => '6', 'group_id' => '1', 'menu_id' => '6'),
            array('id' => '7', 'group_id' => '1', 'menu_id' => '7'),
            array('id' => '8', 'group_id' => '2', 'menu_id' => '1'),
            array('id' => '9', 'group_id' => '2', 'menu_id' => '2'),
            array('id' => '10', 'group_id' => '2', 'menu_id' => '3'),
            array('id' => '11', 'group_id' => '1', 'menu_id' => '8'),
            array('id' => '12', 'group_id' => '1', 'menu_id' => '9'),
            array('id' => '13', 'group_id' => '1', 'menu_id' => '10'),
            array('id' => '15', 'group_id' => '1', 'menu_id' => '11'),
            array('id' => '16', 'group_id' => '1', 'menu_id' => '12'),
            array('id' => '18', 'group_id' => '1', 'menu_id' => '13'),
            array('id' => '19', 'group_id' => '1', 'menu_id' => '14'),
            array('id' => '20', 'group_id' => '2', 'menu_id' => '14'),
            array('id' => '21', 'group_id' => '1', 'menu_id' => '15'),
            array('id' => '22', 'group_id' => '2', 'menu_id' => '15'),
            array('id' => '23', 'group_id' => '1', 'menu_id' => '16'),
            array('id' => '24', 'group_id' => '2', 'menu_id' => '16'),
            array('id' => '25', 'group_id' => '1', 'menu_id' => '17'),
            array('id' => '26', 'group_id' => '1', 'menu_id' => '18'),
            array('id' => '27', 'group_id' => '2', 'menu_id' => '18'),
            array('id' => '28', 'group_id' => '1', 'menu_id' => '19'),
            array('id' => '29', 'group_id' => '1', 'menu_id' => '20'),
            array('id' => '30', 'group_id' => '2', 'menu_id' => '20'),
            array('id' => '31', 'group_id' => '1', 'menu_id' => '21'),
            array('id' => '32', 'group_id' => '2', 'menu_id' => '21'),
            array('id' => '35', 'group_id' => '1', 'menu_id' => '23'),
            array('id' => '36', 'group_id' => '2', 'menu_id' => '23'),
            array('id' => '37', 'group_id' => '1', 'menu_id' => '22'),
            array('id' => '38', 'group_id' => '2', 'menu_id' => '22'),
            array('id' => '39', 'group_id' => '1', 'menu_id' => '24'),
            array('id' => '40', 'group_id' => '2', 'menu_id' => '24'),
            array('id' => '41', 'group_id' => '1', 'menu_id' => '25'),
            array('id' => '42', 'group_id' => '2', 'menu_id' => '25'),
            array('id' => '43', 'group_id' => '1', 'menu_id' => '26'),
            array('id' => '44', 'group_id' => '2', 'menu_id' => '26'),
            array('id' => '45', 'group_id' => '1', 'menu_id' => '27'),
            array('id' => '46', 'group_id' => '2', 'menu_id' => '27'),
            array('id' => '47', 'group_id' => '1', 'menu_id' => '28'),
            array('id' => '48', 'group_id' => '2', 'menu_id' => '28'),
            array('id' => '49', 'group_id' => '1', 'menu_id' => '29'),
            array('id' => '50', 'group_id' => '2', 'menu_id' => '29'),
            array('id' => '51', 'group_id' => '1', 'menu_id' => '30'),
            array('id' => '52', 'group_id' => '2', 'menu_id' => '30'),
            array('id' => '53', 'group_id' => '1', 'menu_id' => '31'),
            array('id' => '54', 'group_id' => '2', 'menu_id' => '31'),
            array('id' => '55', 'group_id' => '1', 'menu_id' => '32'),
            array('id' => '56', 'group_id' => '2', 'menu_id' => '32'),
            array('id' => '57', 'group_id' => '1', 'menu_id' => '33'),
            array('id' => '58', 'group_id' => '2', 'menu_id' => '33'),
            array('id' => '59', 'group_id' => '1', 'menu_id' => '34'),
            array('id' => '60', 'group_id' => '2', 'menu_id' => '34'),
            array('id' => '61', 'group_id' => '1', 'menu_id' => '35'),
            array('id' => '62', 'group_id' => '2', 'menu_id' => '35'),
            array('id' => '63', 'group_id' => '1', 'menu_id' => '36'),
            array('id' => '64', 'group_id' => '2', 'menu_id' => '36'),
            array('id' => '65', 'group_id' => '1', 'menu_id' => '37'),
            array('id' => '66', 'group_id' => '2', 'menu_id' => '37'),
            array('id' => '67', 'group_id' => '1', 'menu_id' => '38'),
            array('id' => '68', 'group_id' => '2', 'menu_id' => '38')
        );

        foreach ($groups_menu as $key => $value) {
            $this->db->table('groups_menu')->replace($value);
        }

        $empresas = array(
            array('id' => '1', 'nombre' => 'GUSA', 'direccion' => 'Direccion', 'rfc' => 'rfc', 'telefono' => 'Telefono', 'correoElectronico' => 'asd@asd.com', 'diasEntrega' => NULL, 'caja' => NULL, 'logo' => NULL, 'certificado' => NULL, 'archivoKey' => NULL, 'contraCertificado' => '', 'regimenFiscal' => '601', 'razonSocial' => 'empresa', 'codigoPostal' => '81210', 'CURP' => 'CGU840103SZ5', 'email' => '', 'host' => '', 'smtpDebug' => '0', 'SMTPAuth' => '0', 'smptSecurity' => 'null', 'port' => '0', 'pass' => '', 'facturacionRD' => 'off', 'certificadoCSD' => '', 'archivoKeyCSD' => NULL, 'contraCertificadoCSD' => 'CGUSZ510', 'created_at' => '2024-12-28 20:05:27', 'updated_at' => '2025-03-13 12:43:27', 'deleted_at' => NULL)
        );

        $this->db->table('empresas')->emptyTable();
        foreach ($empresas as $key => $value) {
            $this->db->table('empresas')->replace($value);
        }


        $usuariosempresa = array(
            array('id' => '1', 'idEmpresa' => '1', 'idUsuario' => '1', 'status' => 'on', 'created_at' => '2024-12-28 20:05:27', 'updated_at' => '2024-12-28 20:05:27', 'deleted_at' => NULL)
        );

        $this->db->table('usuariosempresa')->emptyTable();
        foreach ($usuariosempresa as $key => $value) {
            $this->db->table('usuariosempresa')->replace($value);
        }

        // Assign Permission to role
        $this->authorize->addPermissionToGroup('back-office', 'admin');
        $this->authorize->addPermissionToGroup('manage-user', 'admin');
        $this->authorize->addPermissionToGroup('role-permission', 'admin');
        $this->authorize->addPermissionToGroup('menu-permission', 'admin');
        $this->authorize->addPermissionToGroup('back-office', 'member');

        // Assign Role to user
        $this->authorize->addUserToGroup(1, 'admin');
        $this->authorize->addUserToGroup(1, 'member');
        $this->authorize->addUserToGroup(2, 'member');
    }

    public function down() {
        //
    }
}
