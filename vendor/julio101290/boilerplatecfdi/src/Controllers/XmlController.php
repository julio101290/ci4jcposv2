<?php

namespace julio101290\boilerplateCFDI\Controllers;

use App\Controllers\BaseController;
use julio101290\boilerplateCFDI\Models\{
    XmlModel
};
use julio101290\boilerplatelog\Models\LogModel;
use CodeIgniter\API\ResponseTrait;
use ZipArchive;
// use julio101290\boilerplatesells\Models\SellsModel;
use julio101290\boilerplatesells\Models\EnlacexmlModel;
use julio101290\boilerplatecomplementopago\Models\PagosModel;
use PhpCfdi\XmlCancelacion\Capsules\Cancellation;
use PhpCfdi\XmlCancelacion\Credentials;
use PhpCfdi\XmlCancelacion\Models\CancelDocument;
use PhpCfdi\XmlCancelacion\Models\CancelDocuments;
use PhpCfdi\XmlCancelacion\Signers\DOMSigner;
use DateTimeImmutable;
use PhpCfdi\Credentials\Credential;
use PhpCfdi\XmlCancelacion\XmlCancelacionHelper;
//use App\Models\CartaPorteModel;
//use App\Models\SeriesfacturaelectronicaModel;
//use App\Models\NotasCreditoModel;
use julio101290\boilerplatecompanies\Models\EmpresasModel;

class XmlController extends BaseController {

    use ResponseTrait;

    protected $log;
    protected $xml;
    protected $empresas;

    //protected $sells;
    //protected $cartaPorte;
    protected $enlaceXML;
    protected $pagos;
    //protected $serieElectronica;
    //protected $notaCredito;

    public function __construct() {
        $this->xml = new XmlModel();
        $this->log = new LogModel();
        $this->empresas = new EmpresasModel();
        //$this->sells = new SellsModel();
        $this->enlaceXML = new EnlacexmlModel();
        //$this->ventas = new SellsModel();
        $this->pagos = new PagosModel();
        //$this->cartaPorte = new CartaPorteModel();
        //$this->serieElectronica = new SeriesfacturaelectronicaModel();
        //$this->notaCredito = new NotascreditoModel();

        helper('menu');
    }

    public function index() {


        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;
        $titulos["empresas"] = $this->empresas->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }

        if ($this->request->isAJAX()) {
            $datos = $this->xml->select('id
             ,uuidTimbre
             ,archivoXML
             ,rfcEmisor
             ,rfcReceptor
             ,nombreEmisor
             ,nombreReceptor
             ,serie
             ,folio
             ,tipoComprobante
             ,fecha
             ,fechaTimbrado
             ,total
             ,metodoPago
             ,formaPago
             ,usoCFDI
             ,exportacion
             ,created_at
             ,deleted_at,
             ,status
             ,updated_at
             ,uuidPaquete')->where('deleted_at', null)->whereIn("idEmpresa", $empresasID);

            return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
        }

        $titulos["formaPago"] = $this->catalogosSAT->formasDePago40()->searchByField("texto", "%%", 99999);
        $titulos["usoCFDI"] = $this->catalogosSAT->usosCfdi40()->searchByField("texto", "%%", 99999);
        $titulos["metodoPago"] = $this->catalogosSAT->metodosDePago40()->searchByField("texto", "%%", 99999);
        $titulos["regimenFiscal"] = $this->catalogosSAT->regimenesFiscales40()->searchByField("texto", "%%", 99999);
        $titulos["tiposComprobante"] = $this->catalogosSAT->tiposComprobantes40()->searchByField("texto", "%%", 99999);
        $titulos["title"] = lang('xml.title');
        $titulos["subtitle"] = lang('xml.subtitle');
        return view('julio101290\boilerplateCFDI\Views\xml', $titulos);
    }

    /**
     * Obtenemos los gastos facturados
     */
    public function xmlDesdeCaja($caja) {


        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;
        $titulos["empresas"] = $this->empresas->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }

        if ($this->request->isAJAX()) {
            $datos = $this->xml->select('id
             ,uuidTimbre
             ,archivoXML
             ,rfcEmisor
             ,rfcReceptor
             ,nombreEmisor
             ,nombreReceptor
             ,serie
             ,folio
             ,tipoComprobante
             ,fecha
             ,fechaTimbrado
             ,total
             ,metodoPago
             ,formaPago
             ,usoCFDI
             ,exportacion
             ,created_at
             ,deleted_at,
             ,status
             ,updated_at
             ,uuidPaquete')->where('deleted_at', null)->whereIn("idEmpresa", $empresasID);

            return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
        }


        $titulos[$caja] = $caja;
        $titulos["formaPago"] = $this->catalogosSAT->formasDePago40()->searchByField("texto", "%%", 99999);
        $titulos["usoCFDI"] = $this->catalogosSAT->usosCfdi40()->searchByField("texto", "%%", 99999);
        $titulos["metodoPago"] = $this->catalogosSAT->metodosDePago40()->searchByField("texto", "%%", 99999);
        $titulos["regimenFiscal"] = $this->catalogosSAT->regimenesFiscales40()->searchByField("texto", "%%", 99999);
        $titulos["tiposComprobante"] = $this->catalogosSAT->tiposComprobantes40()->searchByField("texto", "%%", 99999);
        $titulos["title"] = lang('xml.title');
        $titulos["subtitle"] = lang('xml.subtitle');

        return view('xml', $titulos);
    }

