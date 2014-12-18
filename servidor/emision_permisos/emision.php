<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	$conexion = conectarse();
	date_default_timezone_set('America/Guayaquil');
    $fecha=date('Y-m-d H:i:s', time());   
    $anio=date('Y', time());   
	//$listaProductos = json_decode($_GET['v']);
 	$array = (array)json_decode($_GET['v']);
 	//$listaProductos =  var_dump(json_decode($_GET['v'], true));
 	//echo $array;
 	$lista = array();
 	$cont = 0;
 	foreach ($array as $key => $value)
	{	    	    	        
	        $lista[$cont] = $value;
	        $cont++;
	}
	
	$id = id_tabla($conexion,"emsion_permisos","id_emision");
    
?>
