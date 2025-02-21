<?php

namespace julio101290\boilerplatestorages\Models;

use CodeIgniter\Model;

class UsuariosAlmacenModel extends Model
{
    protected $table      = 'usuarios_almacen';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id', 'idEmpresa', 'idStorage', 'idUsuario', 'status', 'created_at', 'updated_at', 'deleted_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    =  [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


    public function mdlAlmacenesPorUsuario($almacen, $empresasID)
    {

        $result = $this->db->table('users a, usuariosempresa b')
            ->select(
                'ifnull(a.id,0) as id
                ,a.username
                ,b.idEmpresa
                ,' . $almacen . ' as idStorage
                ,ifnull((select status 
                            from usuarios_almacen z
                            where z.idUsuario = a.id
                                and b.idEmpresa=b.id
                                    and z.idStorage=' . $almacen . '
                                    ),\'off\') as status
                                        
                ,ifnull((select id 
                        from usuarios_almacen z
                        where z.idUsuario = a.id
                            and b.idEmpresa=b.id
                                and z.idStorage=' . $almacen . '
                                ),0) as idAlmacenUsuario
                '

            )

            ->where('a.id', 'b.idUsuario', FALSE)
            ->wherein('b.id', $empresasID);

        return $result;
    }
}
