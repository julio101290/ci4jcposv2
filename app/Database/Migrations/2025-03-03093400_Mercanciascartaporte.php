<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mercanciascartaporte extends Migration {

    public function up() {
        // Mercanciascartaporte
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'idCartaPorte' => ['type' => 'bigint', 'constraint' => 20, 'null' => true],
            'bienesTransp' => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
            'descripcion' => ['type' => 'varchar', 'constraint' => 256, 'null' => true],
            'cantidad' => ['type' => 'decimal', 'constraint' => 18, 'null' => true],
            'claveUnidad' => ['type' => 'varchar', 'constraint' => 8, 'null' => true],
            'unidad' => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
            'materialPeligroso' => ['type' => 'varchar', 'constraint' => 2, 'null' => true],
            'pesoEnKg' => ['type' => 'decimal', 'constraint' => 18, 'null' => true],
            'cantidadTransporta' => ['type' => 'decimal', 'constraint' => 18, 'null' => true],
            'IDOrigenMercancia' => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
            'IDDestinoMercancia' => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('mercanciascartaporte', true);
    }

    public function down() {
        $this->forge->dropTable('mercanciascartaporte', true);
    }
}
