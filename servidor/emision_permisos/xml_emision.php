<?php
    include '../conexion.php';
    include '../funciones_generales.php';
    $conexion = conectarse();
    $page = $_GET['page']; 
    $limit = $_GET['rows']; 
    $sidx = $_GET['sidx']; 
    $sord = $_GET['sord']; 
    $search=$_GET['_search'];

    if (!$sidx)
        $sidx = 1;
    $sql = "SELECT COUNT(*) AS count from emision_permisos,propietario where emision_permisos.id_propietario = propietario.id_propietario";
    $count = contador($conexion, $sql);
    if ($count > 0 && $limit > 0) {
        $total_pages = ceil($count / $limit);
    } else {
        $total_pages = 0;
    }
    if ($page > $total_pages)
        $page = $total_pages;
    $start = $limit * $page - $limit;
    if ($start < 0)
        $start = 0;	
    if($search=='false'){
        $SQL = "select id_emision,fecha,nro_factura,ruc_propietario,nombre_propietario,fecha_cancelacion,hora_factura from emision_permisos,propietario where emision_permisos.id_propietario = propietario.id_propietario ORDER BY $sidx $sord offset $start limit $limit";	
	}
    else{        
        if($_GET['searchOper']=='eq'){
        	$SQL = "select id_emision,fecha,nro_factura,ruc_propietario,nombre_propietario,fecha_cancelacion,hora_factura from emision_permisos,propietario where emision_permisos.id_propietario = propietario.id_propietario and $_GET[searchField] = '$_GET[searchString]' ORDER BY $sidx $sord offset $start limit $limit";	            
        }
        if($_GET['searchOper']=='ne'){  
        	$SQL = "select id_emision,fecha,nro_factura,ruc_propietario,nombre_propietario,fecha_cancelacion,hora_factura from emision_permisos,propietario where emision_permisos.id_propietario = propietario.id_propietario and $_GET[searchField] != '$_GET[searchString]' ORDER BY $sidx $sord offset $start limit $limit";	                                  
        }
        if($_GET['searchOper']=='bw'){
        	$SQL = "select id_emision,fecha,nro_factura,ruc_propietario,nombre_propietario,fecha_cancelacion,hora_factura from emision_permisos,propietario where emision_permisos.id_propietario = propietario.id_propietario and $_GET[searchField] like '$_GET[searchString]%' ORDER BY $sidx $sord offset $start limit $limit";	                        
        }
        if($_GET['searchOper']=='bn'){ 
        	$SQL = "select id_emision,fecha,nro_factura,ruc_propietario,nombre_propietario,fecha_cancelacion,hora_factura from emision_permisos,propietario where emision_permisos.id_propietario = propietario.id_propietario and $_GET[searchField] not like '$_GET[searchString]%' ORDER BY $sidx $sord offset $start limit $limit";	                                   
        }
        if($_GET['searchOper']=='ew'){            
        	$SQL = "select id_emision,fecha,nro_factura,ruc_propietario,nombre_propietario,fecha_cancelacion,hora_factura from emision_permisos,propietario where emision_permisos.id_propietario = propietario.id_propietario and $_GET[searchField] like '%$_GET[searchString]' ORDER BY $sidx $sord offset $start limit $limit";	                        
        }
        if($_GET['searchOper']=='en'){        
        	$SQL = "select id_emision,fecha,nro_factura,ruc_propietario,nombre_propietario,fecha_cancelacion,hora_factura from emision_permisos,propietario where emision_permisos.id_propietario = propietario.id_propietario and $_GET[searchField] not like '%$_GET[searchString]' ORDER BY $sidx $sord offset $start limit $limit";	                        
        }
        if($_GET['searchOper']=='cn'){            
        	$SQL = "select id_emision,fecha,nro_factura,ruc_propietario,nombre_propietario,fecha_cancelacion,hora_factura from emision_permisos,propietario where emision_permisos.id_propietario = propietario.id_propietario and $_GET[searchField] like '%$_GET[searchString]%' ORDER BY $sidx $sord offset $start limit $limit";	                        
        }
        if($_GET['searchOper']=='nc'){            
        	$SQL = "select id_emision,fecha,nro_factura,ruc_propietario,nombre_propietario,fecha_cancelacion,hora_factura from emision_permisos,propietario where emision_permisos.id_propietario = propietario.id_propietario and $_GET[searchField] not like '%$_GET[searchString]%' ORDER BY $sidx $sord offset $start limit $limit";	                        
        }
        if($_GET['searchOper']=='in'){            
        	$SQL = "select id_emision,fecha,nro_factura,ruc_propietario,nombre_propietario,fecha_cancelacion,hora_factura from emision_permisos,propietario where emision_permisos.id_propietario = propietario.id_propietario and $_GET[searchField] like '%$_GET[searchString]%' ORDER BY $sidx $sord offset $start limit $limit";	                        
            
        }
        if($_GET['searchOper']=='ni'){
        	$SQL = "select id_emision,fecha,nro_factura,ruc_propietario,nombre_propietario,fecha_cancelacion,hora_factura from emision_permisos,propietario where emision_permisos.id_propietario = propietario.id_propietario and $_GET[searchField] not like '%$_GET[searchString]%' ORDER BY $sidx $sord offset $start limit $limit";	                        
        }
        //echo $SQL;
    }	
	$result = xml_sql($conexion,$SQL);         
	header("Content-type: text/xml;charset=utf-8");
	$s = "<?xml version='1.0' encoding='utf-8'?>";	
	$s .= "<rows>";
	$s .= "<page>" . $page . "</page>";
	$s .= "<total>" . $total_pages . "</total>";
	$s .= "<records>" . $count . "</records>";
	while ($row = pg_fetch_row($result)) {		
		$s .= "<row id='" . $row[0] . "'>";	
		$s .= "<cell>" . $row[0]. "</cell>";						
		$s .= "<cell>" . $row[1] . "</cell>";				
        $s .= "<cell>" . $row[2] . "</cell>";               
        $s .= "<cell>" . $row[3] . "</cell>";               
        $s .= "<cell>" . $row[4] . "</cell>";               
        $s .= "<cell>" . $row[5] . "</cell>";               
        $s .= "<cell>" . $row[6] . "</cell>";                       
		$s .= "</row>";
	}
	$s .= "</rows>";
	echo $s;
?>
