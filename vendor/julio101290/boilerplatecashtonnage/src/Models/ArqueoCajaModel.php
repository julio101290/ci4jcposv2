<?php

namespace julio101290\boilerplatecashtonnage\Models;

use CodeIgniter\Model;

class ArqueoCajaModel extends Model {

    protected $table = 'arqueocaja';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id'
                                , 'idEmpresa'
                                , 'idSucursal'
                                , 'idUsuarioEntrega'
                                , 'idUsuarioVerifica'
                                , 'idUsuarioRecibe'
                                , 'fechaInicial'
                                , 'fechaFinal'
                                , 'importeInicial'
                                , 'importeVentasCredito'
                                , 'importeVentasContado'
                                , 'importeEfectivoContadoManual'
                                , 'observaciones'
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

    public function mdlGetArqueoCaja($idEmpresas) {

        $result = $this->db->table('arqueocaja a, empresas b, branchoffices c')
                ->select('a.id
                         ,a.idEmpresa
                         ,a.idSucursal
                          ,c.name as nombreSucursal
                         ,a.idUsuarioEntrega
                         ,a.idUsuarioVerifica
                         ,a.idUsuarioRecibe
                         ,a.fechaInicial
                         ,a.fechaFinal
                         ,a.importeInicial
                         ,a.importeVentasCredito
                         ,a.importeVentasContado
                         ,a.importeEfectivoContadoManual
                         ,a.observaciones
                         ,a.created_at
                         ,a.updated_at
                         ,a.deleted_at 
                         ,b.nombre as nombreEmpresa
                         ,(select username from users b where b.id = a.idUsuarioEntrega  ) as nombreUsuarioEntrega 
                         ,(select username from users b where b.id = a.idUsuarioVerifica  ) as nombreUsuarioVerifica
                         ,(select username from users b where b.id = a.idUsuarioRecibe  ) as nombreUsuarioRecibe
                        ')
                ->where('a.idEmpresa', 'b.id', FALSE)
                ->where('a.idSucursal', 'c.id', FALSE)
                ->whereIn('a.idEmpresa', $idEmpresas);

        return $result;
    }

    /**
     * Funcion para obtener el id de arqueo de caja por fecha, id empresa, id de sucursal
     */
    public function mdlObtenerIdArqueo($idEmpresa, $idSucursal, $fecha) {

        $resultado = $this->db->table('arqueocaja')
                        ->where('idEmpresa', $idEmpresa)
                        ->where('idSucursal', $idSucursal)
                        ->where("fechaInicial <=",$fecha)
                        ->where("fechaFinal >=",$fecha)
                        ->get()->getRowArray();

        return $resultado;
        
    }

}
