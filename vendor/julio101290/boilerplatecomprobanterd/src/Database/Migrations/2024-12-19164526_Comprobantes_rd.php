<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Comprobantes_rd extends Migration {

    public function up() {
        // Comprobantes_rd
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'idEmpresa' => ['type' => 'bigint', 'constraint' => 20, 'null' => false],
            'tipoDocumento' => ['type' => 'varchar', 'constraint' => 4, 'null' => false],
            'prefijo' => ['type' => 'varchar', 'constraint' => 8, 'null' => false],
            'nombre' => ['type' => 'varchar', 'constraint' => 64, 'null' => false],
            'folioInicial' => ['type' => 'int', 'constraint' => 11, 'null' => false],
            'folioFinal' => ['type' => 'int', 'constraint' => 11, 'null' => false],
            'folioActual' => ['type' => 'int', 'constraint' => 11, 'null' => true],
            'desdeFecha' => ['type' => 'date', 'null' => false],
            'hastaFecha' => ['type' => 'date', 'null' => false],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('comprobantes_rd', true);
    }

    public function down() {
        $this->forge->dropTable('comprobantes_rd', true);
    }
}
