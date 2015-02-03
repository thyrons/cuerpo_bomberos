<?php    
    require_once("../dompdf/dompdf_config.inc.php");
    include '../servidor/conexion.php';
    include '../servidor/funciones_generales.php';
    $conexion = conectarse();   
    $sql = "select nombre_proveedor,ruc_proveedor,nro,nro1,nro_factura,nombre_usuario,fecha,fecha_cancelacion,empresa,base12,base0,iva12,total from factura_compra,usuario,tipo_pago where id_fc = '$_GET[id]' and factura_compra.id_usuario = usuario.id_usuario and tipo_pago.id_tipo_pago = factura_compra.id_tipo_pago";    
    $sql = reporte($conexion,$sql);     
    $subtotal = $sql[9];   
    $iva0 = $sql[10];
    $iva12 = $sql[11];
    $total = $sql[12];
    $html = '<html>    
    <script type="text/javascript"> 
        this.print(); 
    </script>
    <head>
    	<link rel="stylesheet" href="../css/sistema/reportes.css" type="text/css" /> 
    </head>
    <body>
    	<div id="cabecera">
            <div id="imagen">
                <img src="../images/logo2.fw.png" />
            </div>            
            <div style="width:74%;border:solid 0px;display:inline-block;margin:0px;padding:0px;height:100px;">
                <h3 style="font-size:18px;width:70%;text-align:center;border:solid 0px;margin:0px;">CUERPO DE BOMBERO</h3>            
                <h3 style="font-size:30px;width:70%;text-align:center;border:solid 0px;margin:0px;">COTACACHI</h3>                            
                <h3 style="font-size:16px;width:70%;text-align:center;border:solid 0px;margin:0px;">FACTURA COMPRA</h3>            
                
            </div>            
    	</div>                           
        <div style="margin-top:20px;">            
            <table border=0>
            <tr>                               
                <td style="width:75px;"><b>PROVEEDOR:</b></td>    
                <td style="width:280px;"><h5 style="height:12px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[0],42).'</h5>
                </td>                
                <td style="width:105px;"><b>RUC:</b></td>    
                <td style="width:260px;"><h5 style="height:12px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[1],35).'</h5>
                </td>                
            </tr>      
            <tr>                               
                <td style="width:75px;"><b>NRO FACTURA:</b></td>    
                <td style="width:280px;"><h5 style="height:12px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[2]."-".$sql[3]."-".$sql[4],42).'</h5>
                </td>                
                <td style="width:105px;"><b>RESPONSABLE:</b></td>    
                <td style="width:260px;"><h5 style="height:12px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[5],35).'</h5>
                </td>                
            </tr>         
            <tr>                               
                <td style="width:75px;"><b>F. FACTURA:</b></td>    
                <td style="width:280px;"><h5 style="height:12px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[6],42).'</h5>
                </td>                
                <td style="width:105px;"><b>F. CANCELACIÓN:</b></td>    
                <td style="width:260px;"><h5 style="height:12px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[7],35).'</h5>
                </td>                
            </tr>      
            <tr>                               
                <td style="width:75px;"><b>EMPRESA:</b></td>    
                <td style="width:280px;"><h5 style="height:12px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[8],42).'</h5>
                </td>                                       
            </tr>         
            </table>   
        </div>
        <div style="margin-top:20px;text-align:center;">  
            <b>DETALLE FACTURA</b>
        </div>
        <div style="margin-top:10px;">  
            <table border=1>
                <tr>                     
                    <td style="width:105px;text-align:center"><b>CANTIDAD:</b></td>    
                    <td style="width:350px;text-align:center"><b>DETALLE:</b></td>    
                    <td style="width:105px;text-align:center"><b>VALOR:</b></td>    
                    <td style="width:105px;text-align:center"><b>TOTAL:</b></td>    
                </tr>';
        $sql = "select cantidad,nombre_producto,precio_u,precio_total from detalles_fc,productos where id_fc = '$_GET[id]' and detalles_fc.id_producto = productos.id_producto";
        $sql = pg_query($sql);
        while($row = pg_fetch_row($sql)){
            $html.='
                <tr> 
                    <td style="width:155px;text-align:center">'.$row[0].'</td>    
                    <td style="width:250px;text-align:center">'.$row[1].'</td>    
                    <td style="width:105px;text-align:center">'.$row[2].'</td>    
                    <td style="width:105px;text-align:center">$ '.$row[3].'</td>    
                </tr>'; 
        }                        
        $html.='</table>
        </div>        
        <table border=0>
            <tr> 
                <td style="width:638px;text-align:right"><b>SUBTOTAL</b></td>    
                <td style="width:100px;text-align:center"><b>'.$subtotal.'</b></td>    
            </tr>
            <tr> 
                <td style="width:638px;text-align:right"><b>IVA 0%</b></td>    
                <td style="width:100px;text-align:center"><b>'.$iva0.'</b></td>    
            </tr>
            <tr> 
                <td style="width:638px;text-align:right"><b>IVA 12%</b></td>    
                <td style="width:100px;text-align:center"><b>'.$iva12.'</b></td>    
            </tr>
            <tr> 
                <td style="width:638px;text-align:right"><b>TOTAL</b></td>    
                <td style="width:100px;text-align:center"><b>'.$total.'</b></td>    
            </tr>
        </table>
    </body>
    </html>';	
	$dompdf = new DOMPDF();
	$html=utf8_decode($html);
	$dompdf->load_html($html);
	$dompdf->set_paper("A4","portrait");
	$dompdf->render();
	//$dompdf->stream("informeGeneral.pdf");
	$dompdf->stream('reporte_cxc.pdf',array('Attachment'=>0));
?>