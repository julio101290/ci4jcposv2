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
        'idEmpresa' => 'required|is_natural_no_zero',
        'descripcion' => 'string|max_length[256]',
        'tipo' => 'required|string|max_length[3]',
        'esTraspaso' => 'permit_empty|string|max_length[3]',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function mdlGetTipos_movimientos_inventario($idEmpresas) {

        $result = $this->db->table('tipos_movimientos_inventario a')
                ->select(
                        'a.id AS id,
                        a.idEmpresa AS idEmpresa,
                        a.descripcion AS descripcion,
                        a.tipo AS tipo,
                        a.esTraspaso AS esTraspaso,
                        a.created_at AS created_at,
                        a.updated_at AS updated_at,
                        a.deleted_at AS deleted_at,
                        b.nombre AS nombreEmpresa'
                )
                ->join('empresas b', 'a.idEmpresa = b.id')
                ->whereIn('a.idEmpresa', $idEmpresas);

        return $result;
    }
}
