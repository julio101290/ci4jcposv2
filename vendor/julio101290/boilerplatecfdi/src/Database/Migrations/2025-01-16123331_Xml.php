<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Xml extends Migration {

    public function up() {
        // Xml
        $this->forge->addField([
                'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'uuidTimbre' => ['type' => 'varchar', 'constraint' => 36, 'null' => true],
                'archivoXML' => ['type' => 'text',  'null'  => true],
                'serie'  => ['type' => 'varchar', 'constraint'  => 256, 'null'  => true],
                'folio'  => ['type' => 'varchar', 'constraint'  => 256, 'null'  => true],
                'rfcEmisor'  => ['type' => 'varchar', 'constraint'  => 16, 'null'  => true],
                'rfcReceptor'  => ['type' => 'varchar', 'constraint'  => 16, 'null'  => true],
                'nombreEmisor'  => ['type' => 'varchar', 'constraint'  => 256, 'null'  => true],
                'tipoComprobante'  => ['type' => 'varchar', 'constraint'  => 18, 'null'  => true],
                'fecha'  => ['type' => 'datetime',  'null'  => false],
                'fechaTimbrado'  => ['type' => 'datetime',  'null'  => false],
                'total'  => ['type' => 'decimal', 'constraint'  => 18, 'null'  => true],
                'uuidPaquete'  => ['type' => 'varchar', 'constraint'  => 36, 'null'  => false],
                'nombreReceptor'  => ['type' => 'varchar', 'constraint'  => 256, 'null'  => true],
                'idEmpresa'  => ['type' => 'int', 'constraint'  => 11, 'null'  => true],
                'metodoPago'  => ['type' => 'varchar', 'constraint'  => 8, 'null'  => true],
                'formaPago'  => ['type' => 'varchar', 'constraint'  => 8, 'null'  => true],
                'usoCFDI'  => ['type' => 'varchar', 'constraint'  => 8, 'null'  => true],
                'exportacion'  => ['type' => 'varchar', 'constraint'  => 4, 'null'  => true],
                'emitidoRecibido'  => ['type' => 'varchar', 'constraint'  => 32, 'null'  => true],
                'base16'  => ['type' => 'decimal', 'constraint'  => 18, 'null'  => true],
                'totalImpuestos16'  => ['type' => 'decimal', 'constraint'  => 18, 'null'  => true],
                'base8'  => ['type' => 'decimal', 'constraint'  => 18, 'null'  => true],
                'totalImpuestos8'  => ['type' => 'decimal', 'constraint'  => 18, 'null'  => true],
                'status'  => ['type' => 'varchar', 'constraint'  => 128, 'null'  => true],
                'tasaExenta'  => ['type' => 'decimal', 'constraint'  => 18, 'null'  => true],
                'motivoCancelacion'  => ['type' => 'varchar', 'constraint'  => 8, 'null'  => true],
                'uuidRelacionado'  => ['type' => 'varchar', 'constraint'  => 64, 'null'  => true],
                'observacionesCancelacion'  => ['type' => 'varchar', 'constraint'  => 2056, 'null'  => true],
                'acuseCancelacion'  => ['type' => 'text','null'  => true],
                'created_at'  => ['type' => 'datetime', 'null'  => true],
                'updated_at'  => ['type' => 'datetime', 'null'  => true],
                'deleted_at'  => ['type' => 'datetime', 'null'  => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('xml', true);
    }

    public function down() {
        $this->forge->dropTable('xml', true);
    }
}
