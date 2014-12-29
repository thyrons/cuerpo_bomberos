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

    function SetAligns($a)
    {
        //Set the array of column alignments
        $this->aligns=$a;
    }

    function Row($data)
    {
        //Calculate the height of the row
        $nb=0;
        for($i=0;$i<count($data);$i++)
            $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
        $h=5*$nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for($i=0;$i<count($data);$i++)
        {
            $w=$this->widths[$i];
            $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            //Save the current position
            $x=$this->GetX();
            $y=$this->GetY();
            //Draw the border
            
            //$this->Rect($x,$y,$w,$h);

            $this->MultiCell( $w,5,$data[$i],0,$a,false);
            //Put the position to the right of the cell
            $this->SetXY($x+$w,$y);
        }
        //Go to the next line
        $this->Ln($h);
    }
    

    function CheckPageBreak($h)
    {
        //If the height h would cause an overflow, add a new page immediately
        if($this->GetY()+$h>$this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }

    function NbLines($w, $txt)
{
    //Computes the number of lines a MultiCell of width w will take
    $cw=&$this->CurrentFont['cw'];
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
    $s=str_replace("\r", '', $txt);
    $nb=strlen($s);
    if($nb>0 and $s[$nb-1]=="\n")
        $nb--;
    $sep=-1;
    $i=0;
    $j=0;
    $l=0;
    $nl=1;
    while($i<$nb)
    {
        $c=$s[$i];
        if($c=="\n")
        {
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
            continue;
        }
        if($c==' ')
            $sep=$i;
        $l+=$cw[$c];
        if($l>$wmax)
        {
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
            }
            else
                $i=$sep+1;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
        }
        else
            $i++;
    }
    return $nl;
}

    
}
date_default_timezone_set('America/Guayaquil');
$fecha=date('Y-m-d H:i:s', time());   

$pdf = new PDF('L','mm',array(210,170));
$pdf->AddPage();
$pdf->SetMargins(0,0,0,0);
$pdf->AddFont('Amble-Regular');
$pdf->SetFont('Amble-Regular','',14);
$sql = pg_query("select nombre_propietario,telefono_propietario,fecha,ruc_propietario,direccion_propietario,sutotal,iva0,iva12,total from emision_permisos,usuario,propietario where emision_permisos.id_propietario = propietario.id_propietario and emision_permisos.id_usuario = usuario.id_usuario and id_emision = '$_GET[id]'");
$subtotal = 0;
$iva12= 0;
$iva0 = 0;
$total = 0;
$gerente = "";
$ruc = "";

