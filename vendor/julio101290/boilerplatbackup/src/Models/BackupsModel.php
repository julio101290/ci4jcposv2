<?php

namespace julio101290\boilerplatebackup\Models;

use CodeIgniter\Model;
class BackupsModel extends Model{
    protected $table      = 'backups';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id','idEmpresa','description','SQLFile','uuid','created_at','updated_at','deleted_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    =  [
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;



    public function mdlGetBackups($idEmpresas){

        $result = $this->db->table('backups a, empresas b')
                 ->select('a.id,a.idEmpresa,a.description,a.SQLFile,a.uuid,a.created_at,a.updated_at,a.deleted_at ,b.nombre as nombreEmpresa')
                 ->where('a.idEmpresa', 'b.id', FALSE)
                 ->whereIn('a.idEmpresa',$idEmpresas);
 
         return $result;
     }

}
        