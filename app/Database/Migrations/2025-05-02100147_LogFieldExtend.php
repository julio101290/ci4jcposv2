<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterLogTableDescription extends Migration {

    public function up() {
        $this->forge->modifyColumn('log', [
            'description' => ['type' => 'text', 'null' => false], // Cambiado a 'text'
        ]);
    }

    public function down() {
        $this->forge->modifyColumn('log', [
            'description' => ['type' => 'varchar', 'constraint' => 256, 'null' => false], // Revertir al estado anterior
        ]);
    }
}
