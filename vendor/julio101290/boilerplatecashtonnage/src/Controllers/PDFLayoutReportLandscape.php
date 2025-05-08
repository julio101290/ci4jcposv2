<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace julio101290\boilerplatecashtonnage\Controllers;

/**
 * Description of PDFLayout
 *
 * @author hp
 */
class PDFLayoutReportLandscape extends \TCPDF {

    public $nombreEmpresa = "";
    public $direccion = "";
    public $usuario = "";
    public $nombreDocumento = "";
    public $logo = "";
    public $telefono = "";
    public $email = "";
    public $fechaHumanizada = "";
    public $folio = "";
    public $guardiaTurno = "";
    public $recibe1 = "";
    public $recibe2 = "";

    public function __construct() {
        parent::__construct();
    }

    public function Header() {
        $fecha = date('d/m/Y');

        /*
          $documento = "Hoja de Inspeccion";
          $logo = ROOTPATH."public/logo.png";

          $direccion1 = "Ave. Estrella Sadhala No. 204, Santiago";
          $telefono1 = "(809)-724-4300";

          $direccion2 = "Ave. Charles Summer No. 21, Santo Domingo";
          $telefono2 = "(809)-566-6191";

          $email = "ohtsudelcaribe@gmail.com";
         */

        $direccion = $this->direccion;
        $telefono = $this->telefono;
        $email = $this->email;
        $logo = $this->logo;



        //$this->writeHTML($fecha, false, false, false, false, 'L');
        $this->SetFont('dejavusans', 'B', 14);
        $this->writeHTML($this->nombreDocumento, true, false, false, false, 'C');

        $this->SetFont('dejavusans', '', 12);

        $this->writeHTML($this->nombreEmpresa, true, false, false, false, 'C');
        $this->Image($logo, 15, 6, 25, '', 'png', '', 'T', false, 300, '', false, false, 0, false, false, false);

        $this->SetY(16);
        $this->writeHTML($this->direccion, true, false, false, false, 'C');

        $this->Image($logo, 15, 6, 25, '', 'png', '', 'T', false, 300, '', false, false, 0, false, false, false);

        $this->SetFont('dejavusans', 'B', 12);
        $this->SetY(25);
        $this->Cell(200, 25, lang('arqueoCajaReport.boxCut').' ', 0, false, 'C', 0, '', 0, false, 'M', 'M');

        $this->SetY(25);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(250, 25, $this->folio, 0, false, 'C', 0, '', 0, false, 'M', 'M');

        $this->SetFont('dejavusans', '', 12);
        $this->SetY(25);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(380, 25, $this->fechaHumanizada, 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {

        /**
         * 
         * Entrega
         */
        $this->SetY(-23);
        // Set font
        $this->SetFont('helvetica', 'B', 8);
        // Page number
        $this->SetX(0);
        $this->Cell(100, 10, "_______________________________________", 0, false, 'C', 0, '', 0, false, 'T', 'M');
        // Position at 15 mm from bottom




        $this->SetY(-20);
        // Set font
        $this->SetFont('helvetica', 'B', 8);
        // Page number
        $this->SetX(0);
        $this->Cell(100, 10, lang('arqueoCajaReport.delivery').": ". $this->guardiaTurno, 0, false, 'C', 0, '', 0, false, 'T', 'M');
        
        
        


        /**
         * 
         * RECIBE
         */
        $this->SetY(-23);
        // Set font
        $this->SetFont('helvetica', 'B', 8);
        // Page number
        $this->SetX(100);
        $this->Cell(100, 10, "_______________________________________", 0, false, 'C', 0, '', 0, false, 'T', 'M');
        // Position at 15 mm from bottom


        $this->SetY(-20);
        // Set font
        $this->SetFont('helvetica', 'B', 8);
        // Page number
        $this->SetX(100);
        $this->Cell(100, 10, lang('arqueoCajaReport.receive').": ". $this->recibe1, 0, false, 'C', 0, '', 0, false, 'T', 'M');
        
        
        
        
        
            /**
         * 
         * RECIBE
         */
        $this->SetY(-23);
        // Set font
        $this->SetFont('helvetica', 'B', 8);
        // Page number
        $this->SetX(200);
        $this->Cell(100, 10, "_______________________________________", 0, false, 'C', 0, '', 0, false, 'T', 'M');
        // Position at 15 mm from bottom


        $this->SetY(-20);
        // Set font
        $this->SetFont('helvetica', 'B', 8);
        // Page number
        $this->SetX(200);
        $this->Cell(100, 10,  lang('arqueoCajaReport.receive1').":".$this->recibe2, 0, false, 'C', 0, '', 0, false, 'T', 'M');
        
        
        
        
        

        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, $this->nombreDocumento . " " . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }

}
