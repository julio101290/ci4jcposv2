<?php

namespace julio101290\boilerplateinventory\Controllers;

use App\Controllers\BaseController;
use App\Database\Migrations\Storages;
use julio101290\boilerplateproducts\Models\ProductsModel;
use \App\Models\UserModel;
use julio101290\boilerplatelog\Models\LogModel;
use julio101290\boilerplateinventory\Models\InventoryModel;
use julio101290\boilerplatestorages\Models\StoragesModel;
use julio101290\boilerplateinventory\Models\InventoryDetailsModel;
use CodeIgniter\API\ResponseTrait;
use julio101290\boilerplatecompanies\Models\EmpresasModel;
use julio101290\boilerplatecustumers\Models\CustumersModel;
use julio101290\boilerplatetypesmovement\Models\Tipos_movimientos_inventarioModel;
use julio101290\boilerplateinventory\Models\SaldosModel;
use julio101290\boilerplatesuppliers\Models\ProveedoresModel;

class InventoryController extends BaseController {

    use ResponseTrait;

    protected $log;
    protected $inventory;
    protected $storages;
    protected $inventoryDetail;
    protected $empresa;
    protected $user;
    protected $custumer;
    protected $products;
    protected $tiposMovimiento;
    protected $saldos;
    protected $suppliers;

    public function __construct() {
        $this->log = new LogModel();

        $this->inventory = new InventoryModel();
        $this->inventoryDetail = new InventoryDetailsModel();
        $this->empresa = new EmpresasModel();
        $this->user = new UserModel();
        $this->custumer = new CustumersModel();
        $this->products = new ProductsModel();
        $this->tiposMovimiento = new Tipos_movimientos_inventarioModel();
        $this->saldos = new SaldosModel();
        $this->storages = new StoragesModel();
        $this->suppliers = new ProveedoresModel();

        helper('menu');
        helper('utilerias');
    }

    public function index() {

        $auth = service('authentication');
        if (!$auth->check()) {

            return redirect()->route('admin');
        }


        helper('auth');

        $idUser = user()->id;
        $titulos["empresas"] = $this->empresa->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }


        if ($this->request->isAJAX()) {


            $datos = $this->inventory->mdlGetInventory($empresasID);

            return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
        }


        $titulos["Title"] = lang("inventory.title");
        $titulos["Subtitle"] = lang("inventory.subttle");

