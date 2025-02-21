<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tipos_movimientos_inventario extends Migration {

    public function up() {
        // Tipos_movimientos_inventario
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'idEmpresa' => ['type' => 'bigint', 'constraint' => 20, 'null' => true],
            'descripcion' => ['type' => 'varchar', 'constraint' => 256, 'null' => true],
            'tipo' => ['type' => 'varchar', 'constraint' => 3, 'null' => true],
            'esTraspaso' => ['type' => 'varchar', 'constraint' => 3, 'null' => true],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tipos_movimientos_inventario', true);
    }

    public function down() {
        $this->forge->dropTable('tipos_movimientos_inventario', true);
    }

}
