<?php

namespace julio101290\boilerplatevehicles\Controllers;

use App\Controllers\BaseController;
use \julio101290\boilerplatevehicles\Models\{
    TipovehiculoModel
};
use julio101290\boilerplatelog\Models\LogModel;
use CodeIgniter\API\ResponseTrait;
use julio101290\boilerplatecompanies\Models\EmpresasModel;

class TipovehiculoController extends BaseController {

    use ResponseTrait;

    protected $log;
    protected $tipovehiculo;

    public function __construct() {
        $this->tipovehiculo = new TipovehiculoModel();
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
            $datos = $this->tipovehiculo->mdlGetTipovehiculo($empresasID);

            return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
        }
        $titulos["title"] = lang('tipovehiculo.title');
        $titulos["subtitle"] = lang('tipovehiculo.subtitle');
        return view('julio101290\boilerplatevehicles\Views\tipovehiculo', $titulos);
    }

    /**
     * Read Tipovehiculo
     */
    public function getTipovehiculo() {

        helper('auth');

        $idUser = user()->id;
        $titulos["empresas"] = $this->empresa->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }


        $idTipovehiculo = $this->request->getPost("idTipovehiculo");
        $datosTipovehiculo = $this->tipovehiculo->whereIn('idEmpresa', $empresasID)
                        ->where("id", $idTipovehiculo)->first();
        echo json_encode($datosTipovehiculo);
    }

    /**
     * Save or update Tipovehiculo
     */
    public function save() {
        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;
        $datos = $this->request->getPost();

        if ($datos["idTipovehiculo"] == 0) {
            try {
                if ($this->tipovehiculo->save($datos) === false) {
                    $errores = $this->tipovehiculo->errors();
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
            if ($this->tipovehiculo->update($datos["idTipovehiculo"], $datos) == false) {
                $errores = $this->tipovehiculo->errors();
                foreach ($errores as $field => $error) {
                    echo $error . " ";
                }
                return;
            } else {
                $dateLog["description"] = lang("tipovehiculo.logUpdated") . json_encode($datos);
                $dateLog["user"] = $userName;
                $this->log->save($dateLog);
                echo "Actualizado Correctamente";
                return;
            }
        }
        return;
    }

    /**
     * Delete Tipovehiculo
     * @param type $id
     * @return type
     */
    public function delete($id) {
        $infoTipovehiculo = $this->tipovehiculo->find($id);
        helper('auth');
        $userName = user()->username;
        if (!$found = $this->tipovehiculo->delete($id)) {
            return $this->failNotFound(lang('tipovehiculo.msg.msg_get_fail'));
        }
        $this->tipovehiculo->purgeDeleted();
        $logData["description"] = lang("tipovehiculo.logDeleted") . json_encode($infoTipovehiculo);
        $logData["user"] = $userName;
        $this->log->save($logData);
        return $this->respondDeleted($found, lang('tipovehiculo.msg_delete'));
    }

    /**
     * Obtiene los de vehiculos  via AJax
     */
    public function getTipoVehiculosAjax() {

        $request = service('request');
        $postData = $request->getPost();

        $response = array();

        // Read new token and assign in $response['token']
        $response['token'] = csrf_hash();

        $idEmpresa = $postData['idEmpresa'];

        if (!isset($postData['searchTerm'])) {
            // Fetch record

            $listTipeVehicles = $this->tipovehiculo->select('id,idEmpresa,codigo,descripcion')->where("deleted_at", null)
                    ->where('idEmpresa', $idEmpresa)
                    ->orderBy('id')
                    ->orderBy('idEmpresa')
                    ->orderBy('codigo')
                    ->orderBy('descripcion')
                    ->findAll(1000);
        } else {
            $searchTerm = $postData['searchTerm'];

            // Fetch record

            $listTipeVehicles = $this->tipovehiculo->select('id,idEmpresa,codigo,descripcion')->where("deleted_at", null)
                    ->where('idEmpresa', $idEmpresa)
                    ->groupStart()
                    ->like('codigo', $searchTerm)
                    ->orLike('descripcion', $searchTerm)
                    ->orLike('id', $searchTerm)
                    ->groupEnd()
                    ->findAll(1000);
        }

        $data = array();
        foreach ($listTipeVehicles as $tipeVehicle) {
            $data[] = array(
                "id" => $tipeVehicle['id'],
                "text" => $tipeVehicle['id'] . ' ' . $tipeVehicle['codigo'] . ' ' . $tipeVehicle['descripcion'],
            );
        }

        $response['data'] = $data;

        return $this->response->setJSON($response);
    }

}