    public function xmlFilters($desdeFecha
            , $hastaFecha
            , $todas
            , $RFCEmisor
            , $RFCReceptor
            , $usoCFDI
            , $metodoPago
            , $formaPago
            , $tipoComprobante
            , $emitidoRecibido
            , $status
    ) {


        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;
        $titulos["empresas"] = $this->empresas->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }

        $empresasRFC = array_column($titulos["empresas"], "rfc");

        if ($this->request->isAJAX()) {
            $datos = $this->xml->select('id
             ,uuidTimbre
             ,archivoXML
             ,rfcEmisor
             ,rfcReceptor
             ,nombreEmisor
             ,nombreReceptor
             ,serie
             ,folio
             ,tipoComprobante
             ,fecha
             ,fechaTimbrado
             ,total
             ,base16
             ,totalImpuestos16
             ,base8
             ,totalImpuestos8
             ,created_at
             ,deleted_at
             ,status
             ,updated_at
             ,uuidPaquete')->where('deleted_at', null)
                    ->whereIn("idEmpresa", $empresasID)
                    ->where('fechaTimbrado >=', $desdeFecha . ' 00:00:00')
                    ->where('fechaTimbrado <=', $hastaFecha . ' 23:59:59')
                    ->groupStart()
                    ->where('\'true\'', $todas, true)
                    ->orWhereIn('rfcEmisor', $empresasRFC)
                    ->groupEnd()
                    ->groupStart()
                    ->Where('\'0\'', $RFCEmisor)
                    ->orWhere("'0'='$RFCEmisor'")
                    ->groupEnd()
                    ->groupStart()
                    ->where('rfcReceptor', $RFCReceptor, true)
                    ->orWhere("'0'='$RFCReceptor'")
                    ->groupEnd()
                    ->groupStart()
                    ->orWhere("'0'='$metodoPago'")
                    ->orWhere('metodoPago', $metodoPago)
                    ->groupEnd()
                    ->groupStart()
                    ->orWhere("'0'='$formaPago'")
                    ->orwhere('formaPago', $formaPago)
                    ->groupEnd()
                    ->groupStart()
                    ->orWhere("'0'='$usoCFDI'")
                    ->orWhere('usoCFDI', $usoCFDI)
                    ->groupEnd()
                    ->groupStart()
                    ->orWhere("'0'='$tipoComprobante'")
                    ->orWhere('tipoComprobante', $tipoComprobante)
                    ->groupEnd()
                    ->groupStart()
                    ->orWhere("'0'='$emitidoRecibido'")
                    ->orWhere('emitidoRecibido', $emitidoRecibido)
                    ->groupEnd()
                    ->groupStart()
                    ->orWhere("'0'='$status'")
                    ->orWhere('status', $status)
                    ->groupEnd()



            ;

            return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
        }
    }

    public function descargarXMLS($desdeFecha
            , $hastaFecha
            , $todas
            , $RFCEmisor
            , $RFCReceptor
            , $usoCFDI
            , $metodoPago
            , $formaPago
            , $tipoComprobante
            , $emitidoRecibido
            , $param
            , $seleccionados
    ) {


        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;
        $titulos["empresas"] = $this->empresas->mdlEmpresasPorUsuario($idUser);
        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }

        $empresasRFC = array_column($titulos["empresas"], "rfc");

        $seleccionados = str_replace("\"", "", $seleccionados);

        $seleccionadosArr = preg_split("/\,/", $seleccionados);

