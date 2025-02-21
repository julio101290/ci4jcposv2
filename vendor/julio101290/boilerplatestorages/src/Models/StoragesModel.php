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
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function mdlStorages($empresas) {
        $resultado = $this->db->table('storages a, empresas b')
                ->select('
            a.id
            ,a.code
            ,a.idEmpresa
            ,a.name
            ,a.type
            ,a.brachoffice
            ,a.company
            ,a.costCenter
            ,a.exist
            ,a.list
            ,a.main
            ,a.created_at
            ,a.updated_at
            ,a.deleted_at
            ,a.inicioOperacion
            ,b.nombre as nombreEmpresa ')
                ->where('a.idEmpresa', 'b.id', FALSE)
                ->whereIn('a.idEmpresa', $empresas)
                ->where('a.deleted_at', null);

        return $resultado;
    }

}
