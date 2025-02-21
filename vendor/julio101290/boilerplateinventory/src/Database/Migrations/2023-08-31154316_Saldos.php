<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Saldos extends Migration {

    public function up() {
        // Saldos
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'idEmpresa' => ['type' => 'bigint', 'constraint' => 20, 'null' => false],
            'idAlmacen' => ['type' => 'bigint', 'constraint' => 20, 'null' => false],
            'lote' => ['type' => 'varchar', 'constraint' => 128, 'null' => false],
            'idProducto' => ['type' => 'bigint', 'constraint' => 20, 'null' => false],
            'codigoProducto' => ['type' => 'varchar', 'constraint' => 64, 'null' => false],
            'descripcion' => ['type' => 'varchar', 'constraint' => 1024, 'null' => false],
            'cantidad' => ['type' => 'decimal', 'constraint' => 18, 'null' => false],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('saldos', true);
    }

    public function down() {
        $this->forge->dropTable('saldos', true);
    }

}
