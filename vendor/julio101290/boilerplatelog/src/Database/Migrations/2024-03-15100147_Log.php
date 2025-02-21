<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Log extends Migration {

    public function up() {
        // Log
        $this->forge->addField([
                'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'description' => ['type' => 'varchar', 'constraint' => 256, 'null' => false],
                'user' => ['type' => 'text', 'null'  => true],
                'created_at'  => ['type' => 'datetime', 'null'  => true],
                'updated_at'  => ['type' => 'datetime', 'null'  => true],
                'deleted_at'  => ['type' => 'datetime', 'null'  => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('log', true);
    }

    public function down() {
        $this->forge->dropTable('log', true);
    }
}
