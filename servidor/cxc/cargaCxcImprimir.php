<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	$data;
	$conexion = conectarse();		
	$sql = "select id_detalle_cxc,fecha_abono,forma_pago,detalle,valor from detalles_cxc where id_cxc = '$_GET[id]' order by id_detalle_cxc";
	$data = carga_facturaDetalles($conexion,$sql);
	$data = (json_encode($data));
	echo $data;		
?>