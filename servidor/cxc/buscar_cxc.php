<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	$data;
	$conexion = conectarse();
	$texto = strtoupper($_GET['term']);
	if($_GET['fn'] == '0'){
		$sql="select distinct propietario.id_propietario,ruc_propietario,nombre_propietario from c_x_cobrar,usuario,emision_permisos,propietario where c_x_cobrar.estado = '0' and c_x_cobrar.id_usuario = usuario.id_usuario and c_x_cobrar.id_emsion_permisos = emision_permisos.id_emision and emision_permisos.id_propietario = propietario.id_propietario and ruc_propietario like '%$texto%'";				
	}else{
		if($_GET['fn'] == '1'){
			$sql="select distinct propietario.id_propietario,nombre_propietario,ruc_propietario from 	c_x_cobrar,usuario,emision_permisos,propietario where c_x_cobrar.estado = '0' and c_x_cobrar.id_usuario = usuario.id_usuario and c_x_cobrar.id_emsion_permisos = emision_permisos.id_emision and emision_permisos.id_propietario = propietario.id_propietario and nombre_propietario like '%$texto%'";				
		}	
	}
	busquedas_cxc($conexion,$sql);	
?>
