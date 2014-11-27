<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	$data;
	$conexion = conectarse();	
	if($_POST['tipo'] == "0"){
		$sql = 
		$estado = consulta($conexion,$sql);
	}else{
		
	}
	echo $data;
?>