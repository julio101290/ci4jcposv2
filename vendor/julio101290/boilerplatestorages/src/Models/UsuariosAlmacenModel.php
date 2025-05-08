<?php

namespace julio101290\boilerplatestorages\Models;

use CodeIgniter\Model;

class UsuariosAlmacenModel extends Model {

    protected $table = 'usuarios_almacen';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id', 'idEmpresa', 'idStorage', 'idUsuario', 'status', 'created_at', 'updated_at', 'deleted_at'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $deletedField = 'deleted_at';
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function mdlAlmacenesPorUsuario($almacen, $empresasID, $idEmpresa) {

        $db = \Config\Database::connect();
        
        if ($db->DBDriver === 'pgsql' || $db->DBDriver === 'PDO\Postgres' || $db->DBDriver === 'Postgre') {
            $result = $this->db->table('users a')
                    ->select(
                            'COALESCE(a.id, 0) AS id,
                            a.username as username,
                            b.idEmpresa AS idEmpresa,
                            ' . (int) $almacen . ' AS idStorage,

                            COALESCE((
                                SELECT z.status
                                FROM usuarios_almacen z
                                WHERE "z"."idUsuario" = a.id
                                  AND "z"."idStorage" = ' . (int) $almacen . '
                                 
                                  AND "b"."idEmpresa" = ' . (int) $idEmpresa . '
                                LIMIT 1
                            ), \'off\') AS status,

                            COALESCE((
                                SELECT z.id
                                FROM usuarios_almacen z
                                WHERE "z"."idUsuario" = a.id
                                  AND "z"."idStorage" = ' . (int) $almacen . '
                               
                                  AND "b"."idEmpresa" = ' . (int) $idEmpresa . '
                                LIMIT 1
                            ), 0) AS idalmacenusuario '
                    )
                    ->join('usuariosempresa b', 'a.id = b.idUsuario')
                    ->whereIn('b.id', $empresasID)
                    ->where("idEmpresa", $idEmpresa);
        } else {

            $result = $this->db->table('users a')
                    ->select(
                            'COALESCE(a.id, 0) AS id,
                            a.username as username,
                            b.idEmpresa AS idEmpresa,
                            ' . (int) $almacen . ' AS idStorage,

                            COALESCE((
                                SELECT z.status
                                FROM usuarios_almacen z
                                WHERE z.idUsuario = a.id
                                  AND z.idStorage = ' . (int) $almacen . '
                                  
                                  AND b.idEmpresa = ' . (int) $idEmpresa . '
                                LIMIT 1
                            ), \'off\') AS status,

                            COALESCE((
                                SELECT z.id
                                FROM usuarios_almacen z
                                WHERE z.idUsuario = a.id
                                  AND z.idStorage = ' . (int) $almacen . '
                                  
                                  AND b.idEmpresa = ' . (int) $idEmpresa . '
                                LIMIT 1
                            ), 0) AS idalmacenusuario '
                    )
                    ->join('usuariosempresa b', 'a.id = b.idUsuario')
                    ->whereIn('b.id', $empresasID)
                    ->where("idEmpresa", $idEmpresa);
        }

        return $result;
    }
}
