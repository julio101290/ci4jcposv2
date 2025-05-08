<?php
namespace App\Models;
use CodeIgniter\Model;
class SapservicelayerModel extends Model{
    protected $table      = 'sapservicelayer';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id','idEmpresa','description','url','port','companyDB','password','username','created_at','updated_at','deleted_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    =  [
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;



    public function mdlGetSapservicelayer($idEmpresas){

        $result = $this->db->table('sapservicelayer a, empresas b')
                 ->select('a.id,a.idEmpresa,a.description,a.url,a.port,a.companyDB,a.password,a.username,a.created_at,a.updated_at,a.deleted_at ,b.nombre as nombreEmpresa')
                 ->where('a.idEmpresa', 'b.id', FALSE)
                 ->whereIn('a.idEmpresa',$idEmpresas);
 
         return $result;
     }

}
        