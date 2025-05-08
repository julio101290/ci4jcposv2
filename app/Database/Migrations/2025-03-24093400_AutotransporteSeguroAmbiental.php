<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AutotransporteSeguroAmbiental extends Migration {

    public function up() {

        $campos = [
            'AseguraMedAmbiente' => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
            'PolizaMedAmbiente' => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
        ];

        $this->forge->addColumn('cartaporte', $campos);
    }

    public function down() {
        
    }
}
