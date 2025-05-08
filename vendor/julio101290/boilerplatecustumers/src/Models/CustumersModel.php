<?php

namespace julio101290\boilerplatecustumers\Models;

use CodeIgniter\Model;

class CustumersModel extends Model {

    protected $table = 'custumers';
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
        'idEmpresa' => 'required|integer',
        'firstname' => 'permit_empty|string|max_length[128]',
        'lastname' => 'permit_empty|string|max_length[128]',
        'razonSocial' => 'permit_empty|string|max_length[512]',
        'taxID' => 'permit_empty|string|max_length[64]',
        'email' => 'permit_empty|max_length[128]',
        'direction' => 'permit_empty|string|max_length[1024]',
        'birthdate' => 'permit_empty|valid_date',
        'formaPago' => 'permit_empty|string|max_length[16]',
        'metodoPago' => 'permit_empty|string|max_length[16]',
        'usoCFDI' => 'permit_empty|string|max_length[16]',
        'codigoPostal' => 'required|integer|max_length[11]',
        'regimenFiscal' => 'permit_empty|string|max_length[16]',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;

    /**
     * Obtener Clientes
     */
    public function mdlGetCustumers($empresas) {

        $resultado = $this->db->table('custumers a')
                ->select("
                        a.id AS id,
                        a.idEmpresa AS idEmpresa,
                        b.nombre AS nombreEmpresa,
                        a.firstname AS firstname,
                        a.lastname AS lastname,
                        a.taxID AS taxID,
                        a.email AS email,
                        a.direction AS direction,
                        a.birthdate AS birthdate,
                        a.metodoPago AS metodoPago,
                        a.formaPago AS formaPago,
                        a.usoCFDI AS usoCFDI,
                        a.created_at AS created_at,
                        a.updated_at AS updated_at,
                        a.codigoPostal AS codigoPostal,
                        a.regimenFiscal AS regimenFiscal,
                        a.razonSocial AS razonSocial,
                        a.deleted_at AS deleted_at
                    ")
                ->join('empresas b', 'a.idEmpresa = b.id', 'left')
                ->whereIn('a.idEmpresa', $empresas);

        return $resultado;
    }
}
