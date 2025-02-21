<?php
namespace julio101290\boilerplatecomprobanterd\Models;
use CodeIgniter\Model;
class Comprobantes_rdModel extends Model{
    protected $table      = 'comprobantes_rd';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id','idEmpresa','tipoDocumento','prefijo','nombre','folioInicial','folioFinal','folioActual','desdeFecha','hastaFecha','created_at','updated_at','deleted_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    =  [
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;


        /**
     * Obtener Clientes
     */
    public function mdlGetComprobantes($empresas)
    {


        $resultado = $this->db->table('comprobantes_rd a, empresas b')
            ->select('a.id
                    ,a.idEmpresa
                    ,b.nombre as nombreEmpresa
                    ,a.tipoDocumento
                    ,a.prefijo
                    ,a.nombre
                    ,a.folioInicial
                    ,a.folioFinal
                    ,a.folioActual
                    ,a.desdeFecha
                    ,a.hastaFecha
                    ,a.created_at
                    ,a.updated_at
                    ,a.deleted_at')
            ->where('a.idEmpresa', 'b.id', FALSE)
            ->whereIn('a.idEmpresa', $empresas);

        return $resultado;

    }
}
        