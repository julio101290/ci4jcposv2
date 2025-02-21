<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Proveedores extends Migration {

    public function up() {
        // Custumers
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'idEmpresa' => ['type' => 'varchar', 'constraint' => 128, 'null' => true],
            'firstname' => ['type' => 'varchar', 'constraint' => 128, 'null' => true],
            'lastname' => ['type' => 'varchar', 'constraint' => 128, 'null' => true],
            'razonSocial' => ['type' => 'varchar', 'constraint' => 512, 'null' => true],
            'taxID' => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
            'email' => ['type' => 'varchar', 'constraint' => 128, 'null' => true],
            'direction' => ['type' => 'varchar', 'constraint' => 1024, 'null' => true],
            'birthdate' => ['type' => 'datetime', 'null' => true],
            'formaPago' => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
            'metodoPago' => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
            'usoCFDI' => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
            'codigoPostal' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'regimenFiscal' => ['type' => 'varchar', 'constraint' => 128, 'null' => true],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('proveedores', true);
    }

    public function down() {
        $this->forge->dropTable('proveedores', true);
    }

}
