<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Remolques extends Migration {

    public function up() {
        // Remolques
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'idEmpresa' => ['type' => 'bigint', 'constraint' => 20, 'null' => true],
            'descripcion' => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
            'subTipoRemolque' => ['type' => 'varchar', 'constraint' => 32, 'null' => true],
            'placa' => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('remolques', true);
    }

    public function down() {
        $this->forge->dropTable('remolques', true);
    }
}
