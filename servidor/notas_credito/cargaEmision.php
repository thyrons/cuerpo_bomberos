<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	$data;
	$conexion = conectarse();
	
	$sql = "select cod_productos,nombre_producto,cantidad,detalle_devolucion_venta.precio_venta, total_venta from detalle_devolucion_venta,productos where detalle_devolucion_venta.cod_productos = productos.id_producto and id_devolucion_venta = '$_GET[id]'";	
	$data = carga_facturaDetalles($conexion,$sql);
	$data = (json_encode($data));
	echo $data;		
?>