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
		$sql="select empresa.id_empresa,ruc_empresa,nombre_empresa,actividad_empresa,representante_legal,fecha_general,permiso,informe_general.id_informe_general,direccion_empresa,telefono_empresa,parroquia,capital_giro from informe_general,empresa,informe_confirmar where empresa.id_empresa = informe_general.id_empresa and informe_general.id_informe_general = informe_confirmar.id_informe_general and empresa.id_empresa = '$_POST[id_e]' order by informe_general.id_informe_general desc";    		
		cargaEmpresasEstados($conexion,$sql);	
	}
?>