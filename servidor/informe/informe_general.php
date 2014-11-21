<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	$data;
	$conexion = conectarse();
	$id = id_tabla($conexion,"informe_general","id_informe_general");
	if($_GET['tipo'] == "g"){
		$sql ="insert into informe_general values ('$id','".strtoupper($_POST['id_empresa'])."','".strtoupper($_POST['area_total'])."','".strtoupper($_POST['area_util'])."','".strtoupper($_POST['pe'])."','".strtoupper($_POST['mmr'])."','".strtoupper($_POST['riesgo'])."','".strtoupper($_POST['visible'])."','".strtoupper($_POST['ubicacion'])."','".strtoupper($_POST['solicitud_nro'])."','".strtoupper($_POST['ocupantes_fijos'])."','".strtoupper($_POST['flotantes'])."','".strtoupper($_POST['aforo'])."','".strtoupper($_POST['tipo_construccion'])."','".strtoupper($_POST['radio_ventilacion'])."','".strtoupper($_POST['disposicion'])."','".strtoupper($_POST['hora_inicio'])."','".strtoupper($_POST['hora_final'])."','".strtoupper($_POST['check_inspeccion'])."','".strtoupper($_POST['techo_cubierta'])."','".strtoupper($_POST['nro_registro'])."','".strtoupper($_POST['id_inputTasa'])."','".strtoupper($_POST['select_valor'])."')";
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
		$sql ="insert into informe_prevencion values ('$id','$id','".strtoupper($_POST['cantP1'])."','".strtoupper($_POST['check_prev_1'])."','".strtoupper($_POST['cantPA1'])."','".strtoupper($_POST['lugarP1'])."','".strtoupper($_POST['cantP2'])."','".strtoupper($_POST['check_prev_2'])."','".strtoupper($_POST['cantPA2'])."','".strtoupper($_POST['lugarP2'])."','".strtoupper($_POST['cantP3'])."','".strtoupper($_POST['check_prev_3'])."','".strtoupper($_POST['cantPA3'])."','".strtoupper($_POST['lugarP3'])."','".strtoupper($_POST['cantP4'])."','".strtoupper($_POST['check_prev_4'])."','".strtoupper($_POST['cantPA4'])."','".strtoupper($_POST['lugarP4'])."','".strtoupper($_POST['cantP5'])."','".strtoupper($_POST['check_prev_5'])."','".strtoupper($_POST['cantPA5'])."','".strtoupper($_POST['lugarP5'])."','".strtoupper($_POST['cantP6'])."','".strtoupper($_POST['check_prev_6'])."','".strtoupper($_POST['cantPA6'])."','".strtoupper($_POST['lugarP6'])."','".strtoupper($_POST['cantP7'])."','".strtoupper($_POST['check_prev_7'])."','".strtoupper($_POST['cantPA7'])."','".strtoupper($_POST['lugarP7'])."','".strtoupper($_POST['cantP8'])."','".strtoupper($_POST['check_prev_8'])."','".strtoupper($_POST['cantPA8'])."','".strtoupper($_POST['lugarP8'])."','".strtoupper($_POST['cantP9'])."','".strtoupper($_POST['check_prev_9'])."','".strtoupper($_POST['cantPA9'])."','".strtoupper($_POST['lugarP9'])."','".strtoupper($_POST['cantP10'])."','".strtoupper($_POST['check_prev_10'])."','".strtoupper($_POST['cantPA10'])."','".strtoupper($_POST['lugarP10'])."','".strtoupper($_POST['cantP11'])."','".strtoupper($_POST['check_prev_11'])."','".strtoupper($_POST['cantPA11'])."','".strtoupper($_POST['lugarP11'])."','".strtoupper($_POST['cantP12'])."','".strtoupper($_POST['check_prev_12'])."','".strtoupper($_POST['cantPA12'])."','".strtoupper($_POST['lugarP12'])."','".strtoupper($_POST['cantP13'])."','".strtoupper($_POST['check_prev_13'])."','".strtoupper($_POST['cantPA13'])."','".strtoupper($_POST['lugarP13'])."','".strtoupper($_POST['cantP14'])."','".strtoupper($_POST['check_prev_14'])."','".strtoupper($_POST['cantPA14'])."','".strtoupper($_POST['lugarP14'])."')";
		$guardar = guardarSql($conexion,$sql);
		if( $guardar == 'true'){
			$data = 0; ////datos guardados
		}else{
			$data = 2; /// error al guardar
		}
		$sql ="insert into informe_incendios values ('$id','$id','".strtoupper($_POST['check_riesgo1'])."','".strtoupper($_POST['observacionesR_1'])."','".strtoupper($_POST['check_riesgo2'])."','".strtoupper($_POST['observacionesR_2'])."','".strtoupper($_POST['check_riesgo3'])."','".strtoupper($_POST['observacionesR_3'])."','".strtoupper($_POST['check_riesgo4'])."','".strtoupper($_POST['observacionesR_4'])."','".strtoupper($_POST['check_riesgo5'])."','".strtoupper($_POST['observacionesR_5'])."','".strtoupper($_POST['check_riesgo6'])."','".strtoupper($_POST['observacionesR_6'])."','".strtoupper($_POST['observacionesR_7'])."','".strtoupper($_POST['almacenamiento1'])."','".strtoupper($_POST['almacenamiento2'])."','$_POST[check_alma1]','".strtoupper($_POST['almacenamiento3'])."','".strtoupper($_POST['almacenamiento4'])."','$_POST[check_alma2]','".strtoupper($_POST['almacenamiento5'])."','".strtoupper($_POST['almacenamiento6'])."','$_POST[check_alma3]','".strtoupper($_POST['almacenamiento7'])."','$_POST[check_alma4]','".strtoupper($_POST['almacenamiento8'])."','$_POST[check_alma5]','".strtoupper($_POST['almacenamiento9'])."','$_POST[check_alma6]','".strtoupper($_POST['almacenamiento10'])."','".strtoupper($_POST['almacenamiento11'])."','$_POST[check_alma7]','".strtoupper($_POST['almacenamiento12'])."','$_POST[check_alma8]')";
		$guardar = guardarSql($conexion,$sql);
		if( $guardar == 'true'){
			$data = 0; ////datos guardados
		}else{
			$data = 2; /// error al guardar
		}
		$sql ="insert into informe_confirmar values ('$id','$id','".strtoupper($_POST['disposiciones_finales'])."','".strtoupper($_POST['observaciones_finales'])."','".strtoupper($_POST['resolucion'])."','".strtoupper($_POST['para_extender_permiso'])."','".strtoupper($_POST['plazo'])."','".strtoupper($_POST['check_anexo'])."','".strtoupper($_POST['check_permiso'])."')";
		$guardar = guardarSql($conexion,$sql);
		if( $guardar == 'true'){
			$data = 0; ////datos guardados
		}else{
			$data = 2; /// error al guardar
		}
		///////////////valores imagen//////////
		$extension = explode(".", $_FILES["archivo"]["name"]);

		$extension = end($extension);
		$type = $_FILES["archivo"]["type"];
		$tmp_name = $_FILES["archivo"]["tmp_name"];
		$size = $_FILES["archivo"]["size"];
		$nombre = basename($_FILES["archivo"]["name"], "." . $extension);		
		$foto = $id . '.' . $extension;
		move_uploaded_file($_FILES["archivo"]["tmp_name"], "../../fotos/" . $foto);

	}else{
		
	}
	echo $data;
?>