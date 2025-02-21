<?php
namespace  julio101290\boilerplatelog\Models;

use CodeIgniter\Model;
class LogModel extends Model{
    protected $table      = 'log';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id','description','user','created_at','updated_at','deleted_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    =  [
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;



    public function mdlGetLog(){

        $result = $this->db->table('log a')
                 ->select('a.id,a.description,a.user,a.created_at,a.updated_at,a.deleted_at');
 
         return $result;
     }

}
        