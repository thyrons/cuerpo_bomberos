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
        $this->Text(70,32,'LISTA DE EMPRESAS',0,'C', 0);
        $this->SetX(10);
        $this->SetFont('Amble-Regular','',10);        
        $this->SetDrawColor(0,0,0);        
        $this->Cell(25,7,utf8_decode("EMPRESA"),1,0,'C', 0);
        $this->Cell(20,7,utf8_decode("DIRECCIÓN"),1,0,'C', 0);
        $this->Cell(30,7,utf8_decode("RUC"),1,0,'C', 0);
        $this->Cell(25,7,utf8_decode("ACTIVIDAD"),1,0,'C', 0);
        $this->Cell(25,7,utf8_decode("PARROQUIA"),1,0,'C', 0);
        $this->Cell(20,7,utf8_decode("CAPITAL G."),1,0,'C', 0);
        $this->Cell(20,7,utf8_decode("TELÉFONO"),1,0,'C', 0);
        $this->Cell(30,7,utf8_decode("PROPIETARIO"),1,0,'C', 0);
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
$sql = pg_query("select nombre_empresa,direccion_empresa,ruc_empresa,actividad_empresa,parroquia,capital_giro,telefono_empresa,nombre_propietario from empresa,propietario where empresa.id_propietario = propietario.id_propietario");
while($fila = pg_fetch_row($sql)){    
    $pdf->SetX(10);    
    $pdf->Cell(25,7,maxCaracter(utf8_decode($fila[0]),10),1,0,'C', 0);
    $pdf->Cell(20,7,maxCaracter(utf8_decode($fila[1]),10),1,0,'L', 0);    
    $pdf->Cell(30,7,maxCaracter(utf8_decode($fila[2]),13),1,0,'L', 0);  
    $pdf->Cell(25,7,maxCaracter(utf8_decode($fila[3]),10),1,0,'L', 0);  
    $pdf->Cell(25,7,maxCaracter(utf8_decode($fila[4]),10),1,0,'L', 0);      
    $pdf->Cell(20,7,maxCaracter(utf8_decode($fila[5]),8),1,0,'L', 0);      
    $pdf->Cell(20,7,maxCaracter(utf8_decode($fila[6]),9),1,0,'L', 0);      
    $pdf->Cell(30,7,maxCaracter(utf8_decode($fila[7]),15),1,0,'L', 0);      
    $pdf->Ln(7);    
}
$pdf->Output();
?>