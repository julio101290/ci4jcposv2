<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Peticionesdescargamasiva extends Migration {

    public function up() {
        // Peticionesdescargamasiva
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'desdeFecha' => ['type' => 'datetime', 'null' => true],
            'hastaFecha' => ['type' => 'datetime', 'null' => true],
            'emitidoRecibido' => ['type' => 'varchar', 'constraint' => 32, 'null' => true],
            'tipoPeticion' => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
            'uuidPeticion' => ['type' => 'varchar', 'constraint' => 39, 'null' => true],
            'nombreArchivo' => ['type' => 'varchar', 'constraint' => 512, 'null' => true],
            'status' => ['type' => 'varchar', 'constraint' => 128, 'null' => true],
            'idEmpresa' => ['type' => 'int', 'constraint' => 11, 'null' => true],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('peticionesdescargamasiva', true);
    }

    public function down() {
        $this->forge->dropTable('peticionesdescargamasiva', true);
    }
}