        $datos = $this->xml->select('id
                            ,uuidTimbre
                            ,archivoXML
                            ,rfcEmisor
                            ,rfcReceptor
                            ,nombreEmisor
                            ,nombreReceptor
                            ,serie
                            ,folio
                            ,tipoComprobante
                            ,fecha
                            ,fechaTimbrado
                            ,total
                            ,base16
                            ,totalImpuestos16
                            ,base8
                            ,totalImpuestos8
                            ,created_at
                            ,deleted_at
                            ,status
                            ,updated_at
                            ,uuidPaquete')->where('deleted_at', null)
                ->whereIn("idEmpresa", $empresasID)
                ->where('fechaTimbrado >=', $desdeFecha . ' 00:00:00')
                ->where('fechaTimbrado <=', $hastaFecha . ' 23:59:59')
                ->groupStart()
                ->where('\'true\'', $todas, true)
                ->orWhereIn('rfcEmisor', $empresasRFC)
                ->groupEnd()
                ->groupStart()
                ->Where('\'0\'', $RFCEmisor, true)
                ->orWhere('rfcEmisor', $RFCEmisor)
                ->groupEnd()
                ->groupStart()
                ->where('rfcReceptor', $RFCReceptor)
                ->orWhere('\'0\'', $RFCReceptor)
                ->groupEnd()
                ->groupStart()
                ->orWhere('\'0\'', $metodoPago, true)
                ->orWhere("metodoPago", $metodoPago)
                ->groupEnd()
                ->groupStart()
                ->orWhere('\'0\'', $formaPago, true)
                ->orwhere('formaPago', $formaPago)
                ->groupEnd()
                ->groupStart()
                ->orWhere('\'0\'', $usoCFDI, true)
                ->orWhere('usoCFDI', $usoCFDI)
                ->groupEnd()
                ->groupStart()
                ->orWhere('\'0\'', $tipoComprobante, true)
                ->orWhere('tipoComprobante', $tipoComprobante)
                ->groupEnd()
                ->groupStart()
                ->orWhere('\'0\'', $emitidoRecibido, true)
                ->orWhere('emitidoRecibido', $emitidoRecibido)
                ->groupEnd()
                ->groupStart()
                ->orwhere('\'0\'', $seleccionados, true)
                ->orwhereIn("id", $seleccionadosArr)
                ->groupEnd()
                ->findAll();

        if (count($datos) == 0) {

            echo "No se encontro ningun XML en la busqueda";
            return;
        }
        $zip = new ZipArchive;

        if (file_exists("archivosXML.zip")) {

            unlink('archivosXML.zip');
        }

        $res = $zip->open('archivosXML.zip', ZipArchive::CREATE);

        foreach ($datos as $key => $value) {

            if ($res === TRUE) {
                $zip->addFromString($value["uuidTimbre"] . ".xml", $value["archivoXML"]);
                //$zip->close();
            } else {
                echo 'Error: Zip couldn\'t be created.';
            }
        }


        $zip->close();

        $file = "archivosXML.zip";
        if (headers_sent()) {
            echo 'HTTP header already sent';
        } else {
            if (!is_file($file)) {
                header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
                echo 'File not found';
            } else if (!is_readable($file)) {
                header($_SERVER['SERVER_PROTOCOL'] . ' 403 Forbidden');
                echo 'File not readable';
            } else {
                while (ob_get_level()) {
                    ob_end_clean();
                }
                ob_start();
                header($_SERVER['SERVER_PROTOCOL'] . ' 200 OK');
                header("Content-Type: application/zip");
                header("Content-Transfer-Encoding: Binary");
                header("Content-Length: " . filesize($file));
                header('Pragma: no-cache');
                header("Content-Disposition: attachment; filename=\"" . basename($file) . "\"");
                ob_flush();
                ob_clean();
                readfile($file);
                exit;
            }
        }

        if (file_exists("archivosXML.zip")) {

            unlink('archivosXML.zip');
        }
    }

    /**
     * Read Xml
     */
    public function getXml() {
        $idXml = $this->request->getPost("idXml");
        $datosXml = $this->xml->find($idXml);
        echo json_encode($datosXml);
    }

