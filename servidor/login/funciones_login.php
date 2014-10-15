<?php
	//error_reporting(0);
	function ingreso($conexion,$user){
		$sql = "select id_usuario from usuario where nick_usuario='".strtolower ($user)."'";
		$devolver = null;
		$rs = pg_query( $conexion, $sql );
        if( pg_num_rows($rs) > 0 ){
        	while($row = pg_fetch_row($rs))
            	$devolver = $row[0];
         }
        return $devolver;
	}
	function clave($conexion,$id,$pass){

		$sql = "select id_clave from claves where id_usuario='$id' and nombre_clave='$pass'";
		$devolver = null;
		$rs = pg_query( $conexion, $sql );
        if( pg_num_rows($rs) > 0 ){
        	while($row = pg_fetch_row($rs))
            	$devolver = $row[0];
         }
        return $devolver;
	}


  
	

?>