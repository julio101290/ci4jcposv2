<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateIdEmpresaInStorages extends Migration
{
    public function up()
    {
        // Detectar base de datos
        $dbDriver = $this->db->getPlatform();

        if ($dbDriver === 'Postgre') {
            // PostgreSQL necesita USING para convertir tipos
            $this->db->query('ALTER TABLE storages ALTER COLUMN "idEmpresa" TYPE INTEGER USING "idEmpresa"::INTEGER');
        } else {
            // Para MySQL, MariaDB, SQL Server (menos restrictivos)
            $fields = [
                'idEmpresa' => [
                    'name'       => 'idEmpresa',
                    'type'       => 'INT',
                    'constraint' => 11,
                    'unsigned'   => true,
                    'null'       => true,
                ],
            ];
            $this->forge->modifyColumn('storages', $fields);
        }
    }

    public function down()
    {
        $dbDriver = $this->db->getPlatform();

        if ($dbDriver === 'Postgre') {
            $this->db->query('ALTER TABLE storages ALTER COLUMN "idEmpresa" TYPE VARCHAR(16)');
        } else {
            $fields = [
                'idEmpresa' => [
                    'name'       => 'idEmpresa',
                    'type'       => 'VARCHAR',
                    'constraint' => 16,
                    'null'       => true,
                ],
            ];
            $this->forge->modifyColumn('storages', $fields);
        }
    }
}
