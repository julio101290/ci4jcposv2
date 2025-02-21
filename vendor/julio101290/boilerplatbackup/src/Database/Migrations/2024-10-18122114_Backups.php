<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Backups extends Migration {

    public function up() {
        // Backups
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'idEmpresa' => ['type' => 'int', 'constraint' => 11, 'null' => false],
            'description' => ['type' => 'varchar', 'constraint' => 256, 'null' => true],
            'SQLFile' => ['type' => 'varchar', 'constraint' => 256, 'null' => true],
            'uuid' => ['type' => 'varchar', 'constraint' => 36, 'null' => true],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('backups', true);
    }

    public function down() {
        $this->forge->dropTable('backups', true);
    }
}
