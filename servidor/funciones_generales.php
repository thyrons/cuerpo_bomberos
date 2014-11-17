<?php
	function id_tabla($conexion,$tabla,$id){
		$cont=0;
		$sql="select max($id) from $tabla";
		$rs = pg_query( $conexion, $sql );
	    while($row=pg_fetch_row($rs)){
	    	$cont=$row[0];
	    }
	    $cont++;
	    return $cont;
	}
	function repetidos($conexion,$campo,$valor,$tabla,$tipo,$id,$id_campo){
		$repetidos = 'true';
		if( $tipo == "g" ){
			$sql = "select ".$campo." from ".$tabla. " where ".$campo." = '".$valor."'";
			if(pg_num_rows(pg_query( $conexion, $sql ))){
				$repetidos = 'true';
			}else{
				$repetidos = 'false';
			}
		}else{
			if( $tipo == "m" ){
				$sql = "select ".$campo." from ".$tabla. " where ".$campo." = '".$valor."' and ".$id_campo." not in ('$id') ";
				if(pg_num_rows(pg_query( $conexion, $sql ))){
					$repetidos = 'true';
				}else{
					$repetidos = 'false';
				}
			}else{
				$sql = "select ".$campo." from ".$tabla. " where ".$campo." = '".$valor."' and ".$id_campo." = ('$id') ";
				if(pg_num_rows(pg_query( $conexion, $sql ))){
					$repetidos = 'true';
				}else{
					$repetidos = 'false';
				}	
			}
		}
		return $repetidos;
	}
	function guardarSql($conexion,$sql){
		$resp =true;
		if(pg_query( $conexion, $sql )){
			$resp = 'true';
		}else{
			$resp = 'false';
		}
		return $resp;

	}
	function modificarSql($conexion,$sql){
		$resp =true;
		if(pg_query( $conexion, $sql )){
			$resp = 'true';
		}else{
			$resp = 'false';
		}
		return $resp;

	}
	function cargarSelect($conexion,$sql){
		$resp =true;
		$sql = pg_query( $conexion, $sql );
		if($sql){
			while($row = pg_fetch_row( $sql )){
				echo  "<option value='$row[0]'>$row[1]</option>";
			}
		}
	}
	function contador($conexion,$sql){
		$rs = pg_query( $conexion, $sql );
	    $row = pg_fetch_row($rs);
    	return $row[0];
	}
	function xml_sql($conexion,$sql){
		$rs = pg_query( $conexion, $sql );
    	return $rs;
	}
	function busquedas3( $conexion, $sql){
		$resp =true;
		$sql = pg_query( $conexion, $sql );
		if($sql){
			while ($row = pg_fetch_row($sql)) {
			    $data[] = array(
			        'value' => $row[0],
			        'label1' => $row[1],
			        'label2' => $row[2]
			    );
			}
			echo $data = json_encode($data);
		}
	}
	function cargaEmpresas($conexion, $sql){
		$lista = array();
		$sql=pg_query($sql);   
		while($row=pg_fetch_row($sql)){							
			$lista[]=$row[0];															
			$lista[]=$row[1];															
		}	
    	echo $lista=json_encode($lista); 
	}
	function cargaEmpresasEstados($conexion, $sql){
		$lista = array();
		$sql=pg_query($sql);   
		while($row=pg_fetch_row($sql)){							
			$lista[]=$row[0];															
			$lista[]=$row[1];															
			$lista[]=$row[2];	
			$lista[]=$row[3];	
			$lista[]=$row[4];	
			$lista[]=$row[5];	
			$lista[]=$row[6];	
			$lista[]=$row[9];	
			$lista[]=$row[10];	
			$lista[]=$row[11];	
			$lista[]=$row[12];	
		}	
    	echo $lista=json_encode($lista); 
	}
	function busquedas_informe($conexion, $sql){
		$resp =true;
		$sql = pg_query( $conexion, $sql );
		if($sql){
			while ($row = pg_fetch_row($sql)) {
			    $data[] = array(
			        'value' => $row[0],
			        'label1' => $row[1],
			        'label2' => $row[2],
			        'label3' => $row[3],
			        'label4' => $row[4],
			        'label5' => $row[5],
			        'label6' => $row[6],
			        'label7' => $row[7],
			    );
			}
			echo $data = json_encode($data);
		}
	}
?>