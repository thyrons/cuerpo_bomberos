<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	$data;
	$conexion = conectarse();
	$texto = strtoupper($_GET['term']);
	$tipo = $_GET['tipo'];
	if($tipo == "0"){
		$sql="select ruc_empresa,nombre_empresa,id_empresa,actividad_empresa,direccion_empresa,nombre_empresa,telefono_empresa,parroquia from empresa where ruc_empresa like '$texto%'";	
	}
	
	busquedas_v($conexion,$sql);	
?>