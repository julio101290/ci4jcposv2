<?php

namespace julio101290\Boilerplatevehicles\Database\Seeds;

use CodeIgniter\Config\Services;
use CodeIgniter\Database\Seeder;
use Myth\Auth\Entities\User;
use Myth\Auth\Models\UserModel;

/**
 * Class BoilerplateSeeder.
 */
class BoilerplateVehicles extends Seeder {

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
        $this->authorize->createPermission('vehiculos-permission', 'Permission for Vehicles');
        $this->authorize->createPermission('tipovehiculo-permission', 'Permission for Vehicles');

        

        // Assign Permission to user
        $this->authorize->addPermissionToUser('vehiculos-permission', 1);
        $this->authorize->addPermissionToUser('tipovehiculo-permission', 1);

    }

    public function down() {
        //
    }
}
