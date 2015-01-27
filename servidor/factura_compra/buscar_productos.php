<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	$data;
	$conexion = conectarse();
	$texto = strtoupper($_GET['term']);
	$sql="select id_producto,nombre_producto,stock,precio_venta,valor_iva from productos where nombre_producto like '%$texto%' order by id_producto asc";			
	busquedas5($conexion,$sql);	
?>