    /**
     * Save or update Xml
     */
    public function save() {
        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;
        $datos = $this->request->getPost();

        $empresa = $this->empresas->select("*")
                ->where("id", $datos["idEmpresa"])
                ->findAll();

        $empresa = $empresa[0];

        if (!isset($datos["idXml"])) {

            $datos["idXml"] = 0;
        }

        if ($datos["idXml"] == 0) {
            try {



                $files = $_FILES["txt_archivo"]["tmp_name"];

                foreach ($files as $key => $value) {

                    $xmlText = file_get_contents($value);

                    $xml = \PhpCfdi\CfdiCleaner\Cleaner::staticClean($xmlText);

                    // create the main node structure
                    $comprobante = \CfdiUtils\Nodes\XmlNodeUtils::nodeFromXmlString($xml);

                    // create the CfdiData object, it contains all the required information
                    $cfdiData = (new \PhpCfdi\CfdiToPdf\CfdiDataBuilder())
                            ->build($comprobante);

                    // VALIDAMOS STATUS EN EL SAT

                    /*
                      try {

                      $client = new SoapConsumerClient();
                      $consumer = new Consumer($client);

                      $cfdiStatus = $consumer->execute($cfdiData->qrUrl());

                      if ($cfdiStatus->document()->isActive()) {
                      $datosXML["status"] = 'vigente';
                      } else {
                      $datosXML["status"] = 'cancelado';
                      }
                      } catch (Exception $ex) {

                      }

                     */

                    $tfd = $cfdiData->timbreFiscalDigital();
                    $emisor = $cfdiData->emisor();
                    $receptor = $cfdiData->receptor();

                    $datos["base16"] = "0.00";
                    $datos["totalImpuestos16"] = "0.00";

                    $datos["base8"] = "0.00";
                    $datos["totalImpuestos8"] = "0.00";

                    $impuestos = $comprobante->searchNode('cfdi:Impuestos');

                    if (isset($impuestos)) {

                        $traslados = $impuestos->searchNodes('cfdi:Traslados', 'cfdi:Traslado');

                        foreach ($traslados as $key) {


                            if ($key["TasaOCuota"] == 0.16) {

                                if (isset($key["Base"])) {

                                    $datos["base16"] = $datos["base16"] + $key["Base"];
                                } else {

                                    $datos["base16"] = $datos["base16"] + 0;
                                }

                                if (is_numeric($key["Importe"] && is_numeric($key["totalImpuestos16"]))) {


                                    $datos["totalImpuestos16"] = number_format($datos["totalImpuestos16"], 6) + number_format($key["Importe"], 6);
                                }
                            }

                            if ($key["TasaOCuota"] == 0.08) {


                                if (isset($key["Base"])) {

                                    $datos["base8"] = $datos["base8"] + $key["Base"];
                                } else {

                                    $datos["base8"] = $datos["base8"] + 0;
                                }



                                $datos["totalImpuestos8"] = $datos["totalImpuestos8"] + $key["Importe"];
                            }
                        }
                    }


                    //$tfd['UUID']



                    $datos["uuidTimbre"] = $tfd['UUID'];

                    $datos["uuidPaquete"] = "Manual";

                    $datos["idEmpresa"] = $datos["idEmpresa"];
                    $datos["archivoXML"] = $xmlText;

                    //  $jsonXML = JsonConverter::convertToJson($content);
                    //  $arregloXML = json_decode($jsonXML, true);
                    $datos["fecha"] = $comprobante["Fecha"];
                    $datos["fechaTimbrado"] = $tfd['FechaTimbrado'];
                    $datos["total"] = $comprobante["Total"];
                    $datos["tipoComprobante"] = $comprobante["TipoDeComprobante"];

                    $datos["rfcEmisor"] = $emisor['Rfc'];
                    $datos["rfcReceptor"] = $receptor['Rfc'];

                    $datos["nombreEmisor"] = $emisor['Nombre'];
                    $datos["nombreReceptor"] = $receptor['Nombre'];

                    $datos["metodoPago"] = $comprobante['MetodoPago'];
                    $datos["formaPago"] = $comprobante['FormaPago'];
                    $datos["usoCFDI"] = $receptor['UsoCFDI'];
                    $datos["exportacion"] = $comprobante['Exportacion'];

                    if ($empresa["rfc"] == $datos["rfcEmisor"]) {

                        $datos["emitidoRecibido"] = "emitido";
                    } else {

                        $datos["emitidoRecibido"] = "recibido";
                    }


                    if (isset($comprobante["Serie"])) {

                        $datos["serie"] = $comprobante["Serie"];
                    } else {

                        $datos["serie"] = "";
                    }

                    if (isset($comprobante["Folio"])) {

                        $datos["folio"] = $comprobante["Folio"];
                    } else {

                        $datos["folio"] = "";
                    }

                    $totalRen = $this->xml->selectCount("id")->where("uuidTimbre", $datos["uuidTimbre"])->first();
                    $totalRen = $totalRen["id"];
                    if ($totalRen == 0) {



                        if ($this->xml->save($datos) === false) {
                            $errores = $this->xml->errors();
                            foreach ($errores as $field => $error) {
                                echo $error . " ";
                            }
                            return;
                        }

                        $dateLog["description"] = lang("xml.logDescription") . json_encode($datos);
                        $dateLog["user"] = $userName;
                    }








                    $this->log->save($dateLog);

                    echo "Guardado Correctamente";
                }
            } catch (\PHPUnit\Framework\Exception $ex) {
                echo "Error al guardar " . $ex->getMessage();
            }
        } else {
            if ($this->xml->update($datos["idXml"], $datos) == false) {
                $errores = $this->xml->errors();
                foreach ($errores as $field => $error) {
                    echo $error . " ";
                }
                return;
            } else {
                $dateLog["description"] = lang("xml.logUpdated") . json_encode($datos);
                $dateLog["user"] = $userName;
                $this->log->save($dateLog);
                echo "Actualizado Correctamente";
                return;
            }
        }
        return;
    }

    /**
     * Delete Xml
     * @param type $id
     * @return type
     */
    public function delete($id) {
        $infoXml = $this->xml->find($id);
        helper('auth');
        $userName = user()->username;
        if (!$found = $this->xml->delete($id)) {
            return $this->failNotFound(lang('xml.msg.msg_get_fail'));
        }
        $this->xml->purgeDeleted();
        $logData["description"] = lang("xml.logDeleted") . json_encode($infoXml);
        $logData["user"] = $userName;
        $this->log->save($logData);
        return $this->respondDeleted($found, lang('xml.msg_delete'));
    }

    public function generaCartaPortePDFDesdeVenta($uuid) {

        // buscamos el id de la venta

        $datosCartaPorte = $this->cartaPorte->select("*")->where("UUID", $uuid)->first();

        //Buscamo el uuid del xml en xml enlazados

        $enlaceXML = $this->enlaceXML->select("*")
                        ->where("idDocumento", $datosCartaPorte["id"])
                        ->where("tipo", "tra")->first();

        $this->generarPDF($enlaceXML["uuidXML"]);
    }

