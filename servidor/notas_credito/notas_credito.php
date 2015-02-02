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
	$id_devolucion = id_tabla($conexion,"devolucion_venta","id_devolucion_venta");	
	$sql = "insert into devolucion_venta values ('$id_devolucion','$id_usuario','$_POST[id_facturaCredtio]','$_POST[txt_id_cliente_nC]','$_POST[fecha_factura_n_credito]','$_POST[hora_factura_n_credito]','Factura','$_POST[subtotal_credito]','$_POST[iva_0Credito]','$_POST[iva_12Credito]','$_POST[total_credito]','0')";
	$resp = guardarSql($conexion,$sql);	
	$contador = 0;		
	if($resp == "true"){
		for($i = 0; $i < ($cont/6); $i++){
			$id_detalles = id_tabla($conexion, "detalle_devolucion_venta", "id_detalle_devolucion");			
			$sql = "insert into detalle_devolucion_venta values ('$id_detalles','$id_devolucion','".$lista[$contador + 1]."','".$lista[$contador + 3]."','".$lista[$contador + 4]."','".$lista[$contador + 5]."','0')";			
			$resp = guardarSql($conexion,$sql);
			$contador = $contador + 6;		
			if($resp == "true"){
				$data = $id_devolucion;
			}else{
				$data = 0;
			}	
		}
		$data = $id_devolucion;
	}else{
		$data = 0;
	}
	echo $data;
?>

