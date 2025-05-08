<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sapservicelayer extends Migration {

    public function up() {
        // Sapservicelayer
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'idEmpresa' => ['type' => 'bigint', 'constraint' => 20, 'null' => true],
            'description' => ['type' => 'varchar', 'constraint' => 128, 'null' => true],
            'url' => ['type' => 'varchar', 'constraint' => 256, 'null' => true],
            'port' => ['type' => 'int', 'constraint' => 11, 'null' => true],
            'companyDB' => ['type' => 'varchar', 'constraint' => 128, 'null' => true],
            'password' => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
            'username' => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('sapservicelayer', true);
    }

    public function down() {
        $this->forge->dropTable('sapservicelayer', true);
    }
}