    public function generaPDFDesdePago($uuidVenta) {

        // buscamos el id de la venta

        $datosPago = $this->pagos->select("*")->where("UUID", $uuidVenta)->first();

        //Buscamo el uuid del xml en xml enlazados

        $enlaceXML = $this->enlaceXML->select("*")
                        ->where("idDocumento", $datosPago["id"])
                        ->where("tipo", "pag")->first();

        $this->generarPDF($enlaceXML["uuidXML"]);
    }

    /**
     * Put in credit note library
     */
    public function generaPDFNotaCredito($uuidNotaCredito) {

        // buscamos el id de la venta

        $datosPago = $this->notaCredito->select("*")->where("UUID", $uuidNotaCredito)->first();

        //Buscamo el uuid del xml en xml enlazados

        $enlaceXML = $this->enlaceXML->select("*")
                        ->where("idDocumento", $datosPago["id"])
                        ->where("tipo", "NCR")->first();

        $this->generarPDF($enlaceXML["uuidXML"]);
    }

    public function generarPDF($idPDF,$responseExtenal =false) {


        $datosXML = $this->xml->where('uuidTimbre', $idPDF)->first();

        $xml = \PhpCfdi\CfdiCleaner\Cleaner::staticClean($datosXML["archivoXML"]);

        // create the main node structure
        $comprobante = \CfdiUtils\Nodes\XmlNodeUtils::nodeFromXmlString($xml);

        // create the CfdiData object, it contains all the required information
        $cfdiData = (new \PhpCfdi\CfdiToPdf\CfdiDataBuilder())
                ->build($comprobante);

        $htmlTranslator = new \PhpCfdi\CfdiToPdf\Builders\HtmlTranslators\PlatesHtmlTranslator(
                dirname(__DIR__, 2) . '/src/Libraries/templatesCFDI/', // __DIR__ is src/Builders
                'generic',
        );

        // create the converter
        $converter = new \PhpCfdi\CfdiToPdf\Converter(
                new \PhpCfdi\CfdiToPdf\Builders\Html2PdfBuilder($htmlTranslator)
        );

        // create the invoice as output.pdf

        $archivo = $converter->createPdf($cfdiData);

        $archivo = file_get_contents($archivo);

        if (!$responseExtenal) {

            $this->response->setHeader("Content-Type", "application/pdf");
        } else {

           return $archivo;
        }




        echo $archivo;
    }

    /**
     * Descarga XML
     */
    public function descargaXML($uuid) {

        $datosXML = $this->xml->select("*")->where("uuidTimbre", $uuid)->find();

        $this->response->setHeader("Content-Type", "text/xml");
        echo $datosXML[0]["archivoXML"];
    }

    /**
     * Descarga XML
     */
    public function descargaAcuseCancelacion($uuid) {

        $datosXML = $this->xml->select("*")->where("uuidTimbre", $uuid)->find();

        $this->response->setHeader("Content-Type", "text/xml");
        echo $datosXML[0]["acuseCancelacion"];
    }

    /*
     * RFC Emisor
     */

    public function getRFCEmisorAjax() {

        $request = service('request');
        $postData = $request->getPost();

        $response = array();

        // Read new token and assign in $response['token']
        $response['token'] = csrf_hash();
        $idEmpresa = $postData['idEmpresa'];

        if (!isset($postData['searchTerm'])) {

            $postData['searchTerm'] = "";
        }
        $searchTerm = $postData['searchTerm'];

        // Fetch record

        $listRFCEmisor = $this->xml->mdlGetRFCEmisor($idEmpresa, $searchTerm);

        $data = array();
        $data[] = array(
            "id" => "0",
            "text" => "0 - Todos",
        );

        foreach ($listRFCEmisor as $RFCEmisor) {
            $data[] = array(
                "id" => $RFCEmisor['rfcEmisor'],
                "text" => $RFCEmisor['rfcEmisor'],
            );
        }

        $response['data'] = $data;

        return $this->response->setJSON($response);
    }

    /*
     * RFC Receptor
     */

    public function getRFCReceptorAjax() {

        $request = service('request');
        $postData = $request->getPost();

        $response = array();

        // Read new token and assign in $response['token']
        $response['token'] = csrf_hash();
        $idEmpresa = $postData['idEmpresa'];

        if (!isset($postData['searchTerm'])) {

            $postData['searchTerm'] = "";
        }
        $searchTerm = $postData['searchTerm'];

        // Fetch record

        $listRFCReceptor = $this->xml->mdlGetRFCReceptor($idEmpresa, $searchTerm);

        $data = array();
        $data[] = array(
            "id" => "0",
            "text" => "0 - Todos",
        );

        foreach ($listRFCReceptor as $RFCReceptor) {
            $data[] = array(
                "id" => $RFCReceptor['rfcReceptor'],
                "text" => $RFCReceptor['rfcReceptor'],
            );
        }

        $response['data'] = $data;

        return $this->response->setJSON($response);
    }

    /*
     * XML ENLAZADOS POR DOCUMENTO
     */


