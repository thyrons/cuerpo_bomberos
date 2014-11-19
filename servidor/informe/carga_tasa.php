<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	$data;
	$texto = strtoupper($_GET['term']);
	$conexion = conectarse();
	$tipo = $_GET['tipo'];
	if($tipo == "0"){
		$sql="select tasa_servicio.id_servicio,id_tasa_servicio,nombre_tasa,nombre_servicio,little,medium,big,sbig from tasa_servicio,servicios_administrativos where tasa_servicio.id_servicio = servicios_administrativos.id_servicio and nombre_tasa like '%$texto%'  order by servicios_administrativos.id_servicio asc;";	
	}else{
		if($tipo == "1"){
			$sql="select tasa_servicio.id_servicio,nombre_tasa,id_tasa_servicio,nombre_servicio,little,medium,big,sbig from tasa_servicio,servicios_administrativos where tasa_servicio.id_servicio = servicios_administrativos.id_servicio and id_tasa_servicio::text like '%$texto%' order by servicios_administrativos.id_servicio asc;";				
		}
	}
	carga_tasa($conexion,$sql);	
?>