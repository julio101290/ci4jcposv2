<?php

namespace julio101290\boilerplatevehicles\Models;

use CodeIgniter\Model;

class VehiculosModel extends Model {

    protected $table = 'vehiculos';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id'
        , 'idEmpresa'
        , 'idTipoVehiculo'
        , 'descripcion'
        , 'placas'
        , 'permSCT'
        , 'numPermisoSCT'
        , 'configVehicular'
        , 'pesoBrutoVehicular'
        , 'anioModelo'
        , 'aseguraRespCivil'
        , 'polizaRespCivil'
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

    public function mdlGetVehiculos($idEmpresas) {
        $builder = $this->db->table('vehiculos a');

        $builder->select([
            'a.id AS id',
            'b.nombre AS nombreEmpresa',
            'a.idEmpresa AS idEmpresa',
            'a.idTipoVehiculo AS idTipoVehiculo',
            'c.codigo AS codigoTipo',
            'c.descripcion AS descripcionTipo',
            'a.descripcion AS descripcion',
            'a.placas AS placas',
            'a.permSCT AS permSCT',
            'a.numPermisoSCT AS numPermisoSCT',
            'a.configVehicular AS configVehicular',
            'a.pesoBrutoVehicular AS pesoBrutoVehicular',
            'a.anioModelo AS anioModelo',
            'a.aseguraRespCivil AS aseguraRespCivil',
            'a.polizaRespCivil AS polizaRespCivil',
            'a.created_at AS created_at',
            'a.updated_at AS updated_at',
            'a.deleted_at AS deleted_at'
        ]);

        $builder->join('empresas b', 'a.idEmpresa = b.id');
        $builder->join('tipovehiculo c', 'a.idTipoVehiculo = c.id');
        $builder->whereIn('a.idEmpresa', $idEmpresas);

        return $builder;
    }
}
