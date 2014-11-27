<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	$data;
	$texto = $_GET['texto'];
	$conexion = conectarse();
	$sql = "select little,medium,big,sbig from tasa_servicio where id_tasa_servicio = '1001'";	
	carga_tasaB($conexion,$sql,$texto);	
?>