    /*
      public function getXMLEnlazados($uuidVenta) {

      try {

      $datosVenta = $this->sells->select("*")->where("UUID", $uuidVenta)->first();

      if (isset($datosVenta)) {

      $datosXMLEnlazados = $this->enlaceXML->mdlGetEnlacexml2($datosVenta["id"]);

      return \Hermawan\DataTables\DataTable::of($datosXMLEnlazados)->toJson(true);
      } else {

      $datosXMLEnlazados = $this->enlaceXML->select("id,idDocumento,uuidXML,tipo,importe")->where("idDocumento", 0);
      return \Hermawan\DataTables\DataTable::of($datosXMLEnlazados)->toJson(true);
      }
      } catch (Exception $ex) {

      return $ex->getMessage();
      }
      }
     */



    /*
     * ZML ENLAZADOS POR DOCUMENTO
     */

    public function getXMLEnlazadosNotaCredito($uuid) {

        try {

            $datosPagos = $this->notaCredito->select("*")->where("UUID", $uuid)->first();

            if (isset($datosPagos)) {

                $datosXMLEnlazados = $this->enlaceXML->select("id,idDocumento,uuidXML,tipo,importe")
                        ->where("idDocumento", $datosPagos["id"])
                        ->where("tipo", "NCR");
                return \Hermawan\DataTables\DataTable::of($datosXMLEnlazados)->toJson(true);
            } else {

                $datosXMLEnlazados = $this->enlaceXML->select("id,idDocumento,uuidXML,tipo,importe")->where("idDocumento", 0);
                return \Hermawan\DataTables\DataTable::of($datosXMLEnlazados)->toJson(true);
            }
        } catch (Exception $ex) {

            return $ex->getMessage();
        }
    }

    /*
     * ZML ENLAZADOS POR DOCUMENTO CARTA PORTE
     */

    public function getXMLEnlazadosCartaPorte($uuid) {

        try {

            $datos = $this->cartaPorte->select("*")->where("UUID", $uuid)->first();

            if (isset($datos)) {

                $datosXMLEnlazados = $this->enlaceXML->select("id,idDocumento,uuidXML,tipo,importe")
                        ->where("idDocumento", $datos["id"])
                        ->where("tipo", "tra");
                return \Hermawan\DataTables\DataTable::of($datosXMLEnlazados)->toJson(true);
            } else {

                $datosXMLEnlazados = $this->enlaceXML->select("id,idDocumento,uuidXML,tipo,importe")
                        ->where("idDocumento", 0)
                        ->where("tipo", "TRA")
                ;
                return \Hermawan\DataTables\DataTable::of($datosXMLEnlazados)->toJson(true);
            }
        } catch (Exception $ex) {

            return $ex->getMessage();
        }
    }

