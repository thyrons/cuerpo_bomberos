<?php
	function data_text($data, $tipus=1){
    	if ($data != '' && $tipus == 0 || $tipus == 1){
    		$setmana = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
    		$mes = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
    		if ($tipus == 1){
    			//ereg('([0-9]{1,2})-([0-9]{1,2})-([0-9]{2,4})', $data, $data);
    			ereg('([0-9]{1,2})-([0-9]{1,2})-([0-9]{2,4})', $data, $data);
    			$data = mktime(0,0,0,$data[2],$data[3],$data[1]);
    		}
    		return $setmana[date('w', $data)].', '.date('d', $data).' '.$mes[date('m',$data)-1].' de '.date('Y', $data);
    	}
    	else
    	{
    		return 0;
    	}
    }
    function data_text_dia($data, $tipus=1){
    	if ($data != '' && $tipus == 0 || $tipus == 1){
    		$setmana = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
    		$mes = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
    		if ($tipus == 1){
    			//ereg('([0-9]{1,2})-([0-9]{1,2})-([0-9]{2,4})', $data, $data);
    			ereg('([0-9]{1,2})-([0-9]{1,2})-([0-9]{2,4})', $data, $data);
    			$data = mktime(0,0,0,$data[2],$data[3],$data[1]);
    		}
    		return date('d', $data);
    	}
    	else
    	{
    		return 0;
    	}
    }
    function data_text_mes($data, $tipus=1){
    	if ($data != '' && $tipus == 0 || $tipus == 1){
    		$setmana = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
    		$mes = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
    		if ($tipus == 1){
    			//ereg('([0-9]{1,2})-([0-9]{1,2})-([0-9]{2,4})', $data, $data);
    			ereg('([0-9]{1,2})-([0-9]{1,2})-([0-9]{2,4})', $data, $data);
    			$data = mktime(0,0,0,$data[2],$data[3],$data[1]);
    		}
    		//return $setmana[date('w', $data)].', '.date('d', $data).' '.$mes[date('m',$data)-1].' de '.date('Y', $data);
    		return $mes[date('m',$data)-1];
    	}
    	else
    	{
    		return 0;
    	}
    }
    function data_text_anio($data, $tipus=1){
    	if ($data != '' && $tipus == 0 || $tipus == 1){    	
    		if ($tipus == 1){
    			//ereg('([0-9]{1,2})-([0-9]{1,2})-([0-9]{2,4})', $data, $data);
    			ereg('([0-9]{1,2})-([0-9]{1,2})-([0-9]{2,4})', $data, $data);
    			$data = mktime(0,0,0,$data[2],$data[3],$data[1]);
    		}
    		return date('Y', $data);    		
    	}
    	else
    	{
    		return 0;
    	}
    }
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
	function id_tablaMil($conexion,$tabla,$id,$idMil){		
		$cont=	($idMil * 1000);
		$idM = ($idMil * 1000);
		$sql="select max($id) from $tabla where id_servicio ='$idMil'";
		//echo $sql;
		$rs = pg_query( $conexion, $sql );
	    while($row=pg_fetch_row($rs)){
	    	if($row[0] != ""){
	    		$cont = $row[0];
	    	}else{
	    		$cont = $idM;
	    	}
	    }
	    $cont++;
	    return $cont;
	}
	function session_activa(){
		session_start();
		return $_SESSION['id'];
	}
	function atras_no($id_tabla, $tabla, $campo_ordenar,$sesion){
		$sql = "select ".$id_tabla." from ".$tabla. " where id_usuario = '".$sesion. "' order by ".$campo_ordenar. " desc limit 1";
		$sql = pg_query($sql);
		while($row = pg_fetch_row($sql)){
			return $row[0];			
		}
	}
	function atras($id_tabla, $tabla, $campo_ordenar,$sesion,$id){
		$sql = "select ".$id_tabla." from ".$tabla." where id_usuario = '".$sesion."' and ".$id_tabla." not in (select ".$id_tabla." from ".$tabla." where id_usuario = '".$sesion."' and ".$id_tabla." >= '$id' order by ".$campo_ordenar." desc) order by ".$campo_ordenar." desc limit '1'";		
		$sql = pg_query($sql);
		while($row = pg_fetch_row($sql)){
			return $row[0];			
		}
	}
	function adelante_no($id_tabla, $tabla, $campo_ordenar,$sesion){
		$sql = "select ".$id_tabla." from ".$tabla. " where id_usuario = '".$sesion. "' order by ".$campo_ordenar. " desc limit 1";		
		$sql = pg_query($sql);
		while($row = pg_fetch_row($sql)){
			return $row[0];			
		}
	}
	function adelante($id_tabla, $tabla, $campo_ordenar,$sesion,$id){
		$sql = "select ".$id_tabla." from ".$tabla." where id_usuario = '".$sesion."' and ".$id_tabla." not in (select ".$id_tabla." from ".$tabla." where id_usuario = '".$sesion."' and ".$id_tabla." <= '$id' order by ".$campo_ordenar." asc) order by ".$campo_ordenar." asc limit '1'";		
		$sql = pg_query($sql);
		while($row = pg_fetch_row($sql)){
			return $row[0];			
		}
	}
	function carga_factura($conexion,$sql){		
		$sql = pg_query($sql);
		$sql = pg_fetch_row($sql);
		return $sql;
	}
	function carga_facturaDetalles($conexion,$sql){		
		$sql = pg_query($sql);
		$sql = pg_fetch_all($sql);
		
		return $sql;
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
	function consulta($conexion,$sql){
		$resp = 'false';		
		if(pg_num_rows(pg_query($conexion, $sql))){
			$resp = 'true';
		}else{
			$resp = 'false';
		}		
		return $resp;
	}
	function consultaIndex($conexion,$sql,$index){

		$sql = pg_query($conexion,$sql);
		while($row = pg_fetch_row($sql)){
			return $row[$index];
		}
	}
	function cargarSelect($conexion,$sql){
		$resp =true;
		$sql = pg_query( $conexion, $sql );
		if($sql){
			while($row = pg_fetch_row( $sql )){
				echo  "<option value='$row[0]'> $row[0] - $row[1]</option>";
			}
		}
	}
	function carga_tasaB($conexion,$sql,$texto){
		$resp =true;
		$sql = pg_query( $conexion, $sql );
		if($sql){
			while($row = pg_fetch_row( $sql )){
				if($row[0] == $texto){
					echo  "<option value='$row[0]' selected>$ $row[0]</option>";	
				}else{
					echo  "<option value='$row[0]'>$ $row[0]</option>";	
				}
				if($row[1] == $texto){
					echo  "<option value='$row[1]' selected>$ $row[1]</option>";	
				}else{
					echo  "<option value='$row[1]'>$ $row[1]</option>";	
				}
				if($row[2] == $texto){
					echo  "<option value='$row[2]' selected>$ $row[2]</option>";	
				}else{
					echo  "<option value='$row[2]'>$ $row[2]</option>";	
				}
				if($row[3] == $texto){
					echo  "<option value='$row[3]' selected>$ $row[3]</option>";	
				}else{
					echo  "<option value='$row[3]'>$ $row[3]</option>";	
				}
				
				

			}
		}
	}
	function carga_tasa($conexion,$sql){
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
	function busquedas_cxc( $conexion, $sql){
		$resp =true;
		$sql = pg_query( $conexion, $sql );
		if($sql){
			while ($row = pg_fetch_row($sql)) {
			    $data[] = array(
			        'label1' => $row[0],
			        'label2' => $row[1],
			        'label3' => $row[2]
			    );
			}
			echo $data = json_encode($data);
		}
	}	
	function busquedas_nxc ($conexion, $sql){
		$resp =true;
		$sql = pg_query( $conexion, $sql );
		if($sql){
			while ($row = pg_fetch_row($sql)) {
			    $data[] = array(
			        'label1' => $row[0],
			        'label2' => $row[1],
			        'label3' => $row[2],
			        'label4' => $row[3],
			        'label5' => $row[4],
			    );
			}
			echo $data = json_encode($data);
		}
	}
	function busquedas4( $conexion, $sql){
		$resp =true;
		$sql = pg_query( $conexion, $sql );
		if($sql){
			while ($row = pg_fetch_row($sql)) {
			    $data[] = array(
			        'label' => $row[0],
			        'label1' => $row[1],
			        'label2' => $row[2],
			        'label3' => $row[3]
			    );
			}
			echo $data = json_encode($data);
		}
	}
	function busquedas8( $conexion, $sql){
		$resp =true;
		$sql = pg_query( $conexion, $sql );
		if($sql){
			while ($row = pg_fetch_row($sql)) {
			    $data[] = array(
			        'label' => $row[0],
			        'label1' => $row[1],			        
			    );
			}
			echo $data = json_encode($data);
		}
	}
	function busquedas5( $conexion, $sql){
		$resp =true;
		$sql = pg_query( $conexion, $sql );
		if($sql){
			while ($row = pg_fetch_row($sql)) {
			    $data[] = array(
			        'label' => $row[0],
			        'label1' => $row[1],
			        'label2' => $row[2],
			        'label3' => $row[3],
			        'label4' => $row[4],
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
			$lista[]=$row[7];	
			$lista[]=$row[8];	
			$lista[]=$row[9];	
			$lista[]=$row[10];	
			$lista[]=$row[11];				
		}	
    	echo $lista=json_encode($lista); 
	}	
	function cargaEmpresasEstados1($conexion, $sql){
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
			$lista[]=$row[7];	
			$lista[]=$row[8];								
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
	function reporte ($conexion, $sql)
	{
		$sql = pg_query( $conexion, $sql);
		$sql = pg_fetch_array($sql);
		return $sql;
	}
	function maxCaracter($texto, $cant){		
		$texto = substr($texto, 0,$cant);
		return $texto;
	}
	function cargaInforme($conexion, $sql){
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
			$lista[]=$row[7];	
			$lista[]=$row[8];	
			$lista[]=$row[9];	
			$lista[]=$row[10];	
			$lista[]=$row[11];	
			$lista[]=$row[12];
			$lista[]=$row[13];															
			$lista[]=$row[14];	
			$lista[]=$row[15];	
			$lista[]=$row[16];	
			$lista[]=$row[17];	
			$lista[]=$row[18];	
			$lista[]=$row[19];	
			$lista[]=$row[20];	
			$lista[]=$row[21];	
			$lista[]=$row[22];
			$lista[]=$row[23];															
			$lista[]=$row[24];	
			$lista[]=$row[25];	
			$lista[]=$row[26];	
			$lista[]=$row[27];	
			$lista[]=$row[28];	
			$lista[]=$row[29];	
			$lista[]=$row[30];	
			$lista[]=$row[31];	
			$lista[]=$row[32];
			$lista[]=$row[33];															
			$lista[]=$row[34];	
			$lista[]=$row[35];	
			$lista[]=$row[36];	
			$lista[]=$row[37];	
			$lista[]=$row[38];	
			$lista[]=$row[39];	
			$lista[]=$row[40];	
			$lista[]=$row[41];	
			$lista[]=$row[42];
			$lista[]=$row[43];															
			$lista[]=$row[44];	
			$lista[]=$row[45];	
			$lista[]=$row[46];	
			$lista[]=$row[47];	
			$lista[]=$row[48];	
			$lista[]=$row[49];	
			$lista[]=$row[50];	
			$lista[]=$row[51];	
			$lista[]=$row[52];
			$lista[]=$row[53];															
			$lista[]=$row[54];	
			$lista[]=$row[55];	
			$lista[]=$row[56];	
			$lista[]=$row[57];	
			$lista[]=$row[58];	
			$lista[]=$row[59];	
			$lista[]=$row[60];	
			$lista[]=$row[61];	
			$lista[]=$row[62];
			$lista[]=$row[63];															
			$lista[]=$row[64];	
			$lista[]=$row[65];	
			$lista[]=$row[66];	
			$lista[]=$row[67];	
			$lista[]=$row[68];	
			$lista[]=$row[69];	
			$lista[]=$row[70];	
			$lista[]=$row[71];	
			$lista[]=$row[72];	
			$lista[]=$row[73];															
			$lista[]=$row[74];	
			$lista[]=$row[75];	
			$lista[]=$row[76];	
			$lista[]=$row[77];	
			$lista[]=$row[78];	
			$lista[]=$row[79];	
			$lista[]=$row[80];	
			$lista[]=$row[81];	
			$lista[]=$row[82];
			$lista[]=$row[83];															
			$lista[]=$row[84];	
			$lista[]=$row[85];	
			$lista[]=$row[86];	
			$lista[]=$row[87];	
			$lista[]=$row[88];	
			$lista[]=$row[89];	
			$lista[]=$row[90];	
			$lista[]=$row[91];	
			$lista[]=$row[92];
			$lista[]=$row[93];															
			$lista[]=$row[94];	
			$lista[]=$row[95];	
			$lista[]=$row[96];	
			$lista[]=$row[97];	
			$lista[]=$row[98];	
			$lista[]=$row[99];	
			$lista[]=$row[100];	
			$lista[]=$row[101];	
			$lista[]=$row[102];
			$lista[]=$row[103];															
			$lista[]=$row[104];	
			$lista[]=$row[105];	
			$lista[]=$row[106];	
			$lista[]=$row[107];	
			$lista[]=$row[109];	
			$lista[]=$row[109];	
			$lista[]=$row[110];	
			$lista[]=$row[111];	
			$lista[]=$row[112];
			$lista[]=$row[113];															
			$lista[]=$row[114];	
			$lista[]=$row[115];	
			$lista[]=$row[116];	
			$lista[]=$row[117];	
			$lista[]=$row[118];	
			$lista[]=$row[119];	
			$lista[]=$row[120];	
			$lista[]=$row[121];	
			$lista[]=$row[122];
			$lista[]=$row[123];															
			$lista[]=$row[124];	
			$lista[]=$row[125];	
			$lista[]=$row[126];	
			$lista[]=$row[127];	
			$lista[]=$row[128];	
			$lista[]=$row[129];	
			$lista[]=$row[130];	
			$lista[]=$row[131];	
			$lista[]=$row[132];
			$lista[]=$row[133];															
			$lista[]=$row[134];	
			$lista[]=$row[135];	
			$lista[]=$row[136];	
			$lista[]=$row[137];	
			$lista[]=$row[138];	
			$lista[]=$row[139];	
			$lista[]=$row[140];	
			$lista[]=$row[141];	
			$lista[]=$row[142];
			$lista[]=$row[143];															
			$lista[]=$row[144];	
			$lista[]=$row[145];	
			$lista[]=$row[146];	
			$lista[]=$row[147];	
			$lista[]=$row[148];	
			$lista[]=$row[149];	
			$lista[]=$row[150];	
			$lista[]=$row[151];	
			$lista[]=$row[152];
			$lista[]=$row[153];															
			$lista[]=$row[154];	
			$lista[]=$row[155];	
			$lista[]=$row[156];	
			$lista[]=$row[157];	
			$lista[]=$row[158];	
			$lista[]=$row[159];	
			$lista[]=$row[160];				
			$lista[]=$row[161];	

		}	
    	echo $lista=json_encode($lista); 
	}
?>