<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	$data;
	$id = "0";
	$conexion = conectarse();
	$id = id_tabla($conexion,"emision_permisos","nro_factura");
	echo $id;

	
?>
