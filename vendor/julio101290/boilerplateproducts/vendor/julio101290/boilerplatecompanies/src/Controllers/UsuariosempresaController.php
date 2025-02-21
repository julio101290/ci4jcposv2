<?php
 namespace  julio101290\boilerplatecompanies\Controllers;
 use App\Controllers\BaseController;
 use julio101290\boilerplatecompanies\Models\{UsuariosempresaModel};
 use App\Models\LogModel;
 use CodeIgniter\API\ResponseTrait;
 class UsuariosempresaController extends BaseController {

     use ResponseTrait;
     protected $log;
     protected $usuariosempresa;
     public function __construct() {
         $this->usuariosempresa = new UsuariosempresaModel();
         $this->log = new LogModel();
         helper('menu');
     }
     
     public function index() {
         if ($this->request->isAJAX()) {
             $datos = $this->usuariosempresa->select('id,idEmpresa,idUsuario,status,created_at,updated_at,deleted_at')->where('deleted_at', null);
             return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
         }
         $titulos["title"] = lang('usuariosempresa.title');
         $titulos["subtitle"] = lang('usuariosempresa.subtitle');
         return view('usuariosempresa', $titulos);
     }
     /**
      * Read Usuariosempresa
      */
     public function getUsuariosempresa() {
         $idUsuariosempresa = $this->request->getPost("idUsuariosempresa");
         $datosUsuariosempresa = $this->usuariosempresa->find($idUsuariosempresa);
         echo json_encode($datosUsuariosempresa);
     }
     /**
      * Save or update Usuariosempresa
      */
     public function save() {
         helper('auth');
         $userName = user()->username;
         $idUser = user()->id;
         $datos = $this->request->getPost();
         if ($datos["idUsuariosempresa"] == 0) {
             try {
                 if ($this->usuariosempresa->save($datos) === false) {
                     $errores = $this->usuariosempresa->errors();
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
             if ($this->usuariosempresa->update($datos["idUsuariosempresa"], $datos) == false) {
                 $errores = $this->usuariosempresa->errors();
                 foreach ($errores as $field => $error) {
                     echo $error . " ";
                 }
                 return;
             } else {
                 $dateLog["description"] = lang("usuariosempresa.logUpdated") . json_encode($datos);
                 $dateLog["user"] = $userName;
                 $this->log->save($dateLog);
                 echo "Actualizado Correctamente";
                 return;
             }
         }
         return;
     }
     /**
      * Delete Usuariosempresa
      * @param type $id
      * @return type
      */
     public function delete($id) {
         $infoUsuariosempresa = $this->usuariosempresa->find($id);
         helper('auth');
         $userName = user()->username;
         if (!$found = $this->usuariosempresa->delete($id)) {
             return $this->failNotFound(lang('usuariosempresa.msg.msg_get_fail'));
         }
         $this->usuariosempresa->purgeDeleted();
         $logData["description"] = lang("usuariosempresa.logDeleted") . json_encode($infoUsuariosempresa);
         $logData["user"] = $userName;
         $this->log->save($logData);
         return $this->respondDeleted($found, lang('usuariosempresa.msg_delete'));
     }
     
          /**
     * Get Vehiculos via AJax
     */
    public function getUsuariosEmpresaAjax()
    {

        $request = service('request');
        $postData = $request->getPost();

        $response = array();

        // Read new token and assign in $response['token']
        $response['token'] = csrf_hash();
       
        $idEmpresa = $postData['idEmpresa'];


        if (!isset($postData['searchTerm'])) {
            // Fetch record
            $searchTerm = "";
            $listUsers = $this->usuariosempresa->mdlUsuariosPorEmpresa($idEmpresa,$searchTerm);
        } else {
            
            
            $searchTerm = $postData['searchTerm'];

            // Fetch record
           
            $listUsers = $this->usuariosempresa->mdlUsuariosPorEmpresa($idEmpresa,$searchTerm);
        }

        $data = array();
        
        $data[] = array(
                "id" => '0',
                "text" =>  'Seleccione usuario',
            );
        
        foreach ($listUsers as $user) {
            
            $data[] = array(
                "id" => $user['id'],
                "text" => $user['id'] . ' ' . $user['username'] .' '.$user['firstname'].' '.$user['lastname'],
            );
            
        }

        $response['data'] = $data;

        return $this->response->setJSON($response);
    }
     
 }
        