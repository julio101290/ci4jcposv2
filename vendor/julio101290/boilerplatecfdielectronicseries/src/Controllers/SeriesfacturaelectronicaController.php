<?php

namespace julio101290\boilerplateCFDIElectronicSeries\Controllers;

use App\Controllers\BaseController;
use julio101290\boilerplateCFDIElectronicSeries\Models\{
    SeriesfacturaelectronicaModel
};
use julio101290\boilerplatelog\Models\LogModel;
use CodeIgniter\API\ResponseTrait;
use julio101290\boilerplatecompanies\Models\EmpresasModel;
use julio101290\boilerplatebranchoffice\Models\BranchofficesModel;

class SeriesfacturaelectronicaController extends BaseController {

    use ResponseTrait;

    protected $log;
    protected $seriesfacturaelectronica;
    protected $sucursales;

    public function __construct() {
        $this->seriesfacturaelectronica = new SeriesfacturaelectronicaModel();
        $this->log = new LogModel();
        $this->empresa = new EmpresasModel();
        $this->sucursales = new BranchofficesModel();
                
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
            $datos = $this->seriesfacturaelectronica->mdlGetSeriesfacturaelectronica($empresasID);

            return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
        }
        $titulos["title"] = lang('seriesfacturaelectronica.title');
        $titulos["subtitle"] = lang('seriesfacturaelectronica.subtitle');
        return view('julio101290\boilerplateCFDIElectronicSeries\Views\seriesfacturaelectronica', $titulos);
    }

    /**
     * Read Seriesfacturaelectronica
     */
    public function getSeriesfacturaelectronica() {

        helper('auth');

        $idUser = user()->id;
        $titulos["empresas"] = $this->empresa->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }


        $idSeriesfacturaelectronica = $this->request->getPost("idSeriesfacturaelectronica");
        $datosSeriesfacturaelectronica = $this->seriesfacturaelectronica->whereIn('idEmpresa', $empresasID)
                        ->where("id", $idSeriesfacturaelectronica)->first();
        
        $datosSucursal = $this->sucursales->select("*")->where("id",$datosSeriesfacturaelectronica["sucursal"])->first();
        
        if($datosSucursal["name"]!=null){
            
            $datosSeriesfacturaelectronica["nombreSucursal"] = $datosSucursal["name"];
            
        }else{
            
            $datosSucursal["name"] =""; 
            
        }
        
        
        echo json_encode($datosSeriesfacturaelectronica);
    }

    /**
     * Save or update Seriesfacturaelectronica
     */
    public function save() {
        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;
        $datos = $this->request->getPost();
        if ($datos["idSeriesfacturaelectronica"] == 0) {
            try {
                if ($this->seriesfacturaelectronica->save($datos) === false) {
                    $errores = $this->seriesfacturaelectronica->errors();
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
            if ($this->seriesfacturaelectronica->update($datos["idSeriesfacturaelectronica"], $datos) == false) {
                $errores = $this->seriesfacturaelectronica->errors();
                foreach ($errores as $field => $error) {
                    echo $error . " ";
                }
                return;
            } else {
                $dateLog["description"] = lang("seriesfacturaelectronica.logUpdated") . json_encode($datos);
                $dateLog["user"] = $userName;
                $this->log->save($dateLog);
                echo "Actualizado Correctamente";
                return;
            }
        }
        return;
    }

    /**
     * Delete Seriesfacturaelectronica
     * @param type $id
     * @return type
     */
    public function delete($id) {
        $infoSeriesfacturaelectronica = $this->seriesfacturaelectronica->find($id);
        helper('auth');
        $userName = user()->username;
        if (!$found = $this->seriesfacturaelectronica->delete($id)) {
            return $this->failNotFound(lang('seriesfacturaelectronica.msg.msg_get_fail'));
        }
        $this->seriesfacturaelectronica->purgeDeleted();
        $logData["description"] = lang("seriesfacturaelectronica.logDeleted") . json_encode($infoSeriesfacturaelectronica);
        $logData["user"] = $userName;
        $this->log->save($logData);
        return $this->respondDeleted($found, lang('seriesfacturaelectronica.msg_delete'));
    }

}
