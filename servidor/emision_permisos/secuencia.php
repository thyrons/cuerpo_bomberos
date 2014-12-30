<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	$conexion = conectarse();
	$lista1 = array();
	$lista2 = array();
	$lista3 = array();
	$data = array();
	$sesion = session_activa();
	if($_GET['fn'] == '0'){//function atras
		if($_GET['id'] != ''){///si exsite un id previo
			$id = atras("id_emision","emision_permisos","id_emision",$sesion,$_GET['id']);//id de la tabla unico resultado tabla campo a ordenado
		}else{			
			$id = atras_no("id_emision","emision_permisos","id_emision",$sesion);//id de la tabla unico resultado tabla campo a ordenado			
		}
		$sql_cabecera = "select id_emision,fecha,hora_factura,nombre_usuario,nro,nro1,nro_factura,propietario.id_propietario,ruc_propietario,nombre_propietario,fecha_cancelacion,emision_permisos.id_tipo_pago,sutotal,iva0,iva12,total from emision_permisos,usuario,propietario,tipo_pago where emision_permisos.id_usuario = usuario.id_usuario and propietario.id_propietario = emision_permisos.id_propietario and emision_permisos.id_tipo_pago = tipo_pago.id_tipo_pago and id_emision = '$id'";				
		$sql_detalles = "select * from detalles_emision where id_emsion = '$id'";
		$lista1=array(carga_factura($conexion,$sql_cabecera)); 
		$lista2=array(carga_facturaDetalles($conexion,$sql_detalles)); 
		$lista3=array("Cabecera" => $lista1, "Detalles" => $lista2); 
		$data = (json_encode($lista3));
		echo $data;
	}else{
		if($_GET['fn'] == '1'){//function atras
			if($_GET['id'] != ''){//function adelante
				$id = adelante("id_emision","emision_permisos","id_emision",$sesion,$_GET['id']);//id de la tabla unico resultado tabla campo a ordenado			
			}else{
				$id = adelante_no("id_emision","emision_permisos","id_emision",$sesion);//id de la tabla unico resultado tabla campo a ordenado	
			}
			$sql_cabecera = "select id_emision,fecha,hora_factura,nombre_usuario,nro,nro1,nro_factura,propietario.id_propietario,ruc_propietario,nombre_propietario,fecha_cancelacion,emision_permisos.id_tipo_pago,sutotal,iva0,iva12,total from emision_permisos,usuario,propietario,tipo_pago where emision_permisos.id_usuario = usuario.id_usuario and propietario.id_propietario = emision_permisos.id_propietario and emision_permisos.id_tipo_pago = tipo_pago.id_tipo_pago and id_emision = '$id'";				
			$sql_detalles = "select * from detalles_emision where id_emsion = '$id'";
			$lista1=array(carga_factura($conexion,$sql_cabecera)); 
			$lista2=array(carga_facturaDetalles($conexion,$sql_detalles)); 
			$lista3=array("Cabecera" => $lista1, "Detalles" => $lista2); 
			$data = (json_encode($lista3));
			echo $data;
		}else{
			if($_GET['fn'] == '2'){//function atras
				$sql_cabecera = "select id_emision,fecha,hora_factura,nombre_usuario,nro,nro1,nro_factura,propietario.id_propietario,ruc_propietario,nombre_propietario,fecha_cancelacion,emision_permisos.id_tipo_pago,sutotal,iva0,iva12,total from emision_permisos,usuario,propietario,tipo_pago where emision_permisos.id_usuario = usuario.id_usuario and propietario.id_propietario = emision_permisos.id_propietario and emision_permisos.id_tipo_pago = tipo_pago.id_tipo_pago and id_emision = '$_GET[id]'";				
				$sql_detalles = "select * from detalles_emision where id_emsion = '$_GET[id]'";
				$lista1=array(carga_factura($conexion,$sql_cabecera)); 
				$lista2=array(carga_facturaDetalles($conexion,$sql_detalles)); 
				$lista3=array("Cabecera" => $lista1, "Detalles" => $lista2); 
				$data = (json_encode($lista3));
				echo $data;	
			}
		}
		
	}
?>

