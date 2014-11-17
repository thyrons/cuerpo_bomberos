<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	$data;
	$conexion = conectarse();
	$id = id_tabla($conexion,"informe_general","id_informe_general");
	if($_POST['tipo'] == "g"){
		$sql ="insert into informe_general values ('$id','".strtoupper($_POST['id_empresa'])."','".strtoupper($_POST['area_total'])."','".strtoupper($_POST['area_util'])."','".strtoupper($_POST['pe'])."','".strtoupper($_POST['mmr'])."','".strtoupper($_POST['riesgo'])."','".strtoupper($_POST['visible'])."','".strtoupper($_POST['ubicacion'])."','".strtoupper($_POST['solicitud_nro'])."','".strtoupper($_POST['ocupantes_fijos'])."','".strtoupper($_POST['flotantes'])."','".strtoupper($_POST['aforo'])."','".strtoupper($_POST['tipo_construccion'])."','".strtoupper($_POST['radio_ventilacion'])."','".strtoupper($_POST['disposicion'])."','".strtoupper($_POST['hora_inicio'])."','".strtoupper($_POST['hora_final'])."','".strtoupper($_POST['check_inspeccion'])."','".strtoupper($_POST['techo_cubierta'])."','".strtoupper($_POST['nro_registro'])."')";
		$guardar = guardarSql($conexion,$sql);
		if( $guardar == 'true'){
			$data = 0; ////datos guardados
		}else{
			$data = 2; /// error al guardar
		}
		$sql ="insert into informe_proteccion values ('$id','$id','".strtoupper($_POST['radio_extintor'])."','".strtoupper($_POST['check_incendio_1'])."','".strtoupper($_POST['check_incendio_2'])."','".strtoupper($_POST['check_incendio_3'])."','".strtoupper($_POST['check_incendio_4'])."','".strtoupper($_POST['disposicionI1'])."','".strtoupper($_POST['cantI1'])."','".strtoupper($_POST['check_incendio_5'])."','".strtoupper($_POST['check_incendio_6'])."','".strtoupper($_POST['check_incendio_7'])."','".strtoupper($_POST['check_incendio_8'])."','".strtoupper($_POST['disposicionI2'])."','".strtoupper($_POST['cantI2'])."','".strtoupper($_POST['check_incendio_9'])."','".strtoupper($_POST['check_incendio_10'])."','".strtoupper($_POST['check_incendio_11'])."','".strtoupper($_POST['check_incendio_12'])."','".strtoupper($_POST['disposicionI3'])."','".strtoupper($_POST['cantI3'])."','".strtoupper($_POST['check_incendio_13'])."','".strtoupper($_POST['check_incendio_14'])."','".strtoupper($_POST['check_incendio_15'])."','".strtoupper($_POST['check_incendio_16'])."','".strtoupper($_POST['disposicionI4'])."','".strtoupper($_POST['cantI4'])."','".strtoupper($_POST['check_incendio_17'])."','".strtoupper($_POST['check_incendio_18'])."','".strtoupper($_POST['check_incendio_19'])."','".strtoupper($_POST['check_incendio_20'])."','".strtoupper($_POST['disposicionI5'])."','".strtoupper($_POST['cantI5'])."')";
		$guardar = guardarSql($conexion,$sql);
		if( $guardar == 'true'){
			$data = 0; ////datos guardados
		}else{
			$data = 2; /// error al guardar
		}
	}else{
		
	}
	echo $data;
?>