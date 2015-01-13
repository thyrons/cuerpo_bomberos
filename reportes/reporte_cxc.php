<?php    
    require_once("../dompdf/dompdf_config.inc.php");
    include '../servidor/conexion.php';
    include '../servidor/funciones_generales.php';
    $conexion = conectarse();   
    $sql = "select total_factura,fecha_credito,c_x_cobrar.fecha_cancelacion,nro,nro1,nro_factura,sutotal,iva0,iva12,total,nombre_propietario,ruc_propietario,nombre_usuario,direccion_propietario,saldo from c_x_cobrar,emision_permisos,propietario,usuario where c_x_cobrar.id_emsion_permisos = emision_permisos.id_emision and c_x_cobrar.id_usuario = usuario.id_usuario and emision_permisos.id_propietario = propietario.id_propietario and id_cxc = '$_GET[id]'";    
    $sql = reporte($conexion,$sql);    
    $saldo = $sql[14];
    $html = '<html>
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
                <h3 style="font-size:16px;width:70%;text-align:center;border:solid 0px;margin:0px;">CANCELACIÓN CUENTAS POR COBRAR</h3>            
                
            </div>            
    	</div>                           
        <div style="margin-top:20px;">            
            <table border=0>
            <tr>                               
                <td style="width:75px;"><b>CLIENTE:</b></td>    
                <td style="width:280px;"><h5 style="height:12px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[10],42).'</h5>
                </td>                
                <td style="width:105px;"><b>DIR:</b></td>    
                <td style="width:260px;"><h5 style="height:12px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[13],35).'</h5>
                </td>                
            </tr>      
            <tr>                               
                <td style="width:75px;"><b>NRO FACTURA:</b></td>    
                <td style="width:280px;"><h5 style="height:12px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[3]."-".$sql[4]."-".$sql[5],42).'</h5>
                </td>                
                <td style="width:105px;"><b>RESPONSABLE:</b></td>    
                <td style="width:260px;"><h5 style="height:12px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[12],35).'</h5>
                </td>                
            </tr>         
            <tr>                               
                <td style="width:75px;"><b>F. CRÉDITO:</b></td>    
                <td style="width:280px;"><h5 style="height:12px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[1],42).'</h5>
                </td>                
                <td style="width:105px;"><b>F. CANCELACIÓN:</b></td>    
                <td style="width:260px;"><h5 style="height:12px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[2],35).'</h5>
                </td>                
            </tr>      
            <tr>                               
                <td style="width:75px;"><b>T. FACTURA:</b></td>    
                <td style="width:280px;"><h5 style="height:12px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[0],42).'</h5>
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
                    <td style="width:155px;text-align:center"><b>FECHA PAGO</b></td>    
                    <td style="width:155px;text-align:center"><b>FORMA PAGO:</b></td>    
                    <td style="width:305px;text-align:center"><b>DETALLE:</b></td>    
                    <td style="width:105px;text-align:center"><b>VALOR:</b></td>    
                </tr>';
        $sql = "select fecha_abono,forma_pago,detalle,valor from detalles_cxc where id_cxc = '$_GET[id]'";
        $sql = pg_query($sql);
        while($row = pg_fetch_row($sql)){
            $html.='
                <tr> 
                    <td style="width:155px;text-align:center">'.$row[0].'</td>    
                    <td style="width:155px;text-align:center">'.$row[1].'</td>    
                    <td style="width:305px;text-align:center">'.$row[2].'</td>    
                    <td style="width:105px;text-align:center">$ '.$row[3].'</td>    
                </tr>'; 
        }                        
        $html.='</table>
        </div>
        <div style="margin-top:0px;">  
            <table border=0>
                <tr> 
                <td style="width:627px;text-align:right"><b>SALDO TOTAL</b></td>    
                <td style="width:105px;text-align:center"><b>$'.$saldo.'</b></td>    
                </tr>
            </table>
        </div>
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