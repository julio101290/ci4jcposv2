<?php
 namespace App\Controllers;
 use App\Controllers\BaseController;
 use \App\Models\{SapservicelayerModel};
 use julio101290\boilerplatelog\Models\LogModel;
 use CodeIgniter\API\ResponseTrait;
 use julio101290\boilerplatecompanies\Models\EmpresasModel;

 class SapservicelayerController extends BaseController {
     use ResponseTrait;
     protected $log;
     protected $sapservicelayer;
     public function __construct() {
         $this->sapservicelayer = new SapservicelayerModel();
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
            $datos = $this->sapservicelayer->mdlGetSapservicelayer($empresasID);
             
         
             return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
         }
         $titulos["title"] = lang('sapservicelayer.title');
         $titulos["subtitle"] = lang('sapservicelayer.subtitle');
         return view('sapservicelayer', $titulos);
     }
     /**
      * Read Sapservicelayer
      */
     public function getSapservicelayer() {
        
        helper('auth');

        $idUser = user()->id;
        $titulos["empresas"] = $this->empresa->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }
        
        
        $idSapservicelayer = $this->request->getPost("idSapservicelayer");
         $datosSapservicelayer = $this->sapservicelayer->whereIn('idEmpresa',$empresasID)
         ->where("id",$idSapservicelayer)->first();
         echo json_encode($datosSapservicelayer);
     
     
        }
     /**
      * Save or update Sapservicelayer
      */
     public function save() {
         helper('auth');
         $userName = user()->username;
         $idUser = user()->id;
         $datos = $this->request->getPost();
         if ($datos["idSapservicelayer"] == 0) {
             try {
                 if ($this->sapservicelayer->save($datos) === false) {
                     $errores = $this->sapservicelayer->errors();
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
             if ($this->sapservicelayer->update($datos["idSapservicelayer"], $datos) == false) {
                 $errores = $this->sapservicelayer->errors();
                 foreach ($errores as $field => $error) {
                     echo $error . " ";
                 }
                 return;
             } else {
                 $dateLog["description"] = lang("sapservicelayer.logUpdated") . json_encode($datos);
                 $dateLog["user"] = $userName;
                 $this->log->save($dateLog);
                 echo "Actualizado Correctamente";
                 return;
             }
         }
         return;
     }
     /**
      * Delete Sapservicelayer
      * @param type $id
      * @return type
      */
     public function delete($id) {
         $infoSapservicelayer = $this->sapservicelayer->find($id);
         helper('auth');
         $userName = user()->username;
         if (!$found = $this->sapservicelayer->delete($id)) {
             return $this->failNotFound(lang('sapservicelayer.msg.msg_get_fail'));
         }
         $this->sapservicelayer->purgeDeleted();
         $logData["description"] = lang("sapservicelayer.logDeleted") . json_encode($infoSapservicelayer);
         $logData["user"] = $userName;
         $this->log->save($logData);
         return $this->respondDeleted($found, lang('sapservicelayer.msg_delete'));
     }
 }
        