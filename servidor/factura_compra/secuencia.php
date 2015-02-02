<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	$conexion = conectarse();
	$lista1 = array();
	$lista2 = array();
	$lista3 = array();
	$data = array();
	$sesion = session_activa();
	if($_GET['fn'] == '0'){//function atras
		if($_GET['id'] != ''){///si exsite un id previo
			$id = atras("id_fc","factura_compra","id_fc",$sesion,$_GET['id']);//id de la tabla unico resultado tabla campo a ordenado
		}else{			
			$id = atras_no("id_fc","factura_compra","id_fc",$sesion);//id de la tabla unico resultado tabla campo a ordenado			
		}
		$sql_cabecera = "select id_fc,fecha,hora_compra,nombre_usuario,nro,nro1,nro_factura,fecha_cancelacion,ruc_proveedor,nombre_proveedor,empresa,factura_compra.id_tipo_pago,base12,base0,iva12,total from factura_compra,usuario,tipo_pago where factura_compra.id_usuario = usuario.id_usuario and factura_compra.id_tipo_pago = tipo_pago.id_tipo_pago and id_fc= '$id'";				
		$sql_detalles = "select productos.id_producto,cantidad,nombre_producto,precio_u,precio_total,valor_iva from detalles_fc,productos where detalles_fc.id_producto = productos.id_producto and id_fc = '$id'";
		$lista1=array(carga_factura($conexion,$sql_cabecera)); 
		$lista2=array(carga_facturaDetalles($conexion,$sql_detalles)); 
		$lista3=array("Cabecera" => $lista1, "Detalles" => $lista2); 
		$data = (json_encode($lista3));
		echo $data;
	}else{
		if($_GET['fn'] == '1'){//function atras
			if($_GET['id'] != ''){//function adelante
				$id = adelante("id_fc","factura_compra","id_fc",$sesion,$_GET['id']);//id de la tabla unico resultado tabla campo a ordenado			
			}else{
				$id = adelante_no("id_fc","factura_compra","id_fc",$sesion);//id de la tabla unico resultado tabla campo a ordenado	
			}
			$sql_cabecera = "select id_fc,fecha,hora_compra,nombre_usuario,nro,nro1,nro_factura,fecha_cancelacion,ruc_proveedor,nombre_proveedor,empresa,factura_compra.id_tipo_pago,base12,base0,iva12,total from factura_compra,usuario,tipo_pago where factura_compra.id_usuario = usuario.id_usuario and factura_compra.id_tipo_pago = tipo_pago.id_tipo_pago and id_fc= '$id'";				
			$sql_detalles = "select productos.id_producto,cantidad,nombre_producto,precio_u,precio_total,valor_iva from detalles_fc,productos where detalles_fc.id_producto = productos.id_producto and id_fc = '$id'";
			$lista1=array(carga_factura($conexion,$sql_cabecera)); 
			$lista2=array(carga_facturaDetalles($conexion,$sql_detalles)); 
			$lista3=array("Cabecera" => $lista1, "Detalles" => $lista2); 
			$data = (json_encode($lista3));
			echo $data;
		}else{
			if($_GET['fn'] == '2'){//function atras
				$sql_cabecera = "select id_fc,fecha,hora_compra,nombre_usuario,nro,nro1,nro_factura,fecha_cancelacion,ruc_proveedor,nombre_proveedor,empresa,factura_compra.id_tipo_pago,base12,base0,iva12,total from factura_compra,usuario,tipo_pago where factura_compra.id_usuario = usuario.id_usuario and factura_compra.id_tipo_pago = tipo_pago.id_tipo_pago and id_fc= '$_GET[id]'";				
			$sql_detalles = "select productos.id_producto,cantidad,nombre_producto,precio_u,precio_total,valor_iva from detalles_fc,productos where detalles_fc.id_producto = productos.id_producto and id_fc = '$_GET[id]'";
				$lista1=array(carga_factura($conexion,$sql_cabecera)); 
				$lista2=array(carga_facturaDetalles($conexion,$sql_detalles)); 
				$lista3=array("Cabecera" => $lista1, "Detalles" => $lista2); 
				$data = (json_encode($lista3));
				echo $data;	
			}
		}
		
	}
?>

