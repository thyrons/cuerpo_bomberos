<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	$data;
	$conexion = conectarse();
	$texto = strtoupper($_GET['term']);
	$tipo = $_GET['tipo'];
	if($tipo == "0"){
		$sql="select id_propietario,ruc_propietario,nombre_propietario from propietario where ruc_propietario like '$texto%'";	
	}else{
		if($tipo == "1"){
			$sql="select id_propietario,nombre_propietario,ruc_propietario from propietario where nombre_propietario like '$texto%';";	
		}	
	}	
	//echo $sql;
	busquedas3($conexion,$sql);	
?>
