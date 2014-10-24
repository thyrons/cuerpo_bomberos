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
			$sql = "select ".$campo." from ".$tabla. " where ".$campo." = '".$valor."' and ".$id_campo." not in ('$id') ";
			if(pg_num_rows(pg_query( $conexion, $sql ))){
				$repetidos = 'true';
			}else{
				$repetidos = 'false';
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
?>