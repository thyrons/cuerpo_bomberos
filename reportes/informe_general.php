<?php    
    require_once("../dompdf/dompdf_config.inc.php");
    include '../servidor/conexion.php';
    include '../servidor/funciones_generales.php';
    $conexion = conectarse();
    $sql = "select informe_general.id_informe_general,permiso,empresa.id_empresa,nombre_empresa,ruc_empresa,representante_legal,actividad_empresa,parroquia,capital_giro,direccion_empresa,telefono_empresa,id_tasa,nombre_tasa,valor_tasa,area_util_m2,pe,mmr,riesgo,area_total_m2,visible_legible,solicitud_nro,nro_ocupantes_fijos,nro_flotantes,aforo,tipo_construccion,techo,ventilacion,disposicion,fecha_general,hora_inicio,hora_fin,tipo_inspeccion,extinto,agua,oper_1,no_oper_1,cumple_1,disposiciones_1,cant_1,pqs,oper_2,no_oper_2,cumple_2,disposiciones_2,cant_2,co2,oper_3,no_oper_3,cumple_3,disposiciones_3,cant_3,espuma,oper_4,no_oper_4,cumple_4,disposiciones_4,cant_4,agentes,oper_5,no_oper_5,cumple_5,disposiciones_5,cant_5,cant1,cumple1,cant_a1,lugar1,cant2,cumple2,cant_a2,lugar2,cant3,cumple3,cant_a3,lugar3,cant4,cumple4,cant_a4,lugar4,cant5,cumple5,cant_a5,lugar5,cant6,cumple6,cant_a6,lugar6,cant7,cumple7,cant_a7,lugar7,cant8,cumple8,cant_a8,lugar8,cant9,cumple9,cant_a9,lugar9,cant10,cumple10,cant_a10,lugar10,cant11,cumple11,cant_a11,lugar11,cant12,cumple12,cant_a12,lugar_12,cant_13,cumple13,cant_a13,lugar13,cant14,cumple14,cant_a14,lugar14,riesgo1,observacion1,riesgo2,observacion2,riesgo3,observacion3,riesgo4,observacion4,riesgo5,observacion5,riesgo6,observacion6,observacion7,alma1,alma2,tipo_alma1,alma3,alma4,tipo_alma2,alma5,alma6,tipo_alma3,alma7,tipo_alma4,alma8,tipo_alma5,alma9,tipo_alma6,alma10,alma11,tipo_alma7,alma12,tipo_alma8,disposiciones_finales,observaciones_finales,resolucion,para_extender,plazo,anexo,nro_registro,foto,documentos,nombre_usuario from empresa,informe_general,informe_proteccion,informe_prevencion,informe_incendios,informe_confirmar,tasa_servicio,usuario where informe_general.id_informe_general = informe_proteccion.id_informe_general and informe_general.id_informe_general = informe_prevencion.id_informe_general and informe_general.id_informe_general = informe_incendios.id_informe_general and informe_general.id_informe_general = informe_confirmar.id_informe_general and empresa.id_empresa = informe_general.id_empresa and informe_general.id_tasa = tasa_servicio.id_tasa_servicio and usuario.id_usuario = informe_confirmar.id_usuario and informe_general.id_informe_general = '$_GET[id]'";
    $sql = reporte($conexion, $sql); 
    /*VENTIALCION*/
    $condicion1 = '';
    $condicion2 = '';
    $condicion3 = '';
    $condicion4 = '';
    if($sql[26] == 'NATURAL')
        $condicion1 = 'x';
    if($sql[26] == 'MECÁNICA')
        $condicion2 = 'x';
    if($sql[26] == 'FUNCIONAL')
        $condicion3 = 'x';
    if($sql[26] == 'NO FUNCIONAL')
        $condicion4 = 'x';
    /*INSPECCION*/
    $condicion5 = '';
    $condicion6 = '';
    if($sql[31] == 'INSPECCION')
        $condicion5 = 'x';
    if($sql[31] == 'REINSPECCION')
        $condicion6 = 'x';
    /*EXTINTORES*/
    $condicion7 = '';
    $condicion8 = '';
    if($sql[32] == 'SI')
        $condicion7 = 'x';
    if($sql[32] == 'NO')
        $condicion8 = 'x';
    /*AGUA*/
    $condicion9 = '';
    $condicion10 = '';
    $condicion11 = '';
    $condicion12 = '';
    if($sql[33] == '5')
        $condicion9 = 'x';
    if($sql[33] == '10')
        $condicion10 = 'x';
    if($sql[33] == '20')
        $condicion11 = 'x';
    if($sql[33] == '50')
        $condicion12 = 'x';
    $condicion13 = '';    
    if($sql[34] == 'SI')
        $condicion13 = 'x';    
    $condicion14 = '';
    if($sql[35] == 'SI')
        $condicion14 = 'x';    
    $condicion15 = '';
    if($sql[36] == 'SI')
        $condicion15 = 'x'; 
    /*pqs*/
    $condicion16 = '';
    $condicion17 = '';
    $condicion18 = '';
    $condicion19 = '';
    $condicion20 = '';    
    $condicion21 = '';
    $condicion22 = '';
    if($sql[39] == '5')
        $condicion16 = 'x';
    if($sql[39] == '10')
        $condicion17 = 'x';
    if($sql[39] == '20')
        $condicion18 = 'x';
    if($sql[39] == '50')
        $condicion19 = 'x';    
    if($sql[40] == 'SI')
        $condicion20 = 'x';        
    if($sql[41] == 'SI')
        $condicion21 = 'x';        
    if($sql[42] == 'SI')
        $condicion22 = 'x';   
    /*co2*/
    $condicion23 = '';
    $condicion24 = '';
    $condicion25 = '';
    $condicion26 = '';
    $condicion27 = '';    
    $condicion28 = '';
    $condicion29 = '';
    if($sql[45] == '5')
        $condicion23 = 'x';
    if($sql[45] == '10')
        $condicion24 = 'x';
    if($sql[45] == '20')
        $condicion25 = 'x';
    if($sql[45] == '50')
        $condicion26 = 'x';    
    if($sql[46] == 'SI')
        $condicion27 = 'x';        
    if($sql[47] == 'SI')
        $condicion28 = 'x';        
    if($sql[48] == 'SI')
        $condicion29 = 'x';   
    /*espuma*/
    $condicion30 = '';
    $condicion31 = '';
    $condicion32 = '';
    $condicion33 = '';
    $condicion34 = '';    
    $condicion35 = '';
    $condicion36 = '';
    if($sql[51] == '5')
        $condicion30 = 'x';
    if($sql[51] == '10')
        $condicion31 = 'x';
    if($sql[51] == '20')
        $condicion32 = 'x';
    if($sql[51] == '50')
        $condicion33 = 'x';    
    if($sql[52] == 'SI')
        $condicion34 = 'x';        
    if($sql[53] == 'SI')
        $condicion35 = 'x';        
    if($sql[54] == 'SI')
        $condicion36 = 'x';
    /*agentes*/
    $condicion37 = '';
    $condicion38 = '';
    $condicion39 = '';
    $condicion40 = '';
    $condicion41 = '';    
    $condicion42 = '';
    $condicion43 = '';
    if($sql[57] == '5')
        $condicion37 = 'x';
    if($sql[57] == '10')
        $condicion38 = 'x';
    if($sql[57] == '20')
        $condicion39 = 'x';
    if($sql[57] == '50')
        $condicion40 = 'x';    
    if($sql[58] == 'SI')
        $condicion41 = 'x';        
    if($sql[59] == 'SI')
        $condicion42 = 'x';        
    if($sql[60] == 'SI')
        $condicion43 = 'x';   
     /*prev*/
     $condicion44 = '';
     $condicion45 = '';
     $condicion46 = '';
     $condicion47 = '';
     $condicion48 = '';
     $condicion49 = '';
     $condicion50 = '';
     $condicion51 = '';
     $condicion52 = '';
     $condicion53 = '';
     $condicion54 = '';
     $condicion55 = '';
     $condicion56 = '';
     $condicion57 = '';
     if($sql[64] == 'SI')
        $condicion44 = 'x';   
    if($sql[68] == 'SI')
        $condicion45 = 'x';   
    if($sql[72] == 'SI')
        $condicion46 = 'x';   
    if($sql[76] == 'SI')
        $condicion47 = 'x';   
    if($sql[80] == 'SI')
        $condicion48 = 'x';   
    if($sql[84] == 'SI')
        $condicion49 = 'x';   
    if($sql[88] == 'SI')
        $condicion50 = 'x';   
    if($sql[92] == 'SI')
        $condicion51 = 'x';   
    if($sql[96] == 'SI')
        $condicion52 = 'x';   
    if($sql[100] == 'SI')
        $condicion53 = 'x';   
    if($sql[104] == 'SI')
        $condicion54 = 'x';   
    if($sql[108] == 'SI')
        $condicion55 = 'x';   
    if($sql[112] == 'SI')
        $condicion56 = 'x';   
    if($sql[116] == 'SI')
        $condicion57 = 'x';   
    /*riesgos*/
    $condicion58 = '';
    $condicion59 = '';
    $condicion60 = '';
    $condicion61 = '';
    $condicion62 = '';
    $condicion63 = '';
    $condicion64 = '';
    $condicion65 = '';
    $condicion66 = '';
    $condicion67 = '';
    $condicion68 = '';
    $condicion69 = '';
    $condicion70 = '';
    $condicion71 = '';
    $condicion72 = '';
    $condicion73 = '';
    $condicion74 = '';
    $condicion75 = '';
    $condicion76 = '';
    $condicion77 = '';
    $condicion78 = '';
    $condicion79 = '';
    $condicion80 = '';
    $condicion81 = '';
    $condicion82 = '';
    $condicion83 = '';
    $condicion84 = '';
    $condicion85 = '';
    $condicion86 = '';
    $condicion87 = '';
    $condicion88 = '';
    $condicion89 = '';
    $condicion90 = '';
    $condicion91 = '';    
    $condicion92 = ''; 
    $condicion93 = ''; 
    $condicion94 = ''; 
    $condicion95 = ''; 
    if($sql[119] == 'SI')
        $condicion58 = 'x';   
    if($sql[119] == 'NO')
        $condicion59 = 'x';   
    if($sql[134] == 'IN')
        $condicion60 = 'x';   
    if($sql[134] == 'EX')
        $condicion61 = 'x';   
    if($sql[134] == 'AL')
        $condicion62 = 'x';   
    if($sql[121] == 'SI')
        $condicion63 = 'x';   
    if($sql[121] == 'NO')
        $condicion64 = 'x';   
    if($sql[137] == 'IN')
        $condicion65 = 'x';   
    if($sql[137] == 'EX')
        $condicion66 = 'x';   
    if($sql[137] == 'AL')
        $condicion67 = 'x'; 
    if($sql[123] == 'SI')
        $condicion68 = 'x';   
    if($sql[123] == 'NO')
        $condicion69 = 'x';   
    if($sql[140] == 'IN')
        $condicion70 = 'x';   
    if($sql[140] == 'EX')
        $condicion71 = 'x';   
    if($sql[140] == 'AL')
        $condicion72 = 'x';   
    if($sql[125] == 'SI')
        $condicion73 = 'x';   
    if($sql[125] == 'NO')
        $condicion74 = 'x';   
    if($sql[142] == 'IN')
        $condicion75 = 'x';   
    if($sql[142] == 'EX')
        $condicion76 = 'x';   
    if($sql[142] == 'AL')
        $condicion77 = 'x';   
    if($sql[127] == 'SI')
        $condicion78 = 'x';   
    if($sql[127] == 'NO')
        $condicion79 = 'x';   
    if($sql[144] == 'IN')
        $condicion80 = 'x';   
    if($sql[144] == 'EX')
        $condicion81 = 'x';   
    if($sql[144] == 'AL')
        $condicion82 = 'x';   
    if($sql[129] == 'SI')
        $condicion83 = 'x';   
    if($sql[129] == 'NO')
        $condicion84 = 'x';   
    if($sql[146] == 'AL')
        $condicion85 = 'x';       
    if($sql[149] == 'IN')
        $condicion86 = 'x';   
    if($sql[149] == 'EX')
        $condicion87 = 'x';   
    if($sql[149] == 'AL')
        $condicion88 = 'x';   
    if($sql[151] == 'IN')
        $condicion89 = 'x';   
    if($sql[151] == 'EX')
        $condicion90 = 'x';   
    if($sql[151] == 'AL')
        $condicion91 = 'x';  
    if($sql[157] == 'SI')
        $condicion92 = 'x';   
    if($sql[157] == 'NO')
        $condicion93 = 'x';   
    if($sql[1] == 'SI')
        $condicion94 = 'x';   
    if($sql[1] == 'NO')
        $condicion95 = 'x';   
    


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
                <h3 style="font-size:20px;width:30%;font-weight:normal;display:inline-block;text-align:center;border:solid 0px;margin:0px;">'.$sql[158].'</h3>            
                <h3 style="font-size:16px;width:70%;text-align:center;border:solid 0px;margin:0px;">INFORME GENERAL DE INSPECCIÓN</h3>            
                
            </div>            
    	</div>
        <div id="general">            
            <table border=0>
            <tr>                               
                <td style="width:75px;">Razón Social:</td>    
                <td style="width:175px;"><h5 style="border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[3],24).'</h5></td>
                <td style="width:70px;">Área total m2:</td>    
                <td style="width:40px;"><h5 style="text-align:center;border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[18],7).'</h5></td>
                <td style="width:60px;">Área útil m2:</td>
                <td style="width:40px;"><h5 style="text-align:center;border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[14],7).'</h5></td>
                <td style="width:20px;">PE:</td>
                <td style="width:35px;"><h5 style="text-align:center;border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[15],7).'</h5></td>
                <td style="width:20px;">MMR:</td>
                <td style="width:35px;"><h5 style="text-align:center;border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[16],7).'</h5></td>
                <td style="width:40px;">Riesgo:</td>
                <td style="width:60px;"><h5 style="border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[17],9).'</h5></td>                
            </tr>            
            </table>   
            <table border=0>
            <tr>                               
                <td style="width:50px;">Actividad:</td>    
                <td style="width:200px;"><h5 style="border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[6],28).'</h5></td>
                <td style="width:120px;">Propietario/Resp Legal:</td>    
                <td style="width:220px;"><h5 style="border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[5],32).'</h5></td>
                <td style="width:30px;">R.U.C:</td>
                <td style="width:95px;"><h5 style="border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[4],13).'</h5></td>                
            </tr>            
            </table> 
            <table border=0>
            <tr>                               
                <td style="width:50px;">Dirección:</td>    
                <td style="width:174px;"><h5 style="border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[9],26).'</h5></td>
                <td style="width:80px;">Visible/Legible:</td>    
                <td style="width:160px;"><h5 style="border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[19],28).'</h5></td>
                <td style="width:60px;">Ubicación:</td>
                <td style="width:70px;"><h5 style="border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[7],10).'</h5></td>     
                <td style="width:22px;">Telf.:</td>
                <td style="width:90px;"><h5 style="border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[10],17).'</h5></td>                
            </tr>            
            </table>     
            <table border=0>
            <tr>                               
                <td style="width:70px;">Solicitud N.:</td>    
                <td style="width:100px;"><h5 style="border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[20],10).'</h5></td>
                <td style="width:110px;">Nro. Ocupantes Fijos:</td>    
                <td style="width:90px;"><h5 style="border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[21],10).'</h5></td>
                <td style="width:60px;">Flotantes:</td>
                <td style="width:90px;"><h5 style="border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[22],10).'</h5></td>     
                <td style="width:90px;">Aforo (Ord. 122):</td>
                <td style="width:95px;"><h5 style="border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[23],10).'</h5></td>                
            </tr>            
            </table>     
            <table border=0>
            <tr>                               
                <td style="width:151px;">TIPO DE CONSTRUCCIÓN:</td>    
                <td style="width:260px;"><h5 style="border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[24],32).'</h5></td>
                <td style="width:120px;">TECHO / CUBIERTA:</td>    
                <td style="width:200px;"><h5 style="border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[25],24).'</h5></td>                
            </tr>            
            </table>  
            <table border=0>
            <tr>                               
                <td style="width:80px;">VENTILACIÓN:</td>    
                <td style="width:40px;">Natural</td>    
                <td style="width:10px;"><h5 style="height:13px;width:10px;border:solid 1px;margin:0px;text-align:center;">'.$condicion1.'</h5></td>
                <td style="width:50px;">Mecánica</td>    
                <td style="width:10px;"><h5 style="height:13px;width:10px;border:solid 1px;margin:0px;text-align:center;">'.$condicion2.'</h5></td>
                <td style="width:55px;">Funcional</td>    
                <td style="width:10px;"><h5 style="height:13px;width:10px;border:solid 1px;margin:0px;text-align:center;">'.$condicion3.'</h5></td>
                <td style="width:70px;">No Funcional</td>    
                <td style="width:10px;"><h5 style="height:13px;width:10px;border:solid 1px;margin:0px;text-align:center;">'.$condicion4.'</h5></td>
                <td style="width:70px;">Disposición:</td>    
                <td style="width:295px;"><h5 style="border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[27],35).'</h5></td>                    
            </tr>            
            </table> 
             <table border=0>
            <tr>                               
                <td style="width:60px;">Hora Inicio:</td>    
                <td style="width:45px;"><h5 style="border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[29],5).'</h5></td>
                <td style="width:60px;">Hora Final:</td>    
                <td style="width:45px;"><h5 style="border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[30],5).'</h5></td>
                <td style="width:40px;">Fecha:</td>    
                <td style="width:70px;"><h5 style="border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[28],12).'</h5></td>
                <td style="width:75px;">Inspección</td>    
                <td style="width:10px;"><h5 style="height:13px;width:10px;border:solid 1px;margin:0px;text-align:center;">'.$condicion5.'</h5> </td>
                <td style="width:90px;">Reinspección</td>    
                <td style="width:10px;"><h5 style="height:13px;width:10px;border:solid 1px;margin:0px;text-align:center;">'.$condicion6.'</h5> </td>
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
                <td style="width:10px;"><h5 style="height:13px;width:10px;border:solid 1px;margin:0px;text-align:center;">'.$condicion7.'</h5> </td>
                <td style="width:30px;">NO</td>    
                <td style="width:10px;"><h5 style="height:13px;width:10px;border:solid 1px;margin:0px;text-align:center;">'.$condicion8.'</h5> </td>
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
                <td style="width:30px;text-align:center;">'.$condicion9.'</td>    
                <td style="width:30px;text-align:center;">'.$condicion10.'</td>    
                <td style="width:30px;text-align:center;">'.$condicion11.'</td>    
                <td style="width:30px;text-align:center;">'.$condicion12.'</td>    
                <td style="width:40px;text-align:center;">'.$condicion13.'</td>    
                <td style="width:60px;text-align:center;">'.$condicion14.'</td>    
                <td style="width:60px;text-align:center;">'.$condicion15.'</td>    
                <td style="width:260px;text-align:left;">'.maxCaracter($sql[37],28).'</td>    
                <td style="width:30px;text-align:center;">'.maxCaracter($sql[38],5).'</td>    
            </tr>
            <tr>
                <td style="width:90px;text-align:center;">P.Q.S</td>    
                <td style="width:30px;text-align:center;">'.$condicion16.'</td>    
                <td style="width:30px;text-align:center;">'.$condicion17.'</td>    
                <td style="width:30px;text-align:center;">'.$condicion18.'</td>    
                <td style="width:30px;text-align:center;">'.$condicion19.'</td>    
                <td style="width:40px;text-align:center;">'.$condicion20.'</td>    
                <td style="width:60px;text-align:center;">'.$condicion21.'</td>    
                <td style="width:60px;text-align:center;">'.$condicion22.'</td>    
                <td style="width:260px;text-align:left;">'.maxCaracter($sql[43],28).'</td>    
                <td style="width:30px;text-align:center;">'.maxCaracter($sql[44],5).'</td>    
            </tr>
            <tr>
                <td style="width:90px;text-align:center;">CO2</td>    
                <td style="width:30px;text-align:center;">'.$condicion23.'</td>    
                <td style="width:30px;text-align:center;">'.$condicion24.'</td>    
                <td style="width:30px;text-align:center;">'.$condicion25.'</td>    
                <td style="width:30px;text-align:center;">'.$condicion26.'</td>    
                <td style="width:40px;text-align:center;">'.$condicion27.'</td>    
                <td style="width:60px;text-align:center;">'.$condicion28.'</td>    
                <td style="width:60px;text-align:center;">'.$condicion29.'</td>    
                <td style="width:260px;text-align:left;">'.maxCaracter($sql[49],28).'</td>    
                <td style="width:30px;text-align:center;">'.maxCaracter($sql[50],5).'</td>     
            </tr>
            <tr>
                <td style="width:90px;text-align:center;">Espuma</td>    
                <td style="width:30px;text-align:center;">'.$condicion30.'</td>    
                <td style="width:30px;text-align:center;">'.$condicion31.'</td>    
                <td style="width:30px;text-align:center;">'.$condicion32.'</td>    
                <td style="width:30px;text-align:center;">'.$condicion33.'</td>    
                <td style="width:40px;text-align:center;">'.$condicion34.'</td>    
                <td style="width:60px;text-align:center;">'.$condicion35.'</td>    
                <td style="width:60px;text-align:center;">'.$condicion36.'</td>    
                <td style="width:260px;text-align:left;">'.maxCaracter($sql[55],28).'</td>    
                <td style="width:30px;text-align:center;">'.maxCaracter($sql[56],5).'</td>    
            </tr>
            <tr>
                <td style="width:90px;text-align:center;">Agentes LImpios</td>    
                <td style="width:30px;text-align:center;">'.$condicion37.'</td>    
                <td style="width:30px;text-align:center;">'.$condicion38.'</td>    
                <td style="width:30px;text-align:center;">'.$condicion39.'</td>    
                <td style="width:30px;text-align:center;">'.$condicion40.'</td>    
                <td style="width:40px;text-align:center;">'.$condicion41.'</td>    
                <td style="width:60px;text-align:center;">'.$condicion42.'</td>    
                <td style="width:60px;text-align:center;">'.$condicion43.'</td>    
                <td style="width:260px;text-align:left;">'.maxCaracter($sql[61],28).'</td>    
                <td style="width:30px;text-align:center;">'.maxCaracter($sql[62],5).'</td>    
            </tr>
            </table>
        </div>
        <div id="prevencion">
            <h5 style="text-align:center;font-size:12px;margin:2px;">EQUIPO Y MEDIOS DE PREVENCIÓN Y SEGURIDAD</h5>     
            <table border=1>
            <tr>
                <td style="width:140px;text-align:center;">EQUIPOS Y MEDIOS</td>    
                <td style="width:30px;text-align:center;">Cant.</td>    
                <td style="width:50px;text-align:center;">Cumple Normativa</td>    
                <td style="width:35px;text-align:center;">Cant. Adquirir</td>    
                <td style="width:40px;text-align:center;">Lugar a ubicar</td>    
                <td style="width:140px;text-align:center;">EQUIPOS Y MEDIOS</td>    
                <td style="width:30px;text-align:center;">Cant.</td>    
                <td style="width:50px;text-align:center;">Cumple Normativa</td>    
                <td style="width:35px;text-align:center;">Cant. Adquirir</td>    
                <td style="width:40px;text-align:center;">Lugar a ubicar</td>       
            </tr>
            <tr>
                <td style="width:140px;text-align:left;">Detector de calor Itemp.</td>    
                <td style="width:30px;text-align:center;">'.maxCaracter($sql[63],4).'</td>    
                <td style="width:50px;text-align:center;">'.$condicion44.'</td>    
                <td style="width:35px;text-align:center;">'.maxCaracter($sql[65],4).'</td>    
                <td style="width:40px;text-align:center;">'.maxCaracter($sql[66],8).'</td>    
                <td style="width:140px;text-align:left;">Salidas de emergencia</td>    
                <td style="width:30px;text-align:center;">'.maxCaracter($sql[67],4).'</td>    
                <td style="width:50px;text-align:center;">'.$condicion45.'</td>    
                <td style="width:35px;text-align:center;">'.maxCaracter($sql[69],4).'</td>    
                <td style="width:40px;text-align:center;">'.maxCaracter($sql[70],8).'</td>       
            </tr>
             <tr>
                <td style="width:140px;text-align:left;">Detector de GLP</td>    
                <td style="width:30px;text-align:center;">'.maxCaracter($sql[71],4).'</td>    
                <td style="width:50px;text-align:center;">'.$condicion46.'</td>    
                <td style="width:35px;text-align:center;">'.maxCaracter($sql[73],4).'</td>    
                <td style="width:40px;text-align:center;">'.maxCaracter($sql[74],8).'</td>    
                <td style="width:140px;text-align:left;">Puertas de emergencia</td>    
                <td style="width:30px;text-align:center;">'.maxCaracter($sql[75],4).'</td>    
                <td style="width:50px;text-align:center;">'.$condicion47.'</td>    
                <td style="width:35px;text-align:center;">'.maxCaracter($sql[77],4).'</td>    
                <td style="width:40px;text-align:center;">'.maxCaracter($sql[78],8).'</td>       
            </tr>             
             <tr>
                <td style="width:140px;text-align:left;">Detector de humo</td>    
                <td style="width:30px;text-align:center;">'.maxCaracter($sql[79],4).'</td>    
                <td style="width:50px;text-align:center;">'.$condicion48.'</td>    
                <td style="width:35px;text-align:center;">'.maxCaracter($sql[81],4).'</td>    
                <td style="width:40px;text-align:center;">'.maxCaracter($sql[82],8).'</td>    
                <td style="width:140px;text-align:left;">Lámparas de emergencia</td>    
                <td style="width:30px;text-align:center;">'.maxCaracter($sql[83],4).'</td>    
                <td style="width:50px;text-align:center;">'.$condicion49.'</td>    
                <td style="width:35px;text-align:center;">'.maxCaracter($sql[85],4).'</td>    
                <td style="width:40px;text-align:center;">'.maxCaracter($sql[86],8).'</td>       
            </tr>
             <tr>
                <td style="width:140px;text-align:left;">Detector de llama</td>    
                <td style="width:30px;text-align:center;">'.maxCaracter($sql[87],4).'</td>    
                <td style="width:50px;text-align:center;">'.$condicion50.'</td>    
                <td style="width:35px;text-align:center;">'.maxCaracter($sql[89],4).'</td>    
                <td style="width:40px;text-align:center;">'.maxCaracter($sql[90],8).'</td>    
                <td style="width:140px;text-align:left;">Escaleras de emergencia</td>    
                <td style="width:30px;text-align:center;">'.maxCaracter($sql[91],4).'</td>    
                <td style="width:50px;text-align:center;">'.$condicion51.'</td>    
                <td style="width:35px;text-align:center;">'.maxCaracter($sql[93],4).'</td>    
                <td style="width:40px;text-align:center;">'.maxCaracter($sql[94],8).'</td>       
            </tr>
             <tr>
                <td style="width:140px;text-align:left;">Alarmas visuales</td>    
                <td style="width:30px;text-align:center;">'.maxCaracter($sql[95],4).'</td>    
                <td style="width:50px;text-align:center;">'.$condicion52.'</td>    
                <td style="width:35px;text-align:center;">'.maxCaracter($sql[97],4).'</td>    
                <td style="width:40px;text-align:center;">'.maxCaracter($sql[98],8).'</td>    
                <td style="width:140px;text-align:left;">Señalización</td>    
                <td style="width:30px;text-align:center;">'.maxCaracter($sql[99],4).'</td>    
                <td style="width:50px;text-align:center;">'.$condicion53.'</td>    
                <td style="width:35px;text-align:center;">'.maxCaracter($sql[101],4).'</td>    
                <td style="width:40px;text-align:center;">'.maxCaracter($sql[102],8).'</td>       
            </tr>
             <tr>
                <td style="width:140px;text-align:left;">Alarmas sonoras</td>    
                <td style="width:30px;text-align:center;">'.maxCaracter($sql[103],4).'</td>    
                <td style="width:50px;text-align:center;">'.$condicion54.'</td>    
                <td style="width:35px;text-align:center;">'.maxCaracter($sql[105],4).'</td>    
                <td style="width:40px;text-align:center;">'.maxCaracter($sql[106],8).'</td>    
                <td style="width:140px;text-align:left;">Pulsadores</td>    
                <td style="width:30px;text-align:center;">'.maxCaracter($sql[107],4).'</td>    
                <td style="width:50px;text-align:center;">'.$condicion55.'</td>    
                <td style="width:35px;text-align:center;">'.maxCaracter($sql[109],4).'</td>    
                <td style="width:40px;text-align:center;">'.maxCaracter($sql[110],8).'</td>       
            </tr>
            <tr>
                <td style="width:140px;text-align:left;">Red Híbricas</td>    
                <td style="width:30px;text-align:center;">'.maxCaracter($sql[111],4).'</td>    
                <td style="width:50px;text-align:center;">'.$condicion56.'</td>    
                <td style="width:35px;text-align:center;">'.maxCaracter($sql[113],4).'</td>    
                <td style="width:40px;text-align:center;">'.maxCaracter($sql[114],8).'</td>    
                <td style="width:140px;text-align:left;">Otros</td>    
                <td style="width:30px;text-align:center;">'.maxCaracter($sql[115],4).'</td>    
                <td style="width:50px;text-align:center;">'.$condicion57.'</td>    
                <td style="width:35px;text-align:center;">'.maxCaracter($sql[117],4).'</td>    
                <td style="width:40px;text-align:center;">'.maxCaracter($sql[118],8).'</td>       
            </tr>            
            </table>          
        </div>
        <div id="riesgo">
            <h5 style="text-align:center;font-size:12px;margin:2px;">RIESGOS DE INCENDIOS</h5>     
            <table border=1 >
                <tr>
                    <td style="width:180px;text-align:center;">SISTEMA ELÉCTRICO</td>    
                    <td style="width:20px;text-align:center;">SI</td>    
                    <td style="width:20px;text-align:center;">NO</td>    
                    <td style="width:30px;text-align:center;">OBSERVACIONES</td>                                      
                    <td style="text-align:center;" colspan=5>ALMACENAMIENTO</td>                                      
                    <td style="width:14px;text-align:center;">In.</td>                                      
                    <td style="width:14px;text-align:center;">Ex.</td>                                      
                    <td style="width:14px;text-align:center;">Al.</td>                                      
                </tr>       
                <tr>
                    <td style="width:180px;text-align:left;">Instalaciones eléctricas improvisadas</td>    
                    <td style="width:20px;text-align:center;">'.$condicion58.'</td>    
                    <td style="width:20px;text-align:center;">'.$condicion59.'</td>    
                    <td style="width:30px;text-align:center;">'.maxCaracter($sql[120],10).'</td>                                      
                    <td style="width:120px;text-align:center;">Alamcenamiento GLP:</td>                                      
                    <td style="width:50px;text-align:center;">Cant/lleno</td> 
                    <td style="width:30px;"><h5 style="text-align:center;border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[132],3).'</h5></td>                                     
                    <td style="width:60px;text-align:center;">Cant/vacío</td>                                      
                    <td style="width:30px;"><h5 style="text-align:center;border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[133],3).'</h5></td>                                     
                    <td style="width:14px;text-align:center;">'.$condicion60.'</td>    
                    <td style="width:14px;text-align:center;">'.$condicion61.'</td>    
                    <td style="width:14px;text-align:center;">'.$condicion62.'</td>    
                </tr>                                  
                <tr>
                    <td style="width:180px;text-align:left;">Instalaciones eléctricas defectuosas</td>    
                    <td style="width:20px;text-align:center;">'.$condicion63.'</td>    
                    <td style="width:20px;text-align:center;">'.$condicion64.'</td>    
                    <td style="width:30px;text-align:center;">'.maxCaracter($sql[122],10).'</td>                                                                                             
                    <td style="width:120px;text-align:left;">Líquidos inflamables:</td>                                      
                    <td style="text-align:left;" colspan=2>Tipo <h5 style="display:inline-block;width:60px;border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[135],7).'</h5></td> 
                    <td style="text-align:left;" colspan=2>Cant. <h5 style="display:inline-block;width:65px;border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[136],7).'</h5></td>                     
                    <td style="width:14px;text-align:center;">'.$condicion65.'</td>    
                    <td style="width:14px;text-align:center;">'.$condicion66.'</td>    
                    <td style="width:14px;text-align:center;">'.$condicion67.'</td>    
                </tr>        
                <tr>
                    <td style="width:180px;text-align:left;">Cajas Abiertas</td>    
                    <td style="width:20px;text-align:center;">'.$condicion68.'</td>    
                    <td style="width:20px;text-align:center;">'.$condicion69.'</td>    
                    <td style="width:30px;text-align:center;">'.maxCaracter($sql[124],10).'</td>                                                                                             
                    <td style="width:120px;text-align:left;">Líquidos combustibles:</td>                                      
                    <td style="text-align:left;" colspan=2>Tipo <h5 style="display:inline-block;width:60px;border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[138],7).'</h5></td> 
                    <td style="text-align:left;" colspan=2>Cant. <h5 style="display:inline-block;width:65px;border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[139],7).'</h5></td>                     
                    <td style="width:14px;text-align:center;">'.$condicion70.'</td>    
                    <td style="width:14px;text-align:center;">'.$condicion71.'</td>    
                    <td style="width:14px;text-align:center;">'.$condicion72.'</td>    
                </tr>          
                <tr>
                    <td style="width:180px;text-align:left;">Cajas y brakers adecuados</td>    
                    <td style="width:20px;text-align:center;">'.$condicion73.'</td>    
                    <td style="width:20px;text-align:center;">'.$condicion74.'</td>    
                    <td style="width:30px;text-align:center;">'.maxCaracter($sql[126],10).'</td>                                                                                             
                    <td style="width:120px;text-align:left;">Sólidos combustibles:</td>                                      
                    <td style="text-align:left;" colspan=4>Tipo <h5 style="display:inline-block;width:165px;border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[141],18).'</h5></td>                     
                    <td style="width:14px;text-align:center;">'.$condicion75.'</td>    
                    <td style="width:14px;text-align:center;">'.$condicion76.'</td>    
                    <td style="width:14px;text-align:center;">'.$condicion77.'</td>    
                </tr>     
                <tr>
                    <td style="width:180px;text-align:left;">Equipo eléctrico conectado a tierra</td>    
                    <td style="width:20px;text-align:center;">'.$condicion78.'</td>    
                    <td style="width:20px;text-align:center;">'.$condicion79.'</td>    
                    <td style="width:30px;text-align:center;">'.maxCaracter($sql[128],10).'</td>                                                                                             
                    <td style="width:120px;text-align:left;">Bodegaje:</td>                                      
                    <td style="text-align:left;" colspan=4>Tipo mat.: <h5 style="display:inline-block;width:135px;border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[143],15).'</h5></td>                     
                    <td style="width:14px;text-align:center;">'.$condicion80.'</td>    
                    <td style="width:14px;text-align:center;">'.$condicion81.'</td>    
                    <td style="width:14px;text-align:center;">'.$condicion82.'</td>    
                </tr> 
                <tr>
                    <td style="width:180px;text-align:left;">Posee sistema antichispa</td>    
                    <td style="width:20px;text-align:center;">'.$condicion83.'</td>    
                    <td style="width:20px;text-align:center;">'.$condicion84.'</td>    
                    <td style="width:30px;text-align:center;">'.maxCaracter($sql[130],10).'</td>                                                                                             
                    <td style="width:120px;text-align:left;">Orden y Limpieza:</td>                                      
                    <td style="text-align:left;" colspan=4><h5 style="display:inline-block;width:185px;border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[145],21).'</h5></td>                     
                    <td style="width:14px;text-align:center;"></td>    
                    <td style="width:14px;text-align:center;"></td>    
                    <td style="width:14px;text-align:center;">'.$condicion85.'</td>    
                </tr>       
                <tr>
                    <td style="width:180px;text-align:left;" colspan=4>Otros <h5 style="display:inline-block;width:325px;border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[131],37).'</h5></td>                                                                                                          
                    <td style="width:120px;text-align:left;">Químicos:</td>      
                    <td style="text-align:left;" colspan=2>Tipo <h5 style="display:inline-block;width:60px;border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[147],7).'</h5></td> 
                    <td style="text-align:left;" colspan=2>Cant. <h5 style="display:inline-block;width:65px;border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[148],7).'</h5></td>                                                     
                    <td style="width:14px;text-align:center;">'.$condicion86.'</td>    
                    <td style="width:14px;text-align:center;">'.$condicion87.'</td>    
                    <td style="width:14px;text-align:center;">'.$condicion88.'</td>                           
                </tr>        
                <tr>
                    <td style="width:180px;text-align:left;" colspan=4></td>                                                                                                          
                    <td style="width:120px;text-align:left;">Instala. eléctricas:</td>      
                    <td style="text-align:left;" colspan=4><h5 style="display:inline-block;width:185px;border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[150],21).'</h5></td>                     
                    <td style="width:14px;text-align:center;">'.$condicion89.'</td>    
                    <td style="width:14px;text-align:center;">'.$condicion90.'</td>    
                    <td style="width:14px;text-align:center;">'.$condicion91.'</td>                           
                </tr>              
            </table>
            <table border=0>
                <tr>
                    <td style="width:90px;text-align:left;">Disposiciones:</td>    
                    <td style="width:655px;text-align:left;"><h5 style="display:inline-block;width:650px;border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[152],90).'</h5></td>                                                             
                </tr>      
                 <tr>
                    <td style="width:90px;text-align:left;">Observacioes:</td>    
                    <td style="width:655px;text-align:left;"><h5 style="display:inline-block;width:650px;border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[153],90).'</h5></td>                                                             
                </tr>                          
            </table>            
            <table border=0>
                <tr>
                    <td style="width:90px;text-align:left;">Resolución:</td>    
                    <td style="width:305px;text-align:left;"><h5 style="display:inline-block;width:300px;border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[154],40).'</h5></td>                                                                                 
                    <td style="width:160px;text-align:left;">Documentos que se adjuntan:</td>    
                    <td style="width:180px;text-align:left;"><h5 style="display:inline-block;width:180px;border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[160],25).'</h5></td>                                                                                 
                </tr>                                         
            </table>       
            <table border=0>
                <tr>
                    <td style="width:180px;text-align:left;">Para extender permiso presentar:</td>    
                    <td style="width:550px;text-align:left;"><h5 style="display:inline-block;width:550px;border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[155],70).'</h5></td>                                                                                 
                </tr>                                         
            </table>       
            <table border=0>
                <tr>
                    <td style="width:90px;text-align:left;">Plazo:</td>    
                    <td style="width:155px;text-align:left;"><h5 style="display:inline-block;width:150px;border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;">'.maxCaracter($sql[156],20).'</h5></td>                                                                                 
                    <td style="width:50px;text-align:left;">anexos:</td>    
                    <td style="width:10px;"><h5 style="height:13px;width:10px;border:solid 1px;margin:0px;text-align:center;">'.$condicion92.'</h5> </td>
                    <td style="width:10px;"><h5 style="height:13px;width:10px;border:solid 1px;margin:0px;text-align:center;">'.$condicion93.'</h5> </td>
                </tr>                                         
            </table>      
            <br />
            <br />
            <div style="border:solid 1px; border-left:0px; width:40%;margin:0px;padding:5px;">
                <table border=0>
                    <tr>
                        <td style="width:90px;text-align:left;">Se otorga el permiso de funcionamiento:</td>                        
                        <td style="width:20px;text-align:left;">SI</td>    
                        <td style="width:10px;"><h5 style="height:13px;width:10px;border:solid 1px;margin:0px;text-align:center;">'.$condicion94.'</h5> </td>
                        <td style="width:20px;text-align:left;">NO</td>    
                        <td style="width:10px;"><h5 style="height:13px;width:10px;border:solid 1px;margin:0px;text-align:center;">'.$condicion95.'</h5> </td>
                    </tr>                                         
                </table>  
            </div>       
            <div style="display:inline-block; width:50%;margin:0px;padding:5px;">
                <table border=0>
                    <tr>
                        <td style="width:90px;text-align:left;">Nombre Inspector:</td>                        
                        <td style="width:20px;text-align:left;">'.maxCaracter($sql[161],30).'</td>                            

                    </tr>                                         
                </table>  
            </div> 
            <div style="text-align:right; margin-left:50px; width:100%;margin-top:0px;padding:0px;">
                <h5 style="display:inline-block;width:200px;border-bottom: solid 1px;height:10px;margin:0px;padding:0px;height:15px;font-size:11px;font-weight:normal;"></h5>
                <h5 style="margin:0px;padding:0px; margin-right:60px; height:15px;font-size:11px;font-weight:normal;">Primer Feje Zonal</h5>
            </div>                     
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