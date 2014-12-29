<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	$conexion = conectarse();
	date_default_timezone_set('America/Guayaquil');
    $fecha=date('Y-m-d H:i:s', time());   
    $anio=date('Y', time());   
    $data = 0;
	//$listaProductos = json_decode($_GET['v']);
 	$array = (array)json_decode($_GET['v']);
 	//$listaProductos =  var_dump(json_decode($_GET['v'], true));
 	//echo $array;
 	$lista = array();
 	$lista_informe = array();
 	$lista_tasa = array();
 	$lista_producto = array();
 	$separador = array();
 	$cont = 0;
 	foreach ($array as $key => $value)
	{	    	    	        
	        $lista[$cont] = $value;	        
	        $cont++;
	}	
	
	$contador = sizeof($lista) / 8;	
	$inicio = 0;
	$id = id_tabla($conexion,"emision_permisos","id_emision");	
	$id_usuario = session_activa();
	$sql = "insert into emision_permisos values ('$id','$_POST[fecha_factura]','$_POST[nro_1]','$_POST[nro_2]','$_POST[nro_factura_preimpresa]','$_POST[subtotal_emision]','$_POST[iva_0Emision]','$_POST[iva_12Emision]','$_POST[total_emision]','$_POST[fecha_cancelacion]','$_POST[select_emision]','$_POST[hora_factura]','$id_usuario','$_POST[id_emisionPropietario]')";	
	$guardar = guardarSql($conexion,$sql);	
	if( $guardar == 'true'){
		$data = 0; ////datos guardados		
		for($i = 0; $i < $contador; $i++){	
			$id_detalle = id_tabla($conexion,"detalles_emision","id_detalle_emision");
			if(substr($lista[$inicio + 2], 0,3) == 'idf'){
				$separador = explode('idf', $lista[$inicio + 2]);					
				$sql = "insert into detalles_emision values ('$id_detalle','INFORME GENERAL','".$separador[1]."','','','".$lista[$inicio + 4]."','".$lista[$inicio + 6]."','".$lista[$inicio + 7]."','$id','".$lista[$inicio + 5]."')";	
				$guardar = guardarSql($conexion,$sql);		
				$sql = "update informe_general set estado_informe = '1' where id_informe_general = '".$separador[1]."'";
				$guardar = modificarSql($conexion,$sql);
			}else{
				if(substr($lista[$inicio + 2], 0,3) == 'idt'){
					$separador = explode('idt', $lista[$inicio + 2]);					
					$sql = "insert into detalles_emision values ('$id_detalle','TASA DE SERVICIO','','".$separador[1]."','','".$lista[$inicio + 4]."','".$lista[$inicio + 6]."','".$lista[$inicio + 7]."','$id','".$lista[$inicio + 5]."')";	
					$guardar = guardarSql($conexion,$sql);		
				}else{
					if(substr($lista[$inicio + 2], 0,3) == 'idp'){
						$separador = explode('idp', $lista[$inicio + 2]);					
						$sql = "insert into detalles_emision values ('$id_detalle','PRODUCTO','','','".$separador[1]."','".$lista[$inicio + 4]."','".$lista[$inicio + 6]."','".$lista[$inicio + 7]."','$id','".$lista[$inicio + 5]."')";	
						$guardar = guardarSql($conexion,$sql);		
					}	
				}
			}
			$inicio = $inicio + 8;			
		}
	}else{
		$data = 2; /// error al guardar
	}  
	if($data == 0){
		$data = $id;
	}   
	echo $data;           
	/*echo data_text($fecha);*/
?>

