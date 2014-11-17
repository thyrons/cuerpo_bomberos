<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	$data;
	$conexion = conectarse();
    $lista = array();
    if($_POST['tipo'] == '1'){
		$sql="select id_empresa,nombre_empresa from empresa where id_propietario = '$_POST[id]'";    
		cargaEmpresas($conexion,$sql);
	}
	else{
		//$sql="select empresa.id_empresa,ruc_empresa,nombre_empresa,actividad_empresa,representante_legal,fecha_estado,imagen_estado,empresa_estado.estado,anio,direccion_empresa,telefono_empresa,parroquia,capital_giro from empresa,empresa_estado where empresa.id_empresa = empresa_estado.id_empresa and empresa.estado = '0' and id_propietario = '$_POST[id]' and empresa.id_empresa = '$_POST[id_e]' order by anio desc";    
		//cargaEmpresasEstados($conexion,$sql);	cambiar por informe
	}
?>