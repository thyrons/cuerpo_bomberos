<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	$data;
	$conexion = conectarse();
	$sql = "select id_tipo_usuario,nombre_tipo from tipo_usuario order by id_tipo_usuario asc";
	cargarSelect($conexion,$sql);
?>