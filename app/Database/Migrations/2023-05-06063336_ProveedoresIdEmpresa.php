<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ChangeIdEmpresaProveedores extends Migration
{
    public function up()
    {
        // Detectar motor de base de datos
        $driver = $this->db->getPlatform(); // 'MySQLi', 'Postgre', 'SQLSRV'

        if ($driver === 'Postgre') {
            // Para PostgreSQL necesitamos usar USING para castear a integer
            $this->db->query('ALTER TABLE proveedores ALTER COLUMN "idEmpresa" TYPE INTEGER USING ("idEmpresa"::integer)');
        } elseif ($driver === 'SQLSRV') {
            // SQL Server necesita DROP y ADD para cambiar tipo
            $this->db->query('ALTER TABLE proveedores DROP COLUMN idEmpresa');
            $this->db->query('ALTER TABLE proveedores ADD idEmpresa INT NULL');
        } else {
            // MySQL / MariaDB
            $this->db->query('ALTER TABLE proveedores MODIFY COLUMN idEmpresa INT NULL');
        }
    }

    public function down()
    {
        // Revertir a VARCHAR(128)
        $driver = $this->db->getPlatform();

        if ($driver === 'Postgre') {
            $this->db->query('ALTER TABLE proveedores ALTER COLUMN "idEmpresa" TYPE VARCHAR(128)');
        } elseif ($driver === 'SQLSRV') {
            $this->db->query('ALTER TABLE proveedores DROP COLUMN idEmpresa');
            $this->db->query('ALTER TABLE proveedores ADD idEmpresa VARCHAR(128) NULL');
        } else {
            $this->db->query('ALTER TABLE proveedores MODIFY COLUMN idEmpresa VARCHAR(128)');
        }
    }
}