        //$data["data"] = $datos;
        return view('julio101290\boilerplateinventory\Views\inventory', $titulos);
    }

    /**
     * Get Products Inventory
     */
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
        $tiposMovimiento = $this->tiposMovimiento->select("*")
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

    public function inventoryFilters($desdeFecha, $hastaFecha, $todas) {


        $auth = service('authentication');
        if (!$auth->check()) {

            return redirect()->route('admin');
        }


        helper('auth');

        $idUser = user()->id;
        $titulos["empresas"] = $this->empresa->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }



        if ($this->request->isAJAX()) {


            $datos = $this->inventory->mdlGetInventoryFilters($empresasID, $desdeFecha, $hastaFecha, $todas);

            return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
        }
    }

    public function newinventory() {
        $auth = service('authentication');
        if (!$auth->check()) {

            return redirect()->route('admin');
        }



        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;

        $titulos["empresas"] = $this->empresa->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }


        $fechaActual = fechaMySQLADateHTML5(fechaHoraActual());

        $idMax = "0";

        $titulos["idMax"] = $idMax;
        $titulos["idInventory"] = $idMax;
        $titulos["tipoES"] = "ENT";

        $titulos["folio"] = "0";
        $titulos["fecha"] = $fechaActual;
        $titulos["userName"] = $userName;
        $titulos["idUser"] = $idUser;
        $titulos["contact"] = "";
        $titulos["idQuote"] = "0";
        $titulos["codeCustumer"] = "";
        $titulos["observations"] = "";
        $titulos["taxes"] = "0.00";
        $titulos["IVARetenido"] = "0.00";
        $titulos["ISRRetenido"] = "0.00";
        $titulos["subTotal"] = "0.00";
        $titulos["total"] = "0.00";
        $titulos["formaPago"] = $this->catalogosSAT->formasDePago40()->searchByField("texto", "%%", 99999);
        $titulos["usoCFDI"] = $this->catalogosSAT->usosCfdi40()->searchByField("texto", "%%", 99999);
        $titulos["metodoPago"] = $this->catalogosSAT->metodosDePago40()->searchByField("texto", "%%", 99999);
        $titulos["regimenFiscal"] = $this->catalogosSAT->regimenesFiscales40()->searchByField("texto", "%%", 99999);

        $titulos["RFCReceptor"] = "";
        $titulos["regimenFiscalReceptor"] = "";
        $titulos["usoCFDIReceptor"] = "";
        $titulos["metodoPagoReceptor"] = "";
        $titulos["formaPagoReceptor"] = "";
        $titulos["razonSocialReceptor"] = "";
        $titulos["codigoPostalReceptor"] = "";

        $titulos["folioComprobanteRD"] = "0";

        $titulos["uuid"] = generaUUID();

        $titulos["title"] = "Nuevo Inventario"; //lang('registerNew.title');
        $titulos["subtitle"] = "Captura de Inventario"; // lang('registerNew.subtitle');

        return view('julio101290\boilerplateinventory\Views\newInventory', $titulos);
    }

    /**
     * Get Last Code
     */
    public function getLastCode() {

        $idEmpresa = $this->request->getPost("idEmpresa");
        $idStorage = $this->request->getPost("idStorage");
        $idTipoMovimiento = $this->request->getPost("idTipoMovimiento");

        $result = $this->inventory->selectMax("folio")
                ->where("idEmpresa", $idEmpresa)
                ->where("idStorage", $idStorage)
                ->where("idTipoInventario", $idTipoMovimiento)
                ->first();

        if ($result["folio"] == null) {

            $result["folio"] = 1;
        } else {

            $result["folio"] = $result["folio"] + 1;
        }

        echo json_encode($result);
    }

    /**
     * Get Last Code
     */
    public function getLastCodeInterno($idEmpresa) {


        $result = $this->inventory->selectMax("folio")
                ->where("idEmpresa", $idEmpresa)
                ->first();

        if ($result["folio"] == null) {

            $result["folio"] = 1;
        } else {

            $result["folio"] = $result["folio"] + 1;
        }

        return $result["folio"];
    }

    /*
     * Editar Cotizacion
     */

    public function editInventory($uuid) {

        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;

        $auth = service('authentication');
        if (!$auth->check()) {

            return redirect()->route('admin');
        }


        $auth = service('authentication');
        if (!$auth->check()) {

            return redirect()->route('admin');
        }

        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;

        $titulos["empresas"] = $this->empresa->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }


        $inventory = $this->inventory->mdlGetInventoryUUID($uuid, $empresasID);

        $listProducts = json_decode($inventory["listProducts"], true);

        $titulos["idInventory"] = $inventory["id"];
        $titulos["folio"] = $inventory["folio"];

        $titulos["idStorage"] = $inventory["idStorage"];

        $datosAlmacen = $this->storages->select("*")->where("id", $inventory["idStorage"])->first();

        $titulos["nombreAlmacen"] = $datosAlmacen["name"];
        $titulos["tipoES"] = $inventory["tipoES"];

        $titulos["idTipoInventario"] = $inventory["idTipoInventario"];

        $tiposInventario = $this->tiposMovimiento->select("*")->where("id", $inventory["idTipoInventario"])->first();
        $titulos["idTipoInventario"] = $inventory["idTipoInventario"];
        $titulos["nombreTipoInventario"] = $tiposInventario["descripcion"];

        $titulos["idProveedor"] = $inventory["idProveedor"];
             if(isset($inventory["nameProveedor"])){
            
            $titulos["nameProveedor"] = $inventory["nameProveedor"];
            
        }else{
            
             $titulos["nameProveedor"] = $inventory["nameproveedor"];
            
        }
        
        $titulos["idEmpresa"] = $inventory["idEmpresa"];
        $titulos["nombreEmpresa"] = $inventory["nombreEmpresa"];

        $titulos["idUser"] = $idUser;
        $titulos["userName"] = $userName;
        $titulos["listProducts"] = $listProducts;
        $titulos["taxes"] = number_format($inventory["taxes"], 2, ".");
        $titulos["IVARetenido"] = number_format($inventory["IVARetenido"], 2, ".");
        $titulos["ISRRetenido"] = number_format($inventory["ISRRetenido"], 2, ".");
        $titulos["subTotal"] = number_format($inventory["subTotal"], 2, ".");
        $titulos["total"] = number_format($inventory["total"], 2, ".");
        $titulos["fecha"] = $inventory["date"];
        $titulos["dateVen"] = $inventory["dateVen"];
        $titulos["quoteTo"] = $inventory["quoteTo"];
        $titulos["observations"] = $inventory["generalObservations"];
        $titulos["uuid"] = $inventory["UUID"];
        $titulos["idQuote"] = "0";
        $titulos["formaPago"] = $this->catalogosSAT->formasDePago40()->searchByField("texto", "%%", 99999);
        $titulos["usoCFDI"] = $this->catalogosSAT->usosCfdi40()->searchByField("texto", "%%", 99999);
        $titulos["metodoPago"] = $this->catalogosSAT->metodosDePago40()->searchByField("texto", "%%", 99999);
        $titulos["regimenFiscal"] = $this->catalogosSAT->regimenesFiscales40()->searchByField("texto", "%%", 99999);

        $titulos["RFCReceptor"] = $inventory["RFCReceptor"];
        $titulos["regimenFiscalReceptor"] = $inventory["regimenFiscalReceptor"];
        $titulos["usoCFDIReceptor"] = $inventory["usoCFDI"];
        $titulos["metodoPagoReceptor"] = $inventory["metodoPago"];
        $titulos["formaPagoReceptor"] = $inventory["formaPago"];
        $titulos["razonSocialReceptor"] = $inventory["razonSocialReceptor"];
        $titulos["codigoPostalReceptor"] = $inventory["codigoPostalReceptor"];

        $titulos["folioComprobanteRD"] = "0";
        $titulos["tipoComprobanteRDID"] = "0";
        $titulos["tipoComprobanteRDNombre"] = "0";
        $titulos["tipoComprobanteRDPrefijo"] = "0";

        $titulos["title"] = "Editar Inventario";
        $titulos["subtitle"] = "Edición de Inventario";

        return view('julio101290\boilerplateinventory\Views\newInventory', $titulos);
    }

    /*
     * Save or Update
     */

    public function save() {

        $auth = service('authentication');

        if (!$auth->check()) {
            $this->session->set('redirect_url', current_url());
            return redirect()->route('admin');
        }

        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;

        $datos = $this->request->getPost();

        $tiposMovimiento = $this->tiposMovimiento->select("*")->where("id", $datos["idTipoInventario"])->first();

        $datos["tipoES"] = $tiposMovimiento["tipo"];

        $this->inventory->db->transBegin();

        $existsInventory = $this->inventory->where("UUID", $datos["UUID"])->countAllResults();

        $listProducts = json_decode($datos["listProducts"], true);

        /**
         * if is new inventory
         */
        if ($existsInventory == 0) {


            $ultimoFolio = $this->getLastCodeInterno($datos["idEmpresa"]);

            $empresa = $this->empresa->find($datos["idEmpresa"]);

            $datos["folio"] = $ultimoFolio;

            $datos["balance"] = $datos["total"] - ($datos["importPayment"] - $datos["importBack"]);

            try {


                if ($this->inventory->save($datos) === false) {

                    $errores = $this->inventory->errors();

                    $listErrors = "";

                    foreach ($errores as $field => $error) {

                        $listErrors .= $error . " ";
                    }

                    echo $listErrors;

                    return;
                }

                $idInventoryInserted = $this->inventory->getInsertID();

                // save datail

                foreach ($listProducts as $key => $value) {

                    $datosDetalle["idInventory"] = $idInventoryInserted;
                    $datosDetalle["idProduct"] = $value["idProduct"];
                    $datosDetalle["lote"] = $value["lote"];
                    $datosDetalle["description"] = $value["description"];
                    $datosDetalle["unidad"] = $value["unidad"];
                    $datosDetalle["codeProduct"] = $value["codeProduct"];
                    $datosDetalle["cant"] = $value["cant"];
                    $datosDetalle["price"] = $value["price"];
                    $datosDetalle["porcentTax"] = $value["porcentTax"];

                    $datosDetalle["porcentIVARetenido"] = $value["porcentIVARetenido"];
                    $datosDetalle["porcentISRRetenido"] = $value["porcentISRRetenido"];
                    $datosDetalle["IVARetenido"] = $value["IVARetenido"];
                    $datosDetalle["ISRRetenido"] = $value["ISRRetenido"];

                    $datosDetalle["claveProductoSAT"] = $value["claveProductoSAT"];
                    $datosDetalle["claveUnidadSAT"] = $value["claveUnidadSAT"];

                    $datosDetalle["tax"] = $value["tax"];
                    $datosDetalle["total"] = $value["total"];
                    $datosDetalle["neto"] = $value["neto"];

                    //Valida Stock
                    $products = $this->products->find($datosDetalle["idProduct"]);

                    if ($products["validateStock"] == "on") {

                        $datosSaldo["idEmpresa"] = $datos["idEmpresa"];
                        $datosSaldo["idAlmacen"] = $datos["idStorage"];
                        $datosSaldo["idProducto"] = $datosDetalle["idProduct"];
                        $datosSaldo["lote"] = $datosDetalle["lote"];
                        $datosSaldo["descripcion"] = $datosDetalle["description"];
                        $datosSaldo["codigoProducto"] = $datosDetalle["codeProduct"];

                        if ($tiposMovimiento["tipo"] == "ENT") {

                            //VERIFICAMOS STOCK ACTUAL

                            $existeSaldo = $this->saldos->where($datosSaldo)->countAllResults();

                            if ($existeSaldo == 0) {

                                $datosSaldo["cantidad"] = $datosDetalle["cant"];

                                $products["stock"] = $products["stock"] + $datosDetalle["cant"];

                                $stockNuevoProducto["stock"] = $products["stock"];

                                if ($this->products->update($products["id"], $stockNuevoProducto) === false) {

                                    echo "error al actualizar el stock en el producto $datosDetalle[idProduct]";

                                    $this->inventory->db->transRollback();
                                    return;
                                }

                                if ($this->saldos->insert($datosSaldo) === false) {


                                    $errores = $this->saldos->errors();

                                    $listErrors = "";

                                    foreach ($errores as $field => $error) {

                                        $listErrors .= $error . " ";
                                    }

                                    echo $listErrors . " error al insertar el saldo $datosDetalle[idProduct]";

                                    $this->inventory->db->transRollback();
                                    return;
                                }
                            } else {


                                $datosNuevosSaldo = $this->saldos->select("*")->where($datosSaldo)->first();

                                $datosNuevosSaldo["cantidad"] = $datosNuevosSaldo["cantidad"] + $datosDetalle["cant"];

                                $products["stock"] = $products["stock"] + $datosDetalle["cant"];

                                $stockNuevoProducto["stock"] = $products["stock"];

                                if ($this->products->update($products["id"], $stockNuevoProducto) === false) {

                                    echo "error al actualizar el stock en el producto $datosDetalle[idProduct]";

                                    $this->inventory->db->transRollback();
                                    return;
                                }


                                if ($this->saldos->update($datosNuevosSaldo["id"], $datosNuevosSaldo) === false) {

                                    echo "error al actualizar el saldo $datosDetalle[idProduct]";

                                    $this->inventory->db->transRollback();
                                    return;
                                }
                            }
                        }

                        /**
                         * Si es salida
                         */
                        if ($tiposMovimiento["tipo"] == "SAL") {


                            /**
                             * Verificamos saldo
                             */
                            $datosNuevosSaldo = $this->saldos->select("*")->where($datosSaldo)->first();

                            if ($datosNuevosSaldo["cantidad"] < $datosDetalle["cant"]) {

                                echo "Stock agotado en el producto " . $datosDetalle["description"];
                                $this->inventory->db->transRollback();
                                return;
                            }

                            $datosNuevosSaldo["cantidad"] = $datosNuevosSaldo["cantidad"] - $datosDetalle["cant"];

                            $existenciaProducto["stock"] = $products["stock"] - $datosDetalle["cant"];

                            if ($this->products->update($products["id"], $existenciaProducto) === false) {

                                echo "error al actualizar el saldo $datosDetalle[idProduct]";

                                $this->inventory->db->transRollback();
                                return;
                            }


                            if ($this->saldos->update($datosNuevosSaldo["id"], $datosNuevosSaldo) === false) {



                                $errores = $this->inventory->errors();

                                $listErrors = "";

                                foreach ($errores as $field => $error) {

                                    $listErrors .= $error . " ";
                                }

                                echo $listErrors . " error al actualizar el saldo $datosDetalle[idProduct]";
                                ;

                                $this->inventory->db->transRollback();
                                return;
                            }
                        }
                    }


                    if ($this->inventoryDetail->save($datosDetalle) === false) {

                        $errores = $this->inventory->errors();

                        $listErrors = "";

                        foreach ($errores as $field => $error) {

                            $listErrors .= $error . " ";
                        }

                        echo $listErrors . " error al actualizar el saldo $datosDetalle[idProduct]";
                        ;

                        $this->inventory->db->transRollback();
                        return;

                        $this->inventoryDetail->db->transRollback();
                        return;
                    } else {
                        
                    }
                }





                /**
                 * if Payments i mayor to cero
                 */
                /*
                  if ($datos["importPayment"] > 0) {

                  $dataPayment["idSell"] = $idSellInserted;
                  $dataPayment["importPayment"] = $datos["importPayment"];
                  $dataPayment["importBack"] = $datos["importBack"];
                  $dataPayment["datePayment"] = $datos["datePayment"];
                  $dataPayment["metodPayment"] = $datos["metodoPago"];

                  try {


                  if ($this->payments->save($dataPayment) === false) {

                  echo "error al insertar el pago ";

                  $this->sellsDetail->db->transRollback();
                  return;
                  }
                  } catch (\Exception $e) {


                  $this->sellsDetail->db->transRollback();
                  echo $e->getMessage();
                  return;
                  }
                  }
                 * 
                 */

                //ACTUALIZAMOS FOLIO ACTUAL COMPROBANTE



                $datosBitacora["description"] = "Se guardo la cotizacion con los siguientes datos" . json_encode($datos);
                $datosBitacora["user"] = $userName;

                $this->log->save($datosBitacora);

                $this->inventory->db->transCommit();
                echo "Guardado Correctamente";
            } catch (\PHPUnit\Framework\Exception $ex) {


                echo "Error al guardar " . $ex->getMessage();
            }
        } else {




            $backInventory = $this->inventory->where("UUID", $datos["UUID"])->first();
            $listProductsBack = json_decode($backInventory["listProducts"], true);

            $datos["folio"] = $backInventory["folio"];

            if ($this->inventory->update($backInventory["id"], $datos) == false) {

                $errores = $this->inventory->errors();
                $listError = "";
                foreach ($errores as $field => $error) {

                    $listError .= $error . " ";
                }

                echo $listError;

                return;
            } else {



                //DEJAMOS EL STOCK COMO ESTABA ANTES

                foreach ($listProductsBack as $key => $value) {


                    if ($tiposMovimiento["tipo"] == "ENT") {
                        //BUSCAMOS STOCK DEL PRODUCTO
                        $products = $this->products->find($value["idProduct"]);

                        $productsBackStock["stock"] = $products["stock"] - $value["cant"];

                        // ACTUALIZA STOCK
                        $newStock["stock"] = $products["stock"] - $value["cant"];

                        if ($this->products->update($value["idProduct"], $newStock) === false) {

                            echo "error al actualizar el stock del producto $value[idProducto]";

                            $this->inventory->db->transRollback();
                            return;
                        }


                        $datosSaldo["idEmpresa"] = $datos["idEmpresa"];
                        $datosSaldo["idAlmacen"] = $datos["idStorage"];
                        $datosSaldo["idProducto"] = $value["idProduct"];
                        $datosSaldo["lote"] = $value["lote"];

                        $datosNuevosSaldo = $this->saldos->select("*")->where($datosSaldo)->first();

                        $datosNuevosSaldo["cantidad"] = $datosNuevosSaldo["cantidad"] - $value["cant"];

                        if ($datosNuevosSaldo["cantidad"] > 0) {
                            if ($this->saldos->update($datosNuevosSaldo["id"], $datosNuevosSaldo) === false) {

                                echo "error al actualizar el saldo $datosDetalle[idProducto]";

                                $this->inventory->db->transRollback();
                                return;
                            }
                        } else {


                            if ($this->saldos->select("*")->where("id", $datosNuevosSaldo["id"])->delete() === false) {

                                echo "error al actualizar el saldo $datosDetalle[idProducto]";

                                $this->inventory->db->transRollback();
                                return;
                            }

                            $this->saldos->purgeDeleted();
                        }
                    }


                    if ($tiposMovimiento["tipo"] == "SAL") {
                        //BUSCAMOS STOCK DEL PRODUCTO
                        $products = $this->products->find($value["idProduct"]);

                        // ACTUALIZA STOCK
                        $newStock = $products["stock"] + $value["cant"];

                        $updateDataStock["stock"] = $newStock;
                        if ($this->products->update($value["idProduct"], $updateDataStock) === false) {

                            echo "error al actualizar el stock del producto $value[idProducto]";

                            $this->inventory->db->transRollback();
                            return;
                        }


                        $datosSaldo["idEmpresa"] = $datos["idEmpresa"];
                        $datosSaldo["idAlmacen"] = $datos["idAlmacen"];
                        $datosSaldo["idProducto"] = $value["idProduct"];
                        $datosSaldo["lote"] = $value["lote"];

                        $datosNuevosSaldo = $this->saldos->select("*")->where($datosSaldo)->first();

                        $datosNuevosSaldo["cantidad"] = $datosNuevosSaldo["cantidad"] + $value["cant"];

                        if ($this->saldos->update($datosNuevosSaldo["id"], $datosNuevosSaldo) === false) {

                            echo "error al actualizar el saldo $datosDetalle[idProducto]";

                            $this->inventory->db->transRollback();
                            return;
                        }
                    }


                    //REGRESAMOS EL SALDO A COMO ESTABA ANTES
                }

                $this->inventoryDetail->select("*")->where("idInventory", $backInventory["id"])->delete();
                $this->inventoryDetail->purgeDeleted();
                foreach ($listProducts as $key => $value) {

                    $datosDetalle["idInventory"] = $backInventory["id"];
                    $datosDetalle["idProduct"] = $value["idProduct"];
                    $datosDetalle["lote"] = $value["lote"];
                    $datosDetalle["description"] = $value["description"];
                    $datosDetalle["unidad"] = $value["unidad"];
                    $datosDetalle["codeProduct"] = $value["codeProduct"];
                    $datosDetalle["cant"] = $value["cant"];
                    $datosDetalle["price"] = $value["price"];
                    $datosDetalle["porcentTax"] = $value["porcentTax"];

                    $datosDetalle["porcentIVARetenido"] = $value["porcentIVARetenido"];
                    $datosDetalle["porcentISRRetenido"] = $value["porcentISRRetenido"];
                    $datosDetalle["IVARetenido"] = $value["IVARetenido"];
                    $datosDetalle["ISRRetenido"] = $value["ISRRetenido"];

                    $datosDetalle["claveProductoSAT"] = $value["claveProductoSAT"];
                    $datosDetalle["claveUnidadSAT"] = $value["claveUnidadSAT"];

                    $datosDetalle["tax"] = $value["tax"];
                    $datosDetalle["total"] = $value["total"];
                    $datosDetalle["neto"] = $value["neto"];

                    if ($this->inventoryDetail->save($datosDetalle) === false) {

                        echo "error al insertar el producto $datosDetalle[idProducto]";

                        $this->inventory->db->transRollback();
                        return;
                    } else {

                        //SI ES ENTRADA CAMBIAMOS EL SALDO
                        if ($datos["tipoES"] == "ENT") {

                            $datosSaldo["idEmpresa"] = $datos["idEmpresa"];

                            $datosSaldo["idAlmacen"] = $datos["idStorage"];
                            $datosSaldo["idProducto"] = $datosDetalle["idProduct"];
                            $datosSaldo["lote"] = $datosDetalle["lote"];

                            if ($this->saldos->select("*")->where($datosSaldo)->countAllResults() > 0) {
                                $saldoLote = $this->saldos->select("*")->where($datosSaldo)->first();
                            }
                            $products = $this->products->select("*")->where("id", $datosSaldo["idProducto"])->first();

                            $stockNuevoProducto["stock"] = $products["stock"] + $datosDetalle["cant"];

                            if (isset($saldoLote)) {

                                $datosNuevosSaldo["cantidad"] = $saldoLote["cantidad"] + $datosDetalle["cant"];
                            } else {

                                $datosNuevosSaldo["cantidad"] = $datosDetalle["cant"];
                            }

                            if ($this->products->update($products["id"], $stockNuevoProducto) === false) {

                                echo "error al actualizar el saldo en el producto $datosDetalle[idProducto]";

                                $this->inventory->db->transRollback();
                                return;
                            }


                            if (isset($saldoLote)) {
                                if ($this->saldos->update($saldoLote["id"], $datosNuevosSaldo) === false) {

                                    echo "error al actualizar el saldo $datosDetalle[idProducto]";

                                    $this->inventory->db->transRollback();
                                    return;
                                }
                            } else {

                                $datosSaldo["cantidad"] = $datosNuevosSaldo["cantidad"];
                                if ($this->saldos->save($datosSaldo) === false) {

                                    echo "error al actualizar el saldo $datosDetalle[idProducto]";

                                    $this->inventory->db->transRollback();
                                    return;
                                }
                            }
                        }


                        if ($products["validateStock"] == "on" && $datos["tipoES"] == "SAL") {
                            if ($products["stock"] < $datosDetalle["cant"]) {

                                echo "Stock agotado en el producto " . $datosDetalle["description"];
                                $this->inventoryDetail->db->transRollback();
                                return;
                            }
                            //BUSCAMOS STOCK DEL PRODUCTO
                            $products = $this->products->find($value["idProduct"]);
                            // ACTUALIZA STOCK
                            $newStock = $products["stock"] - $datosDetalle["cant"];

                            $updateDataStock["stock"] = $newStock;

                            $datosSaldo["idEmpresa"] = $datos["idEmpresa"];

                            $datosSaldo["idAlmacen"] = $datos["idStorage"];
                            $datosSaldo["idProducto"] = $datosDetalle["idProduct"];
                            $datosSaldo["lote"] = $datosDetalle["lote"];

                            $datosNuevosSaldo = $this->saldos->select("*")->where($datosSaldo)->first();

                            $datosNuevosSaldo["cantidad"] = $datosNuevosSaldo["cantidad"] - $datosDetalle["cant"];

                            if ($this->products->update($datosDetalle["idProduct"], $updateDataStock) === false) {

                                echo "error al actualizar el stock del producto $datosDetalle[idProducto]";

                                $this->inventory->db->transRollback();
                                return;
                            }


                            if ($this->saldos->update($datosNuevosSaldo["id"], $datosNuevosSaldo) === false) {

                                echo "error al actualizar el saldo $datosDetalle[idProducto]";

                                $this->inventory->db->transRollback();
                                return;
                            }
                        }
                    }
                }


                $datosBitacora["description"] = "Se actualizo" . json_encode($datos) .
                        " Los datos anteriores son" . json_encode($backInventory);
                $datosBitacora["user"] = $userName;
                $this->log->save($datosBitacora);

                echo "Actualizado Correctamente";
                $this->inventory->db->transCommit();
                return;
            }
        }

        return;
    }

    public function delete($id) {
        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;

        $auth = service('authentication');
        if (!$auth->check()) {

            return redirect()->route('admin');
        }


        $auth = service('authentication');
        if (!$auth->check()) {

            return redirect()->route('admin');
        }

        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;

        $titulos["empresas"] = $this->empresa->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }


        if ($this->inventory->select("*")->whereIn("idEmpresa", $empresasID)->where("id", $id)->countAllResults() == 0) {

            return $this->failNotFound('Acceso Prohibido');
        }

        $this->inventory->db->transBegin();

        $infoInventory = $this->inventory->find($id);

        if (!$found = $this->inventory->delete($id)) {
            $this->inventory->db->transRollback();
            return $this->failNotFound('Error al eliminar');
        }

        //Borramos quotesdetails

        if ($this->inventoryDetail->select("*")->where("idInventory", $id)->delete() === false) {

            $this->inventoryDetail->db->transRollback();
            return $this->failNotFound('Error al eliminar el detalle');
        }

        $this->inventoryDetail->purgeDeleted();

        $listProducts = json_decode($infoInventory["listProducts"], true);
        $this->inventory->purgeDeleted();

        //Devolvemos el Stock

        foreach ($listProducts as $key => $value) {


            if ($infoInventory["tipoES"] == "ENT") {


                $product = $this->products->find($value["idProduct"]);

                $stock = $product["stock"] - $value["cant"];

                $newStock["stock"] = $stock;

                if ($this->products->update($value["idProduct"], $newStock) === false) {

                    $this->inventory->db->transRollback();
                    return $this->failNotFound('Error al actualizar el Stock');
                }


                $datosSaldo["idEmpresa"] = $infoInventory["idEmpresa"];

                $datosSaldo["idAlmacen"] = $infoInventory["idStorage"];
                $datosSaldo["idProducto"] = $value["idProduct"];
                $datosSaldo["lote"] = $value["lote"];

                $datosNuevosSaldo = $this->saldos->select("*")->where($datosSaldo)->first();

                $nuevoSaldo["cantidad"] = $datosNuevosSaldo["cantidad"] - $value["cant"];

                if ($nuevoSaldo["cantidad"] > 0) {
                    if ($this->saldos->update($datosNuevosSaldo["id"], $nuevoSaldo) === false) {

                        echo "error al actualizar el saldo del producto $datosDetalle[idProducto]";

                        $this->inventory->db->transRollback();
                        return;
                    }
                } else {

                    if ($this->saldos->select("*")->where("id", $datosNuevosSaldo["id"])->delete() === false) {

                        echo "error al actualizar el saldo del producto $datosDetalle[idProducto]";

                        $this->inventory->db->transRollback();
                        return;
                    }

                    $this->saldos->purgeDeleted();
                }
            }



            if ($infoInventory["tipoES"] == "SAL") {


                $product = $this->products->find($value["idProduct"]);

                $stock = $product["stock"] + $value["cant"];

                $newStock["stock"] = $stock;

                if ($this->products->update($datosNuevosSaldo["id"], $newStock) === false) {

                    $this->inventory->db->transRollback();
                    return $this->failNotFound('Error al actualizar el Stock');
                }


                $datosSaldo["idEmpresa"] = $infoInventory["idEmpresa"];

                $datosSaldo["idAlmacen"] = $infoInventory["idStorage"];
                $datosSaldo["idProducto"] = $value["idProduct"];
                $datosSaldo["lote"] = $value["lote"];

                $datosNuevosSaldo = $this->saldos->select("*")->where($datosSaldo)->first();

                $nuevoSaldo["cantidad"] = $datosNuevosSaldo["cantidad"] + $value["cant"];

                if ($this->saldos->update($datosNuevosSaldo["id"], $nuevoSaldo) === false) {

                    echo "error al actualizar el saldo del producto $datosDetalle[idProducto]";

                    $this->inventory->db->transRollback();
                    return;
                }
            }
        }


        $datosBitacora["description"] = 'Se elimino el Registro' . json_encode($infoInventory);

        $this->log->save($datosBitacora);

        $this->inventory->db->transCommit();
        return $this->respondDeleted($found, 'Eliminado Correctamente');
    }

    /*

      public function delete($id) {

      if (!$found = $this->register->delete($id)) {
      return $this->failNotFound('Error al eliminar');
      }

      $infoConsukta = $this->register->find($id);

      $this->register->purgeDeleted();

      $datosBitacora["description"] = 'Se elimino el Registro' . json_encode($infoConsukta);

      $this->log->save($datosBitacora);
      return $this->respondDeleted($found, 'Eliminado Correctamente');
      }

      /**
     * Trae en formato JSON los pacientes para el select2
     * @return type
     */

    /*
      public function traerPacientesAjax() {

      $request = service('request');
      $postData = $request->getPost();

      $response = array();

      // Read new token and assign in $response['token']
      $response['token'] = csrf_hash();

      if (!isset($postData['searchTerm'])) {
      // Fetch record
      $pacientes = new PacientesModel();
      $listaPacientes = $pacientes->select('id,nombres,apellidos')
      ->orderBy('nombres')
      ->findAll(10);
      } else {
      $searchTerm = $postData['searchTerm'];

      // Fetch record
      $pacientes = new PacientesModel();
      $listaPacientes = $pacientes->select('id,nombres,apellidos')
      ->where("deleted_at", null)
      ->like('nombres', $searchTerm)
      ->orLike('apellidos', $searchTerm)
      ->orderBy('nombres')
      ->findAll(10);
      }

      $data = array();
      foreach ($listaPacientes as $paciente) {
      $data[] = array(
      "id" => $paciente['id'],
      "text" => $paciente['nombres'] . ' ' . $paciente['apellidos'],
      );
      }

      $response['data'] = $data;

      return $this->response->setJSON($response);
      } */

    /**
     * Reporte Consulta
     */
    public function report($uuid, $isMail = 0) {

        $pdf = new PDFLayoutInventory(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $dataInventory = $this->inventory->where("UUID", $uuid)->first();

        $listProducts = json_decode($dataInventory["listProducts"], true);

        $user = $this->user->where("id", $dataInventory["idUser"])->first()->toArray();
        
        
        if($dataInventory["tipoES"] =="SAL"){
            
            $custumer = $this->custumer->where("id", $dataInventory["idCustumer"])->where("deleted_at", null)->first();
            
                $clienteProveedor = <<<EOF
                Cliente: $custumer[firstname] $custumer[lastname] 
                
                EOF;

                $custumerData["email"] = $custumer["email"];
            
            
        }else{
            
            $suppliers = $this->suppliers->where("id", $dataInventory["idProveedor"])->where("deleted_at", null)->first();
            
                $clienteProveedor = <<<EOF
                Proveedor: $suppliers[firstname] $suppliers[lastname] 
                
                EOF;
            
                $custumerData["email"] = $suppliers["email"];
        }
        

        $datosEmpresa = $this->empresa->select("*")->where("id", $dataInventory["idEmpresa"])->first();
        $datosEmpresaObj = $this->empresa->select("*")->where("id", $dataInventory["idEmpresa"])->asObject()->first();

        $pdf->nombreDocumento = "Nota De Venta";
        $pdf->direccion = $datosEmpresaObj->direccion;

        if ($datosEmpresaObj->logo == NULL || $datosEmpresaObj->logo == "") {

            $pdf->logo = ROOTPATH . "public/images/logo/default.png";
        } else {

            $pdf->logo = ROOTPATH . "public/images/logo/" . $datosEmpresaObj->logo;
        }
        $pdf->folio = str_pad($dataInventory["folio"], 5, "0", STR_PAD_LEFT);

        $folioConsulta = "Folio Consulta";
        $fecha = " Fecha: ";

        // set document information
        $pdf->nombreEmpresa = $datosEmpresa["nombre"];
        $pdf->direccion = $datosEmpresa["direccion"];
        $pdf->usuario = $user["firstname"] . " " . $user["lastname"];
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor($user["username"]);
        $pdf->SetTitle('CI4JCPOS');
        $pdf->SetSubject('CI4JCPOS');
        $pdf->SetKeywords('CI4JCPOS, PDF, PHP, CodeIgniter, CESARSYSTEMS.COM.MX');

        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

        // set header and footer fonts
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, 35, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // ---------------------------------------------------------
        // add a page
        $pdf->AddPage();

        $pdf->SetY(45);
        //ETIQUETAS
        $cliente = "Cliente: ";
        $folioRegistro = " Folio: ";
        $fecha = " Fecha:";

        $pdf->SetY(45);
        //ETIQUETAS
        $cliente = "Cliente: ";
        $folioRegistro = " Folio: ";
        $fecha = " Fecha:";

        // set font
        //$pdf->SetFont('times', '', 12);

        if ($datosEmpresa["facturacionRD"] == "on" && $dataInventory["folioComprobanteRD"] > 0) {


            $comprobante = $this->comprobantesRD->find($dataInventory["tipoComprobanteRD"]);
            if ($comprobante["tipoDocumento"] == "COF") {
                $tipoDocumento = "FACTURA PARA CONSUMIDOR FINAL";
            }

            if ($comprobante["tipoDocumento"] == "CF") {
                $tipoDocumento = "FACTURA PARA CREDITO FISCAL";
            }

            $comprobanteFactura = $comprobante["prefijo"] . str_pad($dataSells["folioComprobanteRD"], 10, "0", STR_PAD_LEFT);
            $fechaVencimiento = "AUTORIZADO POR DGII :" . $comprobante["hastaFecha"];
        } else {

            $tipoDocumento = "";
            $comprobanteFactura = "";
            $fechaVencimiento = "";
        }
        
  
    
        $bloque2 = <<<EOF

    
        <table style="font-size:10px; padding:0px 10px;">
    
             <tr>
               <td style="width: 50%; background-color:#2c3e50; padding: 4px 4px 4px; font-weight:bold;  color:white;">ATENCION A
               </td>
               <td style="width: 50%; background-color:#2c3e50; padding: 4px 4px 4px; font-weight:bold;  color:white;">OBSERVACIONES
               </td>
            </tr>
            <tr>
    
                <td >
    
    
                $clienteProveedor] 
    
                    <br>
                    Telefono: 000
                    <br>
                    E-Mail: $custumerData[email]
                    <br>
                </td>
                <td >
                    $dataInventory[generalObservations]
                    $tipoDocumento  <br>
                    $comprobanteFactura  <br>
                    $fechaVencimiento <br>
                </td>
    
    
            </tr>
    
            <tr>
    
                <td style="width: 25%; background-color:#2c3e50; padding: 4px 4px 4px; font-weight:bold;  color:white;">VENDEDOR
                </td>
    
                <td style="width: 24%; background-color:#2c3e50; padding: 4px 4px 4px; font-weight:bold;  color:white;">FECHA
                </td>
                <td style="width: 30%; background-color:#2c3e50; padding: 4px 4px 4px; font-weight:bold;  color:white;">FECHA DE VENCIMIENTO
                </td>
    
    
                <td style="width: 21%; background-color:#2c3e50; padding: 4px 4px 4px; font-weight:bold;  color:white;">VIGENCIA
                </td>
    
            </tr>
            <tr>
                    <td>
                        $user[firstname] $user[lastname]
                    </td>
                    <td>
                    $dataInventory[date]
                    </td>
                    <td>
                    $dataInventory[dateVen]
                    </td>
                    <td>
                    $dataInventory[delivaryTime]
                    </td>
            </tr>
            <tr>
                <td style="border-bottom: 1px solid #666; background-color:white; width:640px"></td>
            </tr>
        </table>
    EOF;

        $pdf->writeHTML($bloque2, false, false, false, false, '');

        $bloque3 = <<<EOF

        <table style="font-size:10px; padding:5px 10px;">
    
            <tr>
    
            <td style="width: 100px; background-color:#2c3e50; padding: 4px 4px 4px; font-weight:bold;  color:white; text-align:center">Código</td>
            <td style="width: 200px; background-color:#2c3e50; padding: 4px 4px 4px; font-weight:bold;  color:white; text-align:center">Descripción</td>
                     <td style="width: 60px; background-color:#2c3e50; padding: 4px 4px 4px; font-weight:bold;  color:white; text-align:center">Cant</td>
    
            <td style="width: 80px; background-color:#2c3e50; padding: 4px 4px 4px; font-weight:bold;  color:white; text-align:center">Precio</td>
            <td style="width: 100px; background-color:#2c3e50; padding: 4px 4px 4px; font-weight:bold;  color:white; text-align:center">SubTotal</td>
            <td style="width: 100px; background-color:#2c3e50; padding: 4px 4px 4px; font-weight:bold;  color:white; text-align:center">Total</td>
    
            </tr>
    
        </table>
    
    EOF;

        $pdf->writeHTML($bloque3, false, false, false, false, '');

        $contador = 0;
        foreach ($listProducts as $key => $value) {



            if ($contador % 2 == 0) {
                $clase = 'style=" background-color:#ecf0f1; padding: 3px 4px 3px; ';
            } else {
                $clase = 'style="background-color:white; padding: 3px 4px 3px; ';
            }

            $precio = number_format($value["price"], 2, ".");
            $subTotal = number_format($value["total"], 2, ".");
            $total = number_format($value["neto"], 2, ".");
            $bloque4 = <<<EOF
    
        <table style="font-size:10px; padding:5px 10px;">
    
            <tr>
    
                <td  $clase width:100px; text-align:center">
                    $value[codeProduct]
                </td>
    
    
                <td  $clase width:200px; text-align:center">
                    $value[description]
                </td>
    
                <td $clase width:60px; text-align:center">
                    $value[cant]
                </td>
    
                <td $clase width:80px; text-align:right">
                    $precio
                </td>
    
                <td $clase width:100px; text-align:center">
                $subTotal
            </td>
    
                <td $clase width:100px; text-align:right">
                $total
                </td>
    
               
    
    
            </tr>
    
        </table>
    
    
    EOF;
            $contador++;
            $pdf->writeHTML($bloque4, false, false, false, false, '');
        }




        /**
         * TOTALES
         */
        $pdf->Setx(43);
        $subTotal = number_format($dataInventory["subTotal"], 2, ".");
        $impuestos = number_format($dataInventory["taxes"], 2, ".");
        $total = number_format($dataInventory["total"], 2, ".");
        $IVARetenido = number_format($dataInventory["IVARetenido"], 2, ".");
        $ISRRetenido = number_format($dataInventory["ISRRetenido"], 2, ".");

        if ($IVARetenido > 0) {

            $bloqueIVARetenido = <<<EOF
                    <tr>
            
                    <td style="border-right: 0px solid #666; color:#333; background-color:white; width:340px; text-align:right"></td>
    
                    <td style="border: 0px solid #666; background-color:white; width:100px; text-align:right">
                    IVA Retenido:
                    </td>
    
                    <td style="border: 0px solid #666; color:#333; background-color:white; width:100px; text-align:right">
                        $IVARetenido
                    </td>
    
                </tr>
    
            EOF;
        } else {

            $bloqueIVARetenido = "";
        }


        if ($ISRRetenido > 0) {

            $bloqueISRRetenido = <<<EOF
                    <tr>
            
                    <td style="border-right: 0px solid #666; color:#333; background-color:white; width:340px; text-align:right"></td>
    
                    <td style="border: 0px solid #666; background-color:white; width:100px; text-align:right">
                    ISR Retenido:
                    </td>
    
                    <td style="border: 0px solid #666; color:#333; background-color:white; width:100px; text-align:right">
                        $ISRRetenido
                    </td>
    
                </tr>
    
            EOF;
        } else {

            $bloqueISRRetenido = "";
        }





        $bloque5 = <<<EOF

      <table style="font-size:10px; padding:5px 10px;">
  
          <tr>
  
              <td style="color:#333; background-color:white; width:340px; text-align:right"></td>
  
              <td style="border-bottom: 0px solid #666; background-color:white; width:100px; text-align:right"></td>
  
              <td style="border-bottom: 0px solid #666; color:#333; background-color:white; width:100px; text-align:right"></td>
  
          </tr>
  
          <tr>
  
              <td style="border-right: 0px solid #666; color:#333; background-color:white; width:340px; text-align:right"></td>
  
              <td style="border: 0px solid #666;  background-color:white; width:100px; text-align:right">
              Subtotal:
              </td>
  
              <td style="border: 0px solid #666; color:#333; background-color:white; width:100px; text-align:right">
                   $subTotal
              </td>
  
          </tr>
  
          <tr>
  
              <td style="border-right: 0px solid #666; color:#333; background-color:white; width:340px; text-align:right"></td>
  
              <td style="border: 0px solid #666; background-color:white; width:100px; text-align:right">
               IVA:
              </td>
  
              <td style="border: 0px solid #666; color:#333; background-color:white; width:100px; text-align:right">
                   $impuestos
              </td>
  
          </tr>
  
  
          $bloqueIVARetenido
          $bloqueISRRetenido
  
  
          <tr>
  
              <td style="border-right: 0px solid #666; color:#333; background-color:white; width:340px; text-align:right"></td>
  
              <td style="border: 0px solid #666; background-color:white; width:100px; text-align:right">
                  Total:
              </td>
  
              <td style="border: 0px solid #666; color:#333; background-color:white; width:100px; text-align:right">
                  $ $total
              </td>
  
          </tr>
  
  
      </table>
      <br>
      <div style="font-size:11pt;text-align:center;font-weight:bold">Gracias por su compra!</div>
  <br><br>
                  
          <div style="font-size:8.5pt;text-align:left;font-weight:ligth">UUID DOCUMENTO: $dataInventory[UUID]</div>
          
     
      <div style="font-size:8.5pt;text-align:left;font-weight:ligth">ES RESPONSABILIDAD DEL CLIENTE REVISAR A DETALLE ESTA COTIZACION PARA SU POSTERIOR SURTIDO, UNA VEZ CONFIRMADA, NO HAY CAMBIOS NI DEVOLUCIONES.</div>
  
      
  
  
  EOF;

        $pdf->writeHTML($bloque5, false, false, false, false, 'R');

        if ($isMail == 0) {
            $this->response->setHeader("Content-Type", "application/pdf");
            $pdf->Output('notaVenta.pdf', 'I');
        } else {

            $attachment = $pdf->Output('notaVenta.pdf', 'S');

            return $attachment;
        }


        //============================================================+
        // END OF FILE
        //============================================================+
    }
}
