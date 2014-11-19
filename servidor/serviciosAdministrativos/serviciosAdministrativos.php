<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	$data;
	$conexion = conectarse();
	$id = id_tabla($conexion,"servicios_administrativos","id_servicio");	
	if($_POST['tipo'] == "g"){
		$sql ="insert into servicios_administrativos values ('$id','".strtoupper($_POST['nombre_servicio'])."','1')";
		$repetidos = repetidos($conexion,"nombre_servicio",strtoupper($_POST["nombre_servicio"]),"servicios_administrativos","g","","");	
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
			$sql = "update servicios_administrativos set nombre_servicio = '".strtoupper($_POST['nombre_servicio'])."' where id_servicio = '$_POST[id_servicio]'";
			$repetidos = repetidos($conexion,"nombre_servicio",strtoupper($_POST["nombre_servicio"]),"servicios_administrativos","m",$_POST["id_servicio"],"id_servicio");		
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