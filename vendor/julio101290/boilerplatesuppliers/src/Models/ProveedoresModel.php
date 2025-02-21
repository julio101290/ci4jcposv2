<?php

namespace julio101290\boilerplatesuppliers\Models;


use CodeIgniter\Model;

class ProveedoresModel extends Model {

    protected $table = 'proveedores';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id'
        , 'idEmpresa'
        , 'firstname'
        , 'lastname'
        , 'taxID'
        , 'email'
        , 'direction'
        , 'birthdate'
        , 'created_at'
        , 'updated_at'
        , 'deleted_at'
        , 'metodoPago'
        , 'formaPago'
        , 'codigoPostal'
        , 'regimenFiscal'
        , 'razonSocial'
        , 'usoCFDI'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $deletedField = 'deleted_at';
    protected $validationRules = [
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;

    /**
     * Obtener Clientes
     */
    public function mdlGetProveedores($empresas) {


        $resultado = $this->db->table('proveedores a, empresas b')
                ->select('a.id
                    ,a.idEmpresa
                    ,b.nombre as nombreEmpresa
                    ,a.firstname
                    ,a.lastname
                    ,a.taxID
                    ,a.email
                    ,a.direction
                    ,a.birthdate
                    ,a.metodoPago
                    ,a.formaPago
                    ,a.usoCFDI
                    ,a.created_at
                    ,a.updated_at
                    ,a.codigoPostal
                    ,a.regimenFiscal
                    ,a.razonSocial
                    ,a.deleted_at')
                ->where('a.idEmpresa', 'b.id', FALSE)
                ->whereIn('a.idEmpresa', $empresas);

        return $resultado;
    }

}
