<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	$data;
	$conexion = conectarse();
	$texto = strtoupper($_GET['term']);	
	$sql="select id_empresa,nombre_empresa from empresa where nombre_empresa like '%$texto%'";		
	busquedas8($conexion,$sql);	
?>
