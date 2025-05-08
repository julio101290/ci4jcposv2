<?php

namespace julio101290\boilerplatestorages\Controllers;

use App\Controllers\BaseController;
use \julio101290\boilerplatebranchoffice\Models\BranchofficesModel;
use julio101290\boilerplatelog\Models\LogModel;
use CodeIgniter\API\ResponseTrait;
use julio101290\boilerplatecompanies\Models\EmpresasModel;
use julio101290\boilerplatestorages\Models\UsuariosAlmacenModel;
use julio101290\boilerplatestorages\Models\StoragesModel;

class StoragesController extends BaseController {

    use ResponseTrait;

    protected $log;
    protected $storages;
    protected $empresa;
    protected $sucursales;
    protected $usuariosPorAlmacen;

    public function __construct() {
        $this->storages = new StoragesModel();
        $this->log = new LogModel();
        $this->empresa = new EmpresasModel();
        $this->sucursales = new BranchofficesModel();
        $this->usuariosPorAlmacen = new UsuariosAlmacenModel();
        helper('menu');
        helper('utilerias');
    }

    public function index() {

        helper('auth');

        $idUser = user()->id;
        $titulos["empresas"] = $this->empresa->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }

        if ($this->request->isAJAX()) {

            if ($this->request->isAJAX()) {
                $datos = $this->storages->mdlStorages($empresasID);
                return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
            }
        }

        $fechaActual = fechaMySQLADateHTML5(fechaHoraActual());
        $titulos["fecha"] = $fechaActual;

        $titulos["title"] = lang('storages.title');
        $titulos["subtitle"] = lang('storages.subtitle');

        // $titulos["empresas"] = $this->empresa->select("*")->asArray()->findAll();
        $titulos["sucursales"] = $this->sucursales->select("*")->asArray()->findAll();

        return view('julio101290\boilerplatestorages\Views\storages', $titulos);
    }

    /**
     * Read Storages
     */
    public function getStorages() {
        $idStorages = $this->request->getPost("idStorages");
        $datosStorages = $this->storages->find($idStorages);
        echo json_encode($datosStorages);
    }

    /**
     * Save or update Storages
     */
    public function save() {
        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;
        $datos = $this->request->getPost();
        if ($datos["idStorages"] == 0) {
            try {
                if ($this->storages->save($datos) === false) {
                    $errores = $this->storages->errors();
                    foreach ($errores as $field => $error) {
                        echo $error . " ";
                    }
                    return;
                }
                $dateLog["description"] = lang("vehicles.logDescription") . json_encode($datos);
                $dateLog["user"] = $userName;
                $this->log->save($dateLog);
                echo "Guardado Correctamente";
            } catch (\PHPUnit\Framework\Exception $ex) {
                echo "Error al guardar " . $ex->getMessage();
            }
        } else {
            if ($this->storages->update($datos["idStorages"], $datos) == false) {
                $errores = $this->storages->errors();
                foreach ($errores as $field => $error) {
                    echo $error . " ";
                }
                return;
            } else {
                $dateLog["description"] = lang("storages.logUpdated") . json_encode($datos);
                $dateLog["user"] = $userName;
                $this->log->save($dateLog);
                echo "Actualizado Correctamente";
                return;
            }
        }
        return;
    }

    /**
     * Delete Storages
     * @param type $id
     * @return type
     */
    public function delete($id) {
        $infoStorages = $this->storages->find($id);
        helper('auth');
        $userName = user()->username;
        if (!$found = $this->storages->delete($id)) {
            return $this->failNotFound(lang('storages.msg.msg_get_fail'));
        }
        $this->storages->purgeDeleted();
        $logData["description"] = lang("storages.logDeleted") . json_encode($infoStorages);
        $logData["user"] = $userName;
        $this->log->save($logData);
        return $this->respondDeleted($found, lang('storages.msg_delete'));
    }

    /**
     * Get Storages via AJax
     */
    public function getStoragesAjax() {

        $request = service('request');
        $postData = $request->getPost();

        $response = array();

        // Read new token and assign in $response['token']
        $response['token'] = csrf_hash();

        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;

        $almacenesPorUsuario = $this->usuariosPorAlmacen->select("*")
                        ->where("idUsuario", $idUser)
                        ->where("status", "on")->findAll();

        $almacenesPorUsuario = array_column($almacenesPorUsuario, "idStorage");
        if (!isset($postData['searchTerm'])) {
            // Fetch record
            $storages = new StoragesModel();
            $listStorages = $storages->select('id,code,name')->where("deleted_at", null)
                    ->whereIn("id", $almacenesPorUsuario)
                    ->where("idEmpresa", $postData["idEmpresa"])
                    ->orderBy('id')
                    ->orderBy('code')
                    ->orderBy('name')
                    ->findAll(10);
        } else {
            $searchTerm = $postData['searchTerm'];

            // Fetch record
            $storages = new StoragesModel();
            $listStorages = $storages->select('id,code,name')
                    ->where("deleted_at", null)
                    ->whereIn("id", $almacenesPorUsuario)
                    ->where("idEmpresa", $postData["idEmpresa"])
                    ->like('name', $searchTerm)
                    ->orLike('id', $searchTerm)
                    ->orLike('code', $searchTerm)
                    ->findAll(10);
        }

        $data = array();
        foreach ($listStorages as $storage) {
            $data[] = array(
                "id" => $storage['id'],
                "text" => $storage['code'] . ' ' . $storage['name'],
            );
        }

        $response['data'] = $data;

        return $this->response->setJSON($response);
    }

    public function usuariosPorAlmacen($almacen) {

        helper('auth');

        $idUser = user()->id;
        $titulos["empresas"] = $this->empresa->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }

        if($almacen == 0){
            
            $datosAlmacen["idEmpresa"] = 0;
            
        }else{
            
            $datosAlmacen = $this->storages->find($almacen);
            
        }
        

        $usuarios = $this->usuariosPorAlmacen->mdlAlmacenesPorUsuario($almacen, $empresasID,$datosAlmacen["idEmpresa"]);
        
        

        return \Hermawan\DataTables\DataTable::of($usuarios)->toJson(true);
    }

    /**
     * Activar Desactivar Usuario Por Empresa
     */
    public function ActivarDesactivar() {

        $datos = $this->request->getPost();

        if ($datos["id"] > 0) {

            //ACTUALIZA SI  EXISTE

            if ($this->usuariosPorAlmacen->update($datos["id"], $datos) === false) {
                $errores = $this->usuariosPorAlmacen->errors();
                foreach ($errores as $field => $error) {
                    echo $error . " ";
                }
                return;
            }

            echo "ok";
        } else {
            
            unset($datos["id"]); 

            //INSERTA SI  NO EXISTE
            if ($this->usuariosPorAlmacen->insert($datos) === false) {

                $errores = $this->usuariosPorAlmacen->errors();

                foreach ($errores as $key => $error) {

                    echo $error . " ";
                }

                return;
            }



            echo "ok";
        }
    }

}
