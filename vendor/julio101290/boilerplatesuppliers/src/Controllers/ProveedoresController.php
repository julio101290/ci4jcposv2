<?php

namespace julio101290\boilerplatesuppliers\Controllers;

use App\Controllers\BaseController;
use julio101290\boilerplatesuppliers\Models\{
    ProveedoresModel
};
use julio101290\boilerplatelog\Models\LogModel;
use CodeIgniter\API\ResponseTrait;
use julio101290\boilerplatecompanies\Models\EmpresasModel;

class ProveedoresController extends BaseController {

    use ResponseTrait;

    protected $log;
    protected $proveedores;
    protected $empresa;

    public function __construct() {
        $this->proveedores = new ProveedoresModel();
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
            $datos = $this->proveedores->mdlGetProveedores($empresasID);
            return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
        }

        $fechaActual = fechaMySQLADateTimeHTML5(fechaHoraActual());

        $titulos["title"] = lang('proveedores.title');
        $titulos["subtitle"] = lang('proveedores.subtitle');
        $titulos["fecha"] = $fechaActual;

        $titulos["formaPago"] = $this->catalogosSAT->formasDePago40()->searchByField("texto", "%%", 99999);
        $titulos["usoCFDI"] = $this->catalogosSAT->usosCfdi40()->searchByField("texto", "%%", 99999);
        $titulos["metodoPago"] = $this->catalogosSAT->metodosDePago40()->searchByField("texto", "%%", 99999);
        $titulos["regimenFiscal"] = $this->catalogosSAT->regimenesFiscales40()->searchByField("texto", "%%", 99999);
        return view('julio101290\boilerplatesuppliers\Views\proveedores', $titulos);
        
    }

    /**
     * Read Custumers
     */
    public function getProveedores() {
        $idProveedor = $this->request->getPost("idProveedor");

        $datosProveedor = $this->proveedores->find($idProveedor);
        echo json_encode($datosProveedor);
    }

    /**
     * Get Custumers via AJax
     */
    public function getProveedoresAjax() {

        $request = service('request');
        $postData = $request->getPost();

        $response = array();

        // Read new token and assign in $response['token']
        $response['token'] = csrf_hash();
        $proveedores = new ProveedoresModel();
        $idEmpresa = $postData['idEmpresa'];

        if (!isset($postData['searchTerm'])) {
            // Fetch record

            $listProveedores = $proveedores->select('id,firstname,lastname')->where("deleted_at", null)
                    ->where('idEmpresa', $idEmpresa)
                    ->orderBy('id')
                    ->orderBy('firstname')
                    ->orderBy('lastname')
                    ->findAll(10);
        } else {
            $searchTerm = $postData['searchTerm'];

            // Fetch record

            $listProveedores = $proveedores->select('id,firstname,lastname')->where("deleted_at", null)
                    ->where('idEmpresa', $idEmpresa)
                    ->groupStart()
                    ->like('firstname', $searchTerm)
                    ->orLike('id', $searchTerm)
                    ->orLike('lastname', $searchTerm)
                    ->groupEnd()
                    ->findAll(10);
        }

        $data = array();
        foreach ($listProveedores as $proveedores) {
            $data[] = array(
                "id" => $proveedores['id'],
                "text" => $proveedores['id'] . ' ' . $proveedores['firstname'] . ' ' . $proveedores['lastname'],
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
        if ($datos["idProveedor"] == 0) {
            try {
                if ($this->proveedores->save($datos) === false) {
                    $errores = $this->proveedores->errors();
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
            if ($this->proveedores->update($datos["idProveedor"], $datos) == false) {
                $errores = $this->proveedores->errors();
                foreach ($errores as $field => $error) {
                    echo $error . " ";
                }
                return;
            } else {
                $dateLog["description"] = lang("proveedores.logUpdated") . json_encode($datos);
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
        $infoCustumers = $this->proveedores->find($id);
        helper('auth');
        $userName = user()->username;
        if (!$found = $this->proveedores->delete($id)) {
            return $this->failNotFound(lang('custumers.msg.msg_get_fail'));
        }
        $this->proveedores->purgeDeleted();
        $logData["description"] = lang("proveedores.logDeleted") . json_encode($infoCustumers);
        $logData["user"] = $userName;
        $this->log->save($logData);
        return $this->respondDeleted($found, lang('custumers.msg_delete'));
    }

}
