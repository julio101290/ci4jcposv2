<?php

namespace julio101290\boilerplateCFDIElectronicSeries\Models;

use CodeIgniter\Model;

class SeriesfacturaelectronicaModel extends Model {

    protected $table = 'seriesfacturaelectronica';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id'
        , 'idEmpresa'
        , 'sucursal'
        , 'tipoSerie'
        , 'serie'
        , 'desdeFecha'
        , 'hastaFecha'
        , 'desdeFolio'
        , 'hastaFolio'
        , 'ambienteTimbrado'
        , 'tokenPruebas'
        , 'tokenProduccion'
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

    public function mdlGetSeriesfacturaelectronica($idEmpresas) {

        $result = $this->db->table('seriesfacturaelectronica a, empresas b, branchoffices c')
                ->select('a.id
                            ,a.idEmpresa
                            ,a.sucursal
                            ,a.tipoSerie
                            ,a.serie
                            ,a.desdeFecha
                            ,a.hastaFecha
                            ,a.desdeFolio
                            ,a.hastaFolio
                            ,a.ambienteTimbrado
                            ,a.tokenPruebas
                            ,a.tokenProduccion
                            ,a.created_at
                            ,a.updated_at
                            ,a.deleted_at 
                            ,b.nombre as nombreEmpresa
                            ,c.name as nombreSucursal
                            ')
                ->where('a.idEmpresa', 'b.id', FALSE)
                ->where('a.sucursal', 'c.id', FALSE)
                ->whereIn('a.idEmpresa', $idEmpresas);

        return $result;
    }

}
