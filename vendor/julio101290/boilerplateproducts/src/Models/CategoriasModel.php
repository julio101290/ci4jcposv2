<?php

namespace julio101290\boilerplateproducts\Models;

use CodeIgniter\Model;

class CategoriasModel extends Model {

    protected $table = 'categorias';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id', 'idEmpresa', 'clave', 'descripcion', 'created_at', 'updated_at', 'deleted_at'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $deletedField = 'deleted_at';
    protected $validationRules = [
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function mdlObtenerCategorias($idEmpresas) {

        $resultado = $this->db->table('categorias a')
                ->select('a.id as id'
                        . ', a.clave as clave'
                        . ', a.descripcion as descripcion'
                        . ', a.created_at as created_at'
                        . ', a.updated_at as updated_at'
                        . ', a.deleted_at as deleted_at'
                        . ', b.nombre AS nombreEmpresa')
                ->join('empresas b', 'a.idEmpresa = b.id')
                ->whereIn('a.idEmpresa', $idEmpresas);

        return $resultado;
    }
}
