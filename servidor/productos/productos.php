<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	$data;
	$conexion = conectarse();
	$id = id_tabla($conexion,"productos","id_producto");	
	if($_POST['tipo'] == "g"){
		$sql ="insert into productos values ('$id','".strtoupper($_POST['nombre_producto'])."','$_POST[tipo_iva]','$_POST[precio_compraProducto]','$_POST[precio_ventaProducto]','$_POST[stock_producto]','$_POST[stock_minimoProducto]','$_POST[stock_maximoProducto]','$_POST[caracteristicas_producto]')";
		$repetidos = repetidos($conexion,"nombre_producto",strtoupper($_POST["nombre_producto"]),"productos","g","","");	
		if( $repetidos == 'true'){
			$data = 1; /// este dato ya existe;
		}else{
			$guardar = guardarSql($conexion,$sql);
			if( $guardar == 'true'){
				$data = 0; ////datos guardados
			}else{
				$data = 2; /// error al guardar
			}
		}
	}else{
		if($_POST['tipo'] == "m"){
			$sql = "update productos set nombre_producto = '".strtoupper($_POST['nombre_producto'])."',valor_iva='$_POST[tipo_iva]',precio_compra='$_POST[precio_compraProducto]',precio_venta='$_POST[precio_ventaProducto]',stock='$_POST[stock_producto]',stock_minimo='$_POST[stock_minimoProducto]',stock_maximo='$_POST[stock_maximoProducto]',caracteristicas_producto='$_POST[caracteristicas_producto]' where id_producto = '$_POST[id_producto]'";
			$repetidos = repetidos($conexion,"nombre_producto",strtoupper($_POST["nombre_producto"]),"productos","m",$_POST["id_producto"],"id_producto");		
			if( $repetidos == 'true'){
				$data = 1; /// este dato ya existe;
			}else{
				$modificar = modificarSql($conexion,$sql);
				if( $modificar == 'true'){
					$data = 0; ////datos modificados
				}else{
					$data = 2; /// error al modificar
				}
			}
		}
	}
	echo $data;
?>