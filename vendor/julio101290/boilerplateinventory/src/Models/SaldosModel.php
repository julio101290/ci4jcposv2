<?php

namespace julio101290\boilerplateinventory\Models;

use CodeIgniter\Model;

class SaldosModel extends Model {

    protected $table = 'saldos';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id'
        , 'idEmpresa'
        , 'idAlmacen'
        , 'idProducto'
        , 'codigoProducto'
        , 'descripcion'
        , 'cantidad'
        , 'lote'
        , 'created_at'
        , 'deleted_at'
        , 'updated_at'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $deletedField = 'deleted_at';
    protected $validationRules = [
        'idEmpresa' => 'required|is_natural_no_zero|max_length[20]',
        'idAlmacen' => 'required|is_natural_no_zero|max_length[20]',
        'lote' => 'string|max_length[128]',
        'idProducto' => 'required|is_natural_no_zero|max_length[20]',
        'codigoProducto' => 'string|max_length[64]',
        'descripcion' => 'required|string|max_length[1024]',
        'cantidad' => 'required|decimal',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function mdlGetSaldos($idEmpresas) {

        $result = $this->db->table('saldos a, empresas b')
                ->select('a.id
                         ,a.idEmpresa
                         ,a.idAlmacen
                         ,a.idProducto
                         ,a.codigoProducto
                         ,a.descripcion
                         ,a.cantidad
                         ,a.created_at
                         ,a.deleted_at
                         ,a.updated_at 
                         ,b.nombre as nombreEmpresa')
                ->where('a.idEmpresa', 'b.id', FALSE)
                ->whereIn('a.idEmpresa', $idEmpresas);

        return $result;
    }
}
