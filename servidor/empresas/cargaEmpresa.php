<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	$data;
	$conexion = conectarse();
    $lista = array();
	$sql="select empresa.id_empresa,ruc_empresa,nombre_empresa,actividad_empresa,representante_legal,empresa_estado.estado,imagen_estado from empresa,empresa_estado where empresa.id_empresa = empresa_estado.id_empresa and id_propietario = '$_POST[id]' order by fecha_estado desc limit 1";    
	cargaEmpresas($conexion,$sql);
	
?>