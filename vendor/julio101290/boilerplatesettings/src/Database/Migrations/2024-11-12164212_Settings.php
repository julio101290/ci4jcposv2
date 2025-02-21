<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class settings extends Migration {

    public function up() {
        // Proyectos
        $this->forge->addField([
                'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'nameCompanie'  => ['type' => 'varchar', 'constraint'  => 256, 'null'  => true],
                'idTax'  => ['type' => 'varchar', 'constraint'  => 256, 'null'  => true],
                'phoneNumber'  => ['type' => 'varchar', 'constraint'  => 64, 'null'  => true],
                'email'  => ['type' => 'varchar', 'constraint'  => 64, 'null'  => true],
                'direction'  => ['type' => 'varchar', 'constraint'  => 256, 'null'  => true],
                'languaje'  => ['type' => 'varchar', 'constraint'  => 16, 'null'  => true],
                'created_at'  => ['type' => 'datetime', 'null'  => true],
                'updated_at'  => ['type' => 'datetime', 'null'  => true],
                'deleted_at'  => ['type' => 'datetime', 'null'  => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('settings', true);
    }

    public function down() {
        $this->forge->dropTable('settings', true);
    }
}
