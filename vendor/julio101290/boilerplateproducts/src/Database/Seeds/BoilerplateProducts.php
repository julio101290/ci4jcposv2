<?php

namespace julio101290\boilerplateproducts\Database\Seeds;

use CodeIgniter\Config\Services;
use CodeIgniter\Database\Seeder;
use Myth\Auth\Entities\User;
use Myth\Auth\Models\UserModel;

/**
 * Class BoilerplateSeeder.
 */
class BoilerplateProducts extends Seeder {

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


        // Permission
        $this->authorize->createPermission('products-permission', 'Permissions for products');
        $this->authorize->createPermission('categorias-permission', 'Permissions for products');

       

        // Assign Permission to user
        $this->authorize->addPermissionToUser('products-permission', 1);
        $this->authorize->addPermissionToUser('categorias-permission', 1);

    }

    public function down() {
        //
    }
}
