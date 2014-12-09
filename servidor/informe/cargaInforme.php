<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	date_default_timezone_set('America/Guayaquil');
    $fecha=date("Y");    
	$data;
	$conexion = conectarse();	
	if($_POST['tipo'] == '0'){		
		$sql = "select permiso from informe_general,informe_confirmar where informe_general.id_informe_general = informe_confirmar.id_informe_general and informe_general.id_empresa = '$_POST[id]' and fecha_general between '".$fecha."-01-01"."' and '".$fecha."-12-31"."'";				
		$estado = consulta($conexion,$sql);		
		if ($estado == 'true'){
			$data = 1;
		}else{
			$data = 0;
		}
	echo $data;
	}else{
		if($_POST['tipo'] == '1'){		
			$sql = "select informe_general.id_informe_general from informe_general,informe_confirmar where informe_general.id_informe_general = informe_confirmar.id_informe_general and informe_general.id_empresa = '$_POST[id]' and fecha_general between '".$fecha."-01-01"."' and '".$fecha."-12-31"."'";				
			$resp = consultaIndex($conexion,$sql,'0');
			$sql ="select informe_general.id_informe_general,permiso,empresa.id_empresa,nombre_empresa,ruc_empresa,representante_legal,actividad_empresa,parroquia,capital_giro,direccion_empresa,telefono_empresa,id_tasa,nombre_tasa,valor_tasa,area_util_m2,pe,mmr,riesgo,area_total_m2,visible_legible,solicitud_nro,nro_ocupantes_fijos,nro_flotantes,aforo,tipo_construccion,techo,ventilacion,disposicion,fecha_general,hora_inicio,hora_fin,tipo_inspeccion,extinto,agua,oper_1,no_oper_1,cumple_1,disposiciones_1,cant_1,pqs,oper_2,no_oper_2,cumple_2,disposiciones_2,cant_2,co2,oper_3,no_oper_3,cumple_3,disposiciones_3,cant_3,espuma,oper_4,no_oper_4,cumple_4,disposiciones_4,cant_4,agentes,oper_5,no_oper_5,cumple_5,disposiciones_5,cant_5,cant1,cumple1,cant_a1,lugar1,cant2,cumple2,cant_a2,lugar2,cant3,cumple3,cant_a3,lugar3,cant4,cumple4,cant_a4,lugar4,cant5,cumple5,cant_a5,lugar5,cant6,cumple6,cant_a6,lugar6,cant7,cumple7,cant_a7,lugar7,cant8,cumple8,cant_a8,lugar8,cant9,cumple9,cant_a9,lugar9,cant10,cumple10,cant_a10,lugar10,cant11,cumple11,cant_a11,lugar11,cant12,cumple12,cant_a12,lugar_12,cant_13,cumple13,cant_a13,lugar13,cant14,cumple14,cant_a14,lugar14,riesgo1,observacion1,riesgo2,observacion2,riesgo3,observacion3,riesgo4,observacion4,riesgo5,observacion5,riesgo6,observacion6,observacion7,alma1,alma2,tipo_alma1,alma3,alma4,tipo_alma2,alma5,alma6,tipo_alma3,alma7,tipo_alma4,alma8,tipo_alma5,alma9,tipo_alma6,alma10,alma11,tipo_alma7,alma12,tipo_alma8,disposiciones_finales,observaciones_finales,resolucion,para_extender,plazo,anexo,nro_registro,foto,documentos,nombre_propietario from empresa,informe_general,informe_proteccion,informe_prevencion,informe_incendios,informe_confirmar,tasa_servicio,propietario where informe_general.id_informe_general = informe_proteccion.id_informe_general and informe_general.id_informe_general = informe_prevencion.id_informe_general and informe_general.id_informe_general = informe_incendios.id_informe_general and informe_general.id_informe_general = informe_confirmar.id_informe_general and empresa.id_empresa = informe_general.id_empresa and informe_general.id_tasa = tasa_servicio.id_tasa_servicio and empresa.id_propietario = propietario.id_propietario and informe_general.id_informe_general = '$resp'";
			cargaInforme($conexion,$sql);	
		}
	}	
	
?>