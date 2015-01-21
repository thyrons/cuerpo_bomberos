<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	$data;
	$conexion = conectarse();
	$texto = strtoupper($_GET['term']);
	if($_GET['fn'] == '0'){		
		$sql="SELECT distinct propietario.id_propietario,ruc_propietario,nombre_propietario FROM detalles_emision,emision_permisos,propietario WHERE id_producto != '' and detalles_emision.id_emsion = emision_permisos.id_emision and propietario.id_propietario = emision_permisos.id_propietario and ruc_propietario like '%$texto%'";				
	}else{
		if($_GET['fn'] == '1'){
			$sql="SELECT distinct propietario.id_propietario,ruc_propietario,nombre_propietario FROM detalles_emision,emision_permisos,propietario WHERE id_producto != '' and detalles_emision.id_emsion = emision_permisos.id_emision and propietario.id_propietario = emision_permisos.id_propietario and nombre_propietario like '%$texto%'";				
		}	
	}
	busquedas_cxc($conexion,$sql);	
?>
