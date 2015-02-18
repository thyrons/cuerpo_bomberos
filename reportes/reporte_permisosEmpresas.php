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
        $this->SetDrawColor(0,0,0);
        $this->Line(5,25,205,25);        
        $this->Ln(11);
        $this->SetFont('Amble-Regular','U',14);        
        $this->Text(80,32,'REPORTE DE PERMISOS',0,'C', 0);
        $this->SetX(10);
        $this->SetFont('Amble-Regular','',10);        
        $this->SetDrawColor(0,0,0);          
        $sql = pg_query("select id_empresa,nombre_empresa,representante_legal,nombre_propietario,telefono_empresa,ruc_empresa,actividad_empresa,parroquia,direccion_empresa from empresa,propietario where empresa.id_propietario = propietario.id_propietario and id_empresa = '$_GET[id]'");
        while($fila = pg_fetch_row($sql)){                
            $this->SetFont('Amble-Regular','',9);   
            $this->SetX(5);
            $this->Cell(100, 8, maxCaracter("EMPRESA: ".utf8_decode($fila[1]),50), 1,0, 'L',0);   
            $this->Cell(100, 8, maxCaracter("REPRESENTANTE: ".utf8_decode($fila[2]),50), 1,1, 'L',0);   
            $this->SetX(5);
            $this->Cell(100, 8, maxCaracter("PROPIETARIO: ".utf8_decode($fila[3]),50), 1,0, 'L',0);   
            $this->Cell(50, 8, maxCaracter("TEL.: ".utf8_decode($fila[4]),25), 1,0, 'L',0);   
            $this->Cell(50, 8, maxCaracter("RUC/CI.: ".utf8_decode($fila[5]),23), 1,1, 'L',0);   
            $this->SetX(5);
            $this->Cell(65, 8, maxCaracter("ACTVIDAD: ".utf8_decode($fila[6]),30), 1,0, 'L',0);   
            $this->Cell(65, 8, maxCaracter("PARROQUIA.: ".utf8_decode($fila[7]),30), 1,0, 'L',0);   
            $this->Cell(70, 8, maxCaracter("DIRECCION.: ".utf8_decode($fila[8]),35), 1,1, 'L',0);            
            $this->Ln(2);
            $this->SetX(5);
            $this->Cell(20,7,utf8_decode("FECHA"),1,0,'C', 0);
            $this->Cell(30,7,utf8_decode("REGISTRO"),1,0,'C', 0);
            $this->Cell(25,7,utf8_decode("TIPO"),1,0,'C', 0);
            $this->Cell(25,7,utf8_decode("VALOR TASA"),1,0,'C', 0);            
            $this->Cell(80,7,utf8_decode("RESOLUCIÓN"),1,0,'C', 0);       
            $this->Cell(20,7,utf8_decode("PERMISO"),1,0,'C', 0);       
            $this->Ln(7);                
        }
        $this->Ln(0);
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
$pdf->SetFillColor(35, 30, 30,30,30,30);
$sql = pg_query("select nro_registro,tipo_inspeccion,valor_tasa,fecha_general,para_extender,permiso from informe_general,informe_confirmar,empresa where informe_general.id_empresa = empresa.id_empresa and informe_general.id_informe_general =informe_confirmar.id_informe_general and empresa.id_empresa = '$_GET[id]'");
while($fila = pg_fetch_row($sql)){    
    $pdf->SetFont('Amble-Regular', '', 8);
    $pdf->SetX(5);    
    $pdf->Cell(20,7,maxCaracter(utf8_decode($fila[3]),10),1,0,'C', 0);  
    $pdf->Cell(30,7,maxCaracter(utf8_decode($fila[0]),13),1,0,'C', 0);
    $pdf->Cell(25,7,maxCaracter(utf8_decode($fila[1]),13),1,0,'C', 0);    
    $pdf->Cell(25,7,maxCaracter(utf8_decode($fila[2]),8),1,0,'C', 0);      
    $pdf->Cell(80,7,maxCaracter(utf8_decode($fila[4]),45),1,0,'L', 0);      
    $pdf->Cell(20,7,maxCaracter(utf8_decode($fila[5]),9),1,0,'C', 0);          
    $pdf->Ln(7);    
    
}
$pdf->Output();
?>