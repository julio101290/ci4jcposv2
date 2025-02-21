<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tipovehiculo extends Migration {

    public function up() {
        // Tipovehiculo
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'idEmpresa' => ['type' => 'bigint', 'constraint' => 20, 'null' => false],
            'codigo' => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
            'descripcion' => ['type' => 'varchar', 'constraint' => 512, 'null' => true],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tipovehiculo', true);
    }

    public function down() {
        $this->forge->dropTable('tipovehiculo', true);
    }
}
