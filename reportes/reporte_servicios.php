<?php
require('../fdpf/fpdf.php');
include '../servidor/conexion.php';
include '../servidor/funciones_generales.php';
$conexion = conectarse();

class PDF extends FPDF
{
    
    
     var $widths;
    var $aligns;

    function SetWidths($w)
    {
        //Set the array of column widths
        $this->widths=$w;
    }
    function Header()
    {           
        ////////////header/////////////////        
        $this->AddFont('Amble-Regular');
        $this->SetFont('Amble-Regular','U',22);        
        $this->Image('../images/logo2.fw.png', 15, 2, 20, 20, 'PNG');
        $this->MultiCell(180, 1, utf8_decode('CUERPO DE BOMBEROS'), 0, 'C');    
        $this->SetFont('Amble-Regular','U',20);
        $this->MultiCell(180, 14, utf8_decode('COTACACHI'), 0, 'C');    
        $this->Image('../images/logo2.fw.png', 175, 2, 20, 20, 'PNG');
        $this->SetDrawColor(180,180,180);
        $this->Line(5,25,205,25);        
        $this->Ln(11);
        $this->SetFont('Amble-Regular','U',14);        
        $this->Text(70,32,'SERVICIOS ADMINISTRATIVOS',0,'C', 0);
        $this->SetX(10);
        $this->SetFont('Amble-Regular','',12);        
        $this->SetDrawColor(0,0,0);        
        $this->Cell(20,7,utf8_decode("Código"),1,0,'C', 0);
        $this->Cell(175,7,utf8_decode("Descripción"),1,0,'C', 0);
        $this->Ln(8);
    }   
    function Footer()
    {        
        $this->SetY(-15);        
        $this->SetFont('Arial','I',10);        
        $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
    } 
}
date_default_timezone_set('America/Guayaquil');
$fecha=date('Y-m-d H:i:s', time());   

$pdf = new PDF('P','mm','a4');
$pdf->AddPage();
//$pdf->SetMargins(0,0,0,0);
$pdf->AliasNbPages();
$pdf->AddFont('Amble-Regular');
/////////////
$pdf->SetFont('Amble-Regular', '', 10);
$pdf->SetWidths(array(20, 120));//TAMAÑOS DE LA TABLA DE DETALLES PRODUCTOS
$pdf->SetFillColor(85, 107, 47);
$sql = pg_query("select id_servicio,nombre_servicio from servicios_administrativos");
while($fila = pg_fetch_row($sql)){    
    $pdf->SetX(10);    
    $pdf->Cell(20,7,maxCaracter(utf8_decode($fila[0]),2),1,0,'C', 0);
    $pdf->Cell(175,7,maxCaracter(utf8_decode($fila[1]),70),1,0,'L', 0);    
    $pdf->Ln(7);    
}
$pdf->Output();
?>