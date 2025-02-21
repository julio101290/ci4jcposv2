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

        $result = $this->db->table('vehiculos a, empresas b, tipovehiculo c')
                ->select('a.id
                         ,b.nombre as nombreEmpresa
                         ,a.idEmpresa
                         ,a.idTipoVehiculo
                         ,c.codigo as codigoTipo
                         ,c.descripcion as descripcionTipo
                         ,a.descripcion
                         ,a.placas
                         ,a.permSCT
                         ,a.numPermisoSCT
                         ,a.configVehicular
                         ,a.pesoBrutoVehicular
                         ,a.anioModelo
                         ,a.aseguraRespCivil
                         ,a.polizaRespCivil
                         ,a.created_at
                         ,a.updated_at
                         ,a.deleted_at 
                         ,b.nombre as nombreEmpresa')
                ->where('a.idEmpresa', 'b.id', FALSE)
                ->where('a.idTipoVehiculo', 'c.id', FALSE)
                ->whereIn('a.idEmpresa', $idEmpresas);

        return $result;
    }

}
