<?php

namespace julio101290\boilerplatetypesmovement\Controllers;

use App\Controllers\BaseController;
use julio101290\boilerplatetypesmovement\Models\{
    Tipos_movimientos_inventarioModel
};
use julio101290\boilerplatelog\Models\LogModel;
use CodeIgniter\API\ResponseTrait;
use julio101290\boilerplatecompanies\Models\EmpresasModel;

class Tipos_movimientos_inventarioController extends BaseController {

    use ResponseTrait;

    protected $log;
    protected $tipos_movimientos_inventario;

    public function __construct() {
        $this->tipos_movimientos_inventario = new Tipos_movimientos_inventarioModel();
        $this->log = new LogModel();
        $this->empresa = new EmpresasModel();
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
            $datos = $this->tipos_movimientos_inventario->mdlGetTipos_movimientos_inventario($empresasID);

            return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
        }
        $titulos["title"] = lang('tipos_movimientos_inventario.title');
        $titulos["subtitle"] = lang('tipos_movimientos_inventario.subtitle');
        return view('julio101290\boilerplatetypesmovement\Views\tipos_movimientos_inventario', $titulos);
    }

    /**
     * Read Tipos_movimientos_inventario
     */
    public function getTipos_movimientos_inventario() {

        helper('auth');

        $idUser = user()->id;
        $titulos["empresas"] = $this->empresa->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }


        $idTipos_movimientos_inventario = $this->request->getPost("idTipos_movimientos_inventario");
        $datosTipos_movimientos_inventario = $this->tipos_movimientos_inventario->whereIn('idEmpresa', $empresasID)
                        ->where("id", $idTipos_movimientos_inventario)->first();
        echo json_encode($datosTipos_movimientos_inventario);
    }

    /**
     * Save or update Tipos_movimientos_inventario
     */
    public function save() {
        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;
        $datos = $this->request->getPost();
        if ($datos["idTipos_movimientos_inventario"] == 0) {
            try {
                if ($this->tipos_movimientos_inventario->save($datos) === false) {
                    $errores = $this->tipos_movimientos_inventario->errors();
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
            if ($this->tipos_movimientos_inventario->update($datos["idTipos_movimientos_inventario"], $datos) == false) {
                $errores = $this->tipos_movimientos_inventario->errors();
                foreach ($errores as $field => $error) {
                    echo $error . " ";
                }
                return;
            } else {
                $dateLog["description"] = lang("tipos_movimientos_inventario.logUpdated") . json_encode($datos);
                $dateLog["user"] = $userName;
                $this->log->save($dateLog);
                echo "Actualizado Correctamente";
                return;
            }
        }
        return;
    }

    /**
     * Delete Tipos_movimientos_inventario
     * @param type $id
     * @return type
     */
    public function delete($id) {
        $infoTipos_movimientos_inventario = $this->tipos_movimientos_inventario->find($id);
        helper('auth');
        $userName = user()->username;
        if (!$found = $this->tipos_movimientos_inventario->delete($id)) {
            return $this->failNotFound(lang('tipos_movimientos_inventario.msg.msg_get_fail'));
        }
        $this->tipos_movimientos_inventario->purgeDeleted();
        $logData["description"] = lang("tipos_movimientos_inventario.logDeleted") . json_encode($infoTipos_movimientos_inventario);
        $logData["user"] = $userName;
        $this->log->save($logData);
        return $this->respondDeleted($found, lang('tipos_movimientos_inventario.msg_delete'));
    }

    public function getTiposMovimientoAjax() {

        helper('auth');

        $idUser = user()->id;
        $titulos["empresas"] = $this->empresa->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }

        $request = service('request');
        $postData = $request->getPost();

        $response = array();

        // Read new token and assign in $response['token']
        $response['token'] = csrf_hash();

        if (!isset($postData['searchTerm'])) {
            // Fetch record

            $listTiposMovimiento = $this->tipos_movimientos_inventario->select('id,descripcion')->where("deleted_at", null)
                    ->where("idEmpresa", $postData['idEmpresa'])
                    ->orderBy('id')
                    ->orderBy('descripcion')
                    ->findAll(10);
        } else {
            $searchTerm = $postData['searchTerm'];

            // Fetch record

            $listTiposMovimiento = $this->tipos_movimientos_inventario->select('id,descripcion')
                    ->where("deleted_at", null)
                    ->where("idEmpresa", $postData['idEmpresa'])
                    ->like('descripcion', $searchTerm)
                    ->orLike('id', $searchTerm)
                    ->findAll(10);
        }

        $data = array();
        foreach ($listTiposMovimiento as $tipoMovimiento) {
            $data[] = array(
                "id" => $tipoMovimiento['id'],
                "text" => $tipoMovimiento['descripcion'],
            );
        }

        $response['data'] = $data;

        return $this->response->setJSON($response);
    }

}
