<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	$data;
	$conexion = conectarse();
	$texto = strtoupper($_GET['term']);
	$tipo = $_GET['tipo'];
	if($tipo == "0"){
		$sql="select ruc_empresa,nombre_propietario,id_empresa,actividad_empresa,direccion_empresa,nombre_empresa,telefono_empresa,parroquia from empresa,propietario where propietario.id_propietario = empresa.id_propietario and ruc_empresa like '$texto%'";	
	}else{
		if($tipo == "1"){
			$sql="select nombre_propietario,ruc_empresa,id_empresa,actividad_empresa,direccion_empresa,nombre_empresa,telefono_empresa,parroquia from empresa,propietario where propietario.id_propietario = empresa.id_propietario and nombre_propietario like '$texto%'";	
		}else{
			if($tipo == "2"){
				$sql="select actividad_empresa,ruc_empresa,nombre_propietario,id_empresa,direccion_empresa,nombre_empresa,telefono_empresa,parroquia from empresa,propietario where propietario.id_propietario = empresa.id_propietario and actividad_empresa like '$texto%'";	
			}else{
				if($tipo == "3"){
					$sql="select nombre_empresa,ruc_empresa,nombre_propietario,id_empresa,actividad_empresa,direccion_empresa,telefono_empresa,parroquia from empresa,propietario where propietario.id_propietario = empresa.id_propietario and nombre_empresa like '$texto%'";	
				}else{
					
				}	
			}	
		}
	}	
	busquedas_informe($conexion,$sql);	
?>