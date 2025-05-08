<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Arqueocaja extends Migration {

    public function up() {
        // Arqueocaja
        $this->forge->addField([
                'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'idEmpresa' => ['type' => 'bigint', 'constraint' => 20, 'null' => false],
                'idSucursal' => ['type' => 'bigint', 'constraint' => 20, 'null' => true],
                'idUsuarioEntrega' => ['type' => 'bigint', 'constraint' => 20, 'null' => false],
                'idUsuarioVerifica' => ['type' => 'bigint', 'constraint' => 20, 'null' => false],
                'idUsuarioRecibe' => ['type' => 'bigint', 'constraint' => 20, 'null' => false],
                'fechaInicial' => ['type' => 'datetime', 'null' => true],
                'fechaFinal' => ['type' => 'datetime',  'null'  => true],
                'importeInicial'  => ['type' => 'decimal', 'constraint'  => 18, 'null'  => false],
                'importeVentasCredito'  => ['type' => 'decimal', 'constraint'  => 18, 'null'  => false],
                'importeVentasContado'  => ['type' => 'decimal', 'constraint'  => 18, 'null'  => false],
                'importeEfectivoContadoManual'  => ['type' => 'decimal', 'constraint'  => 18, 'null'  => false],
                'observaciones'  => ['type' => 'varchar', 'constraint'  => 1024, 'null'  => true],
                'created_at'  => ['type' => 'datetime', 'null'  => true],
                'updated_at'  => ['type' => 'datetime', 'null'  => true],
                'deleted_at'  => ['type' => 'datetime', 'null'  => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('arqueocaja', true);
    }

    public function down() {
        $this->forge->dropTable('arqueocaja', true);
    }
}
