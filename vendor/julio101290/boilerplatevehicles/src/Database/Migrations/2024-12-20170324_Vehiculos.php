<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Vehiculos extends Migration {

    public function up() {
        // Vehiculos
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'idEmpresa' => ['type' => 'bigint', 'constraint' => 20, 'null' => true],
            'idTipoVehiculo' => ['type' => 'bigint', 'constraint' => 20, 'null' => true],
            'descripcion' => ['type' => 'varchar', 'constraint' => 512, 'null' => true],
            'placas' => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
            'permSCT' => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
            'numPermisoSCT' => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
            'configVehicular' => ['type' => 'varchar', 'constraint' => 256, 'null' => true],
            'pesoBrutoVehicular' => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
            'anioModelo' => ['type' => 'varchar', 'constraint' => 8, 'null' => true],
            'aseguraRespCivil' => ['type' => 'varchar', 'constraint' => 8, 'null' => true],
            'polizaRespCivil' => ['type' => 'varchar', 'constraint' => 256, 'null' => true],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('vehiculos', true);
    }

    public function down() {
        $this->forge->dropTable('vehiculos', true);
    }
}
