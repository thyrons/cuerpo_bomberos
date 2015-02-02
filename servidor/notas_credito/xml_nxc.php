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
    $sql = "SELECT count(distinct id_emsion) FROM detalles_emision,emision_permisos,propietario WHERE id_producto != '' and detalles_emision.id_emsion = emision_permisos.id_emision and propietario.id_propietario = emision_permisos.id_propietario and propietario.id_propietario = '$_GET[id]'";    
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
        $SQL = "SELECT distinct id_emsion,nro,nro1,nro_factura,total,fecha_cancelacion,propietario.id_propietario,ruc_propietario,nombre_propietario FROM detalles_emision,emision_permisos,propietario WHERE id_producto != '' and detalles_emision.id_emsion = emision_permisos.id_emision and propietario.id_propietario = emision_permisos.id_propietario and propietario.id_propietario = '$_GET[id]'  offset $start limit $limit";	
	}    
    else{        
        if($_GET['searchOper']=='eq'){
        	$SQL = "SELECT distinct id_emsion,nro,nro1,nro_factura,total,fecha_cancelacion,propietario.id_propietario,ruc_propietario,nombre_propietario FROM detalles_emision,emision_permisos,propietario WHERE id_producto != '' and detalles_emision.id_emsion = emision_permisos.id_emision and propietario.id_propietario = emision_permisos.id_propietario and propietario.id_propietario = '$_GET[id]' and $_GET[searchField] = '$_GET[searchString]'  offset $start limit $limit";	            
        }
        if($_GET['searchOper']=='ne'){  
        	$SQL = "SELECT distinct id_emsion,nro,nro1,nro_factura,total,fecha_cancelacion,propietario.id_propietario,ruc_propietario,nombre_propietario FROM detalles_emision,emision_permisos,propietario WHERE id_producto != '' and detalles_emision.id_emsion = emision_permisos.id_emision and propietario.id_propietario = emision_permisos.id_propietario and propietario.id_propietario = '$_GET[id]' and $_GET[searchField] != '$_GET[searchString]'  offset $start limit $limit";	                                  
        }
        if($_GET['searchOper']=='bw'){
        	$SQL = "SELECT distinct id_emsion,nro,nro1,nro_factura,total,fecha_cancelacion,propietario.id_propietario,ruc_propietario,nombre_propietario FROM detalles_emision,emision_permisos,propietario WHERE id_producto != '' and detalles_emision.id_emsion = emision_permisos.id_emision and propietario.id_propietario = emision_permisos.id_propietario and propietario.id_propietario = '$_GET[id]' and $_GET[searchField] like '$_GET[searchString]%'  offset $start limit $limit";	                        
        }
        if($_GET['searchOper']=='bn'){ 
        	$SQL = "SELECT distinct id_emsion,nro,nro1,nro_factura,total,fecha_cancelacion,propietario.id_propietario,ruc_propietario,nombre_propietario FROM detalles_emision,emision_permisos,propietario WHERE id_producto != '' and detalles_emision.id_emsion = emision_permisos.id_emision and propietario.id_propietario = emision_permisos.id_propietario and propietario.id_propietario = '$_GET[id]' and $_GET[searchField] not like '$_GET[searchString]%'  offset $start limit $limit";	                                   
        }
        if($_GET['searchOper']=='ew'){            
        	$SQL = "SELECT distinct id_emsion,nro,nro1,nro_factura,total,fecha_cancelacion,propietario.id_propietario,ruc_propietario,nombre_propietario FROM detalles_emision,emision_permisos,propietario WHERE id_producto != '' and detalles_emision.id_emsion = emision_permisos.id_emision and propietario.id_propietario = emision_permisos.id_propietario and propietario.id_propietario = '$_GET[id]' and $_GET[searchField] like '%$_GET[searchString]'  offset $start limit $limit";	                        
        }
        if($_GET['searchOper']=='en'){        
        	$SQL = "SELECT distinct id_emsion,nro,nro1,nro_factura,total,fecha_cancelacion,propietario.id_propietario,ruc_propietario,nombre_propietario FROM detalles_emision,emision_permisos,propietario WHERE id_producto != '' and detalles_emision.id_emsion = emision_permisos.id_emision and propietario.id_propietario = emision_permisos.id_propietario and propietario.id_propietario = '$_GET[id]' and $_GET[searchField] not like '%$_GET[searchString]'  offset $start limit $limit";	                        
        }
        if($_GET['searchOper']=='cn'){            
        	$SQL = "SELECT distinct id_emsion,nro,nro1,nro_factura,total,fecha_cancelacion,propietario.id_propietario,ruc_propietario,nombre_propietario FROM detalles_emision,emision_permisos,propietario WHERE id_producto != '' and detalles_emision.id_emsion = emision_permisos.id_emision and propietario.id_propietario = emision_permisos.id_propietario and propietario.id_propietario = '$_GET[id]' and $_GET[searchField] like '%$_GET[searchString]%'  offset $start limit $limit";	                        
        }
        if($_GET['searchOper']=='nc'){            
        	$SQL = "SELECT distinct id_emsion,nro,nro1,nro_factura,total,fecha_cancelacion,propietario.id_propietario,ruc_propietario,nombre_propietario FROM detalles_emision,emision_permisos,propietario WHERE id_producto != '' and detalles_emision.id_emsion = emision_permisos.id_emision and propietario.id_propietario = emision_permisos.id_propietario and propietario.id_propietario = '$_GET[id]' and $_GET[searchField] not like '%$_GET[searchString]%'  offset $start limit $limit";	                        
        }
        if($_GET['searchOper']=='in'){            
        	$SQL = "SELECT distinct id_emsion,nro,nro1,nro_factura,total,fecha_cancelacion,propietario.id_propietario,ruc_propietario,nombre_propietario FROM detalles_emision,emision_permisos,propietario WHERE id_producto != '' and detalles_emision.id_emsion = emision_permisos.id_emision and propietario.id_propietario = emision_permisos.id_propietario and propietario.id_propietario = '$_GET[id]' and $_GET[searchField] like '%$_GET[searchString]%'  offset $start limit $limit";	                        
            
        }
        if($_GET['searchOper']=='ni'){
        	$SQL = "SELECT distinct id_emsion,nro,nro1,nro_factura,total,fecha_cancelacion,propietario.id_propietario,ruc_propietario,nombre_propietario FROM detalles_emision,emision_permisos,propietario WHERE id_producto != '' and detalles_emision.id_emsion = emision_permisos.id_emision and propietario.id_propietario = emision_permisos.id_propietario and propietario.id_propietario = '$_GET[id]' and $_GET[searchField] not like '%$_GET[searchString]%'  offset $start limit $limit";	                        
        }        
    }	
    //echo $SQL;
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
        $s .= "<cell>" . $row[7] . "</cell>";         
        $s .= "<cell>" . $row[8] . "</cell>";                       
		$s .= "</row>";
	}
	$s .= "</rows>";
	echo $s;
?>
