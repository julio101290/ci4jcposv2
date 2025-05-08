<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MercanciascartaporteMaterialPeligroso extends Migration {

    public function up() {

        $campos = [
            'claveMaterialPeligroso' => ['type' => 'varchar', 'constraint' => 32, 'null' => true],
        ];

        $this->forge->addColumn('mercanciascartaporte', $campos);
    }

    public function down() {
        
    }
}
