<?php
    include '../conexion.php';   
    include '../funciones_generales.php'; 
    date_default_timezone_set('UTC');
    $fecha=date("Y");    
    $conexion = conectarse();
    $page = $_GET['page']; 
    $limit = $_GET['rows']; 
    $sidx = $_GET['sidx']; 
    $sord = $_GET['sord']; 
    $search=$_GET['_search'];

    if (!$sidx)
        $sidx = 1;
    $sql = "SELECT COUNT(*) AS count from informe_general where fecha_general between '".$fecha."-01-01"."' and '".$fecha."-12-31"."'";
    $count = contador($conexion, $sql);
    if ($count > 0 && $limit > 0) {
        $total_pages = ceil($count / $limit);
    } else {
        $total_pages = 0;
    }
    if ($page > $total_pages)
        $page = $total_pages;
    $start = $limit * $page - $limit;
    if ($start < 0)
        $start = 0;	
    if($search=='false'){
        $SQL = "select informe_general.id_informe_general,permiso,empresa.id_empresa,nombre_empresa,ruc_empresa,representante_legal,actividad_empresa,parroquia,capital_giro,direccion_empresa,telefono_empresa,id_tasa,nombre_tasa,valor_tasa,area_util_m2,pe,mmr,riesgo,area_total_m2,visible_legible,solicitud_nro,nro_ocupantes_fijos,nro_flotantes,aforo,tipo_construccion,techo,ventilacion,disposicion,fecha_general,hora_inicio,hora_fin,tipo_inspeccion,extinto,agua,oper_1,no_oper_1,cumple_1,disposiciones_1,cant_1,pqs,oper_2,no_oper_2,cumple_2,disposiciones_2,cant_2,co2,oper_3,no_oper_3,cumple_3,disposiciones_3,cant_3,espuma,oper_4,no_oper_4,cumple_4,disposiciones_4,cant_4,agentes,oper_5,no_oper_5,cumple_5,disposiciones_5,cant_5,cant1,cumple1,cant_a1,lugar1,cant2,cumple2,cant_a2,lugar2,cant3,cumple3,cant_a3,lugar3,cant4,cumple4,cant_a4,lugar4,cant5,cumple5,cant_a5,lugar5,cant6,cumple6,cant_a6,lugar6,cant7,cumple7,cant_a7,lugar7,cant8,cumple8,cant_a8,lugar8,cant9,cumple9,cant_a9,lugar9,cant10,cumple10,cant_a10,lugar10,cant11,cumple11,cant_a11,lugar11,cant12,cumple12,cant_a12,lugar_12,cant_13,cumple13,cant_a13,lugar13,cant14,cumple14,cant_a14,lugar14,riesgo1,observacion1,riesgo2,observacion2,riesgo3,observacion3,riesgo4,observacion4,riesgo5,observacion5,riesgo6,observacion6,observacion7,alma1,alma2,tipo_alma1,alma3,alma4,tipo_alma2,alma5,alma6,tipo_alma3,alma7,tipo_alma4,alma8,tipo_alma5,alma9,tipo_alma6,alma10,alma11,tipo_alma7,alma12,tipo_alma8,disposiciones_finales,observaciones_finales,resolucion,para_extender,plazo,anexo,nro_registro,foto from empresa,informe_general,informe_proteccion,informe_prevencion,informe_incendios,informe_confirmar,tasa_servicio where informe_general.id_informe_general = informe_proteccion.id_informe_general and informe_general.id_informe_general = informe_prevencion.id_informe_general and informe_general.id_informe_general = informe_incendios.id_informe_general and informe_general.id_informe_general = informe_confirmar.id_informe_general and empresa.id_empresa = informe_general.id_empresa and informe_general.id_tasa = tasa_servicio.id_tasa_servicio and fecha_general between '".$fecha."-01-01"."' and '".$fecha."-12-31"."' ORDER BY $sidx $sord offset $start limit $limit";	        
	}
    else{        
        if($_GET['searchOper']=='eq'){
        	$SQL = "select informe_general.id_informe_general,permiso,empresa.id_empresa,nombre_empresa,ruc_empresa,representante_legal,actividad_empresa,parroquia,capital_giro,direccion_empresa,telefono_empresa,id_tasa,nombre_tasa,valor_tasa,area_util_m2,pe,mmr,riesgo,area_total_m2,visible_legible,solicitud_nro,nro_ocupantes_fijos,nro_flotantes,aforo,tipo_construccion,techo,ventilacion,disposicion,fecha_general,hora_inicio,hora_fin,tipo_inspeccion,extinto,agua,oper_1,no_oper_1,cumple_1,disposiciones_1,cant_1,pqs,oper_2,no_oper_2,cumple_2,disposiciones_2,cant_2,co2,oper_3,no_oper_3,cumple_3,disposiciones_3,cant_3,espuma,oper_4,no_oper_4,cumple_4,disposiciones_4,cant_4,agentes,oper_5,no_oper_5,cumple_5,disposiciones_5,cant_5,cant1,cumple1,cant_a1,lugar1,cant2,cumple2,cant_a2,lugar2,cant3,cumple3,cant_a3,lugar3,cant4,cumple4,cant_a4,lugar4,cant5,cumple5,cant_a5,lugar5,cant6,cumple6,cant_a6,lugar6,cant7,cumple7,cant_a7,lugar7,cant8,cumple8,cant_a8,lugar8,cant9,cumple9,cant_a9,lugar9,cant10,cumple10,cant_a10,lugar10,cant11,cumple11,cant_a11,lugar11,cant12,cumple12,cant_a12,lugar_12,cant_13,cumple13,cant_a13,lugar13,cant14,cumple14,cant_a14,lugar14,riesgo1,observacion1,riesgo2,observacion2,riesgo3,observacion3,riesgo4,observacion4,riesgo5,observacion5,riesgo6,observacion6,observacion7,alma1,alma2,tipo_alma1,alma3,alma4,tipo_alma2,alma5,alma6,tipo_alma3,alma7,tipo_alma4,alma8,tipo_alma5,alma9,tipo_alma6,alma10,alma11,tipo_alma7,alma12,tipo_alma8,disposiciones_finales,observaciones_finales,resolucion,para_extender,plazo,anexo,nro_registro,foto from empresa,informe_general,informe_proteccion,informe_prevencion,informe_incendios,informe_confirmar,tasa_servicio where informe_general.id_informe_general = informe_proteccion.id_informe_general and informe_general.id_informe_general = informe_prevencion.id_informe_general and informe_general.id_informe_general = informe_incendios.id_informe_general and informe_general.id_informe_general = informe_confirmar.id_informe_general and empresa.id_empresa = informe_general.id_empresa and informe_general.id_tasa = tasa_servicio.id_tasa_servicio $_GET[searchField] = '$_GET[searchString]' and fecha_general between '".$fecha."-01-01"."' and '".$fecha."-12-31"."' ORDER BY $sidx $sord offset $start limit $limit";	            
        }
        if($_GET['searchOper']=='ne'){  
        	$SQL = "select informe_general.id_informe_general,permiso,empresa.id_empresa,nombre_empresa,ruc_empresa,representante_legal,actividad_empresa,parroquia,capital_giro,direccion_empresa,telefono_empresa,id_tasa,nombre_tasa,valor_tasa,area_util_m2,pe,mmr,riesgo,area_total_m2,visible_legible,solicitud_nro,nro_ocupantes_fijos,nro_flotantes,aforo,tipo_construccion,techo,ventilacion,disposicion,fecha_general,hora_inicio,hora_fin,tipo_inspeccion,extinto,agua,oper_1,no_oper_1,cumple_1,disposiciones_1,cant_1,pqs,oper_2,no_oper_2,cumple_2,disposiciones_2,cant_2,co2,oper_3,no_oper_3,cumple_3,disposiciones_3,cant_3,espuma,oper_4,no_oper_4,cumple_4,disposiciones_4,cant_4,agentes,oper_5,no_oper_5,cumple_5,disposiciones_5,cant_5,cant1,cumple1,cant_a1,lugar1,cant2,cumple2,cant_a2,lugar2,cant3,cumple3,cant_a3,lugar3,cant4,cumple4,cant_a4,lugar4,cant5,cumple5,cant_a5,lugar5,cant6,cumple6,cant_a6,lugar6,cant7,cumple7,cant_a7,lugar7,cant8,cumple8,cant_a8,lugar8,cant9,cumple9,cant_a9,lugar9,cant10,cumple10,cant_a10,lugar10,cant11,cumple11,cant_a11,lugar11,cant12,cumple12,cant_a12,lugar_12,cant_13,cumple13,cant_a13,lugar13,cant14,cumple14,cant_a14,lugar14,riesgo1,observacion1,riesgo2,observacion2,riesgo3,observacion3,riesgo4,observacion4,riesgo5,observacion5,riesgo6,observacion6,observacion7,alma1,alma2,tipo_alma1,alma3,alma4,tipo_alma2,alma5,alma6,tipo_alma3,alma7,tipo_alma4,alma8,tipo_alma5,alma9,tipo_alma6,alma10,alma11,tipo_alma7,alma12,tipo_alma8,disposiciones_finales,observaciones_finales,resolucion,para_extender,plazo,anexo,nro_registro,foto from empresa,informe_general,informe_proteccion,informe_prevencion,informe_incendios,informe_confirmar,tasa_servicio where informe_general.id_informe_general = informe_proteccion.id_informe_general and informe_general.id_informe_general = informe_prevencion.id_informe_general and informe_general.id_informe_general = informe_incendios.id_informe_general and informe_general.id_informe_general = informe_confirmar.id_informe_general and empresa.id_empresa = informe_general.id_empresa and informe_general.id_tasa = tasa_servicio.id_tasa_servicio $_GET[searchField] != '$_GET[searchString]' and fecha_general between '".$fecha."-01-01"."' and '".$fecha."-12-31"."' ORDER BY $sidx $sord offset $start limit $limit";	                                  
        }
        if($_GET['searchOper']=='bw'){
        	$SQL = "select informe_general.id_informe_general,permiso,empresa.id_empresa,nombre_empresa,ruc_empresa,representante_legal,actividad_empresa,parroquia,capital_giro,direccion_empresa,telefono_empresa,id_tasa,nombre_tasa,valor_tasa,area_util_m2,pe,mmr,riesgo,area_total_m2,visible_legible,solicitud_nro,nro_ocupantes_fijos,nro_flotantes,aforo,tipo_construccion,techo,ventilacion,disposicion,fecha_general,hora_inicio,hora_fin,tipo_inspeccion,extinto,agua,oper_1,no_oper_1,cumple_1,disposiciones_1,cant_1,pqs,oper_2,no_oper_2,cumple_2,disposiciones_2,cant_2,co2,oper_3,no_oper_3,cumple_3,disposiciones_3,cant_3,espuma,oper_4,no_oper_4,cumple_4,disposiciones_4,cant_4,agentes,oper_5,no_oper_5,cumple_5,disposiciones_5,cant_5,cant1,cumple1,cant_a1,lugar1,cant2,cumple2,cant_a2,lugar2,cant3,cumple3,cant_a3,lugar3,cant4,cumple4,cant_a4,lugar4,cant5,cumple5,cant_a5,lugar5,cant6,cumple6,cant_a6,lugar6,cant7,cumple7,cant_a7,lugar7,cant8,cumple8,cant_a8,lugar8,cant9,cumple9,cant_a9,lugar9,cant10,cumple10,cant_a10,lugar10,cant11,cumple11,cant_a11,lugar11,cant12,cumple12,cant_a12,lugar_12,cant_13,cumple13,cant_a13,lugar13,cant14,cumple14,cant_a14,lugar14,riesgo1,observacion1,riesgo2,observacion2,riesgo3,observacion3,riesgo4,observacion4,riesgo5,observacion5,riesgo6,observacion6,observacion7,alma1,alma2,tipo_alma1,alma3,alma4,tipo_alma2,alma5,alma6,tipo_alma3,alma7,tipo_alma4,alma8,tipo_alma5,alma9,tipo_alma6,alma10,alma11,tipo_alma7,alma12,tipo_alma8,disposiciones_finales,observaciones_finales,resolucion,para_extender,plazo,anexo,nro_registro,foto from empresa,informe_general,informe_proteccion,informe_prevencion,informe_incendios,informe_confirmar,tasa_servicio where informe_general.id_informe_general = informe_proteccion.id_informe_general and informe_general.id_informe_general = informe_prevencion.id_informe_general and informe_general.id_informe_general = informe_incendios.id_informe_general and informe_general.id_informe_general = informe_confirmar.id_informe_general and empresa.id_empresa = informe_general.id_empresa and informe_general.id_tasa = tasa_servicio.id_tasa_servicio $_GET[searchField] like '$_GET[searchString]%' and fecha_general between '".$fecha."-01-01"."' and '".$fecha."-12-31"."' ORDER BY $sidx $sord offset $start limit $limit";	                        
        }
        if($_GET['searchOper']=='bn'){ 
        	$SQL = "select informe_general.id_informe_general,permiso,empresa.id_empresa,nombre_empresa,ruc_empresa,representante_legal,actividad_empresa,parroquia,capital_giro,direccion_empresa,telefono_empresa,id_tasa,nombre_tasa,valor_tasa,area_util_m2,pe,mmr,riesgo,area_total_m2,visible_legible,solicitud_nro,nro_ocupantes_fijos,nro_flotantes,aforo,tipo_construccion,techo,ventilacion,disposicion,fecha_general,hora_inicio,hora_fin,tipo_inspeccion,extinto,agua,oper_1,no_oper_1,cumple_1,disposiciones_1,cant_1,pqs,oper_2,no_oper_2,cumple_2,disposiciones_2,cant_2,co2,oper_3,no_oper_3,cumple_3,disposiciones_3,cant_3,espuma,oper_4,no_oper_4,cumple_4,disposiciones_4,cant_4,agentes,oper_5,no_oper_5,cumple_5,disposiciones_5,cant_5,cant1,cumple1,cant_a1,lugar1,cant2,cumple2,cant_a2,lugar2,cant3,cumple3,cant_a3,lugar3,cant4,cumple4,cant_a4,lugar4,cant5,cumple5,cant_a5,lugar5,cant6,cumple6,cant_a6,lugar6,cant7,cumple7,cant_a7,lugar7,cant8,cumple8,cant_a8,lugar8,cant9,cumple9,cant_a9,lugar9,cant10,cumple10,cant_a10,lugar10,cant11,cumple11,cant_a11,lugar11,cant12,cumple12,cant_a12,lugar_12,cant_13,cumple13,cant_a13,lugar13,cant14,cumple14,cant_a14,lugar14,riesgo1,observacion1,riesgo2,observacion2,riesgo3,observacion3,riesgo4,observacion4,riesgo5,observacion5,riesgo6,observacion6,observacion7,alma1,alma2,tipo_alma1,alma3,alma4,tipo_alma2,alma5,alma6,tipo_alma3,alma7,tipo_alma4,alma8,tipo_alma5,alma9,tipo_alma6,alma10,alma11,tipo_alma7,alma12,tipo_alma8,disposiciones_finales,observaciones_finales,resolucion,para_extender,plazo,anexo,nro_registro,foto from empresa,informe_general,informe_proteccion,informe_prevencion,informe_incendios,informe_confirmar,tasa_servicio where informe_general.id_informe_general = informe_proteccion.id_informe_general and informe_general.id_informe_general = informe_prevencion.id_informe_general and informe_general.id_informe_general = informe_incendios.id_informe_general and informe_general.id_informe_general = informe_confirmar.id_informe_general and empresa.id_empresa = informe_general.id_empresa and informe_general.id_tasa = tasa_servicio.id_tasa_servicio $_GET[searchField] not like '$_GET[searchString]%' and fecha_general between '".$fecha."-01-01"."' and '".$fecha."-12-31"."' ORDER BY $sidx $sord offset $start limit $limit";	                                   
        }
        if($_GET['searchOper']=='ew'){            
        	$SQL = "select informe_general.id_informe_general,permiso,empresa.id_empresa,nombre_empresa,ruc_empresa,representante_legal,actividad_empresa,parroquia,capital_giro,direccion_empresa,telefono_empresa,id_tasa,nombre_tasa,valor_tasa,area_util_m2,pe,mmr,riesgo,area_total_m2,visible_legible,solicitud_nro,nro_ocupantes_fijos,nro_flotantes,aforo,tipo_construccion,techo,ventilacion,disposicion,fecha_general,hora_inicio,hora_fin,tipo_inspeccion,extinto,agua,oper_1,no_oper_1,cumple_1,disposiciones_1,cant_1,pqs,oper_2,no_oper_2,cumple_2,disposiciones_2,cant_2,co2,oper_3,no_oper_3,cumple_3,disposiciones_3,cant_3,espuma,oper_4,no_oper_4,cumple_4,disposiciones_4,cant_4,agentes,oper_5,no_oper_5,cumple_5,disposiciones_5,cant_5,cant1,cumple1,cant_a1,lugar1,cant2,cumple2,cant_a2,lugar2,cant3,cumple3,cant_a3,lugar3,cant4,cumple4,cant_a4,lugar4,cant5,cumple5,cant_a5,lugar5,cant6,cumple6,cant_a6,lugar6,cant7,cumple7,cant_a7,lugar7,cant8,cumple8,cant_a8,lugar8,cant9,cumple9,cant_a9,lugar9,cant10,cumple10,cant_a10,lugar10,cant11,cumple11,cant_a11,lugar11,cant12,cumple12,cant_a12,lugar_12,cant_13,cumple13,cant_a13,lugar13,cant14,cumple14,cant_a14,lugar14,riesgo1,observacion1,riesgo2,observacion2,riesgo3,observacion3,riesgo4,observacion4,riesgo5,observacion5,riesgo6,observacion6,observacion7,alma1,alma2,tipo_alma1,alma3,alma4,tipo_alma2,alma5,alma6,tipo_alma3,alma7,tipo_alma4,alma8,tipo_alma5,alma9,tipo_alma6,alma10,alma11,tipo_alma7,alma12,tipo_alma8,disposiciones_finales,observaciones_finales,resolucion,para_extender,plazo,anexo,nro_registro,foto from empresa,informe_general,informe_proteccion,informe_prevencion,informe_incendios,informe_confirmar,tasa_servicio where informe_general.id_informe_general = informe_proteccion.id_informe_general and informe_general.id_informe_general = informe_prevencion.id_informe_general and informe_general.id_informe_general = informe_incendios.id_informe_general and informe_general.id_informe_general = informe_confirmar.id_informe_general and empresa.id_empresa = informe_general.id_empresa and informe_general.id_tasa = tasa_servicio.id_tasa_servicio $_GET[searchField] like '%$_GET[searchString]' and fecha_general between '".$fecha."-01-01"."' and '".$fecha."-12-31"."' ORDER BY $sidx $sord offset $start limit $limit";	                        
        }
        if($_GET['searchOper']=='en'){        
        	$SQL = "select informe_general.id_informe_general,permiso,empresa.id_empresa,nombre_empresa,ruc_empresa,representante_legal,actividad_empresa,parroquia,capital_giro,direccion_empresa,telefono_empresa,id_tasa,nombre_tasa,valor_tasa,area_util_m2,pe,mmr,riesgo,area_total_m2,visible_legible,solicitud_nro,nro_ocupantes_fijos,nro_flotantes,aforo,tipo_construccion,techo,ventilacion,disposicion,fecha_general,hora_inicio,hora_fin,tipo_inspeccion,extinto,agua,oper_1,no_oper_1,cumple_1,disposiciones_1,cant_1,pqs,oper_2,no_oper_2,cumple_2,disposiciones_2,cant_2,co2,oper_3,no_oper_3,cumple_3,disposiciones_3,cant_3,espuma,oper_4,no_oper_4,cumple_4,disposiciones_4,cant_4,agentes,oper_5,no_oper_5,cumple_5,disposiciones_5,cant_5,cant1,cumple1,cant_a1,lugar1,cant2,cumple2,cant_a2,lugar2,cant3,cumple3,cant_a3,lugar3,cant4,cumple4,cant_a4,lugar4,cant5,cumple5,cant_a5,lugar5,cant6,cumple6,cant_a6,lugar6,cant7,cumple7,cant_a7,lugar7,cant8,cumple8,cant_a8,lugar8,cant9,cumple9,cant_a9,lugar9,cant10,cumple10,cant_a10,lugar10,cant11,cumple11,cant_a11,lugar11,cant12,cumple12,cant_a12,lugar_12,cant_13,cumple13,cant_a13,lugar13,cant14,cumple14,cant_a14,lugar14,riesgo1,observacion1,riesgo2,observacion2,riesgo3,observacion3,riesgo4,observacion4,riesgo5,observacion5,riesgo6,observacion6,observacion7,alma1,alma2,tipo_alma1,alma3,alma4,tipo_alma2,alma5,alma6,tipo_alma3,alma7,tipo_alma4,alma8,tipo_alma5,alma9,tipo_alma6,alma10,alma11,tipo_alma7,alma12,tipo_alma8,disposiciones_finales,observaciones_finales,resolucion,para_extender,plazo,anexo,nro_registro,foto from empresa,informe_general,informe_proteccion,informe_prevencion,informe_incendios,informe_confirmar,tasa_servicio where informe_general.id_informe_general = informe_proteccion.id_informe_general and informe_general.id_informe_general = informe_prevencion.id_informe_general and informe_general.id_informe_general = informe_incendios.id_informe_general and informe_general.id_informe_general = informe_confirmar.id_informe_general and empresa.id_empresa = informe_general.id_empresa and informe_general.id_tasa = tasa_servicio.id_tasa_servicio $_GET[searchField] not like '%$_GET[searchString]' and fecha_general between '".$fecha."-01-01"."' and '".$fecha."-12-31"."' ORDER BY $sidx $sord offset $start limit $limit";	                        
        }
        if($_GET['searchOper']=='cn'){            
        	$SQL = "select informe_general.id_informe_general,permiso,empresa.id_empresa,nombre_empresa,ruc_empresa,representante_legal,actividad_empresa,parroquia,capital_giro,direccion_empresa,telefono_empresa,id_tasa,nombre_tasa,valor_tasa,area_util_m2,pe,mmr,riesgo,area_total_m2,visible_legible,solicitud_nro,nro_ocupantes_fijos,nro_flotantes,aforo,tipo_construccion,techo,ventilacion,disposicion,fecha_general,hora_inicio,hora_fin,tipo_inspeccion,extinto,agua,oper_1,no_oper_1,cumple_1,disposiciones_1,cant_1,pqs,oper_2,no_oper_2,cumple_2,disposiciones_2,cant_2,co2,oper_3,no_oper_3,cumple_3,disposiciones_3,cant_3,espuma,oper_4,no_oper_4,cumple_4,disposiciones_4,cant_4,agentes,oper_5,no_oper_5,cumple_5,disposiciones_5,cant_5,cant1,cumple1,cant_a1,lugar1,cant2,cumple2,cant_a2,lugar2,cant3,cumple3,cant_a3,lugar3,cant4,cumple4,cant_a4,lugar4,cant5,cumple5,cant_a5,lugar5,cant6,cumple6,cant_a6,lugar6,cant7,cumple7,cant_a7,lugar7,cant8,cumple8,cant_a8,lugar8,cant9,cumple9,cant_a9,lugar9,cant10,cumple10,cant_a10,lugar10,cant11,cumple11,cant_a11,lugar11,cant12,cumple12,cant_a12,lugar_12,cant_13,cumple13,cant_a13,lugar13,cant14,cumple14,cant_a14,lugar14,riesgo1,observacion1,riesgo2,observacion2,riesgo3,observacion3,riesgo4,observacion4,riesgo5,observacion5,riesgo6,observacion6,observacion7,alma1,alma2,tipo_alma1,alma3,alma4,tipo_alma2,alma5,alma6,tipo_alma3,alma7,tipo_alma4,alma8,tipo_alma5,alma9,tipo_alma6,alma10,alma11,tipo_alma7,alma12,tipo_alma8,disposiciones_finales,observaciones_finales,resolucion,para_extender,plazo,anexo,nro_registro,foto from empresa,informe_general,informe_proteccion,informe_prevencion,informe_incendios,informe_confirmar,tasa_servicio where informe_general.id_informe_general = informe_proteccion.id_informe_general and informe_general.id_informe_general = informe_prevencion.id_informe_general and informe_general.id_informe_general = informe_incendios.id_informe_general and informe_general.id_informe_general = informe_confirmar.id_informe_general and empresa.id_empresa = informe_general.id_empresa and informe_general.id_tasa = tasa_servicio.id_tasa_servicio $_GET[searchField] like '%$_GET[searchString]%' and fecha_general between '".$fecha."-01-01"."' and '".$fecha."-12-31"."' ORDER BY $sidx $sord offset $start limit $limit";	                        
        }
        if($_GET['searchOper']=='nc'){            
        	$SQL = "select informe_general.id_informe_general,permiso,empresa.id_empresa,nombre_empresa,ruc_empresa,representante_legal,actividad_empresa,parroquia,capital_giro,direccion_empresa,telefono_empresa,id_tasa,nombre_tasa,valor_tasa,area_util_m2,pe,mmr,riesgo,area_total_m2,visible_legible,solicitud_nro,nro_ocupantes_fijos,nro_flotantes,aforo,tipo_construccion,techo,ventilacion,disposicion,fecha_general,hora_inicio,hora_fin,tipo_inspeccion,extinto,agua,oper_1,no_oper_1,cumple_1,disposiciones_1,cant_1,pqs,oper_2,no_oper_2,cumple_2,disposiciones_2,cant_2,co2,oper_3,no_oper_3,cumple_3,disposiciones_3,cant_3,espuma,oper_4,no_oper_4,cumple_4,disposiciones_4,cant_4,agentes,oper_5,no_oper_5,cumple_5,disposiciones_5,cant_5,cant1,cumple1,cant_a1,lugar1,cant2,cumple2,cant_a2,lugar2,cant3,cumple3,cant_a3,lugar3,cant4,cumple4,cant_a4,lugar4,cant5,cumple5,cant_a5,lugar5,cant6,cumple6,cant_a6,lugar6,cant7,cumple7,cant_a7,lugar7,cant8,cumple8,cant_a8,lugar8,cant9,cumple9,cant_a9,lugar9,cant10,cumple10,cant_a10,lugar10,cant11,cumple11,cant_a11,lugar11,cant12,cumple12,cant_a12,lugar_12,cant_13,cumple13,cant_a13,lugar13,cant14,cumple14,cant_a14,lugar14,riesgo1,observacion1,riesgo2,observacion2,riesgo3,observacion3,riesgo4,observacion4,riesgo5,observacion5,riesgo6,observacion6,observacion7,alma1,alma2,tipo_alma1,alma3,alma4,tipo_alma2,alma5,alma6,tipo_alma3,alma7,tipo_alma4,alma8,tipo_alma5,alma9,tipo_alma6,alma10,alma11,tipo_alma7,alma12,tipo_alma8,disposiciones_finales,observaciones_finales,resolucion,para_extender,plazo,anexo,nro_registro,foto from empresa,informe_general,informe_proteccion,informe_prevencion,informe_incendios,informe_confirmar,tasa_servicio where informe_general.id_informe_general = informe_proteccion.id_informe_general and informe_general.id_informe_general = informe_prevencion.id_informe_general and informe_general.id_informe_general = informe_incendios.id_informe_general and informe_general.id_informe_general = informe_confirmar.id_informe_general and empresa.id_empresa = informe_general.id_empresa and informe_general.id_tasa = tasa_servicio.id_tasa_servicio $_GET[searchField] not like '%$_GET[searchString]%' and fecha_general between '".$fecha."-01-01"."' and '".$fecha."-12-31"."' ORDER BY $sidx $sord offset $start limit $limit";	                        
        }
        if($_GET['searchOper']=='in'){            
        	$SQL = "select informe_general.id_informe_general,permiso,empresa.id_empresa,nombre_empresa,ruc_empresa,representante_legal,actividad_empresa,parroquia,capital_giro,direccion_empresa,telefono_empresa,id_tasa,nombre_tasa,valor_tasa,area_util_m2,pe,mmr,riesgo,area_total_m2,visible_legible,solicitud_nro,nro_ocupantes_fijos,nro_flotantes,aforo,tipo_construccion,techo,ventilacion,disposicion,fecha_general,hora_inicio,hora_fin,tipo_inspeccion,extinto,agua,oper_1,no_oper_1,cumple_1,disposiciones_1,cant_1,pqs,oper_2,no_oper_2,cumple_2,disposiciones_2,cant_2,co2,oper_3,no_oper_3,cumple_3,disposiciones_3,cant_3,espuma,oper_4,no_oper_4,cumple_4,disposiciones_4,cant_4,agentes,oper_5,no_oper_5,cumple_5,disposiciones_5,cant_5,cant1,cumple1,cant_a1,lugar1,cant2,cumple2,cant_a2,lugar2,cant3,cumple3,cant_a3,lugar3,cant4,cumple4,cant_a4,lugar4,cant5,cumple5,cant_a5,lugar5,cant6,cumple6,cant_a6,lugar6,cant7,cumple7,cant_a7,lugar7,cant8,cumple8,cant_a8,lugar8,cant9,cumple9,cant_a9,lugar9,cant10,cumple10,cant_a10,lugar10,cant11,cumple11,cant_a11,lugar11,cant12,cumple12,cant_a12,lugar_12,cant_13,cumple13,cant_a13,lugar13,cant14,cumple14,cant_a14,lugar14,riesgo1,observacion1,riesgo2,observacion2,riesgo3,observacion3,riesgo4,observacion4,riesgo5,observacion5,riesgo6,observacion6,observacion7,alma1,alma2,tipo_alma1,alma3,alma4,tipo_alma2,alma5,alma6,tipo_alma3,alma7,tipo_alma4,alma8,tipo_alma5,alma9,tipo_alma6,alma10,alma11,tipo_alma7,alma12,tipo_alma8,disposiciones_finales,observaciones_finales,resolucion,para_extender,plazo,anexo,nro_registro,foto from empresa,informe_general,informe_proteccion,informe_prevencion,informe_incendios,informe_confirmar,tasa_servicio where informe_general.id_informe_general = informe_proteccion.id_informe_general and informe_general.id_informe_general = informe_prevencion.id_informe_general and informe_general.id_informe_general = informe_incendios.id_informe_general and informe_general.id_informe_general = informe_confirmar.id_informe_general and empresa.id_empresa = informe_general.id_empresa and informe_general.id_tasa = tasa_servicio.id_tasa_servicio $_GET[searchField] like '%$_GET[searchString]%' and fecha_general between '".$fecha."-01-01"."' and '".$fecha."-12-31"."' ORDER BY $sidx $sord offset $start limit $limit";	                        
            
        }
        if($_GET['searchOper']=='ni'){
        	$SQL = "select informe_general.id_informe_general,permiso,empresa.id_empresa,nombre_empresa,ruc_empresa,representante_legal,actividad_empresa,parroquia,capital_giro,direccion_empresa,telefono_empresa,id_tasa,nombre_tasa,valor_tasa,area_util_m2,pe,mmr,riesgo,area_total_m2,visible_legible,solicitud_nro,nro_ocupantes_fijos,nro_flotantes,aforo,tipo_construccion,techo,ventilacion,disposicion,fecha_general,hora_inicio,hora_fin,tipo_inspeccion,extinto,agua,oper_1,no_oper_1,cumple_1,disposiciones_1,cant_1,pqs,oper_2,no_oper_2,cumple_2,disposiciones_2,cant_2,co2,oper_3,no_oper_3,cumple_3,disposiciones_3,cant_3,espuma,oper_4,no_oper_4,cumple_4,disposiciones_4,cant_4,agentes,oper_5,no_oper_5,cumple_5,disposiciones_5,cant_5,cant1,cumple1,cant_a1,lugar1,cant2,cumple2,cant_a2,lugar2,cant3,cumple3,cant_a3,lugar3,cant4,cumple4,cant_a4,lugar4,cant5,cumple5,cant_a5,lugar5,cant6,cumple6,cant_a6,lugar6,cant7,cumple7,cant_a7,lugar7,cant8,cumple8,cant_a8,lugar8,cant9,cumple9,cant_a9,lugar9,cant10,cumple10,cant_a10,lugar10,cant11,cumple11,cant_a11,lugar11,cant12,cumple12,cant_a12,lugar_12,cant_13,cumple13,cant_a13,lugar13,cant14,cumple14,cant_a14,lugar14,riesgo1,observacion1,riesgo2,observacion2,riesgo3,observacion3,riesgo4,observacion4,riesgo5,observacion5,riesgo6,observacion6,observacion7,alma1,alma2,tipo_alma1,alma3,alma4,tipo_alma2,alma5,alma6,tipo_alma3,alma7,tipo_alma4,alma8,tipo_alma5,alma9,tipo_alma6,alma10,alma11,tipo_alma7,alma12,tipo_alma8,disposiciones_finales,observaciones_finales,resolucion,para_extender,plazo,anexo,nro_registro,foto from empresa,informe_general,informe_proteccion,informe_prevencion,informe_incendios,informe_confirmar,tasa_servicio where informe_general.id_informe_general = informe_proteccion.id_informe_general and informe_general.id_informe_general = informe_prevencion.id_informe_general and informe_general.id_informe_general = informe_incendios.id_informe_general and informe_general.id_informe_general = informe_confirmar.id_informe_general and empresa.id_empresa = informe_general.id_empresa and informe_general.id_tasa = tasa_servicio.id_tasa_servicio $_GET[searchField] not like '%$_GET[searchString]%' and fecha_general between '".$fecha."-01-01"."' and '".$fecha."-12-31"."' ORDER BY $sidx $sord offset $start limit $limit";	                        
        }        
    }	 
   // echo $SQL;   
	$result = xml_sql($conexion,$SQL);			
	header("Content-type: text/xml;charset=utf-8");
	$s = "<?xml version='1.0' encoding='utf-8'?>";	
	$s .= "<rows>";
	$s .= "<page>" . $page . "</page>";
	$s .= "<total>" . $total_pages . "</total>";
	$s .= "<records>" . $count . "</records>";
	while ($row = pg_fetch_row($result)) {		
		$s .= "<row id='" . $row[0] . "'>";	
		$s .= "<cell>" . $row[0]. "</cell>";	
        $s .= "<cell>" . $row[1]. "</cell>";    
        $s .= "<cell>" . $row[2] . "</cell>";					
        $s .= "<cell>" . $row[3] . "</cell>";
		$s .= "<cell>" . $row[4] . "</cell>";
        $s .= "<cell>" . $row[5] . "</cell>";
        $s .= "<cell>" . $row[6] . "</cell>";
        $s .= "<cell>" . $row[7] . "</cell>";
        $s .= "<cell>" . $row[8] . "</cell>";
        $s .= "<cell>" . $row[9]. "</cell>";                        
        $s .= "<cell>" . $row[10] . "</cell>";
        $s .= "<cell>" . $row[11] . "</cell>";
        $s .= "<cell>" . $row[12] . "</cell>";
        $s .= "<cell>" . $row[13] . "</cell>";        
        $s .= "<cell>" . $row[14]. "</cell>";                        
        $s .= "<cell>" . $row[15] . "</cell>";
        $s .= "<cell>" . $row[16] . "</cell>";
        $s .= "<cell>" . $row[17] . "</cell>";
        $s .= "<cell>" . $row[18] . "</cell>";
        $s .= "<cell>" . $row[19] . "</cell>";
        $s .= "<cell>" . $row[20] . "</cell>";
        $s .= "<cell>" . $row[21] . "</cell>";
        $s .= "<cell>" . $row[22] . "</cell>";
        $s .= "<cell>" . $row[23] . "</cell>";
        $s .= "<cell>" . $row[24] . "</cell>";        
        $s .= "<cell>" . $row[25]. "</cell>";                        
        $s .= "<cell>" . $row[26] . "</cell>";
        $s .= "<cell>" . $row[27] . "</cell>";
        $s .= "<cell>" . $row[28] . "</cell>";
        $s .= "<cell>" . $row[29] . "</cell>";
        $s .= "<cell>" . $row[30] . "</cell>";
        $s .= "<cell>" . $row[31] . "</cell>";
        $s .= "<cell>" . $row[32] . "</cell>";
        $s .= "<cell>" . $row[33] . "</cell>";
        $s .= "<cell>" . $row[34] . "</cell>";        
        $s .= "<cell>" . $row[35]. "</cell>";                        
        $s .= "<cell>" . $row[36] . "</cell>";
        $s .= "<cell>" . $row[37] . "</cell>";
        $s .= "<cell>" . $row[38] . "</cell>";
        $s .= "<cell>" . $row[39] . "</cell>";
        $s .= "<cell>" . $row[40] . "</cell>";
        $s .= "<cell>" . $row[41] . "</cell>";
        $s .= "<cell>" . $row[42] . "</cell>";
        $s .= "<cell>" . $row[43] . "</cell>";
        $s .= "<cell>" . $row[44] . "</cell>";        
        $s .= "<cell>" . $row[45]. "</cell>";                        
        $s .= "<cell>" . $row[46] . "</cell>";
        $s .= "<cell>" . $row[47] . "</cell>";
        $s .= "<cell>" . $row[48] . "</cell>";
        $s .= "<cell>" . $row[49] . "</cell>";
        $s .= "<cell>" . $row[50] . "</cell>";
        $s .= "<cell>" . $row[51] . "</cell>";
        $s .= "<cell>" . $row[52] . "</cell>";
        $s .= "<cell>" . $row[53] . "</cell>";
        $s .= "<cell>" . $row[54] . "</cell>";        
        $s .= "<cell>" . $row[55]. "</cell>";                        
        $s .= "<cell>" . $row[56] . "</cell>";
        $s .= "<cell>" . $row[57] . "</cell>";
        $s .= "<cell>" . $row[58] . "</cell>";
        $s .= "<cell>" . $row[59] . "</cell>";
        $s .= "<cell>" . $row[60] . "</cell>";
        $s .= "<cell>" . $row[61] . "</cell>";
        $s .= "<cell>" . $row[62] . "</cell>";
        $s .= "<cell>" . $row[63] . "</cell>";
        $s .= "<cell>" . $row[64] . "</cell>";        
        $s .= "<cell>" . $row[65]. "</cell>";                        
        $s .= "<cell>" . $row[66] . "</cell>";
        $s .= "<cell>" . $row[67] . "</cell>";
        $s .= "<cell>" . $row[68] . "</cell>";
        $s .= "<cell>" . $row[69] . "</cell>";
        $s .= "<cell>" . $row[70] . "</cell>";
        $s .= "<cell>" . $row[71] . "</cell>";
        $s .= "<cell>" . $row[72] . "</cell>";
        $s .= "<cell>" . $row[73] . "</cell>";
        $s .= "<cell>" . $row[74] . "</cell>";        
        $s .= "<cell>" . $row[75]. "</cell>";                        
        $s .= "<cell>" . $row[76] . "</cell>";
        $s .= "<cell>" . $row[77] . "</cell>";
        $s .= "<cell>" . $row[78] . "</cell>";
        $s .= "<cell>" . $row[79] . "</cell>";
        $s .= "<cell>" . $row[80] . "</cell>";
        $s .= "<cell>" . $row[81] . "</cell>";
        $s .= "<cell>" . $row[82] . "</cell>";
        $s .= "<cell>" . $row[83] . "</cell>";
        $s .= "<cell>" . $row[84] . "</cell>";        
        $s .= "<cell>" . $row[85]. "</cell>";                        
        $s .= "<cell>" . $row[86] . "</cell>";
        $s .= "<cell>" . $row[87] . "</cell>";
        $s .= "<cell>" . $row[88] . "</cell>";
        $s .= "<cell>" . $row[89] . "</cell>";
        $s .= "<cell>" . $row[90] . "</cell>";
        $s .= "<cell>" . $row[91] . "</cell>";
        $s .= "<cell>" . $row[92] . "</cell>";
        $s .= "<cell>" . $row[93] . "</cell>";
        $s .= "<cell>" . $row[94] . "</cell>";        
        $s .= "<cell>" . $row[95]. "</cell>";                        
        $s .= "<cell>" . $row[96] . "</cell>";
        $s .= "<cell>" . $row[97] . "</cell>";
        $s .= "<cell>" . $row[98] . "</cell>";
        $s .= "<cell>" . $row[99] . "</cell>";
        $s .= "<cell>" . $row[100] . "</cell>";
        $s .= "<cell>" . $row[101] . "</cell>";
        $s .= "<cell>" . $row[102] . "</cell>";
        $s .= "<cell>" . $row[103] . "</cell>";
        $s .= "<cell>" . $row[104] . "</cell>";        
        $s .= "<cell>" . $row[105]. "</cell>";                        
        $s .= "<cell>" . $row[106] . "</cell>";
        $s .= "<cell>" . $row[107] . "</cell>";
        $s .= "<cell>" . $row[108] . "</cell>";
        $s .= "<cell>" . $row[109] . "</cell>";
        $s .= "<cell>" . $row[110] . "</cell>";
        $s .= "<cell>" . $row[111] . "</cell>";
        $s .= "<cell>" . $row[112] . "</cell>";
        $s .= "<cell>" . $row[113] . "</cell>";
        $s .= "<cell>" . $row[114] . "</cell>";        
        $s .= "<cell>" . $row[115]. "</cell>";                        
        $s .= "<cell>" . $row[116] . "</cell>";
        $s .= "<cell>" . $row[117] . "</cell>";
        $s .= "<cell>" . $row[118] . "</cell>";
        $s .= "<cell>" . $row[119] . "</cell>";
        $s .= "<cell>" . $row[120] . "</cell>";
        $s .= "<cell>" . $row[121] . "</cell>";
        $s .= "<cell>" . $row[122] . "</cell>";
        $s .= "<cell>" . $row[123] . "</cell>";
        $s .= "<cell>" . $row[124] . "</cell>";        
        $s .= "<cell>" . $row[125]. "</cell>";                        
        $s .= "<cell>" . $row[126] . "</cell>";
        $s .= "<cell>" . $row[127] . "</cell>";
        $s .= "<cell>" . $row[128] . "</cell>";
        $s .= "<cell>" . $row[129] . "</cell>";
        $s .= "<cell>" . $row[130] . "</cell>";
        $s .= "<cell>" . $row[131] . "</cell>";
        $s .= "<cell>" . $row[132] . "</cell>";
        $s .= "<cell>" . $row[133] . "</cell>";
        $s .= "<cell>" . $row[134] . "</cell>";        
        $s .= "<cell>" . $row[135]. "</cell>";                        
        $s .= "<cell>" . $row[136] . "</cell>";
        $s .= "<cell>" . $row[137] . "</cell>";
        $s .= "<cell>" . $row[138] . "</cell>";
        $s .= "<cell>" . $row[139] . "</cell>";
        $s .= "<cell>" . $row[140] . "</cell>";
        $s .= "<cell>" . $row[141] . "</cell>";
        $s .= "<cell>" . $row[142] . "</cell>";
        $s .= "<cell>" . $row[143] . "</cell>";
        $s .= "<cell>" . $row[144] . "</cell>";        
        $s .= "<cell>" . $row[145]. "</cell>";                        
        $s .= "<cell>" . $row[146] . "</cell>";
        $s .= "<cell>" . $row[147] . "</cell>";
        $s .= "<cell>" . $row[148] . "</cell>";
        $s .= "<cell>" . $row[149] . "</cell>";
        $s .= "<cell>" . $row[150] . "</cell>";
        $s .= "<cell>" . $row[151] . "</cell>";
        $s .= "<cell>" . $row[152] . "</cell>";
        $s .= "<cell>" . $row[153] . "</cell>";
        $s .= "<cell>" . $row[154] . "</cell>";        
        $s .= "<cell>" . $row[155]. "</cell>";                        
        $s .= "<cell>" . $row[156] . "</cell>";
        $s .= "<cell>" . $row[157] . "</cell>";
        $s .= "<cell>" . $row[158] . "</cell>";
        $s .= "<cell>" . $row[159] . "</cell>";
        

        
                                
                
        $s .= "</row>";
	}
	$s .= "</rows>";
	echo $s;
?>
