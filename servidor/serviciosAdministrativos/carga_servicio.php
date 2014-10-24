<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	$data;
	$conexion = conectarse();
	$sql = "select id_servicio,nombre_servicio from servicios_administrativos order by id_servicio asc";
	cargarSelect($conexion,$sql);
?>