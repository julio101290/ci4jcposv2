<?php

namespace julio101290\boilerplateproducts\Controllers;

use App\Controllers\BaseController;
use \julio101290\boilerplateproducts\Models\{CategoriasModel};
use julio101290\boilerplatelog\Models\LogModel;
use CodeIgniter\API\ResponseTrait;
use julio101290\boilerplateproducts\Models\ProductsModel;
use julio101290\boilerplatecompanies\Models\EmpresasModel;

class CategoriasController extends BaseController
{
    use ResponseTrait;
    protected $log;
    protected $categorias;
    protected $empresa;
    protected $productos;
    public function __construct()
    {
        $this->categorias = new CategoriasModel();
        $this->log = new LogModel();
        $this->productos = new ProductsModel();
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
            $datos = $this->categorias->mdlObtenerCategorias($empresasID);
            return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
        }
        
        $titulos["title"] = lang('categorias.title');
        $titulos["subtitle"] = lang('categorias.subtitle');
        return view('julio101290\boilerplateproducts\Views\categorias', $titulos);
    }
    /**
     * Read Categorias
     */
    public function getCategorias()
    {


        helper('auth');

        $idUser = user()->id;
        $titulos["empresas"] = $this->empresa->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }

        $idCategorias = $this->request->getPost("idCategorias");
        $datosCategorias = $this->categorias->whereIn('idEmpresa',$empresasID)
        ->where('id',$idCategorias)->first();
        echo json_encode($datosCategorias);
    }

    /**
     * Get Category via AJax
     */
    public function getCategoriasAjax()
    {

        $request = service('request');
        $postData = $request->getPost();

        $response = array();

        // Read new token and assign in $response['token']
        $response['token'] = csrf_hash();
        $categorias = new CategoriasModel();
        $idEmpresa = $postData['idEmpresa'];


        if (!isset($postData['searchTerm'])) {
            // Fetch record
            
            $listaCategorias = $categorias->select('id,clave,descripcion')->where("deleted_at", null)
                ->where('idEmpresa',$idEmpresa)
                ->orderBy('id')
                ->orderBy('clave')
                ->orderBy('descripcion')
                ->findAll(10);
        } else {
            $searchTerm = $postData['searchTerm'];

            // Fetch record
           
            $listaCategorias = $categorias->select('id,clave,descripcion')->where("deleted_at", null)
                ->where('idEmpresa',$idEmpresa)
                ->groupStart()
                ->like('id', $searchTerm)
                ->orLike('descripcion', $searchTerm)
                ->orLike('clave', $searchTerm)
                ->groupEnd()
                ->findAll(10);
        }

        $data = array();
        foreach ($listaCategorias as $categoria) {
            $data[] = array(
                "id" => $categoria['id'],
                "text" => $categoria['id'] . ' ' . $categoria['clave'].' '.$categoria['descripcion'],
            );
        }

        $response['data'] = $data;

        return $this->response->setJSON($response);
    }



    /**
     * Save or update Categorias
     */
    public function save()
    {
        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;
        $datos = $this->request->getPost();
        if ($datos["idCategorias"] == 0) {
            try {
                if ($this->categorias->save($datos) === false) {
                    $errores = $this->categorias->errors();
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
            if ($this->categorias->update($datos["idCategorias"], $datos) == false) {
                $errores = $this->categorias->errors();
                foreach ($errores as $field => $error) {
                    echo $error . " ";
                }
                return;
            } else {
                $dateLog["description"] = lang("categorias.logUpdated") . json_encode($datos);
                $dateLog["user"] = $userName;
                $this->log->save($dateLog);
                echo "Actualizado Correctamente";
                return;
            }
        }
        return;
    }
    /**
     * Delete Categorias
     * @param type $id
     * @return type
     */
    public function delete($id)
    {
        $infoCategorias = $this->categorias->find($id);
        helper('auth');
        $userName = user()->username;
        if (!$found = $this->categorias->delete($id)) {
            return $this->failNotFound(lang('categorias.msg.msg_get_fail'));
        }
        $this->categorias->purgeDeleted();
        $logData["description"] = lang("categorias.logDeleted") . json_encode($infoCategorias);
        $logData["user"] = $userName;
        $this->log->save($logData);
        return $this->respondDeleted($found, lang('categorias.msg_delete'));
    }


    /**
     * Get id
     */

    public function getFolio()
    {

        $idCategoria = $this->request->getPost("idCategoria");

        $categoria = $this->categorias->find($idCategoria);


        if ($idCategoria > 0) {
            $maxID = $this->productos->selectCount("id")->where("idCategory", $idCategoria)->first();



            $folioMaximo = $categoria["clave"] . str_pad($maxID["id"] + 1, 5, "0", STR_PAD_LEFT);

            echo $folioMaximo;
        }
    }
}
