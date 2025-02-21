<?php

namespace julio101290\boilerplatevehicles\Controllers;

use App\Controllers\BaseController;
use \julio101290\boilerplatevehicles\Models\{
    VehiculosModel
};
use julio101290\boilerplatelog\Models\LogModel;
use CodeIgniter\API\ResponseTrait;
use julio101290\boilerplatecompanies\Models\EmpresasModel;
use julio101290\boilerplatevehicles\Models\TipovehiculoModel;

class VehiculosController extends BaseController {

    use ResponseTrait;

    protected $log;
    protected $vehiculos;
    protected $tiposVehiculo;

    public function __construct() {
        $this->vehiculos = new VehiculosModel();
        $this->log = new LogModel();
        $this->empresa = new EmpresasModel();
        $this->tiposVehiculo = new TipovehiculoModel();
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


        $tiposVehiculo = $this->tiposVehiculo->mdlGetTipovehiculoArray($empresasID);

        if ($this->request->isAJAX()) {
            $datos = $this->vehiculos->mdlGetVehiculos($empresasID);

            return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
        }



        $titulos["title"] = lang('vehiculos.title');
        $titulos["subtitle"] = lang('vehiculos.subtitle');
        $titulos["tiposVehiculo"] = $tiposVehiculo;

        return view('julio101290\boilerplatevehicles\Views\vehiculos', $titulos);
    }

    /**
     * Read Vehiculos
     */
    public function getVehiculos() {

        helper('auth');

        $idUser = user()->id;
        $titulos["empresas"] = $this->empresa->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }


        $idVehiculos = $this->request->getPost("idVehiculos");

        $datosVehiculos = $this->vehiculos->whereIn('idEmpresa', $empresasID)
                        ->where("id", $idVehiculos)->first();

        $tipoVehiculo = $this->tiposVehiculo->select("*")
                        ->where("id", $datosVehiculos["idTipoVehiculo"])
                        ->whereIn("idEmpresa", $empresasID)->first();

        $datosVehiculos["descripcionTipo"] = $tipoVehiculo["descripcion"];
        echo json_encode($datosVehiculos);
    }

    /**
     * Save or update Vehiculos
     */
    public function save() {
        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;
        $datos = $this->request->getPost();
        if ($datos["idVehiculos"] == 0) {


            //VERIFICAMOS QUE NO TENGA PLACA REPETIDA
            $datosBuscar["placas"] = $datos["placas"];
            $datosBuscar["idEmpresa"] = $datos["idEmpresa"];

            $existePlaca = $this->vehiculos
                    ->select("*")
                    ->where($datosBuscar)
                    ->countAllResults();

            if ($existePlaca > 0) {

                echo "La placa ya existe";
                return;
            }

            try {




                if ($this->vehiculos->save($datos) === false) {
                    $errores = $this->vehiculos->errors();
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
            if ($this->vehiculos->update($datos["idVehiculos"], $datos) == false) {

                $existePlaca = $this->vehiculos
                        ->select("*")
                        ->where($datosBuscar)
                        ->where("id<>", $datos["idVehiculos"])
                        ->countAllResults();

                if ($existePlaca > 0) {

                    echo "La placa ya existe";
                    return;
                }


                $errores = $this->vehiculos->errors();
                foreach ($errores as $field => $error) {
                    echo $error . " ";
                }
                return;
            } else {
                $dateLog["description"] = lang("vehiculos.logUpdated") . json_encode($datos);
                $dateLog["user"] = $userName;
                $this->log->save($dateLog);
                echo "Actualizado Correctamente";
                return;
            }
        }
        return;
    }

    /**
     * Get Vehiculos via AJax
     */
    public function getVehiculosAjax() {

        $request = service('request');
        $postData = $request->getPost();

        $response = array();

        // Read new token and assign in $response['token']
        $response['token'] = csrf_hash();
        $custumers = new VehiculosModel();
        $idEmpresa = $postData['idEmpresa'];

        if (!isset($postData['searchTerm'])) {
            // Fetch record

            $listCustumers = $custumers->select('id,descripcion,placas')->where("deleted_at", null)
                    ->where('idEmpresa', $idEmpresa)
                    ->orderBy('id')
                    ->orderBy('descripcion')
                    ->orderBy('placas')
                    ->findAll(1000);
        } else {
            $searchTerm = $postData['searchTerm'];

            // Fetch record

            $listCustumers = $custumers->select('id,descripcion,placas')->where("deleted_at", null)
                    ->where('idEmpresa', $idEmpresa)
                    ->groupStart()
                    ->like('descripcion', $searchTerm)
                    ->orLike('id', $searchTerm)
                    ->orLike('placas', $searchTerm)
                    ->groupEnd()
                    ->findAll(1000);
        }

        $data = array();
        foreach ($listCustumers as $custumers) {
            $data[] = array(
                "id" => $custumers['id'],
                "text" => $custumers['id'] . ' ' . $custumers['placas'] . ' ' . $custumers['descripcion'],
            );
        }

        $response['data'] = $data;

        return $this->response->setJSON($response);
    }

    /**
     * Delete Vehiculos
     * @param type $id
     * @return type
     */
    public function delete($id) {
        $infoVehiculos = $this->vehiculos->find($id);
        helper('auth');
        $userName = user()->username;
        if (!$found = $this->vehiculos->delete($id)) {
            return $this->failNotFound(lang('vehiculos.msg.msg_get_fail'));
        }
        $this->vehiculos->purgeDeleted();
        $logData["description"] = lang("vehiculos.logDeleted") . json_encode($infoVehiculos);
        $logData["user"] = $userName;
        $this->log->save($logData);
        return $this->respondDeleted($found, lang('vehiculos.msg_delete'));
    }
}
