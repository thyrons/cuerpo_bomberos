<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	$data;
	$conexion = conectarse();
	date_default_timezone_set('UTC');
    $fecha=date("Y-m-d");
	$id = id_tabla($conexion,"usuario","id_usuario");
	if($_POST['tipo'] == "g"){
		$sql ="insert into usuario values ('$id','".strtoupper($_POST['nombre_usuario'])."','".strtoupper($_POST['telefono_usuario'])."','".strtoupper($_POST['celular_usuario'])."','".strtoupper($_POST['direccion_usuario'])."','".strtoupper($_POST['mail_usuario'])."','".strtoupper($fecha)."','$_POST[id_tipo_usuario]','1','$_POST[nick_usuario]','$_POST[ci_usuario]')";
		$repetidos = repetidos($conexion,"nombre_tasa",strtoupper($_POST["nombre_tasa"]),"usuario","g","","");	
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
			$sql = "update usuario set little = '$_POST[little]', medium = '$_POST[medium]', big = '$_POST[big]', sbig = '$_POST[sbig]',  nombre_tasa = '".strtoupper($_POST['nombre_tasa'])."',id_servicio = '$_POST[select_servicio]' where id_usuario = '$_POST[id_usuario]'";
			$repetidos = repetidos($conexion,"nombre_tasa",strtoupper($_POST["nombre_tasa"]),"usuario","m",$_POST["id_usuario"],"id_usuario");		
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