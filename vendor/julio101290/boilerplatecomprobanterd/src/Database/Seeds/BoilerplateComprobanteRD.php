<?php

namespace julio101290\BoilerplateComprobanteRD\Database\Seeds;

use CodeIgniter\Config\Services;
use CodeIgniter\Database\Seeder;
use Myth\Auth\Entities\User;
use Myth\Auth\Models\UserModel;

/**
 * Class BoilerplateSeeder.
 */
class BoilerplateComprobanteRD extends Seeder {

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
        $this->authorize->createPermission('comprobantes_rd-permission', 'Supplier Republic Dominican Invoices');

        // Assign Permission to user
        $this->authorize->addPermissionToUser('comprobantes_rd-permission', 1);

    }

    public function down() {
        //
    }
}
