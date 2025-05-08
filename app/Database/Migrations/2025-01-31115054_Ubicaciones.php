<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ubicaciones extends Migration {

    public function up() {
        // Ubicaciones
        $this->forge->addField([
                'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'idEmpresa' => ['type' => 'bigint', 'constraint' => 20, 'null' => false],
                'calle' => ['type' => 'text',  'null'  => true],
                'numInterior'  => ['type' => 'varchar', 'constraint'  => 32, 'null'  => true],
                'numExterior'  => ['type' => 'varchar', 'constraint'  => 32, 'null'  => true],
                'colonia'  => ['type' => 'varchar', 'constraint'  => 16, 'null'  => true],
                'localidad'  => ['type' => 'varchar', 'constraint'  => 16, 'null'  => true],
                'referencia'  => ['type' => 'varchar', 'constraint'  => 256, 'null'  => true],
                'municipio'  => ['type' => 'varchar', 'constraint'  => 16, 'null'  => true],
                'estado'  => ['type' => 'varchar', 'constraint'  => 16, 'null'  => true],
                'pais'  => ['type' => 'varchar', 'constraint'  => 16, 'null'  => true],
                'codigoPostal'  => ['type' => 'varchar', 'constraint'  => 16, 'null'  => true],
                'descripcion'  => ['type' => 'varchar', 'constraint'  => 1024, 'null'  => true],
                'RFCRemitenteDestinatario'  => ['type' => 'varchar', 'constraint'  => 16, 'null'  => true],
                'nombreRazonSocial'  => ['type' => 'varchar', 'constraint'  => 1024, 'null'  => true],
                'created_at'  => ['type' => 'datetime', 'null'  => true],
                'updated_at'  => ['type' => 'datetime', 'null'  => true],
                'deleted_at'  => ['type' => 'datetime', 'null'  => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('ubicaciones', true);
    }

    public function down() {
        $this->forge->dropTable('ubicaciones', true);
    }
}
