<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	$data;
	$conexion = conectarse();
	$id = id_tabla($conexion,"informe_general","id_informe_general");
	session_start();
	///////////////valores imagen//////////
	$extension = explode(".", $_FILES["archivo"]["name"]);
	$extension = end($extension);
	$type = $_FILES["archivo"]["type"];
	$tmp_name = $_FILES["archivo"]["tmp_name"];
	$size = $_FILES["archivo"]["size"];	
	$nombre = basename($_FILES["archivo"]["name"], "." . $extension);					
	if($_GET['tipo'] == "g"){
		$sql ="insert into informe_general values ('$id','".strtoupper($_POST['id_empresa'])."','".strtoupper($_POST['area_total'])."','".strtoupper($_POST['area_util'])."','".strtoupper($_POST['pe'])."','".strtoupper($_POST['mmr'])."','".strtoupper($_POST['riesgo'])."','".strtoupper($_POST['visible'])."','".strtoupper($_POST['ubicacion'])."','".strtoupper($_POST['solicitud_nro'])."','".strtoupper($_POST['ocupantes_fijos'])."','".strtoupper($_POST['flotantes'])."','".strtoupper($_POST['aforo'])."','".strtoupper($_POST['tipo_construccion'])."','".strtoupper($_POST['radio_ventilacion'])."','".strtoupper($_POST['disposicion'])."','".strtoupper($_POST['hora_inicio'])."','".strtoupper($_POST['hora_final'])."','".strtoupper($_POST['check_inspeccion'])."','".strtoupper($_POST['techo_cubierta'])."','".strtoupper($_POST['nro_registro'])."','".strtoupper($_POST['id_inputTasa'])."','".strtoupper($_POST['select_valor'])."','$_POST[fecha_general]','0')";
		$guardar = guardarSql($conexion,$sql);
		if( $guardar == 'true'){
			$data = $id; ////datos guardados
		}else{
			$data = 0; /// error al guardar
		}
		$sql ="insert into informe_proteccion values ('$id','$id','".strtoupper($_POST['radio_extintor'])."','".strtoupper($_POST['check_incendio_1'])."','".strtoupper($_POST['check_incendio_2'])."','".strtoupper($_POST['check_incendio_3'])."','".strtoupper($_POST['check_incendio_4'])."','".strtoupper($_POST['disposicionI1'])."','".strtoupper($_POST['cantI1'])."','".strtoupper($_POST['check_incendio_5'])."','".strtoupper($_POST['check_incendio_6'])."','".strtoupper($_POST['check_incendio_7'])."','".strtoupper($_POST['check_incendio_8'])."','".strtoupper($_POST['disposicionI2'])."','".strtoupper($_POST['cantI2'])."','".strtoupper($_POST['check_incendio_9'])."','".strtoupper($_POST['check_incendio_10'])."','".strtoupper($_POST['check_incendio_11'])."','".strtoupper($_POST['check_incendio_12'])."','".strtoupper($_POST['disposicionI3'])."','".strtoupper($_POST['cantI3'])."','".strtoupper($_POST['check_incendio_13'])."','".strtoupper($_POST['check_incendio_14'])."','".strtoupper($_POST['check_incendio_15'])."','".strtoupper($_POST['check_incendio_16'])."','".strtoupper($_POST['disposicionI4'])."','".strtoupper($_POST['cantI4'])."','".strtoupper($_POST['check_incendio_17'])."','".strtoupper($_POST['check_incendio_18'])."','".strtoupper($_POST['check_incendio_19'])."','".strtoupper($_POST['check_incendio_20'])."','".strtoupper($_POST['disposicionI5'])."','".strtoupper($_POST['cantI5'])."')";
		$guardar = guardarSql($conexion,$sql);
		if( $guardar == 'true'){
			$data = $id; ////datos guardados
		}else{
			$data = 0; /// error al guardar
		}
		$sql ="insert into informe_prevencion values ('$id','$id','".strtoupper($_POST['cantP1'])."','".strtoupper($_POST['check_prev_1'])."','".strtoupper($_POST['cantPA1'])."','".strtoupper($_POST['lugarP1'])."','".strtoupper($_POST['cantP2'])."','".strtoupper($_POST['check_prev_2'])."','".strtoupper($_POST['cantPA2'])."','".strtoupper($_POST['lugarP2'])."','".strtoupper($_POST['cantP3'])."','".strtoupper($_POST['check_prev_3'])."','".strtoupper($_POST['cantPA3'])."','".strtoupper($_POST['lugarP3'])."','".strtoupper($_POST['cantP4'])."','".strtoupper($_POST['check_prev_4'])."','".strtoupper($_POST['cantPA4'])."','".strtoupper($_POST['lugarP4'])."','".strtoupper($_POST['cantP5'])."','".strtoupper($_POST['check_prev_5'])."','".strtoupper($_POST['cantPA5'])."','".strtoupper($_POST['lugarP5'])."','".strtoupper($_POST['cantP6'])."','".strtoupper($_POST['check_prev_6'])."','".strtoupper($_POST['cantPA6'])."','".strtoupper($_POST['lugarP6'])."','".strtoupper($_POST['cantP7'])."','".strtoupper($_POST['check_prev_7'])."','".strtoupper($_POST['cantPA7'])."','".strtoupper($_POST['lugarP7'])."','".strtoupper($_POST['cantP8'])."','".strtoupper($_POST['check_prev_8'])."','".strtoupper($_POST['cantPA8'])."','".strtoupper($_POST['lugarP8'])."','".strtoupper($_POST['cantP9'])."','".strtoupper($_POST['check_prev_9'])."','".strtoupper($_POST['cantPA9'])."','".strtoupper($_POST['lugarP9'])."','".strtoupper($_POST['cantP10'])."','".strtoupper($_POST['check_prev_10'])."','".strtoupper($_POST['cantPA10'])."','".strtoupper($_POST['lugarP10'])."','".strtoupper($_POST['cantP11'])."','".strtoupper($_POST['check_prev_11'])."','".strtoupper($_POST['cantPA11'])."','".strtoupper($_POST['lugarP11'])."','".strtoupper($_POST['cantP12'])."','".strtoupper($_POST['check_prev_12'])."','".strtoupper($_POST['cantPA12'])."','".strtoupper($_POST['lugarP12'])."','".strtoupper($_POST['cantP13'])."','".strtoupper($_POST['check_prev_13'])."','".strtoupper($_POST['cantPA13'])."','".strtoupper($_POST['lugarP13'])."','".strtoupper($_POST['cantP14'])."','".strtoupper($_POST['check_prev_14'])."','".strtoupper($_POST['cantPA14'])."','".strtoupper($_POST['lugarP14'])."')";
		$guardar = guardarSql($conexion,$sql);
		if( $guardar == 'true'){
			$data = $id; ////datos guardados
		}else{
			$data = 0; /// error al guardar
		}
		$sql ="insert into informe_incendios values ('$id','$id','".strtoupper($_POST['check_riesgo1'])."','".strtoupper($_POST['observacionesR_1'])."','".strtoupper($_POST['check_riesgo2'])."','".strtoupper($_POST['observacionesR_2'])."','".strtoupper($_POST['check_riesgo3'])."','".strtoupper($_POST['observacionesR_3'])."','".strtoupper($_POST['check_riesgo4'])."','".strtoupper($_POST['observacionesR_4'])."','".strtoupper($_POST['check_riesgo5'])."','".strtoupper($_POST['observacionesR_5'])."','".strtoupper($_POST['check_riesgo6'])."','".strtoupper($_POST['observacionesR_6'])."','".strtoupper($_POST['observacionesR_7'])."','".strtoupper($_POST['almacenamiento1'])."','".strtoupper($_POST['almacenamiento2'])."','$_POST[check_alma1]','".strtoupper($_POST['almacenamiento3'])."','".strtoupper($_POST['almacenamiento4'])."','$_POST[check_alma2]','".strtoupper($_POST['almacenamiento5'])."','".strtoupper($_POST['almacenamiento6'])."','$_POST[check_alma3]','".strtoupper($_POST['almacenamiento7'])."','$_POST[check_alma4]','".strtoupper($_POST['almacenamiento8'])."','$_POST[check_alma5]','".strtoupper($_POST['almacenamiento9'])."','$_POST[check_alma6]','".strtoupper($_POST['almacenamiento10'])."','".strtoupper($_POST['almacenamiento11'])."','$_POST[check_alma7]','".strtoupper($_POST['almacenamiento12'])."','$_POST[check_alma8]')";
		$guardar = guardarSql($conexion,$sql);
		if( $guardar == 'true'){
			$data = $id; ////datos guardados
		}else{
			$data = 0; /// error al guardar
		}
		if ($nombre == "") {
			$sql ="insert into informe_confirmar values ('$id','$id','".strtoupper($_POST['disposiciones_finales'])."','".strtoupper($_POST['observaciones_finales'])."','".strtoupper($_POST['resolucion'])."','".strtoupper($_POST['para_extender_permiso'])."','".strtoupper($_POST['plazo'])."','".strtoupper($_POST['check_anexo'])."','".strtoupper($_POST['check_permiso'])."','','$_POST[documentos_adjuntos]','$_SESSION[id]')";					
		}else{
			$foto = $id . '.' . $extension;
			move_uploaded_file($_FILES["archivo"]["tmp_name"], "../../fotos/" . $foto);	
			$sql ="insert into informe_confirmar values ('$id','$id','".strtoupper($_POST['disposiciones_finales'])."','".strtoupper($_POST['observaciones_finales'])."','".strtoupper($_POST['resolucion'])."','".strtoupper($_POST['para_extender_permiso'])."','".strtoupper($_POST['plazo'])."','".strtoupper($_POST['check_anexo'])."','".strtoupper($_POST['check_permiso'])."','$foto','$_POST[documentos_adjuntos]','$_SESSION[id]')";					
		}
		$guardar = guardarSql($conexion,$sql);
		if( $guardar == 'true'){
			$data = $id; ////datos guardados
		}else{
			$data = 0; /// error al guardar
		}
	}else{
		$sql ="update informe_general set id_empresa='".strtoupper($_POST['id_empresa'])."',area_total_m2='".strtoupper($_POST['area_total'])."',area_util_m2='".strtoupper($_POST['area_util'])."',pe='".strtoupper($_POST['pe'])."',mmr='".strtoupper($_POST['mmr'])."',riesgo='".strtoupper($_POST['riesgo'])."',visible_legible='".strtoupper($_POST['visible'])."',ubicacion='".strtoupper($_POST['ubicacion'])."',solicitud_nro='".strtoupper($_POST['solicitud_nro'])."',nro_ocupantes_fijos='".strtoupper($_POST['ocupantes_fijos'])."',nro_flotantes='".strtoupper($_POST['flotantes'])."',aforo='".strtoupper($_POST['aforo'])."',tipo_construccion='".strtoupper($_POST['tipo_construccion'])."',ventilacion='".strtoupper($_POST['radio_ventilacion'])."',disposicion='".strtoupper($_POST['disposicion'])."',hora_inicio='".strtoupper($_POST['hora_inicio'])."',hora_fin='".strtoupper($_POST['hora_final'])."',tipo_inspeccion='".strtoupper($_POST['check_inspeccion'])."',techo='".strtoupper($_POST['techo_cubierta'])."',nro_registro='".strtoupper($_POST['nro_registro'])."',id_tasa='".strtoupper($_POST['id_inputTasa'])."',valor_tasa='".strtoupper($_POST['select_valor'])."',fecha_general='$_POST[fecha_general]',estado_informe='0' where id_informe_general='$_POST[id_informe_empresa]'";
		$guardar = guardarSql($conexion,$sql);
		if( $guardar == 'true'){
			$data = $_POST['id_informe_empresa']; ////datos guardados
		}else{
			$data = 0; /// error al guardar
		}
		$sql ="update informe_proteccion set extinto='".strtoupper($_POST['radio_extintor'])."',agua='".strtoupper($_POST['check_incendio_1'])."',oper_1='".strtoupper($_POST['check_incendio_2'])."',no_oper_1='".strtoupper($_POST['check_incendio_3'])."',cumple_1='".strtoupper($_POST['check_incendio_4'])."',disposiciones_1='".strtoupper($_POST['disposicionI1'])."',cant_1='".strtoupper($_POST['cantI1'])."',pqs='".strtoupper($_POST['check_incendio_5'])."',oper_2='".strtoupper($_POST['check_incendio_6'])."',no_oper_2='".strtoupper($_POST['check_incendio_7'])."',cumple_2='".strtoupper($_POST['check_incendio_8'])."',disposiciones_2='".strtoupper($_POST['disposicionI2'])."',cant_2='".strtoupper($_POST['cantI2'])."',co2='".strtoupper($_POST['check_incendio_9'])."',oper_3='".strtoupper($_POST['check_incendio_10'])."',no_oper_3='".strtoupper($_POST['check_incendio_11'])."',cumple_3='".strtoupper($_POST['check_incendio_12'])."',disposiciones_3='".strtoupper($_POST['disposicionI3'])."',cant_3='".strtoupper($_POST['cantI3'])."',espuma='".strtoupper($_POST['check_incendio_13'])."',oper_4='".strtoupper($_POST['check_incendio_14'])."',no_oper_4='".strtoupper($_POST['check_incendio_15'])."',cumple_4='".strtoupper($_POST['check_incendio_16'])."',disposiciones_4='".strtoupper($_POST['disposicionI4'])."',cant_4='".strtoupper($_POST['cantI4'])."',agentes='".strtoupper($_POST['check_incendio_17'])."',oper_5='".strtoupper($_POST['check_incendio_18'])."',no_oper_5='".strtoupper($_POST['check_incendio_19'])."',cumple_5='".strtoupper($_POST['check_incendio_20'])."',disposiciones_5='".strtoupper($_POST['disposicionI5'])."',cant_5='".strtoupper($_POST['cantI5'])."' where id_proteccion='$_POST[id_informe_empresa]'";
		$guardar = guardarSql($conexion,$sql);
		if( $guardar == 'true'){
			$data = $_POST['id_informe_empresa']; ////datos guardados
		}else{
			$data = 0; /// error al guardar
		}
		$sql ="update informe_prevencion set cant1='".strtoupper($_POST['cantP1'])."',cumple1='".strtoupper($_POST['check_prev_1'])."',cant_a1='".strtoupper($_POST['cantPA1'])."',lugar1='".strtoupper($_POST['lugarP1'])."',cant2='".strtoupper($_POST['cantP2'])."',cumple2='".strtoupper($_POST['check_prev_2'])."',cant_a2='".strtoupper($_POST['cantPA2'])."',lugar2='".strtoupper($_POST['lugarP2'])."',cant3='".strtoupper($_POST['cantP3'])."',cumple3='".strtoupper($_POST['check_prev_3'])."',cant_a3='".strtoupper($_POST['cantPA3'])."',lugar3='".strtoupper($_POST['lugarP3'])."',cant4='".strtoupper($_POST['cantP4'])."',cumple4='".strtoupper($_POST['check_prev_4'])."',cant_a4='".strtoupper($_POST['cantPA4'])."',lugar4='".strtoupper($_POST['lugarP4'])."',cant5='".strtoupper($_POST['cantP5'])."',cumple5='".strtoupper($_POST['check_prev_5'])."',cant_a5='".strtoupper($_POST['cantPA5'])."',lugar5='".strtoupper($_POST['lugarP5'])."',cant6='".strtoupper($_POST['cantP6'])."',cumple6='".strtoupper($_POST['check_prev_6'])."',cant_a6='".strtoupper($_POST['cantPA6'])."',lugar6='".strtoupper($_POST['lugarP6'])."',cant7='".strtoupper($_POST['cantP7'])."',cumple7='".strtoupper($_POST['check_prev_7'])."',cant_a7='".strtoupper($_POST['cantPA7'])."',lugar7='".strtoupper($_POST['lugarP7'])."',cant8='".strtoupper($_POST['cantP8'])."',cumple8='".strtoupper($_POST['check_prev_8'])."',cant_a8='".strtoupper($_POST['cantPA8'])."',lugar8='".strtoupper($_POST['lugarP8'])."',cant9='".strtoupper($_POST['cantP9'])."',cumple9='".strtoupper($_POST['check_prev_9'])."',cant_a9='".strtoupper($_POST['cantPA9'])."',lugar9='".strtoupper($_POST['lugarP9'])."',cant10='".strtoupper($_POST['cantP10'])."',cumple10='".strtoupper($_POST['check_prev_10'])."',cant_a10='".strtoupper($_POST['cantPA10'])."',lugar10='".strtoupper($_POST['lugarP10'])."',cant11='".strtoupper($_POST['cantP11'])."',cumple11='".strtoupper($_POST['check_prev_11'])."',cant_a11='".strtoupper($_POST['cantPA11'])."',lugar11='".strtoupper($_POST['lugarP11'])."',cant12='".strtoupper($_POST['cantP12'])."',cumple12='".strtoupper($_POST['check_prev_12'])."',cant_a12='".strtoupper($_POST['cantPA12'])."',lugar_12='".strtoupper($_POST['lugarP12'])."',cant_13='".strtoupper($_POST['cantP13'])."',cumple13='".strtoupper($_POST['check_prev_13'])."',cant_a13='".strtoupper($_POST['cantPA13'])."',lugar13='".strtoupper($_POST['lugarP13'])."',cant14='".strtoupper($_POST['cantP14'])."',cumple14='".strtoupper($_POST['check_prev_14'])."',cant_a14='".strtoupper($_POST['cantPA14'])."',lugar14='".strtoupper($_POST['lugarP14'])."' where id_prevencion='$_POST[id_informe_empresa]'";
		$guardar = guardarSql($conexion,$sql);
		if( $guardar == 'true'){
			$data = $_POST['id_informe_empresa']; ////datos guardados
		}else{
			$data = 0; /// error al guardar
		}
		$sql ="update informe_incendios set riesgo1='".strtoupper($_POST['check_riesgo1'])."',observacion1='".strtoupper($_POST['observacionesR_1'])."',riesgo2='".strtoupper($_POST['check_riesgo2'])."',observacion2='".strtoupper($_POST['observacionesR_2'])."',riesgo3='".strtoupper($_POST['check_riesgo3'])."',observacion3='".strtoupper($_POST['observacionesR_3'])."',riesgo4='".strtoupper($_POST['check_riesgo4'])."',observacion4='".strtoupper($_POST['observacionesR_4'])."',riesgo5='".strtoupper($_POST['check_riesgo5'])."',observacion5='".strtoupper($_POST['observacionesR_5'])."',riesgo6='".strtoupper($_POST['check_riesgo6'])."',observacion6='".strtoupper($_POST['observacionesR_6'])."',observacion7='".strtoupper($_POST['observacionesR_7'])."',alma1='".strtoupper($_POST['almacenamiento1'])."',alma2='".strtoupper($_POST['almacenamiento2'])."',tipo_alma1='$_POST[check_alma1]',alma3='".strtoupper($_POST['almacenamiento3'])."',alma4='".strtoupper($_POST['almacenamiento4'])."',tipo_alma2='$_POST[check_alma2]',alma5='".strtoupper($_POST['almacenamiento5'])."',alma6='".strtoupper($_POST['almacenamiento6'])."',tipo_alma3='$_POST[check_alma3]',alma7='".strtoupper($_POST['almacenamiento7'])."',tipo_alma4='$_POST[check_alma4]',alma8='".strtoupper($_POST['almacenamiento8'])."',tipo_alma5='$_POST[check_alma5]',alma9='".strtoupper($_POST['almacenamiento9'])."',tipo_alma6='$_POST[check_alma6]',alma10='".strtoupper($_POST['almacenamiento10'])."',alma11='".strtoupper($_POST['almacenamiento11'])."',tipo_alma7='$_POST[check_alma7]',alma12='".strtoupper($_POST['almacenamiento12'])."',tipo_alma8='$_POST[check_alma8]' where id_incendios='$_POST[id_informe_empresa]'";
		$guardar = guardarSql($conexion,$sql);
		if( $guardar == 'true'){
			$data = $_POST['id_informe_empresa']; ////datos guardados
		}else{
			$data = 0; /// error al guardar
		}
		if ($nombre == "") {			
			$sql ="update informe_confirmar set disposiciones_finales='".strtoupper($_POST['disposiciones_finales'])."',observaciones_finales='".strtoupper($_POST['observaciones_finales'])."',resolucion='".strtoupper($_POST['resolucion'])."',para_extender='".strtoupper($_POST['para_extender_permiso'])."',plazo='".strtoupper($_POST['plazo'])."',anexo='".strtoupper($_POST['check_anexo'])."',permiso='".strtoupper($_POST['check_permiso'])."',documentos='$_POST[documentos_adjuntos]' where id_confirmar='$_POST[id_informe_empresa]'";			
		}else{			
			$foto = $_POST['id_informe_empresa'] . '.' . $extension;
			move_uploaded_file($_FILES["archivo"]["tmp_name"], "../../fotos/" . $foto);	
			$sql ="update informe_confirmar set disposiciones_finales='".strtoupper($_POST['disposiciones_finales'])."',observaciones_finales='".strtoupper($_POST['observaciones_finales'])."',resolucion='".strtoupper($_POST['resolucion'])."',para_extender='".strtoupper($_POST['para_extender_permiso'])."',plazo='".strtoupper($_POST['plazo'])."',anexo='".strtoupper($_POST['check_anexo'])."',permiso='".strtoupper($_POST['check_permiso'])."',foto='$foto',documentos='$_POST[documentos_adjuntos]' where id_confirmar='$_POST[id_informe_empresa]'";
		}
		$guardar = guardarSql($conexion,$sql);
		if( $guardar == 'true'){
			$data = $_POST['id_informe_empresa']; ////datos guardados
		}else{
			$data = 0; /// error al guardar
		}
	}
	echo $data;
?>