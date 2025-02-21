<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Inventory extends Migration {

    public function up() {
        // Inventory
        $this->forge->addField([
                'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'idEmpresa' => ['type' => 'int', 'constraint' => 11, 'null' => true],
                'idTipoInventario' => ['type' => 'int', 'constraint' => 11, 'null' => true],
                'idStorage' => ['type' => 'int', 'constraint' => 11, 'null' => true],
                'tipoES' => ['type' => 'varchar', 'constraint' => 3, 'null' => true],
                'idProveedor' => ['type' => 'int', 'constraint' => 11, 'null' => true],
                'folio' => ['type' => 'int', 'constraint' => 11, 'null' => true],
                'idUser' => ['type' => 'bigint', 'constraint' => 11, 'null' => true],
                'listProducts' => ['type' => 'text', 'null'  => true],
                'taxes'  => ['type' => 'decimal', 'constraint'  => 18, 'null'  => true],
                'IVARetenido'  => ['type' => 'decimal', 'constraint'  => 18, 'null'  => true],
                'ISRRetenido'  => ['type' => 'decimal', 'constraint'  => 18, 'null'  => true],
                'subTotal'  => ['type' => 'decimal', 'constraint'  => 18, 'null'  => true],
                'total'  => ['type' => 'decimal', 'constraint'  => 18, 'null'  => true],
                'balance'  => ['type' => 'decimal', 'constraint'  => 18, 'null'  => true],
                'date'  => ['type' => 'date', 'null'  => true],
                'dateVen'  => ['type' => 'date',  'null'  => true],
                'quoteTo'  => ['type' => 'varchar', 'constraint'  => 512, 'null'  => true],
                'delivaryTime'  => ['type' => 'varchar', 'constraint'  => 512, 'null'  => true],
                'generalObservations'  => ['type' => 'varchar', 'constraint'  => 512, 'null'  => true],
                'UUID'  => ['type' => 'varchar', 'constraint'  => 36, 'null'  => true],
                'idOrdenCompra'  => ['type' => 'int', 'constraint'  => 11, 'null'  => true],
                'metodoPago'  => ['type' => 'varchar', 'constraint'  => 32, 'null'  => true],
                'formaPago'  => ['type' => 'varchar', 'constraint'  => 32, 'null'  => true],
                'razonSocialReceptor'  => ['type' => 'varchar', 'constraint'  => 1024, 'null'  => true],
                'codigoPostalReceptor'  => ['type' => 'varchar', 'constraint'  => 5, 'null'  => true],
                'regimenFiscalReceptor'  => ['type' => 'varchar', 'constraint'  => 32, 'null'  => true],
                'RFCReceptor'  => ['type' => 'varchar', 'constraint'  => 16, 'null'  => true],
                'usoCFDI'  => ['type' => 'varchar', 'constraint'  => 32, 'null'  => true],
                'created_at'  => ['type' => 'datetime', 'null'  => true],
                'updated_at'  => ['type' => 'datetime', 'null'  => true],
                'deleted_at'  => ['type' => 'datetime', 'null'  => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('inventory', true);
    }

    public function down() {
        $this->forge->dropTable('inventory', true);
    }
}
