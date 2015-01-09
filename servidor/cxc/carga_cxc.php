<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	
	$sql = "select id_detalle_cxc,id_cxc,fecha_abono,valor,detalle,forma_pago from detalles_cxc where id_cxc = '$_GET[id]'";	
	
?>