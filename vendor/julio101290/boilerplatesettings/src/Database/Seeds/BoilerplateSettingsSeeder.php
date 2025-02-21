<?php

namespace julio101290\boilerplatesettings\Database\Seeds;

use CodeIgniter\Config\Services;
use CodeIgniter\Database\Seeder;
use Myth\Auth\Entities\User;
use Myth\Auth\Models\UserModel;

/**
 * Class BoilerplateSeeder.
 */
class BoilerplateSettingsSeeder extends Seeder {

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
        $this->authorize->createPermission('settings-permissions', 'Permissions for settings');

        // Assign Permission to user
        $this->authorize->addPermissionToUser('settings-permissions', 1);

        /**
         * Insert data
         */
        $settings = array(
            array('id' => '1', 'nameCompanie' => 'Name Corporation', 'idTax' => 'DNI', 'phoneNumber' => 'Phone number', 'email' => 'email@d.com', 'direction' => '123', 'languaje' => 'en', 'created_at' => NULL, 'updated_at' => NULL, 'deleted_at' => NULL)
        );

        //$this->db->table('menu')->insertBatch($menu);

        foreach ($settings as $key => $value) {
            $this->db->table('settings')->replace($value);
        }
    }

    public function down() {
        //
    }
}
