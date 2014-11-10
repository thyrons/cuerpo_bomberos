<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	$data;
	$conexion = conectarse();
    $lista = array();
	$sql="select id_empresa,ruc_empresa,nombre_empresa,representante_legal from empresa order by id_empresa asc";    
	cargaEmpresas($conexion,$sql);
	
?>