<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Quotesdetails extends Migration {

    public function up() {
        // Quotesdetails
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'idQuote' => ['type' => 'bigint', 'constraint' => 20, 'null' => true],
            'idAlmacen' => ['type' => 'bigint', 'constraint' => 20, 'null' => true],
            'lote' => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
            'idProduct' => ['type' => 'int', 'constraint' => 11, 'null' => true],
            'description' => ['type' => 'varchar', 'constraint' => 512, 'null' => true],
            'claveProductoSAT' => ['type' => 'varchar', 'constraint' => 64, 'null' => false],
            'claveUnidadSAT' => ['type' => 'varchar', 'constraint' => 64, 'null' => false],
            'codeProduct' => ['type' => 'varchar', 'constraint' => 32, 'null' => true],
            'cant' => ['type' => 'decimal', 'constraint' => 18, 'null' => true],
            'price' => ['type' => 'decimal', 'constraint' => 18, 'null' => true],
            'porcentTax' => ['type' => 'decimal', 'constraint' => 18, 'null' => true],
            'tax' => ['type' => 'decimal', 'constraint' => 18, 'null' => true],
            'porcentIVARetenido' => ['type' => 'decimal', 'constraint' => 18, 'null' => true],
            'IVARetenido' => ['type' => 'decimal', 'constraint' => 18, 'null' => true],
            'porcentISRRetenido' => ['type' => 'decimal', 'constraint' => 18, 'null' => true],
            'ISRRetenido' => ['type' => 'decimal', 'constraint' => 18, 'null' => true],
            'neto' => ['type' => 'decimal', 'constraint' => 18, 'null' => true],
            'total' => ['type' => 'decimal', 'constraint' => 18, 'null' => true],
            'unidad' => ['type' => 'varchar', 'constraint' => 64, 'null' => false],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('quotesdetails', true);
    }

    public function down() {
        $this->forge->dropTable('quotesdetails', true);
    }
}
