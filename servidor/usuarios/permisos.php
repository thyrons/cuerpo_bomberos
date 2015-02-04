<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	$data;
	$conexion = conectarse();
	$texto = $_GET['term'];		
	$sql="select id_usuario,nombre_usuario from usuario where (ci_usuario like '$texto%' or nombre_usuario like '$texto%')";			
	//echo $sql;
	busquedas8($conexion,$sql);	
?>
