<?php
    include '../conexion.php';
    include '../funciones_generales.php';
    $conexion = conectarse();
    $page = $_GET['page']; 
    $limit = $_GET['rows']; 
    $sidx = $_GET['sidx']; 
    $sord = $_GET['sord']; 
    $search=$_GET['_search'];
   	date_default_timezone_set('America/Guayaquil');
    $fecha=date("Y");    

    if (!$sidx)
        $sidx = 1;
    $sql = "SELECT COUNT(*) AS count  from propietario,empresa,informe_general,informe_confirmar,tasa_servicio where propietario.id_propietario = empresa.id_propietario and informe_general.id_informe_general = informe_confirmar.id_informe_general and informe_general.id_empresa = empresa.id_empresa and tasa_servicio.id_tasa_servicio = informe_general.id_tasa and propietario.id_propietario = '$_GET[id_prop]' and estado_informe= '0' and permiso= 'SI'";
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
		$SQL = "select informe_general.id_informe_general,empresa.id_empresa,nombre_empresa,representante_legal,actividad_empresa,ruc_empresa,id_tasa,nombre_tasa,valor_tasa,fecha_general,permiso from propietario,empresa,informe_general,informe_confirmar,tasa_servicio where propietario.id_propietario = empresa.id_propietario and informe_general.id_informe_general = informe_confirmar.id_informe_general and informe_general.id_empresa = empresa.id_empresa and tasa_servicio.id_tasa_servicio = informe_general.id_tasa and propietario.id_propietario = '$_GET[id_prop]' and estado_informe= '0' and permiso= 'SI' ORDER BY $sidx $sord offset $start limit $limit";				
	}
    else{        
        if($_GET['searchOper']=='eq'){
        	$SQL = "select informe_general.id_informe_general,empresa.id_empresa,nombre_empresa,representante_legal,actividad_empresa,ruc_empresa,id_tasa,nombre_tasa,valor_tasa,fecha_general,permiso from propietario,empresa,informe_general,informe_confirmar,tasa_servicio where propietario.id_propietario = empresa.id_propietario and informe_general.id_informe_general = informe_confirmar.id_informe_general and informe_general.id_empresa = empresa.id_empresa and tasa_servicio.id_tasa_servicio = informe_general.id_tasa and propietario.id_propietario = '$_GET[id_prop]' and estado_informe= '0' and permiso= 'SI' and $_GET[searchField] = '$_GET[searchString]' ORDER BY $sidx $sord offset $start limit $limit";	            
        }
        if($_GET['searchOper']=='ne'){  
        	$SQL = "select informe_general.id_informe_general,empresa.id_empresa,nombre_empresa,representante_legal,actividad_empresa,ruc_empresa,id_tasa,nombre_tasa,valor_tasa,fecha_general,permiso from propietario,empresa,informe_general,informe_confirmar,tasa_servicio where propietario.id_propietario = empresa.id_propietario and informe_general.id_informe_general = informe_confirmar.id_informe_general and informe_general.id_empresa = empresa.id_empresa and tasa_servicio.id_tasa_servicio = informe_general.id_tasa and propietario.id_propietario = '$_GET[id_prop]' and estado_informe= '0' and permiso= 'SI' and $_GET[searchField] != '$_GET[searchString]' ORDER BY $sidx $sord offset $start limit $limit";	                                  
        }
        if($_GET['searchOper']=='bw'){
        	$SQL = "select informe_general.id_informe_general,empresa.id_empresa,nombre_empresa,representante_legal,actividad_empresa,ruc_empresa,id_tasa,nombre_tasa,valor_tasa,fecha_general,permiso from propietario,empresa,informe_general,informe_confirmar,tasa_servicio where propietario.id_propietario = empresa.id_propietario and informe_general.id_informe_general = informe_confirmar.id_informe_general and informe_general.id_empresa = empresa.id_empresa and tasa_servicio.id_tasa_servicio = informe_general.id_tasa and propietario.id_propietario = '$_GET[id_prop]' and estado_informe= '0' and permiso= 'SI' and $_GET[searchField] like '$_GET[searchString]%' ORDER BY $sidx $sord offset $start limit $limit";	                        
        }
        if($_GET['searchOper']=='bn'){ 
        	$SQL = "select informe_general.id_informe_general,empresa.id_empresa,nombre_empresa,representante_legal,actividad_empresa,ruc_empresa,id_tasa,nombre_tasa,valor_tasa,fecha_general,permiso from propietario,empresa,informe_general,informe_confirmar,tasa_servicio where propietario.id_propietario = empresa.id_propietario and informe_general.id_informe_general = informe_confirmar.id_informe_general and informe_general.id_empresa = empresa.id_empresa and tasa_servicio.id_tasa_servicio = informe_general.id_tasa and propietario.id_propietario = '$_GET[id_prop]' and estado_informe= '0' and permiso= 'SI' and $_GET[searchField] not like '$_GET[searchString]%' ORDER BY $sidx $sord offset $start limit $limit";	                                   
        }
        if($_GET['searchOper']=='ew'){            
        	$SQL = "select informe_general.id_informe_general,empresa.id_empresa,nombre_empresa,representante_legal,actividad_empresa,ruc_empresa,id_tasa,nombre_tasa,valor_tasa,fecha_general,permiso from propietario,empresa,informe_general,informe_confirmar,tasa_servicio where propietario.id_propietario = empresa.id_propietario and informe_general.id_informe_general = informe_confirmar.id_informe_general and informe_general.id_empresa = empresa.id_empresa and tasa_servicio.id_tasa_servicio = informe_general.id_tasa and propietario.id_propietario = '$_GET[id_prop]' and estado_informe= '0' and permiso= 'SI' and $_GET[searchField] like '%$_GET[searchString]' ORDER BY $sidx $sord offset $start limit $limit";	                        
        }
        if($_GET['searchOper']=='en'){        
        	$SQL = "select informe_general.id_informe_general,empresa.id_empresa,nombre_empresa,representante_legal,actividad_empresa,ruc_empresa,id_tasa,nombre_tasa,valor_tasa,fecha_general,permiso from propietario,empresa,informe_general,informe_confirmar,tasa_servicio where propietario.id_propietario = empresa.id_propietario and informe_general.id_informe_general = informe_confirmar.id_informe_general and informe_general.id_empresa = empresa.id_empresa and tasa_servicio.id_tasa_servicio = informe_general.id_tasa and propietario.id_propietario = '$_GET[id_prop]' and estado_informe= '0' and permiso= 'SI' and $_GET[searchField] not like '%$_GET[searchString]' ORDER BY $sidx $sord offset $start limit $limit";	                        
        }
        if($_GET['searchOper']=='cn'){            
        	$SQL = "select informe_general.id_informe_general,empresa.id_empresa,nombre_empresa,representante_legal,actividad_empresa,ruc_empresa,id_tasa,nombre_tasa,valor_tasa,fecha_general,permiso from propietario,empresa,informe_general,informe_confirmar,tasa_servicio where propietario.id_propietario = empresa.id_propietario and informe_general.id_informe_general = informe_confirmar.id_informe_general and informe_general.id_empresa = empresa.id_empresa and tasa_servicio.id_tasa_servicio = informe_general.id_tasa and propietario.id_propietario = '$_GET[id_prop]' and estado_informe= '0' and permiso= 'SI' and $_GET[searchField] like '%$_GET[searchString]%' ORDER BY $sidx $sord offset $start limit $limit";	                        
        }
        if($_GET['searchOper']=='nc'){            
        	$SQL = "select informe_general.id_informe_general,empresa.id_empresa,nombre_empresa,representante_legal,actividad_empresa,ruc_empresa,id_tasa,nombre_tasa,valor_tasa,fecha_general,permiso from propietario,empresa,informe_general,informe_confirmar,tasa_servicio where propietario.id_propietario = empresa.id_propietario and informe_general.id_informe_general = informe_confirmar.id_informe_general and informe_general.id_empresa = empresa.id_empresa and tasa_servicio.id_tasa_servicio = informe_general.id_tasa and propietario.id_propietario = '$_GET[id_prop]' and estado_informe= '0' and permiso= 'SI' and $_GET[searchField] not like '%$_GET[searchString]%' ORDER BY $sidx $sord offset $start limit $limit";	                        
        }
        if($_GET['searchOper']=='in'){            
        	$SQL = "select informe_general.id_informe_general,empresa.id_empresa,nombre_empresa,representante_legal,actividad_empresa,ruc_empresa,id_tasa,nombre_tasa,valor_tasa,fecha_general,permiso from propietario,empresa,informe_general,informe_confirmar,tasa_servicio where propietario.id_propietario = empresa.id_propietario and informe_general.id_informe_general = informe_confirmar.id_informe_general and informe_general.id_empresa = empresa.id_empresa and tasa_servicio.id_tasa_servicio = informe_general.id_tasa and propietario.id_propietario = '$_GET[id_prop]' and estado_informe= '0' and permiso= 'SI' and $_GET[searchField] like '%$_GET[searchString]%' ORDER BY $sidx $sord offset $start limit $limit";	                        
            
        }
        if($_GET['searchOper']=='ni'){
        	$SQL = "select informe_general.id_informe_general,empresa.id_empresa,nombre_empresa,representante_legal,actividad_empresa,ruc_empresa,id_tasa,nombre_tasa,valor_tasa,fecha_general,permiso from propietario,empresa,informe_general,informe_confirmar,tasa_servicio where propietario.id_propietario = empresa.id_propietario and informe_general.id_informe_general = informe_confirmar.id_informe_general and informe_general.id_empresa = empresa.id_empresa and tasa_servicio.id_tasa_servicio = informe_general.id_tasa and propietario.id_propietario = '1' and estado_informe= '0' and permiso= 'SI' and $_GET[searchField] not like '%$_GET[searchString]%' ORDER BY $sidx $sord offset $start limit $limit";	                        
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
        $s .= "<cell>" . $row[7] . "</cell>";
        $s .= "<cell>" . $row[8] . "</cell>";
        $s .= "<cell>" . $row[9] . "</cell>";
        $s .= "<cell>" . $row[10] . "</cell>";

		$s .= "</row>";
	}
	$s .= "</rows>";
	echo $s;
?>
