<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	$data;
	$conexion = conectarse();
	$id = id_tabla($conexion,"propietario","id_propietario");
	if($_POST['tipo'] == "g"){
		$sql ="insert into propietario values ('$id','".strtoupper($_POST['ruc_propietario'])."','".strtoupper($_POST['nombre_propietario'])."','".strtoupper($_POST['direccion_propietario'])."','".strtoupper($_POST['telefono_propietario'])."','".strtoupper($_POST['celular_propietario'])."')";
		$repetidos = repetidos($conexion,"ruc_propietario",strtoupper($_POST["ruc_propietario"]),"propietario","g","","");	
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
			$sql = "update propietario set ruc_propietario = '".strtoupper($_POST['ruc_propietario'])."',nombre_propietario = '".strtoupper($_POST['nombre_propietario'])."',direccion_propietario = '".strtoupper($_POST['direccion_propietario'])."',telefono_propietario = '".strtoupper($_POST['telefono_propietario'])."',celular_propietario = '".strtoupper($_POST['celular_propietario'])."' where id_propietario = '$_POST[id_propietario]'";
			$repetidos = repetidos($conexion,"ruc_propietario",strtoupper($_POST["ruc_propietario"]),"propietario","m",$_POST["id_propietario"],"id_propietario");		
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