<?php
namespace julio101290\boilerplateproducts\Models;

use CodeIgniter\Model;
class CategoriasModel extends Model{
    protected $table      = 'categorias';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id','idEmpresa','clave','descripcion','created_at','updated_at','deleted_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    =  [
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;


    public function mdlObtenerCategorias($idEmpresas){

       $resultado = $this->db->table('categorias a, empresas b')
                ->select('a.id,a.clave,a.descripcion,a.created_at,a.updated_at,a.deleted_at,b.nombre as nombreEmpresa')
                ->where('a.idEmpresa', 'b.id', FALSE)
                ->whereIn('a.idEmpresa',$idEmpresas);

        return $resultado;
    }

}
        