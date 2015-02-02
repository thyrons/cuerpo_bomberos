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
	$id_fc = id_tabla($conexion,"factura_compra","id_fc");		
	$sql = "insert into factura_compra values ('$id_fc','$_POST[fecha_factura_compra]','$_POST[fecha_cancelacion_compra]','$_POST[hora_factura_compra]','$_POST[nro_1_compra]','$_POST[nro_2_compra]','$_POST[nro_factura_preimpresa_compra]','$_POST[ci_ruc_compra]','". strtoupper($_POST['nombre_compra'])."','". strtoupper($_POST['empresa_compra'])."','$_POST[subtotal_compra]','$_POST[iva_0compra]','$_POST[iva_12compra]','$_POST[total_compra]','$_POST[forma_pago_compra]','$id_usuario')";
	$resp = guardarSql($conexion,$sql);	
	$contador = 0;		
	if($resp == "true"){
		for($i = 0; $i < ($cont/8); $i++){
			$id_dfc = id_tabla($conexion,"detalles_fc","id_dfc");	
			$sql = "insert into detalles_fc values ('$id_dfc','".$lista[$contador + 2]."','".$lista[$contador + 4]."','".$lista[$contador + 6]."','".$lista[$contador + 7]."','$id_fc')";			
			$resp = guardarSql($conexion,$sql);
			$contador = $contador + 8;		
			if($resp == "true"){
				$data = $id_fc;
			}else{
				$data = 0;
			}	
		}
		$data = $id_fc;
	}else{
		$data = 0;
	}

	echo $data;
?>