while($row = pg_fetch_row($sql)){        
    $fecha = data_text($row[2]);
    $fecha2 = $row[2];
    $pdf->SetFont('Amble-Regular', '', 11);    
    $pdf->Text(40, 46, utf8_decode('' . strtoupper($row[0])), 0, 'C', 0); ////CLIENTE (X,Y) 
    $gerente = strtoupper($row[0]);
    $ruc = strtoupper($row[3]);
    $pdf->Text(140, 46, utf8_decode('' . strtoupper($row[1])), 0, 'C', 0); ////TELEFONO (X,Y)    
    $pdf->Text(40, 52, utf8_decode('' . strtoupper($fecha)), 0, 'C', 0); ///FECHA (X,Y)  
    $pdf->Text(120, 52, utf8_decode('' . strtoupper($row[3])), 0, 'C', 0); ///RUC CI(X,Y)    
    $pdf->Text(40, 58, utf8_decode('' . strtoupper($row[4])), 0, 'C', 0); ///DIRECCION(X,Y)             
    $pdf->Ln(1);
    $subtotal = $row[5];
    $iva12= $row[7];
    $iva0 = $row[6];
    $total = $row[8];
}
$pdf->SetY(70);///PARA LOS DETALLES
$pdf->SetX(18);
$pdf->SetFont('Amble-Regular', '', 11);
$pdf->SetWidths(array(20, 120, 30, 30));//TAMAÑOS DE LA TABLA DE DETALLES PRODUCTOS
$pdf->SetFillColor(85, 107, 47);
$sql = pg_query("select tipo,id_informe,id_tasa,id_producto,id_producto,cantidad,precio_unitario,precio_total,detalle from detalles_emision WHERE id_emsion = '$_GET[id]'");
$numfilas = pg_num_rows($sql);
for ($i = 0; $i < $numfilas; $i++) {
    $pdf->SetX(18);
    $fila = pg_fetch_row($sql);
    $pdf->SetFont('Amble-Regular', '', 11);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0);     
    if($fila[0] == 'INFORME GENERAL'){
        $pdf->Row(array(utf8_decode($fila[5]), utf8_decode($fila[8]), number_format($fila[6],2), number_format($fila[7],2)));    
    }else{
        if($fila[0] == 'TASA DE SERVICIO'){
            $pdf->Row(array(utf8_decode($fila[5]), utf8_decode($fila[0]), number_format($fila[6],2), number_format($fila[7],2)));    
        }else{
            $pdf->Row(array(utf8_decode($fila[5]), utf8_decode($fila[8]), number_format($fila[6],2), number_format($fila[7],2)));    
        }    
    }        
}
$pdf->SetFont('Amble-Regular', '', 11);
$pdf->Text(192, 155, utf8_decode('' . strtoupper($subtotal)), 0, 'C', 0); ////SUBTOTAL (X,Y)    
$pdf->Text(192, 160, utf8_decode('' . strtoupper($iva12)), 0, 'C', 0); ////IVA12 (X,Y)    
$pdf->Text(192, 165, utf8_decode('' . strtoupper($iva0)), 0, 'C', 0); ///IVA0 (X,Y)  
$pdf->Text(192, 170, utf8_decode('' . strtoupper($total)), 0, 'C', 0); ///TOTAL(X,Y)    

/*nueva pagina */
$sql = pg_query("select id_informe from  detalles_emision where id_emsion = '$_GET[id]'");
$id_permiso = 0;
while($row = pg_fetch_row($sql)){
    if($row[0] != ''){
        $id_permiso = $row[0];
    }
}
if($id_permiso > 0){
    $pdf->AddPage();    
    $sql = pg_query("select nombre_empresa,actividad_empresa from informe_general,empresa where empresa.id_empresa = informe_general.id_empresa and id_informe_general = '$id_permiso'");
    while($row = pg_fetch_row($sql)){
        $pdf->SetFont('Amble-Regular', '', 11);
        $pdf->Text(60, 20, utf8_decode('' . maxCaracter($row[0],80)), 0, 'C', 0); ////NOMBRE LOCAL (X,Y)    
        $pdf->Text(60, 28, utf8_decode('' . maxCaracter($gerente,80)), 0, 'C', 0); ////GERENTE (X,Y)    
        $pdf->Text(60, 36, utf8_decode('' . maxCaracter($ruc,80)), 0, 'C', 0); ////RUC/CI (X,Y)    
        $pdf->Text(60, 44, utf8_decode('' . maxCaracter($row[1],80)), 0, 'C', 0); ////ACTIVIDAD (X,Y)    
        $pdf->Text(60, 52, utf8_decode('' . $total), 0, 'C', 0); ////COSTO (X,Y)    
    } 
    $pdf->Text(60, 120, utf8_decode('' . data_text_dia($fecha2)), 0, 'C', 0); ////FECHA PERMISO DIA (X,Y)    
    $pdf->Text(80, 120, utf8_decode('' . data_text_mes($fecha2)), 0, 'C', 0); ////FECHA PERMISO MES (X,Y)    
    $pdf->Text(120, 120, utf8_decode('' . substr(data_text_anio($fecha2),2,4)), 0, 'C', 0); ////FECHA PERMISO MES (X,Y)    

}







$pdf->Output();
?>