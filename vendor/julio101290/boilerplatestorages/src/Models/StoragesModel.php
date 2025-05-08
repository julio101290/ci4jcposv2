<?php

namespace julio101290\boilerplatestorages\Models;

use CodeIgniter\Model;

class StoragesModel extends Model {

    protected $table = 'storages';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id'
        , 'code'
        , 'idEmpresa'
        , 'name'
        , 'type'
        , 'brachoffice'
        , 'company'
        , 'costCenter'
        , 'exist'
        , 'list'
        , 'main'
        , 'inicioOperacion'
        , 'created_at'
        , 'updated_at'
        , 'deleted_at'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $deletedField = 'deleted_at';
    protected $validationRules = [
        'idEmpresa' => 'integer',
        'code' => 'string|max_length[16]',
        'name' => 'string|max_length[256]',
        'type' => 'permit_empty|string|max_length[64]',
        'brachoffice' => 'permit_empty|integer',
        'company' => 'permit_empty|integer',
        'costCenter' => 'permit_empty|integer',
        'exist' => 'permit_empty|integer',
        'list' => 'permit_empty|integer',
        'main' => 'permit_empty|string|max_length[16]',
        'inicioOperacion' => 'valid_date',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function mdlStorages($empresas) {

        $resultado = $this->db->table('storages a')
                ->select(
                        'a.id AS id,
                        a.code AS code,
                        a.idEmpresa AS idEmpresa,
                        a.name AS name,
                        a.type AS type,
                        a.brachoffice AS brachoffice,
                        a.company AS company,
                        a.costCenter AS costCenter,
                        a.exist AS exist,
                        a.list AS list,
                        a.main AS main,
                        a.created_at AS created_at,
                        a.updated_at AS updated_at,
                        a.deleted_at AS deleted_at,
                        a.inicioOperacion AS inicioOperacion,
                        b.nombre AS nombreEmpresa'
                )
                ->join('empresas b', 'a.idEmpresa = b.id')
                ->whereIn('a.idEmpresa', $empresas)
                ->where('a.deleted_at', null);

        return $resultado;
    }
}
