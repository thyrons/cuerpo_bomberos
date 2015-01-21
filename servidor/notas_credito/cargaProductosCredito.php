<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	$data;
	$conexion = conectarse();
	$texto = strtoupper($_GET['term']);	
	$sql="select id_producto,detalle,cantidad,precio_unitario,precio_total from emision_permisos, detalles_emision where emision_permisos.id_emision = detalles_emision.id_emsion and id_emision = '$_GET[id]' and id_producto != '' and detalle like '%$texto%'";					
	busquedas_nxc($conexion,$sql);	
?>
