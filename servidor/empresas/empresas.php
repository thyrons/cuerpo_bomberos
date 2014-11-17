<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	$data;
	$conexion = conectarse();
	date_default_timezone_set('America/Guayaquil');
    $fecha=date('Y-m-d H:i:s', time());   
    $anio=date('Y', time());   
	$id = id_tabla($conexion,"empresa","id_empresa");
	if($_POST['tipo'] == "g"){
		$sql ="insert into empresa values ('$id','$_POST[id_propie]','".strtoupper($_POST['razon_socialEmpresa'])."','".strtoupper($_POST['direccion_empresa'])."','".strtoupper($_POST['telefono_empresa'])."','".strtoupper($_POST['representante_empresa'])."','".strtoupper($_POST['ruc_empresa'])."','".strtoupper($_POST['actividad_empresa'])."','".strtoupper($_POST['parroquia_empresa'])."','".strtoupper($_POST['capital_giro'])."','0')";
		$guardar = guardarSql($conexion,$sql);
		if( $guardar == 'true'){
			$data = 0; ////datos guardados
		}else{
			$data = 2; /// error al guardar
		}
	}else{
		if($_POST['tipo'] == "m"){
			$sql = "update empresa set id_propietario= '$_POST[id_propie]', nombre_empresa = '".strtoupper($_POST['razon_socialEmpresa'])."',direccion_empresa = '".strtoupper($_POST['direccion_empresa'])."',telefono_empresa = '".strtoupper($_POST['telefono_empresa'])."',representante_legal = '".strtoupper($_POST['representante_empresa'])."',ruc_empresa = '".strtoupper($_POST['ruc_empresa'])."',actividad_empresa='".strtoupper($_POST['actividad_empresa'])."',parroquia='".strtoupper($_POST['parroquia_empresa'])."',capital_giro='".strtoupper($_POST['capital_giro'])."' where id_empresa = '$_POST[id_empresaPropietario]'";
			$modificar = modificarSql($conexion,$sql);
			if( $modificar == 'true'){
				$data = 0; ////datos modificados
			}else{
				$data = 2; /// error al modificar
			}
		}
	}
	echo $data;
?>