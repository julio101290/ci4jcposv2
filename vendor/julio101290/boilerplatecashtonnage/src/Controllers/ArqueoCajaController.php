<?php

namespace julio101290\boilerplatecashtonnage\Controllers;

use App\Controllers\BaseController;
use julio101290\boilerplatecashtonnage\Models\{
    ArqueoCajaModel
};

use julio101290\boilerplatelog\Models\LogModel;
use CodeIgniter\API\ResponseTrait;
use julio101290\boilerplatecompanies\Models\EmpresasModel;
use App\Models\UserModel;
use julio101290\boilerplatebranchoffice\Models\BranchofficesModel;
use julio101290\boilerplatesells\Models\SellsModel;
use julio101290\boilerplatevehicles\Models\VehiculosModel;
use julio101290\boilerplatedrivers\Models\ChoferesModel;
use julio101290\boilerplatecustumers\Models\CustumersModel;


class ArqueoCajaController extends BaseController {

    use ResponseTrait;

    protected $log;
    protected $arqueoCaja;
    protected $usuarios;
    protected $sucursal;
    protected $ventas;
    protected $vehiculo;
    protected $chofer;
    protected $cliente;

    public function __construct() {
        $this->arqueoCaja = new ArqueoCajaModel();
        $this->log = new LogModel();
        $this->empresa = new EmpresasModel();
        $this->usuarios = new UserModel();
        $this->sucursal = new BranchofficesModel();
        $this->ventas = new SellsModel();
        $this->vehiculo = new VehiculosModel();
        $this->chofer = new ChoferesModel();
        $this->cliente = new CustumersModel();

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
            $datos = $this->arqueoCaja->mdlGetArqueoCaja($empresasID);

            return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
        }
        $titulos["title"] = lang('arqueoCaja.title');
        $titulos["subtitle"] = lang('arqueoCaja.subtitle');
        return view('julio101290\boilerplatecashtonnage\Views\arqueoCaja', $titulos);
    }

    /**
     * Read ArqueoCaja
     */
    public function getArqueoCaja() {

        helper('auth');

        $idUser = user()->id;
        $titulos["empresas"] = $this->empresa->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }


        $idArqueoCaja = $this->request->getPost("idArqueoCaja");

        $datosArqueoCaja = $this->arqueoCaja->whereIn('idEmpresa', $empresasID)
                        ->where("id", $idArqueoCaja)->first();

        $usuarioEntrega = $this->usuarios->select("*")->where("id", $datosArqueoCaja["idUsuarioEntrega"])->asArray()->first();
        $usuarioVerifica = $this->usuarios->select("*")->where("id", $datosArqueoCaja["idUsuarioVerifica"])->asArray()->first();
        $idUsuarioRecibe = $this->usuarios->select("*")->where("id", $datosArqueoCaja["idUsuarioRecibe"])->asArray()->first();
        $datosSucursal = $this->sucursal->asArray()->find($datosArqueoCaja["idSucursal"]);

        $datosArqueoCaja["nombreUsuarioEntrega"] = $usuarioEntrega["username"];
        $datosArqueoCaja["nombreUsuarioVerifica"] = $usuarioVerifica["username"];
        $datosArqueoCaja["nombreUsuarioRecibe"] = $idUsuarioRecibe["username"];
        $datosArqueoCaja["nombreSucursal"] = $datosSucursal["name"];

        echo json_encode($datosArqueoCaja);
    }

    /**
     * Save or update ArqueoCaja
     */
    public function save() {
        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;
        $datos = $this->request->getPost();
        if ($datos["idArqueoCaja"] == 0) {
            try {
                if ($this->arqueoCaja->save($datos) === false) {
                    $errores = $this->arqueoCaja->errors();
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
            if ($this->arqueoCaja->update($datos["idArqueoCaja"], $datos) == false) {
                $errores = $this->arqueoCaja->errors();
                foreach ($errores as $field => $error) {
                    echo $error . " ";
                }
                return;
            } else {
                $dateLog["description"] = lang("arqueoCaja.logUpdated") . json_encode($datos);
                $dateLog["user"] = $userName;
                $this->log->save($dateLog);
                echo "Actualizado Correctamente";
                return;
            }
        }
        return;
    }

    /**
     * Delete ArqueoCaja
     * @param type $id
     * @return type
     */
    public function delete($id) {
        $infoArqueoCaja = $this->arqueoCaja->find($id);
        helper('auth');
        $userName = user()->username;
        if (!$found = $this->arqueoCaja->delete($id)) {
            return $this->failNotFound(lang('arqueoCaja.msg.msg_get_fail'));
        }
        $this->arqueoCaja->purgeDeleted();
        $logData["description"] = lang("arqueoCaja.logDeleted") . json_encode($infoArqueoCaja);
        $logData["user"] = $userName;
        $this->log->save($logData);
        return $this->respondDeleted($found, lang('arqueoCaja.msg_delete'));
    }

    public function report($id, $isMail = 0) {

        $pdf = new PDFLayoutReportLandscape("L", PDF_UNIT, "L", true, 'UTF-8', false);

        $arqueoCaja = $this->arqueoCaja->find($id);

        $ventas = $this->ventas->select("*")->where("idArqueoCaja", $id)->findAll();

        //$user = $this->user->where("id", $dataSells["idUser"])->first()->toArray();
        //$custumer = $this->custumer->where("id", $ventas["idCustumer"])->where("deleted_at", null)->first();

        $datosEmpresa = $this->empresa->select("*")->where("id", $arqueoCaja["idEmpresa"])->first();
        $datosEmpresaObj = $this->empresa->select("*")->where("id", $arqueoCaja["idEmpresa"])->asObject()->first();

        $pdf->fechaHumanizada = fechaHumanizada(fechaActual());
        

        $pdf->nombreDocumento = lang('arqueoCajaReport.title');

        $pdf->direccion = $datosEmpresaObj->direccion;

        if ($datosEmpresaObj->logo == NULL || $datosEmpresaObj->logo == "") {

            $pdf->logo = ROOTPATH . "public/images/logo/default.png";
        } else {

            $pdf->logo = ROOTPATH . "public/images/logo/" . $datosEmpresaObj->logo;
        }


        $datosUsuarioGuardia = $this->usuarios->select("*")->where("id", $arqueoCaja["idUsuarioEntrega"])->first();
        $datosUsuarioGuardia = $datosUsuarioGuardia->firstname . " " . $datosUsuarioGuardia->lastname;
        $pdf->guardiaTurno =$datosUsuarioGuardia;
        
        $idUsuarioRecibe1 = $this->usuarios->select("*")->where("id", $arqueoCaja["idUsuarioVerifica"])->first();
        $idUsuarioRecibe1 = $idUsuarioRecibe1->firstname . " " . $idUsuarioRecibe1->lastname;
        $pdf->recibe1 =$idUsuarioRecibe1;
        
        $idUsuarioRecib2 = $this->usuarios->select("*")->where("id", $arqueoCaja["idUsuarioRecibe"])->first();
        $idUsuarioRecib2 = $idUsuarioRecib2->firstname . " " . $idUsuarioRecib2->lastname;
        $pdf->recibe2 =$idUsuarioRecib2;

        $pdf->folio = $id;

        $folioConsulta = "Folio Consulta";
        $fecha = " Fecha: ";

        // set document information
        $pdf->nombreEmpresa = $datosEmpresa["nombre"];
        $pdf->direccion = $datosEmpresa["direccion"];
        $pdf->usuario = "";
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor("");
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
        $pdf->setPageOrientation('L');

        $pdf->SetDisplayMode('fullpage', 'SinglePage', 'UseNone');

        // ---------------------------------------------------------
        $pdf->AddPage('L', 'Letter');

        $folio = lang('arqueoCajaReport.folio');
        $date = lang('arqueoCajaReport.date');
        $plates = lang('arqueoCajaReport.plates');
        $vehicle = lang('arqueoCajaReport.vehicle');
        $driver = lang('arqueoCajaReport.driver');

        $custumer = lang('arqueoCajaReport.custumer');
        $scaleOperator = lang('arqueoCajaReport.scaleOperator');
        $credit = lang('arqueoCajaReport.credit');
        $counted = lang('arqueoCajaReport.counted');
        


        $bloque3 = <<<EOF

        <table style="font-size:10px; padding:5px 10px;">
    
            <tr>
    
            <td style="width: 70px; background-color:#2c3e50; padding: 4px 4px 4px; font-weight:bold;  color:white; text-align:center">$folio</td>
            <td style="width: 180px; background-color:#2c3e50; padding: 4px 4px 4px; font-weight:bold;  color:white; text-align:center">$date</td>
            <td style="width: 90px; background-color:#2c3e50; padding: 4px 4px 4px; font-weight:bold;  color:white; text-align:center">$plates</td>
    
            <td style="width: 80px; background-color:#2c3e50; padding: 4px 4px 4px; font-weight:bold;  color:white; text-align:center">$vehicle</td>
            <td style="width: 100px; background-color:#2c3e50; padding: 4px 4px 4px; font-weight:bold;  color:white; text-align:center">$driver </td>
            <td style="width: 150px; background-color:#2c3e50; padding: 4px 4px 4px; font-weight:bold;  color:white; text-align:center">$custumer</td>
            <td style="width: 100px; background-color:#2c3e50; padding: 4px 4px 4px; font-weight:bold;  color:white; text-align:center">$scaleOperator</td>
            <td style="width: 100px; background-color:#2c3e50; padding: 4px 4px 4px; font-weight:bold;  color:white; text-align:center">$credit</td>
            <td style="width: 100px; background-color:#2c3e50; padding: 4px 4px 4px; font-weight:bold;  color:white; text-align:center">$counted</td>    
            </tr>
    
        </table>
    
    EOF;

        $pdf->writeHTML($bloque3, false, false, false, false, '');

        $contador = 0;
        $totalCredito = 0.00;
        $totalContado = 0.00;

        $totalRenglones = count($ventas);
        $numRenglon = 0;
        foreach ($ventas as $key => $value) {


            $numRenglon++;
            $vehiculo = "";
            $placas = "";
            $nombreChofer = "";

            $datosVehiculo = $this->vehiculo->find($value["idVehiculo"]);
            $datosChofer = $this->chofer->find($value["idChofer"]);
            $datosCliente = $this->cliente->find($value["idCustumer"]);
            $datosUsuario = $this->usuarios->select("*")->where("id", $value["idUser"])->first();

            $nombreUsuario = $datosUsuario->firstname . " " . $datosUsuario->lastname;

            $credito = str_replace(",","",$value["balance"]);
            $contado = str_replace(",","",$value["total"] - $value["balance"]);

            $totalCredito = str_replace(",","",$totalCredito) + ($credito);
            $totalContado = str_replace(",","",$totalContado) + ($contado);
            if (isset($datosVehiculo["descripcion"])) {

                $vehiculo = $datosVehiculo["descripcion"];
                $placas = $datosVehiculo["placas"];
            }


            if (isset($datosChofer["nombre"])) {

                $nombreChofer = $datosChofer["nombre"] . " " . $datosChofer["Apellido"];
            }



            if ($contador % 2 == 0) {
                $clase = 'style=" background-color:#ecf0f1; padding: 3px 4px 3px; ';
            } else {
                $clase = 'style="background-color:white; padding: 3px 4px 3px; ';
            }

            $fechaHumanizada = fechaHumanizada($value["date"]);
            $bloque4 = <<<EOF
    
        <table style="font-size:10px; padding:2px 10px;">
    
            <tr>
    
                <td  $clase width:70px; text-align:center">
                    $value[folio]
                </td>
    
    
                <td  $clase width:180px; text-align:left">
                   $fechaHumanizada
                </td>
    
                <td $clase width:90px; text-align:center">
                    $placas
                </td>
    
                <td $clase width:80px; text-align:center">
                    $vehiculo
                </td>
    
                <td $clase width:100px; text-align:left">
                $nombreChofer
            </td>
    
                <td $clase width:150px; text-align:center">
                $datosCliente[firstname]  $datosCliente[lastname]
                </td>
                    
                <td $clase width:100px; text-align:left">
                $nombreUsuario
                </td>
                    
                <td $clase width:100px; text-align:right">
                $credito
                </td>
                    
                <td $clase width:100px; text-align:right">
                $contado
                </td>
    
               
    
    
            </tr>
    
        </table>
    
    
    EOF;

            $pdf->writeHTML($bloque4, false, false, false, false, '');

            $totalContado = number_format($totalContado, 2);
            $totalCredito = number_format($totalCredito, 2);
            
            $contador++;

            if ($numRenglon == $totalRenglones) {

                if (($contador ) % 2 == 0) {
                    $clase = 'style=" background-color:#ecf0f1; padding: 3px 4px 3px; ';
                } else {
                    $clase = 'style="background-color:white; padding: 3px 4px 3px; ';
                }


                $bloque4 = <<<EOF
    
                <table style="font-size:10px; padding:5px 10px;">

                    <tr>

                        <td  $clase width:70px; text-align:center">
                         
                        </td>


                        <td  $clase width:180px; text-align:center">
                          
                        </td>

                        <td $clase width:90px; text-align:center">
                      
                            
                        </td>

                        <td $clase width:80px; text-align:center">
                          
                        </td>

                        <td $clase width:100px; text-align:left">
                       
                    </td>

                        <td $clase width:150px; text-align:center">
                       
                        </td>

                        <td $clase width:100px; text-align:left">
                        
                        </td>

                        <td $clase width:100px; text-align:right">
                        $totalCredito
                        </td>

                        <td $clase width:100px; text-align:right">
                        $totalContado
                        </td>




                    </tr>

                </table>
    
    
            EOF;

                $pdf->writeHTML($bloque4, false, false, false, false, '');
            }
        }


        /**
         * Observaciones
         */
        $bloque3 = <<<EOF

        <table style="font-size:10px; padding:5px 10px;">
    
            <tr>
    
            <td style="width: 970px; background-color:#ecf0f1; padding: 4px 4px 4px; font-weight:bold;  text-align:center">OBSERVACIONES</td>

            </tr>
                        
            <tr>
    
            <td style="width: 970px; text-align:center">   $arqueoCaja[observaciones] </td>
              
            </tr>
    
        </table>
    
    EOF;

        $pdf->writeHTML($bloque3, false, false, false, false, '');

        if ($isMail == 0) {
            ob_end_clean();
            $this->response->setHeader("Content-Type", "application/pdf");
            $pdf->Output('arquoCaja.pdf', 'I');
        } else {

            $attachment = $pdf->Output('arquoCaja.pdf', 'S');

            return $attachment;
        }


        //============================================================+
        // END OF FILE
        //============================================================+
    }

}
