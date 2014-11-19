<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	$data;
	$conexion = conectarse();
	$id = id_tablaMil($conexion,"tasa_servicio","id_tasa_servicio",$_POST['select_servicio']);
	if($_POST['tipo'] == "g"){
		$sql ="insert into tasa_servicio values ('$id','$_POST[little]','$_POST[medium]','$_POST[big]','$_POST[sbig]','$_POST[select_servicio]','".strtoupper($_POST['nombre_tasa'])."')";
		$repetidos = repetidos($conexion,"nombre_tasa",strtoupper($_POST["nombre_tasa"]),"tasa_servicio","g","","");	
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
			$sql = "update tasa_servicio set little = '$_POST[little]', medium = '$_POST[medium]', big = '$_POST[big]', sbig = '$_POST[sbig]',  nombre_tasa = '".strtoupper($_POST['nombre_tasa'])."',id_servicio = '$_POST[select_servicio]' where id_tasa_servicio = '$_POST[id_tasa_servicio]'";
			$repetidos = repetidos($conexion,"nombre_tasa",strtoupper($_POST["nombre_tasa"]),"tasa_servicio","m",$_POST["id_tasa_servicio"],"id_tasa_servicio");		
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