    /**
     * Ponerlo en factura Electronica
     */
    /*
      public function cancelaCFDI() {

      try {

      $request = service('request');
      $postData = $request->getPost();

      //Buscamos en la tabla de XML
      $xml = $this->xml->select("*")->where("uuidTimbre", $postData["uuidACancelar"])->first();

      if ($xml["tipoComprobante"] == "I") {

      $enlaceVenta = $this->enlaceXML->select("*")
      ->where("uuidXML", $postData["uuidACancelar"])
      ->where("tipo", "ven")->first();

      $venta = $this->sells->select("*")
      ->where("id", $enlaceVenta["idDocumento"])
      ->first();

      $serie = $this->serieElectronica->select("*")
      ->where("idEmpresa", $xml["idEmpresa"])
      ->where("tipoSerie", "ven")
      ->where("sucursal", $venta["idSucursal"])
      ->where("desdeFolio <=", $venta["folio"])
      ->where("hastaFolio >=", $venta["folio"])->first();
      }

      if ($xml["tipoComprobante"] == "P") {

      $enlaceVenta = $this->enlaceXML->select("*")
      ->where("uuidXML", $postData["uuidACancelar"])
      ->where("tipo", "pag")->first();

      $pago = $this->pagos->select("*")
      ->where("id", $enlaceVenta["idDocumento"])
      ->first();

      $serie = $this->serieElectronica->select("*")
      ->where("idEmpresa", $xml["idEmpresa"])
      ->where("tipoSerie", "pag")
      ->where("sucursal", $pago["idSucursal"])
      ->where("desdeFolio <=", $pago["folio"])
      ->where("hastaFolio >=", $pago["folio"])->first();
      }

      // Buscamos la empresa

      $empresa = $this->empresas->select("*")->where("id", $xml["idEmpresa"])->first();

      $rutaLlave = ROOTPATH . "writable/uploads/certificates/$empresa[archivoKey]";
      $rutaCer = ROOTPATH . "writable/uploads/certificates/$empresa[certificado]";

      // VERIFICAMOS SI YA TIENE VENTA

      if (!isset($serie)) {

      echo "No hay serie electronica configurada";
      return;
      }



      if ($serie["ambienteTimbrado"] == "on") {

      if ($postData["uuidRelacionado"] == "") {

      $url = "https://services.sw.com.mx/cfdi33/cancel/$xml[rfcEmisor]/$xml[uuidTimbre]/$postData[motivoCancelacion]";
      } else {

      $url = "https://services.sw.com.mx/cfdi33/cancel/$xml[rfcEmisor]/$xml[uuidTimbre]/$postData[motivoCancelacion]/$postData[uuidRelacionado]";
      }

      $token = $serie["tokenProduccion"];
      } else {

      // $url = "https://services.test.sw.com.mx/v4/cfdi33/issue/v4";
      // $url = "https://services.test.sw.com.mx/cfdi33/cancel/$xml[rfcEmisor]/$xml[uuidTimbre]/$postData[motivoCancelacion]/\"$postData[uuidRelacionado]\"";

      if ($postData["uuidRelacionado"] == "") {

      $url = "https://services.test.sw.com.mx/cfdi33/cancel/$xml[rfcEmisor]/$xml[uuidTimbre]/$postData[motivoCancelacion]";
      } else {

      $url = "https://services.test.sw.com.mx/cfdi33/cancel/$xml[rfcEmisor]/$xml[uuidTimbre]/$postData[motivoCancelacion]/$postData[uuidRelacionado]";
      }

      $token = $serie["tokenPruebas"];
      }



      $curl = curl_init();

      curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_SSL_VERIFYHOST => false,
      CURLOPT_SSL_VERIFYPEER => false,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_HTTPHEADER => array(
      'Authorization: Bearer ' . $token . '',
      ),
      ));

      $response = curl_exec($curl);

      curl_close($curl);

      $respuesta = json_decode($response, true);

      if ($respuesta["status"] != "success") {

      echo "error al cancelar " . $respuesta;
      return;
      } else {

      $actualiza["status"] = "cancelado";
      $actualiza["motivoCancelacion"] = $postData["motivoCancelacion"];
      $actualiza["observacionesCancelacion"] = $postData["observacionesCancelacion"];
      $actualiza["uuidRelacionado"] = $postData["uuidRelacionado"];
      $actualiza["acuseCancelacion"] = $respuesta["data"]["acuse"];

      $xmlAcuse = simplexml_load_string($actualiza["acuseCancelacion"], "SimpleXMLElement", LIBXML_NOCDATA);
      $jsonAcuse = json_encode($xmlAcuse);
      $arrayAcuse = json_decode($jsonAcuse, TRUE);

      $statusCancelacion = $arrayAcuse["Folios"]["EstatusUUID"];

      $estadoCancelacion = "";

      switch ($statusCancelacion) {
      case "200":
      $estadoCancelacion = "200 Cancelado";
      break;
      case "211":
      $estadoCancelacion = "211 En proceso";
      break;
      case "500":
      $estadoCancelacion = "500 Error Cancelacion";
      break;
      case "501":
      $estadoCancelacion = "501 Error Cancelacion";
      break;
      case "601":
      $estadoCancelacion = "601 Error Login";
      break;
      case "602":
      $estadoCancelacion = "602 Usuario Bloqueado";
      break;
      case "603":
      $estadoCancelacion = "603 Contraseña Expirada";
      break;
      case "604":
      $estadoCancelacion = "604 Maximo intentos fallidos";
      break;
      case "605":
      $estadoCancelacion = "605 Usuario Inactivo";
      break;
      case "611":
      $estadoCancelacion = "611 Datos Incompletos";
      break;
      case "620":
      $estadoCancelacion = "620 Permiso Denegado";
      break;
      case "621":
      $estadoCancelacion = "621 Folios no disponibles";
      break;
      case "630":
      $estadoCancelacion = "630 Sin timbres";
      break;
      case "631":
      $estadoCancelacion = "631 Sin timbres";
      break;
      case "633":
      $estadoCancelacion = "633 Uso indebido";
      break;
      case "640":
      $estadoCancelacion = "640 Aplicación inactiva.";
      break;
      case "1701":
      $estadoCancelacion = "1701 La llave privada y la llave pública del CSD no corresponden";
      break;
      case "1702":
      $estadoCancelacion = "1702 La llave privada de la contraseña es incorrecta. ";
      break;
      case "1703":
      $estadoCancelacion = "1703 La llave privada no cumple con la estructura esperada.";
      break;
      case "1704":
      $estadoCancelacion = "1704 La llave Privada no es una llave RSA.";
      break;
      case "1710":
      $estadoCancelacion = "1710 La estructura del certificado no cumple con la estructura X509 esperada.";
      break;
      case "1711":
      $estadoCancelacion = "1711 El certificado no esá vigente todavía.";
      break;
      case "1712":
      $estadoCancelacion = "1712 El certificado ha expirado.";
      break;
      case "1713":
      $estadoCancelacion = "1713 La llave pública contenida en el certificado no es una llave RSA.";
      break;
      case "300":
      $estadoCancelacion = "300 Usuario No Válido.";
      break;
      case "301":
      $estadoCancelacion = "301 XML Mal Formado";
      break;
      case "302":
      $estadoCancelacion = "302 Sello Mal Formado.";
      break;
      case "304":
      $estadoCancelacion = "304 Certificado Revocado o Caduco.";
      break;
      case "305":
      $estadoCancelacion = "305 Certificado Inválido.";
      break;
      case "310":
      $estadoCancelacion = "310 CSD Inválido.";
      break;
      case "1300":
      $estadoCancelacion = "1300 Autenticación no válida.";
      break;
      case "1301":
      $estadoCancelacion = "1301 XML mal formado.";
      break;
      case "1302":
      $estadoCancelacion = "Estructura de folios no válida.";
      break;

      case "1303":
      $estadoCancelacion = "1303 Estructura de folios no válida.";
      break;
      case "1304":
      $estadoCancelacion = "1304 Estructura de fecha no válida.";
      break;
      case "1305":
      $estadoCancelacion = "1305 Certificado no corresponde al emisor.";
      break;
      case "1306":
      $estadoCancelacion = "1306 Certificado no vigente.";
      break;
      case "1307":
      $estadoCancelacion = "1307 Uso de FIEL no permitido";
      break;
      case "1308":
      $estadoCancelacion = "1308 Certificado revocado o caduco.";
      break;
      case "1309":
      $estadoCancelacion = "1309 Firma mal formada o inválida.";
      break;
      case "1313":
      $estadoCancelacion = "1313 Solicitud fuera de la declaración anual.";
      break;
      case "1314":
      $estadoCancelacion = "1314 Relación no valida.";
      break;
      case "201":
      $estadoCancelacion = "201 Solicitud de cancelación recibida.";
      break;

      case "202":
      $estadoCancelacion = "202 Folio Fiscal Previamente Cancelado";
      break;
      case "203":
      $estadoCancelacion = "203 Folio Fiscal No Correspondiente al Emisor.";
      break;
      case "204":
      $estadoCancelacion = "204 Folio Fiscal No Aplicable a Cancelación.";
      break;
      case "205":
      $estadoCancelacion = "205 Folio Fiscal No Existente.";
      break;
      case "206":
      $estadoCancelacion = "206 UUID no corresponde a un CFDI del Sector Primario.";
      break;
      case "207":
      $estadoCancelacion = "207 Folio sustitución Inválido.";
      break;
      case "208":
      $estadoCancelacion = "208 La Fecha de Solicitud de Cancelación es mayor a la fecha de declaración.";
      break;
      case "209":
      $estadoCancelacion = "209 La Fecha de Solicitud de Cancelación límite para factura global.";
      break;
      case "310":
      $estadoCancelacion = "310 CSD Inválido.";
      break;
      case "311":
      $estadoCancelacion = "311 Clave de motivo de cancelación no válida.";
      break;

      case "312":
      $estadoCancelacion = "312 UUID no relacionado de acuerdo a la clave de motivo de cancelación.";
      break;
      case "1201":
      $estadoCancelacion = "1201 Solicitud de cancelación recibida.";
      break;
      case "1202":
      $estadoCancelacion = "1202 UUID Previamente cancelado";
      break;
      case "1203":
      $estadoCancelacion = "1203 UUID no corresponde con el emisor";
      break;
      case "1205":
      $estadoCancelacion = "1205 UUID No existe";
      break;
      }

      $actualiza["status"] = $estadoCancelacion;

      $actualizaXML = $this->xml->update($xml["id"], $actualiza);

      echo "Estatus Cancelacion: " . $estadoCancelacion;
      return;
      }
      } catch (Exception $ex) {

      echo $ex->getmessage();
      }
      }


     */


