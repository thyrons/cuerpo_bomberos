<?php    
    require_once("../dompdf/dompdf_config.inc.php");
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
                <h3 style="font-size:20px;width:30%;font-weight:normal;display:inline-block;text-align:center;border:solid 0px;margin:0px;">00001529</h3>            
                <h3 style="font-size:16px;width:70%;text-align:center;border:solid 0px;margin:0px;">INFORME GENERAL DE INSPECCIÓN</h3>            
                
            </div>            
    	</div>
        <div id="general">            
            <table border=0>
            <tr>                               
                <td style="width:75px;">Razón Social:</td>    
                <td style="width:175px;"><h5 style="border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">as</h5></td>
                <td style="width:70px;">Área total m2:</td>    
                <td style="width:40px;"><h5 style="text-align:center;border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">as</h5></td>
                <td style="width:60px;">Área útil m2:</td>
                <td style="width:40px;"><h5 style="text-align:center;border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">as</h5></td>
                <td style="width:20px;">PE:</td>
                <td style="width:35px;"><h5 style="text-align:center;border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">as</h5></td>
                <td style="width:20px;">MMR:</td>
                <td style="width:35px;"><h5 style="text-align:center;border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">as</h5></td>
                <td style="width:40px;">Riesgo:</td>
                <td style="width:60px;"><h5 style="border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">as</h5></td>                
            </tr>            
            </table>   
            <table border=0>
            <tr>                               
                <td style="width:50px;">Actividad:</td>    
                <td style="width:200px;"><h5 style="border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">as</h5></td>
                <td style="width:120px;">Propietario/Resp Legal:</td>    
                <td style="width:220px;"><h5 style="border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">as</h5></td>
                <td style="width:30px;">R.U.C:</td>
                <td style="width:95px;"><h5 style="border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">1002910345001</h5></td>                
            </tr>            
            </table> 
            <table border=0>
            <tr>                               
                <td style="width:50px;">Dirección:</td>    
                <td style="width:174px;"><h5 style="border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">as</h5></td>
                <td style="width:80px;">Visible/Legible:</td>    
                <td style="width:160px;"><h5 style="border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">as</h5></td>
                <td style="width:60px;">Ubicación:</td>
                <td style="width:70px;"><h5 style="border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">as</h5></td>     
                <td style="width:22px;">Telf.:</td>
                <td style="width:90px;"><h5 style="border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">as</h5></td>                
            </tr>            
            </table>     
            <table border=0>
            <tr>                               
                <td style="width:70px;">Solicitud N.:</td>    
                <td style="width:100px;"><h5 style="border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">as</h5></td>
                <td style="width:110px;">Nro. Ocupantes Fijos:</td>    
                <td style="width:90px;"><h5 style="border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">as</h5></td>
                <td style="width:60px;">Flotantes:</td>
                <td style="width:90px;"><h5 style="border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">as</h5></td>     
                <td style="width:90px;">Aforo (Ord. 122):</td>
                <td style="width:95px;"><h5 style="border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">as</h5></td>                
            </tr>            
            </table>     
            <table border=0>
            <tr>                               
                <td style="width:151px;">TIPO DE CONSTRUCCIÓN:</td>    
                <td style="width:260px;"><h5 style="border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">as</h5></td>
                <td style="width:120px;">TECHO / CUBIERTA:</td>    
                <td style="width:200px;"><h5 style="border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">as</h5></td>                
            </tr>            
            </table>  
            <table border=0>
            <tr>                               
                <td style="width:80px;">VENTILACIÓN:</td>    
                <td style="width:10px;"><h5 style="height:13px;width:10px;border:solid 1px;margin:0px;text-align:center;">x</h5> </td>
                <td style="width:50px;">Mecánica</td>    
                <td style="width:10px;"><h5 style="height:13px;width:10px;border:solid 1px;margin:0px;text-align:center;">x</h5> </td>
                <td style="width:55px;">Funcional</td>    
                <td style="width:10px;"><h5 style="height:13px;width:10px;border:solid 1px;margin:0px;text-align:center;">x</h5> </td>
                <td style="width:70px;">No Funcional</td>    
                <td style="width:10px;"><h5 style="height:13px;width:10px;border:solid 1px;margin:0px;text-align:center;">x</h5> </td>
                <td style="width:70px;">Disposición:</td>    
                <td style="width:315px;"><h5 style="border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">as</h5></td>                    
            </tr>            
            </table> 
             <table border=0>
            <tr>                               
                <td style="width:60px;">Hora Inicio:</td>    
                <td style="width:45px;"><h5 style="border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">as</h5></td>
                <td style="width:60px;">Hora Final:</td>    
                <td style="width:45px;"><h5 style="border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">as</h5></td>
                <td style="width:40px;">Fecha:</td>    
                <td style="width:70px;"><h5 style="border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">as</h5></td>
                <td style="width:75px;">Inspección</td>    
                <td style="width:10px;"><h5 style="height:13px;width:10px;border:solid 1px;margin:0px;text-align:center;">x</h5> </td>
                <td style="width:90px;">Reinspección</td>    
                <td style="width:10px;"><h5 style="height:13px;width:10px;border:solid 1px;margin:0px;text-align:center;">x</h5> </td>
            </tr>            
            </table>                      
        </div>
        <div id="proteccion">  
            <h5 style="text-align:center;font-size:12px;margin:2px;">EQUIPO DE PROTECCIÓN CONTRA INCENDIOS</h5>   
            <table border=0>
            <tr>                               
                <td style="width:151px;">EXTINTORES</td>                    
            </tr>            
            <tr>                                                
                <td style="width:195px;">Conocimiento del uso de extintores</td>                    
                <td style="width:30px;">SI</td>    
                <td style="width:10px;"><h5 style="height:13px;width:10px;border:solid 1px;margin:0px;text-align:center;">x</h5> </td>
                <td style="width:30px;">NO</td>    
                <td style="width:10px;"><h5 style="height:13px;width:10px;border:solid 1px;margin:0px;text-align:center;">x</h5> </td>
                <td style="width:435px;text-align:right;">NA= No aplica (ubicar donde corresponda)</td>                    
            </tr>            
            </table>  
            <table border=1>
            <tr>
                <td style="width:90px;text-align:center;">AGENTE</td>    
                <td style="width:30px;text-align:center;">5</td>    
                <td style="width:30px;text-align:center;">10</td>    
                <td style="width:30px;text-align:center;">20</td>    
                <td style="width:30px;text-align:center;">50+</td>    
                <td style="width:40px;text-align:center;">Oper.</td>    
                <td style="width:60px;text-align:center;">No Oper.</td>    
                <td style="width:60px;text-align:center;">Cumple Normativa</td>    
                <td style="width:260px;text-align:center;">DISPOSICIONES Lugar a ubicar los extintores por adquirir (si falta espacio en ANEXOS)</td>    
                <td style="width:30px;text-align:center;">Cant.</td>    
            </tr>
            <tr>
                <td style="width:90px;text-align:center;">Agua</td>    
                <td style="width:30px;text-align:center;">5</td>    
                <td style="width:30px;text-align:center;">10</td>    
                <td style="width:30px;text-align:center;">20</td>    
                <td style="width:30px;text-align:center;">50+</td>    
                <td style="width:40px;text-align:center;">Oper.</td>    
                <td style="width:60px;text-align:center;">No Oper.</td>    
                <td style="width:60px;text-align:center;">Cumple </td>    
                <td style="width:260px;text-align:center;">XOS)</td>    
                <td style="width:30px;text-align:center;">Cant.</td>    
            </tr>
            <tr>
                <td style="width:90px;text-align:center;">P.Q.S</td>    
                <td style="width:30px;text-align:center;">5</td>    
                <td style="width:30px;text-align:center;">10</td>    
                <td style="width:30px;text-align:center;">20</td>    
                <td style="width:30px;text-align:center;">50+</td>    
                <td style="width:40px;text-align:center;">Oper.</td>    
                <td style="width:60px;text-align:center;">No Oper.</td>    
                <td style="width:60px;text-align:center;">Cumple </td>    
                <td style="width:260px;text-align:center;">XOS)</td>    
                <td style="width:30px;text-align:center;">Cant.</td>    
            </tr>
            <tr>
                <td style="width:90px;text-align:center;">CO2</td>    
                <td style="width:30px;text-align:center;">5</td>    
                <td style="width:30px;text-align:center;">10</td>    
                <td style="width:30px;text-align:center;">20</td>    
                <td style="width:30px;text-align:center;">50+</td>    
                <td style="width:40px;text-align:center;">Oper.</td>    
                <td style="width:60px;text-align:center;">No Oper.</td>    
                <td style="width:60px;text-align:center;">Cumple </td>    
                <td style="width:260px;text-align:center;">XOS)</td>    
                <td style="width:30px;text-align:center;">Cant.</td>    
            </tr>
            <tr>
                <td style="width:90px;text-align:center;">Espuma</td>    
                <td style="width:30px;text-align:center;">5</td>    
                <td style="width:30px;text-align:center;">10</td>    
                <td style="width:30px;text-align:center;">20</td>    
                <td style="width:30px;text-align:center;">50+</td>    
                <td style="width:40px;text-align:center;">Oper.</td>    
                <td style="width:60px;text-align:center;">No Oper.</td>    
                <td style="width:60px;text-align:center;">Cumple </td>    
                <td style="width:260px;text-align:center;">XOS)</td>    
                <td style="width:30px;text-align:center;">Cant.</td>    
            </tr>
            <tr>
                <td style="width:90px;text-align:center;">Agentes LImpios</td>    
                <td style="width:30px;text-align:center;">5</td>    
                <td style="width:30px;text-align:center;">10</td>    
                <td style="width:30px;text-align:center;">20</td>    
                <td style="width:30px;text-align:center;">50+</td>    
                <td style="width:40px;text-align:center;">Oper.</td>    
                <td style="width:60px;text-align:center;">No Oper.</td>    
                <td style="width:60px;text-align:center;">Cumple </td>    
                <td style="width:260px;text-align:center;">XOS)</td>    
                <td style="width:30px;text-align:center;">Cant.</td>    
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
	$dompdf->stream('informeGeneral.pdf',array('Attachment'=>0));
?>