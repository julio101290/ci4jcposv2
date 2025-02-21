<?php
namespace julio101290\boilerplatecomprobanterd\Controllers;

use App\Controllers\BaseController;
use \julio101290\boilerplatecomprobanterd\Models\{Comprobantes_rdModel};
use julio101290\boilerplatelog\Models\LogModel;
use CodeIgniter\API\ResponseTrait;
use julio101290\boilerplatecompanies\Models\EmpresasModel;

class Comprobantes_rdController extends BaseController
{
    use ResponseTrait;
    protected $log;
    protected $comprobantes_rd;
    protected $empresa;
    public function __construct()
    {
        $this->comprobantes_rd = new Comprobantes_rdModel();
        $this->log = new LogModel();
        $this->empresa = new EmpresasModel();
        helper('menu');
    }
    public function index()
    {


        helper('auth');

        $idUser = user()->id;
        $titulos["empresas"] = $this->empresa->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }


        if ($this->request->isAJAX()) {
            $datos = $this->comprobantes_rd->mdlGetComprobantes($empresasID);
            return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
        }
        $titulos["title"] = lang('comprobantes_rd.title');
        $titulos["subtitle"] = lang('comprobantes_rd.subtitle');
        return view('julio101290\boilerplatecomprobanterd\Views\comprobantes_rd', $titulos);
    }
    /**
     * Read Comprobantes_rd
     */
    public function getComprobantes_rd()
    {
        $idComprobantes_rd = $this->request->getPost("idComprobantes_rd");
        $datosComprobantes_rd = $this->comprobantes_rd->find($idComprobantes_rd);
        echo json_encode($datosComprobantes_rd);
    }
    /**
     * Save or update Comprobantes_rd
     */
    public function save()
    {
        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;
        $datos = $this->request->getPost();
        if ($datos["idComprobantes_rd"] == 0) {
            try {
                if ($this->comprobantes_rd->save($datos) === false) {
                    $errores = $this->comprobantes_rd->errors();
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
            if ($this->comprobantes_rd->update($datos["idComprobantes_rd"], $datos) == false) {
                $errores = $this->comprobantes_rd->errors();
                foreach ($errores as $field => $error) {
                    echo $error . " ";
                }
                return;
            } else {
                $dateLog["description"] = lang("comprobantes_rd.logUpdated") . json_encode($datos);
                $dateLog["user"] = $userName;
                $this->log->save($dateLog);
                echo "Actualizado Correctamente";
                return;
            }
        }
        return;
    }




        /**
     * Get Custumers via AJax
     */
    public function getComprobantes_rdAjax()
    {

        $request = service('request');
        $postData = $request->getPost();

        $response = array();

        // Read new token and assign in $response['token']
        $response['token'] = csrf_hash();
        $comprobantes = new Comprobantes_rdModel();
        $idEmpresa = $postData['idEmpresa'];


        if (!isset($postData['searchTerm'])) {
            // Fetch record
            
            $listComprobantes = $comprobantes->select('id,prefijo,nombre')->where("deleted_at", null)
                ->where('idEmpresa',$idEmpresa)
                ->orderBy('id')
                ->orderBy('prefijo')
                ->orderBy('nombre')
                ->findAll(10);
        } else {
            $searchTerm = $postData['searchTerm'];

            // Fetch record
           
            $listComprobantes = $comprobantes->select('id,prefijo,nombre')->where("deleted_at", null)
                ->where('idEmpresa',$idEmpresa)
                ->groupStart()
                ->like('prefijo', $searchTerm)
                ->orLike('id', $searchTerm)
                ->orLike('nombre', $searchTerm)
                ->groupEnd()
                ->findAll(10);
        }

        $data = array();
        foreach ($listComprobantes as $comprobante) {
            $data[] = array(
                "id" => $comprobante['id'],
                "text" => $comprobante['id'] . ' ' . $comprobante['prefijo'].' '.$comprobante['nombre'],
            );
        }

        $response['data'] = $data;

        return $this->response->setJSON($response);
    }




    /**
     * Delete Comprobantes_rd
     * @param type $id
     * @return type
     */
    public function delete($id)
    {
        $infoComprobantes_rd = $this->comprobantes_rd->find($id);
        helper('auth');
        $userName = user()->username;
        if (!$found = $this->comprobantes_rd->delete($id)) {
            return $this->failNotFound(lang('comprobantes_rd.msg.msg_get_fail'));
        }
        $this->comprobantes_rd->purgeDeleted();
        $logData["description"] = lang("comprobantes_rd.logDeleted") . json_encode($infoComprobantes_rd);
        $logData["user"] = $userName;
        $this->log->save($logData);
        return $this->respondDeleted($found, lang('comprobantes_rd.msg_delete'));
    }
}