    /*
     * Xml Sin venta asignada Put in Sells
     */


    /*



     */

    /**
     * Funcion para enlazar pago con complemento de pago XML
     */
    public function enlazaPago() {

        $auth = service('authentication');

        if (!$auth->check()) {
            $this->session->set('redirect_url', current_url());

            echo "No se ha iniciado Session";
            return;
        }

        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;

        $request = service('request');
        $postData = $request->getPost();

        //Buscamos los datos de la venta
        $venta = $this->pagos->select("*")->where("UUID", $postData["uuidVenta"])->first();

        $xml = $this->pagos->select("*")->where("uuidTimbre", $postData["uuidTimbre"])->first();

        $datos["idDocumento"] = $venta["id"];
        $datos["uuidXML"] = $postData["uuidTimbre"];
        $datos["tipo"] = "pag";
        $datos["importe"] = $xml["total"];

        if ($this->enlaceXML->save($datos) === false) {

            $errores = $this->enlaceXML->errors();

            $listErrors = "";

            foreach ($errores as $field => $error) {

                $listErrors .= $error . " ";
            }

            echo $listErrors;

            return;
        }


        /**
         * Registramos en bitacora
         */
        $datosBitacora["description"] = "Se enlazo el XML $postData[uuidTimbre] con la venta $postData[uuidVenta]" . json_encode($datos);
        $datosBitacora["user"] = $userName;

        $this->log->save($datosBitacora);

        echo "Guardado Correctamente";
    }
}
