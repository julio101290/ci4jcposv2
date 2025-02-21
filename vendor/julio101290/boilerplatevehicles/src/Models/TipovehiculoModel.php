<?php

namespace julio101290\boilerplatevehicles\Models;

use CodeIgniter\Model;

class TipovehiculoModel extends Model {

    protected $table = 'tipovehiculo';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id', 'idEmpresa', 'codigo', 'descripcion', 'created_at', 'updated_at', 'deleted_at'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $deletedField = 'deleted_at';
    protected $validationRules = [
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function mdlGetTipovehiculo($idEmpresas) {

        $result = $this->db->table('tipovehiculo a, empresas b')
                ->select('a.id,a.idEmpresa,a.codigo,a.descripcion,a.created_at,a.updated_at,a.deleted_at ,b.nombre as nombreEmpresa')
                ->where('a.idEmpresa', 'b.id', FALSE)
                ->whereIn('a.idEmpresa', $idEmpresas);

        return $result;
    }

    public function mdlGetTipovehiculoArray($idEmpresas) {

        $result = $this->db->table('tipovehiculo a, empresas b')
                        ->select('a.id,a.idEmpresa,a.codigo,a.descripcion,a.created_at,a.updated_at,a.deleted_at ,b.nombre as nombreEmpresa')
                        ->where('a.idEmpresa', 'b.id', FALSE)
                        ->whereIn('a.idEmpresa', $idEmpresas)->get()->getResultArray();

        return $result;
    }

}
