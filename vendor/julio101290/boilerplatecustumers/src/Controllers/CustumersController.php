<?php

namespace julio101290\boilerplatecustumers\Controllers;

use App\Controllers\BaseController;
use \julio101290\boilerplatecustumers\Models\{
    CustumersModel
};
use julio101290\boilerplatelog\Models\LogModel;
use CodeIgniter\API\ResponseTrait;
use julio101290\boilerplatecompanies\Models\EmpresasModel;

class CustumersController extends BaseController {

    use ResponseTrait;

    protected $log;
    protected $custumers;
    protected $empresa;

    public function __construct() {
        $this->custumers = new CustumersModel();
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
            $datos = $this->custumers->mdlGetCustumers($empresasID);
            return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
        }

        $fechaActual = fechaMySQLADateTimeHTML5(fechaHoraActual());

        $titulos["title"] = lang('custumers.title');
        $titulos["subtitle"] = lang('custumers.subtitle');
        $titulos["fecha"] = $fechaActual;

        $titulos["formaPago"] = $this->catalogosSAT->formasDePago40()->searchByField("texto", "%%", 99999);
        $titulos["usoCFDI"] = $this->catalogosSAT->usosCfdi40()->searchByField("texto", "%%", 99999);
        $titulos["metodoPago"] = $this->catalogosSAT->metodosDePago40()->searchByField("texto", "%%", 99999);
        $titulos["regimenFiscal"] = $this->catalogosSAT->regimenesFiscales40()->searchByField("texto", "%%", 99999);
        return view('julio101290\boilerplatecustumers\Views\custumers', $titulos);
    }

    /**
     * Read Custumers
     */
    public function getCustumers() {
        $idCustumers = $this->request->getPost("idCustumers");
        $datosCustumers = $this->custumers->find($idCustumers);
        echo json_encode($datosCustumers);
    }

    /**
     * Get Custumers via AJax
     */
    public function getCustumersAjax() {

        $request = service('request');
        $postData = $request->getPost();

        $response = array();

        // Read new token and assign in $response['token']
        $response['token'] = csrf_hash();
        $custumers = new CustumersModel();
        $idEmpresa = $postData['idEmpresa'];

        if (!isset($postData['searchTerm'])) {
            // Fetch record

            $listCustumers = $custumers->select('id,firstname,lastname')->where("deleted_at", null)
                    ->where('idEmpresa', $idEmpresa)
                    ->orderBy('id')
                    ->orderBy('firstname')
                    ->orderBy('lastname')
                    ->findAll(10);
        } else {
            $searchTerm = $postData['searchTerm'];

            // Fetch record

            $listCustumers = $custumers->select('id,firstname,lastname')->where("deleted_at", null)
                    ->where('idEmpresa', $idEmpresa)
                    ->groupStart()
                    ->like('firstname', $searchTerm)
                    ->orLike('id', $searchTerm)
                    ->orLike('lastname', $searchTerm)
                    ->groupEnd()
                    ->findAll(10);
        }

        $data = array();
        foreach ($listCustumers as $custumers) {
            $data[] = array(
                "id" => $custumers['id'],
                "text" => $custumers['id'] . ' ' . $custumers['firstname'] . ' ' . $custumers['lastname'],
            );
        }

        $response['data'] = $data;

        return $this->response->setJSON($response);
    }

    /**
     * Get Custumers todos via AJax
     */
    public function getCustumersTodosAjax() {

        $request = service('request');
        $postData = $request->getPost();

        $response = array();

        // Read new token and assign in $response['token']
        $response['token'] = csrf_hash();
        $custumers = new CustumersModel();
        $idEmpresa = $postData['idEmpresa'];

        if (!isset($postData['searchTerm'])) {
            // Fetch record

            $listCustumers = $custumers->select('id,firstname,lastname')->where("deleted_at", null)
                    ->where('idEmpresa', $idEmpresa)
                    ->orderBy('id')
                    ->orderBy('firstname')
                    ->orderBy('lastname')
                    ->findAll(10);
        } else {
            $searchTerm = $postData['searchTerm'];

            // Fetch record

            $listCustumers = $custumers->select('id,firstname,lastname')->where("deleted_at", null)
                    ->where('idEmpresa', $idEmpresa)
                    ->groupStart()
                    ->like('firstname', $searchTerm)
                    ->orLike('id', $searchTerm)
                    ->orLike('lastname', $searchTerm)
                    ->groupEnd()
                    ->findAll(10);
        }

        $data = array();
        $data[] = array(
            "id" => 0,
            "text" => "0 Todos los clientes",
        );
        foreach ($listCustumers as $custumers) {
            $data[] = array(
                "id" => $custumers['id'],
                "text" => $custumers['id'] . ' ' . $custumers['firstname'] . ' ' . $custumers['lastname'],
            );
        }

        $response['data'] = $data;

        return $this->response->setJSON($response);
    }

    /**
     * Save or update Custumers
     */
    public function save() {
        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;
        $datos = $this->request->getPost();
        if ($datos["idCustumers"] == 0) {
            try {
                if ($this->custumers->save($datos) === false) {
                    $errores = $this->custumers->errors();
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
            if ($this->custumers->update($datos["idCustumers"], $datos) == false) {
                $errores = $this->custumers->errors();
                foreach ($errores as $field => $error) {
                    echo $error . " ";
                }
                return;
            } else {
                $dateLog["description"] = lang("custumers.logUpdated") . json_encode($datos);
                $dateLog["user"] = $userName;
                $this->log->save($dateLog);
                echo "Actualizado Correctamente";
                return;
            }
        }
        return;
    }

    /**
     * Delete Custumers
     * @param type $id
     * @return type
     */
    public function delete($id) {
        $infoCustumers = $this->custumers->find($id);
        helper('auth');
        $userName = user()->username;
        if (!$found = $this->custumers->delete($id)) {
            return $this->failNotFound(lang('custumers.msg.msg_get_fail'));
        }
        $this->custumers->purgeDeleted();
        $logData["description"] = lang("custumers.logDeleted") . json_encode($infoCustumers);
        $logData["user"] = $userName;
        $this->log->save($logData);
        return $this->respondDeleted($found, lang('custumers.msg_delete'));
    }

}
