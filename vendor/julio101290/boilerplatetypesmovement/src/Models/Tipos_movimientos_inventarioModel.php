<?php

namespace julio101290\boilerplatetypesmovement\Models;

use CodeIgniter\Model;

class Tipos_movimientos_inventarioModel extends Model {

    protected $table = 'tipos_movimientos_inventario';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id', 'idEmpresa', 'descripcion', 'tipo', 'esTraspaso', 'created_at', 'updated_at', 'deleted_at'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $deletedField = 'deleted_at';
    protected $validationRules = [
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function mdlGetTipos_movimientos_inventario($idEmpresas) {

        $result = $this->db->table('tipos_movimientos_inventario a, empresas b')
                ->select('a.id,a.idEmpresa,a.descripcion,a.tipo,a.esTraspaso,a.created_at,a.updated_at,a.deleted_at ,b.nombre as nombreEmpresa')
                ->where('a.idEmpresa', 'b.id', FALSE)
                ->whereIn('a.idEmpresa', $idEmpresas);

        return $result;
    }

}
