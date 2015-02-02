<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	$data;
	$nro = "";
	$conexion = conectarse();
	$resp = repetidos($conexion,"nro_factura",$_POST['id'],"emision_permisos","g","","");
	
	if($resp == "true"){
		$nro = id_tabla($conexion,"emision_permisos","nro_factura");		
	}else{
		$nro = "";
	}
	echo $nro;	
?>
