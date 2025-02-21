<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Categorias extends Migration
{
    public function up()
    {
        // Categorias
        $this->forge->addField([
            'id'                    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'idEmpresa'             => ['type' => 'bigint', 'null' => true],
            'clave'             => ['type' => 'varchar', 'constraint' => 8, 'null' => true],
            'descripcion'             => ['type' => 'varchar', 'constraint' => 128, 'null' => true],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('categorias', true);
    }
    public function down()
    {
        $this->forge->dropTable('categorias', true);
    }
}
