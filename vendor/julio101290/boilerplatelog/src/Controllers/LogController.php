<?php
 namespace julio101290\boilerplatelog\Controllers;
 use App\Controllers\BaseController;
 use \julio101290\boilerplatelog\Models\{LogModel};
 use CodeIgniter\API\ResponseTrait;

 class LogController extends BaseController {
     use ResponseTrait;
     protected $log;
     public function __construct() {
         $this->log = new LogModel();
         helper('menu');
         helper('utilerias');
     }
     public function index() {



        helper('auth');

        $idUser = user()->id;




         if ($this->request->isAJAX()) {
            $datos = $this->log->mdlGetLog();
             
         
             return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
         }
         $titulos["title"] = lang('log.title');
         $titulos["subtitle"] = lang('log.subtitle');
         return view('julio101290\boilerplatelog\Views\log', $titulos);
     }
     /**
      * Read Log
      */
     public function getLog() {
        
        helper('auth');

        $idUser = user()->id;
        $titulos["empresas"] = $this->empresa->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }
        
        
        $idLog = $this->request->getPost("idLog");
         $datosLog = $this->log->whereIn('idEmpresa',$empresasID)
         ->where("id",$idLog)->first();
         echo json_encode($datosLog);
     
     
        }
     /**
      * Save or update Log
      */
     public function save() {
         helper('auth');
         $userName = user()->username;
         $idUser = user()->id;
         $datos = $this->request->getPost();
         if ($datos["idLog"] == 0) {
             try {
                 if ($this->log->save($datos) === false) {
                     $errores = $this->log->errors();
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
             if ($this->log->update($datos["idLog"], $datos) == false) {
                 $errores = $this->log->errors();
                 foreach ($errores as $field => $error) {
                     echo $error . " ";
                 }
                 return;
             } else {
                 $dateLog["description"] = lang("log.logUpdated") . json_encode($datos);
                 $dateLog["user"] = $userName;
                 $this->log->save($dateLog);
                 echo "Actualizado Correctamente";
                 return;
             }
         }
         return;
     }
     /**
      * Delete Log
      * @param type $id
      * @return type
      */
     public function delete($id) {
         $infoLog = $this->log->find($id);
         helper('auth');
         $userName = user()->username;
         if (!$found = $this->log->delete($id)) {
             return $this->failNotFound(lang('log.msg.msg_get_fail'));
         }
         $this->log->purgeDeleted();
         $logData["description"] = lang("log.logDeleted") . json_encode($infoLog);
         $logData["user"] = $userName;
         $this->log->save($logData);
         return $this->respondDeleted($found, lang('log.msg_delete'));
     }
 }
        