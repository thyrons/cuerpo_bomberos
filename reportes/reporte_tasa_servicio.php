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
        $this->Text(60,32,'TASA DE SERVICIOS ADMINISTRATIVOS',0,'C', 0);        
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
$sql = pg_query("select id_servicio,nombre_servicio from servicios_administrativos");
$id_servicio = 0;
while($fila = pg_fetch_row($sql)){    
    $pdf->SetFont('Amble-Regular', '', 14);
    $pdf->SetX(10);    
    $pdf->Cell(200,7,"SERVICIO: ".maxCaracter(utf8_decode($fila[1]),50),0,0,'L', 0);
    $id_servicio = $fila[0];
    $pdf->Ln(7);    
    $pdf->SetX(10);    
    $pdf->SetFont('Amble-Regular', '', 10);
    $pdf->Cell(20,7,utf8_decode("Código"),1,0,'C', 0);
    $pdf->Cell(75,7,utf8_decode("Descripción"),1,0,'C', 0);    
    $pdf->Cell(25,7,utf8_decode("Pequeño"),1,0,'C', 0);    
    $pdf->Cell(25,7,utf8_decode("Mediano"),1,0,'C', 0);    
    $pdf->Cell(25,7,utf8_decode("Grande"),1,0,'C', 0);    
    $pdf->Cell(25,7,utf8_decode("S. Grande"),1,0,'C', 0);    
    $sql_1 = pg_query("SELECT id_tasa_servicio,nombre_tasa,little,medium,big,sbig from tasa_servicio where id_servicio = '$id_servicio'");
    while($row = pg_fetch_row($sql_1)){    
        $pdf->Ln(7);    
        $pdf->SetX(10);    
        $pdf->Cell(20,7,maxCaracter(utf8_decode($row[0]),10),1,0,'C', 0);
        $pdf->Cell(75,7,maxCaracter(utf8_decode($row[1]),10),1,0,'C', 0);            
        $pdf->Cell(25,7,maxCaracter(utf8_decode($row[2]),10),1,0,'C', 0);            
        $pdf->Cell(25,7,maxCaracter(utf8_decode($row[3]),10),1,0,'C', 0);            
        $pdf->Cell(25,7,maxCaracter(utf8_decode($row[4]),10),1,0,'C', 0);            
        $pdf->Cell(25,7,maxCaracter(utf8_decode($row[5]),10),1,0,'C', 0);                    
    }
    $pdf->Ln(12);    

}
$pdf->Output();
?>