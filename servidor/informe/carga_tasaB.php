<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	$data;
	$texto = $_GET['texto'];
	$id =$_GET['ids'];
	$conexion = conectarse();
	$sql = "select little,medium,big,sbig from tasa_servicio where id_tasa_servicio = '$id'";		
	echo $sql;
	carga_tasaB($conexion,$sql,$texto);	
?>