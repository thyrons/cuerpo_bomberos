<?php
	include '../conexion.php';
	include 'funciones_login.php';
	$data;
	$conexion = conectarse();
	date_default_timezone_set('UTC');
    $fecha=date("Y-m-d");
	if( $_POST['txt_loginUsuario'] && $_POST['txt_loginPass'] ){
		$id = ingreso( $conexion,$_POST['txt_loginUsuario']);
		if( $id ){
			$pass = clave( $conexion,$id,$_POST['txt_loginPass'] );
		}else{
			$data = 2;
		}
		if( isset($pass) ){
			session_start();
			$_SESSION['id']=$id;
			$_SESSION['usuario']=$_POST['txt_loginUsuario'];			
			$sql = "select id_tipo_usuario from usuario where id_usuario='$id'";
			
			$sql = "update usuario set fecha_usuario='$fecha' where id_usuario='$id'";
			if($rs = pg_query( $conexion, $sql )){
				$data = 1;
			}else{
				$data = 4;
			}

			$sql = "select estados_principales,estados_segundarios  from usuarios_permisos where id_usuario = '$id'";
			$rs = pg_query($conexion,$sql);
			while($row = pg_fetch_row($rs)){
				$principales =$row[0];	
				$segundarios = $row [1];
			}	
			$principales = str_replace("{", "", $principales);
			$principales = str_replace("}", "", $principales);
			$array_principales = explode(",", $principales);
			$segundarios = str_replace("{", "", $segundarios);
			$segundarios = str_replace("}", "", $segundarios);
			$array_segundarios = explode(",", $segundarios);				
			$_SESSION['principales']=$array_principales;
			$_SESSION['segundarios']=$array_segundarios;		

		}else{
			$data = 2;
		}
	}else{
		$data = 3;
	}
	echo $data;
?>