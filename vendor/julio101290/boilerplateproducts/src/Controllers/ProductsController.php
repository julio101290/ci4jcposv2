<?php

namespace julio101290\boilerplateproducts\Controllers;

use App\Controllers\BaseController;
use julio101290\boilerplateproducts\Models\ProductsModel;
use julio101290\boilerplatelog\Models\LogModel;
use CodeIgniter\API\ResponseTrait;
use \julio101290\boilerplateproducts\Models\{CategoriasModel};
use julio101290\boilerplatecompanies\Models\EmpresasModel;
//use App\Models\QuotesDetailsModel;
//use App\Models\SellsDetailsModel;
//use App\Models\Tipos_movimientos_inventarioModel;

class ProductsController extends BaseController {

    use ResponseTrait;

    protected $log;
    protected $products;
    protected $empresa;
    protected $categorias;
    //protected $sellsDetails;
    //protected $quoteDetails;
    //protected $tiposMovimientoInventario;

    public function __construct() {
        $this->products = new ProductsModel();
        $this->log = new LogModel();
        $this->categorias = new CategoriasModel();
        $this->empresa = new EmpresasModel();
        //$this->sellsDetails = new SellsDetailsModel();
        //$this->quoteDetails = new QuotesDetailsModel();
        //$this->tiposMovimientoInventario = new Tipos_movimientos_inventarioModel();
        helper('menu');
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
            $datos = $this->products->mdlProductos($empresasID);
            return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
        }

