<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	$data;
	$conexion = conectarse();
	$sql = pg_query("select estados_principales,estados_segundarios from usuarios_permisos where id_usuario = '$_GET[id]'");
	$principales;
	$segundarios;
	while($row = pg_fetch_row($sql)){
		$principales =$row[0];
		$segundarios =$row[1];
	}	
	$principales = str_replace("{", "", $principales);
	$principales = str_replace("}", "", $principales);
	$array_principales = explode(",", $principales);
	$segundarios = str_replace("{", "", $segundarios);
	$segundarios = str_replace("}", "", $segundarios);
	$array_segundarios = explode(",", $segundarios);	
	$data[] =$principales;
	$data2[] =$segundarios;
	$data3=array("Principales" => $data, "Segundarios" => $data2); 
	$data3 = (json_encode($data3));
	echo $data3;	
?>