<?php
 namespace App\Controllers;
 use App\Controllers\BaseController;
 use \App\Models\{CartaporteModel};
 use App\Models\LogModel;
 use CodeIgniter\API\ResponseTrait;
 use App\Models\EmpresasModel;

 class CartaporteController extends BaseController {
     use ResponseTrait;
     protected $log;
     protected $cartaporte;
     public function __construct() {
         $this->cartaporte = new CartaporteModel();
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
            $datos = $this->cartaporte->mdlGetCartaporte($empresasID);
             
         
             return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
         }
         $titulos["title"] = lang('cartaporte.title');
         $titulos["subtitle"] = lang('cartaporte.subtitle');
         return view('cartaporte', $titulos);
     }
     /**
      * Read Cartaporte
      */
     public function getCartaporte() {
        
        helper('auth');

        $idUser = user()->id;
        $titulos["empresas"] = $this->empresa->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }
        
        
        $idCartaporte = $this->request->getPost("idCartaporte");
         $datosCartaporte = $this->cartaporte->whereIn('idEmpresa',$empresasID)
         ->where("id",$idCartaporte)->first();
         echo json_encode($datosCartaporte);
     
     
        }
     /**
      * Save or update Cartaporte
      */
     public function save() {
         helper('auth');
         $userName = user()->username;
         $idUser = user()->id;
         $datos = $this->request->getPost();
         if ($datos["idCartaporte"] == 0) {
             try {
                 if ($this->cartaporte->save($datos) === false) {
                     $errores = $this->cartaporte->errors();
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
             if ($this->cartaporte->update($datos["idCartaporte"], $datos) == false) {
                 $errores = $this->cartaporte->errors();
                 foreach ($errores as $field => $error) {
                     echo $error . " ";
                 }
                 return;
             } else {
                 $dateLog["description"] = lang("cartaporte.logUpdated") . json_encode($datos);
                 $dateLog["user"] = $userName;
                 $this->log->save($dateLog);
                 echo "Actualizado Correctamente";
                 return;
             }
         }
         return;
     }
     /**
      * Delete Cartaporte
      * @param type $id
      * @return type
      */
     public function delete($id) {
         $infoCartaporte = $this->cartaporte->find($id);
         helper('auth');
         $userName = user()->username;
         if (!$found = $this->cartaporte->delete($id)) {
             return $this->failNotFound(lang('cartaporte.msg.msg_get_fail'));
         }
         $this->cartaporte->purgeDeleted();
         $logData["description"] = lang("cartaporte.logDeleted") . json_encode($infoCartaporte);
         $logData["user"] = $userName;
         $this->log->save($logData);
         return $this->respondDeleted($found, lang('cartaporte.msg_delete'));
     }
 }
        