        $titulos["categorias"] = $this->categorias->select("*")->where("deleted_at", null)->asArray()->findAll();
        $titulos["title"] = lang('products.title');
        $titulos["subtitle"] = lang('products.subtitle');
        return view('julio101290\boilerplateproducts\Views\products', $titulos);
    }

    public function getAllProducts($empresa) {


        helper('auth');

        $idUser = user()->id;
        $titulos["empresas"] = $this->empresa->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }


        if ($this->request->isAJAX()) {
            $datos = $this->products->mdlProductosEmpresa($empresasID, $empresa);
            return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
        }
    }

    public function getAllProductsInventory($empresa, $idStorage, $idTipoMovimiento) {


        helper('auth');

        $idUser = user()->id;
        $titulos["empresas"] = $this->empresa->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }


        //BUSCAMOS EL TIPO DE MOVIMIENTO SI ES ENTRADA O SALIDA
        $tiposMovimiento = $this->tiposMovimientoInventario->select("*")
                        ->wherein("idEmpresa", $empresasID)
                        ->where("id", $idTipoMovimiento)->first();

        if ($tiposMovimiento == null) {

            $datos = $this->products->mdlProductosEmpresaInventarioEntrada($empresasID, $empresa);
            return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
        }

        if ($tiposMovimiento["tipo"] == "ENT") {

            if ($this->request->isAJAX()) {
                $datos = $this->products->mdlProductosEmpresaInventarioEntrada($empresasID, $empresa);
                return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
            }
        }


        if ($tiposMovimiento["tipo"] == "SAL") {

            if ($this->request->isAJAX()) {
                $datos = $this->products->mdlProductosEmpresaInventarioSalida($empresasID, $empresa);
                return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
            }
        }


        $datos = $this->products->mdlProductosEmpresaInventarioEntrada($empresasID, $empresa);
        return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
    }

    /**
     * Get Unidad SAT via AJax
     */
    public function getUnidadSATAjax() {

        $request = service('request');
        $postData = $request->getPost();

        $response = array();

        // Read new token and assign in $response['token']
        $response['token'] = csrf_hash();

        if (!isset($postData['searchTerm'])) {
            // Fetch record

            $listUnidadesSAT = $this->catalogosSAT->clavesUnidades40()->searchByField("texto", "%$%", 100);
            $listUnidadesSAT2 = $this->catalogosSAT->clavesUnidades40()->searchByField("id", "%$%", 100);
        } else {
            $searchTerm = $postData['searchTerm'];

            // Fetch record

            $listUnidadesSAT = $this->catalogosSAT->clavesUnidades40()->searchByField("texto", "%$searchTerm%", 100);
            $listUnidadesSAT2 = $this->catalogosSAT->clavesUnidades40()->searchByField("id", "%$searchTerm%", 100);
        }

        $data = array();
        foreach ($listUnidadesSAT as $unidadSAT => $value) {

            $data[] = array(
                "id" => $value->id(),
                "text" => $value->id() . ' ' . $value->texto(),
            );
        }


        foreach ($listUnidadesSAT2 as $unidadSAT => $value) {

            $data[] = array(
                "id" => $value->id(),
                "text" => $value->id() . ' ' . $value->texto(),
            );
        }

        $response['data'] = $data;

        return $this->response->setJSON($response);
    }

    /**
     * Get Unidad SAT via AJax
     */
    public function getProductosSATAjax() {

        $request = service('request');
        $postData = $request->getPost();

        $response = array();

        // Read new token and assign in $response['token']
        $response['token'] = csrf_hash();

        if (!isset($postData['searchTerm'])) {
            // Fetch record

            $listProducts1 = $this->catalogosSAT->productosServicios40()->searchByField("texto", "%$searchTerm%", 50);

            $listProducts2 = $this->catalogosSAT->productosServicios40()->searchByField("id", "%$searchTerm%", 50);
        } else {
            $searchTerm = $postData['searchTerm'];

            // Fetch record

            $listProducts1 = $this->catalogosSAT->productosServicios40()->searchByField("texto", "%$searchTerm%", 50);
            $listProducts2 = $this->catalogosSAT->productosServicios40()->searchByField("id", "%$searchTerm%", 50);
        }

        $data = array();
        foreach ($listProducts1 as $productosSAT => $value) {

            $data[] = array(
                "id" => $value->id(),
                "text" => $value->id() . ' ' . $value->texto(),
            );
        }

        foreach ($listProducts2 as $productosSAT => $value) {

            $data[] = array(
                "id" => $value->id(),
                "text" => $value->id() . ' ' . $value->texto(),
            );
        }

        $response['data'] = $data;

        return $this->response->setJSON($response);
    }

    /**
     * Get Products via AJax
     */
    public function getProductsAjaxSelect2() {

        $request = service('request');
        $postData = $request->getPost();

        $response = array();

        // Read new token and assign in $response['token']
        $response['token'] = csrf_hash();
        $products = new ProductsModel();
        $idEmpresa = $postData['idEmpresa'];

        if (!isset($postData['searchTerm'])) {
            // Fetch record

            $listProducts = $products->select('id,code,description')->where("deleted_at", null)
                    ->where('idEmpresa', $idEmpresa)
                    ->orderBy('id')
                    ->orderBy('code')
                    ->orderBy('description')
                    ->findAll(1000);
        } else {
            $searchTerm = $postData['searchTerm'];

            // Fetch record

            $listProducts = $products->select('id,code,description')->where("deleted_at", null)
                    ->where('idEmpresa', $idEmpresa)
                    ->groupStart()
                    ->like('description', $searchTerm)
                    ->orLike('id', $searchTerm)
                    ->orLike('code', $searchTerm)
                    ->groupEnd()
                    ->findAll(1000);
        }

        $data = array();
        $data[] = array(
            "id" => 0,
            "text" => "0 Todos Los Productos",
        );
        foreach ($listProducts as $product) {
            $data[] = array(
                "id" => $product['id'],
                "text" => $product['id'] . ' ' . $product['id'] . ' ' . $product['code'] . ' ' . $product['description'],
            );
        }

        $response['data'] = $data;

        return $this->response->setJSON($response);
    }

    /**
     * Read Products
     */
    public function getProducts() {

        helper('auth');

        $idUser = user()->id;
        $titulos["empresas"] = $this->empresa->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }
        $idProducts = $this->request->getPost("idProducts");

        $datosProducts = $this->products->mdlGetProductoEmpresa($empresasID, $idProducts);

        echo json_encode($datosProducts);
    }

    /**
     * Save or update Products
     */
    public function save() {
        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;
        $datos = $this->request->getPost();

        var_dump($datos);
        $imagenProducto = $this->request->getFile("imagenProducto");
        $datos["routeImage"] = "";
        if ($imagenProducto) {

            if ($imagenProducto->getClientExtension() <> "png") {

                return lang("empresas.pngFileExtensionIncorrect");
            }
            $datos["routeImage"] = $imagenProducto->getRandomName();
        }


        if ($datos["idProducts"] == 0) {
            try {
                if ($this->products->save($datos) === false) {
                    $errores = $this->products->errors();
                    foreach ($errores as $field => $error) {
                        echo $error . " ";
                    }
                    return;
                }
                $dateLog["description"] = lang("vehicles.logDescription") . json_encode($datos);
                $dateLog["user"] = $userName;
                $this->log->save($dateLog);

                if ($imagenProducto <> null) {
                    $imagenProducto->move("images/products", $datos["routeImage"]);
                }

                echo "Guardado Correctamente";
            } catch (\PHPUnit\Framework\Exception $ex) {
                echo "Error al guardar " . $ex->getMessage();
            }
        } else {

            $dataPrevious = $this->products->find($datos["idProducts"]);

            if ($this->products->update($datos["idProducts"], $datos) == false) {
                $errores = $this->products->errors();
                foreach ($errores as $field => $error) {
                    echo $error . " ";
                }
                return;
            } else {
                $dateLog["description"] = lang("products.logUpdated") . json_encode($datos);
                $dateLog["user"] = $userName;
                $this->log->save($dateLog);

                if ($imagenProducto <> null) {

                    if (file_exists("images/products/" . $dataPrevious["routeImage"])) {
                        unlink("images/products/" . $dataPrevious["routeImage"]);
                    }
                    $imagenProducto->move("images/products", $datos["routeImage"]);
                }



                echo "Actualizado Correctamente";
                return;
            }
        }
        return;
    }

    /**
     * Delete Products
     * @param type $id
     * @return type
     */
    public function delete($id) {



        if ($this->sellsDetails->select("id")->where("idProduct", $id)->countAllResults() > 0) {

            $this->products->db->transRollback();
            return $this->failValidationError("No se puede borrar ya que hay ventas con este producto");
        }

        if ($this->quoteDetails->select("id")->where("idProduct", $id)->countAllResults() > 0) {

            $this->products->db->transRollback();
            return $this->failValidationError("No se puede borrar ya que hay cotizaciones con este producto");
        }

        $infoProducts = $this->products->find($id);
        helper('auth');
        $userName = user()->username;
        if (!$found = $this->products->delete($id)) {

            $this->products->db->transRollback();
            return $this->failNotFound(lang('products.msg.msg_get_fail'));
        }

        if ($infoProducts["routeImage"] != "") {

            if (file_exists("images/products/" . $infoProducts["routeImage"])) {

                unlink("images/products/" . $infoProducts["routeImage"]);
            }
        }


        $this->products->purgeDeleted();
        $logData["description"] = lang("products.logDeleted") . json_encode($infoProducts);
        $logData["user"] = $userName;
        $this->log->save($logData);
        $this->products->db->transCommit();

        return $this->respondDeleted($found, lang('products.msg_delete'));
    }

    /**
     * Get Vehiculos via AJax
     */
    public function getProductsAjax() {

        $request = service('request');
        $postData = $request->getPost();

        $response = array();

        // Read new token and assign in $response['token']
        $response['token'] = csrf_hash();
        $custumers = new VehiculosModel();
        $idEmpresa = $postData['idEmpresa'];

        if (!isset($postData['searchTerm'])) {
            // Fetch record

            $listProducts = $products->select('id,description')->where("deleted_at", null)
                    ->where('idEmpresa', $idEmpresa)
                    ->orderBy('id')
                    ->orderBy('descripcion')
                    ->findAll(1000);
        } else {
            $searchTerm = $postData['searchTerm'];

            // Fetch record

            $listProducts = $products->select('id,description')->where("deleted_at", null)
                    ->where('idEmpresa', $idEmpresa)
                    ->groupStart()
                    ->like('descripcion', $searchTerm)
                    ->orLike('id', $searchTerm)
                    ->groupEnd()
                    ->findAll(1000);
        }

        $data = array();
        foreach ($listProducts as $product) {
            $data[] = array(
                "id" => $custumers['id'],
                "text" => $custumers['id'] . ' ' . $product['description'],
            );
        }

        $response['data'] = $data;

        return $this->response->setJSON($response);
    }

    /**
     * Reporte Consulta
     */
    public function getBarcodePDF($idProducto, $isMail = 0) {


        $pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

// define barcode style
        $style = array(
            'position' => '',
            'align' => 'C',
            'stretch' => false,
            'fitwidth' => true,
            'cellfitalign' => '',
            'border' => true,
            'hpadding' => 'auto',
            'vpadding' => 'auto',
            'fgcolor' => array(0, 0, 0),
            'bgcolor' => false, //array(255,255,255),
            'text' => true,
            'font' => 'helvetica',
            'fontsize' => 12,
            'stretchtext' => 4
        );

        helper('auth');

        $idUser = user()->id;
        $titulos["empresas"] = $this->empresa->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }


        if ($idProducto == 0) {


            $productos = $this->products->select("id")->whereIn("idEmpresa", $empresasID)->findAll();

            foreach ($productos as $key => $value) {

                $pdf->AddPage('P', 'A7');

                $pdf->Cell(0, 0, 'BAR CODE', 0, 1);
                $pdf->write1DBarcode($value["barcode"], 'S25', '', '', '', 18, 0.4, $style, 'N');
            }

            ob_end_clean();
            $this->response->setHeader("Content-Type", "application/pdf");
            $pdf->Output('etiqueta.pdf', 'I');

            return;
        }


        $productos = $this->products->select("barcode")
                ->whereIn("idEmpresa", $empresasID)
                ->where("id", $idProducto)->findAll();
                

        $pdf->AddPage('P', 'A7');

        $pdf->Cell(0, 0, 'BAR CODE', 0, 1);
        $pdf->write1DBarcode($productos[0]["barcode"], 'S25', '', '', '', 18, 0.4, $style, 'N');

        ob_end_clean();
        $this->response->setHeader("Content-Type", "application/pdf");
        $pdf->Output('etiqueta.pdf', 'I');
    }
}
