<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	$data;
	$conexion = conectarse();
	//$sql = "select saldo from c_x_cobrar where id_cxc = '$_GET[id]'";
	//$sql = "select total_factura from c_x_cobrar where id_cxc = '$_GET[id]'";
	$sql = "select fecha_abono,forma_pago,detalle,valor from detalles_cxc where id_cxc = '$_GET[id]'";	
	$data = carga_facturaDetalles($conexion,$sql);
	$data = (json_encode($data));
	echo $data;		
?>