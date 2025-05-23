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
        $builder = $this->db->table('tipovehiculo a');

        $builder->select([
            'a.id AS id',
            'a.idEmpresa AS idEmpresa',
            'a.codigo AS codigo',
            'a.descripcion AS descripcion',
            'a.created_at AS created_at',
            'a.updated_at AS updated_at',
            'a.deleted_at AS deleted_at',
            'b.nombre AS nombreEmpresa'
        ]);

        $builder->join('empresas b', 'a.idEmpresa = b.id');
        $builder->whereIn('a.idEmpresa', $idEmpresas);

        return $builder;
    }

    public function mdlGetTipovehiculoArray($idEmpresas) {
        $builder = $this->db->table('tipovehiculo a');

        $builder->select([
            'a.id AS id',
            'a.idEmpresa AS idEmpresa',
            'a.codigo AS codigo',
            'a.descripcion AS descripcion',
            'a.created_at AS created_at',
            'a.updated_at AS updated_at',
            'a.deleted_at AS deleted_at',
            'b.nombre AS nombreEmpresa'
        ]);

        $builder->join('empresas b', 'a.idEmpresa = b.id');
        $builder->whereIn('a.idEmpresa', $idEmpresas);

        return $builder->get()->getResultArray();
    }
}
