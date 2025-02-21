<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Storages extends Migration {

    public function up() {
        // Storages
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'idEmpresa' => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
            'code' => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
            'name' => ['type' => 'varchar', 'constraint' => 256, 'null' => true],
            'type' => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
            'brachoffice' => ['type' => 'int', 'constraint' => 11, 'null' => true],
            'company' => ['type' => 'int', 'constraint' => 11, 'null' => true],
            'costCenter' => ['type' => 'int', 'constraint' => 11, 'null' => true],
            'exist' => ['type' => 'int', 'constraint' => 11, 'null' => true],
            'list' => ['type' => 'int', 'constraint' => 11, 'null' => true],
            'main' => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
            'inicioOperacion' => ['type' => 'date', 'null' => true],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('storages', true);
    }

    public function down() {
        $this->forge->dropTable('storages', true);
    }
}
