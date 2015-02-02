<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	$conexion = conectarse();
	date_default_timezone_set('America/Guayaquil');
    $fecha=date('Y-m-d H:i:s', time());   
    $anio=date('Y', time());   
    $data = 0;	
 	$array = (array)json_decode($_GET['v']); 	 	
 	$lista = array(); 	 	
 	$cont = 0;
 	foreach ($array as $key => $value)
	{	    	    	        
	        $lista[$cont] = $value;	        
	        $cont++;
	}		
	$id_usuario = session_activa();
	$sql = "select saldo from c_x_cobrar where id_cxc ='$_POST[id_cxc]'";
	$saldo = consultaIndex($conexion,$sql,0);
	$valor_pagado = $lista[$cont - 1];	
	$estado = 0;
	if($saldo <= $valor_pagado){
		$estado = 1;	
	}		
	if($lista[$cont-5] == "pago"){
		$sql = "update c_x_cobrar set saldo = '".($saldo - $valor_pagado )."',estado = '$estado' where id_cxc = '$_POST[id_cxc]'";
		modificarSql($conexion,$sql);	
		$id_detalles_cxc = id_tabla($conexion,"detalles_cxc","id_detalle_cxc");
		$sql = "insert into detalles_cxc values ('$id_detalles_cxc','$_POST[id_cxc]','".$lista[$cont-4]."','".$lista[$cont-1]."','".$lista[$cont-2]."','".$lista[$cont-3]."','$id_usuario')";
		$resp = guardarSql($conexion,$sql);	
		if($resp == "true"){
			$data = 0;
		}else{
			$data = 1;
		}
	}		
	echo $data;
?>

