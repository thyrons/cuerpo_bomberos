<?php
	include '../conexion.php';
	include '../funciones_generales.php';
	$data;
	$vector_permisos = array();
	$vector_permisos_sub = array();
	$vector_admin =  array(1,1,1,1);
	$vector_admin_sub =  array(1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1);
	$vector_tecnico =  array(1,1,1,0);
	$vector_tecnico_sub =  array(1,1,1,1,1,1,0,1,1,1,1,0,1,0,0,0,0,0,0);
	$vector_supervisor =  array(1,0,0,0);
	$vector_supervisor_sub =  array(1,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0);
	$conexion = conectarse();
	date_default_timezone_set('UTC');
    $fecha=date("Y-m-d");
	$id = id_tabla($conexion,"usuario","id_usuario");
	$id_clave = id_tabla($conexion,"claves","id_clave");
	$id_usuarioPermisos = id_tabla($conexion,"usuarios_permisos",'id_usuario_permiso');
	$user = trim($_POST['user']);
	if($_POST['tipo'] == "g"){
		$sql ="insert into usuario values ('$id','".strtoupper($_POST['nombre_usuario'])."','".strtoupper($_POST['telefono_usuario'])."','".strtoupper($_POST['celular_usuario'])."','".strtoupper($_POST['direccion_usuario'])."','".strtoupper($_POST['mail_usuario'])."','".strtoupper($fecha)."','$_POST[id_tipo_usuario]','1','".strtolower($_POST['nick_usuario'])."','$_POST[ci_usuario]')";
		$sql_clave = "insert into claves values ('$id_clave','$_POST[nombre_clave]','$id')";
		$repetidos = repetidos($conexion,"ci_usuario",strtoupper($_POST["ci_usuario"]),"usuario","g","","");	
		if( $repetidos == 'true'){
			$data = 3; /// esta cedula ya existe
		}else{
			$repetidos = repetidos($conexion,"nick_usuario",$_POST["nick_usuario"],"usuario","g","","");		
			if( $repetidos == 'true'){
				$data = 1; /// este nick ya existe;
			}else{
				$repetidos = repetidos($conexion,"nombre_clave",$_POST["clave_admin"],"claves","rs","1","id_clave");
				if($repetidos == "true"){
					$guardar = guardarSql($conexion,$sql);
					if( $guardar == 'true'){
						$guardar = guardarSql($conexion,$sql_clave);
						if( $guardar == 'true'){
							if($user = '1-Administrador'){
								$vector_permisos = $vector_admin;
								$vector_permisos_sub = $vector_admin_sub;
							}else{
								if($user = '2-Tecnico(a)'){
									$vector_permisos = $vector_tecnico;
									$vector_permisos_sub = $vector_tecnico_sub;
								}else{
									$vector_permisos = $vector_supervisor;
									$vector_permisos_sub = $vector_supervisor_sub;
								}	
							}
							$vector_permisos = "array['".implode("', '", $vector_permisos)."']";
							$vector_permisos_sub = "array['".implode("', '", $vector_permisos_sub)."']";
							$sql = "insert into usuarios_permisos values ('$id_usuarioPermisos','$id',".$vector_permisos."::INT[],".$vector_permisos_sub."::INT[])";
							//echo $sql;
							guardarSql($conexion,$sql);							

							$data = 0; ////datos guardados
						}else{
							$data = 2;
						}
					}else{
						$data = 2; /// error al guardar
					}
				}else{
					$data = 4;////error clave de admin
				}
			}
		}
	}else{
		if($_POST['tipo'] == "m"){
			$sql ="update usuario set nombre_usuario='".strtoupper($_POST['nombre_usuario'])."',telefono_usuario='".strtoupper($_POST['telefono_usuario'])."',celular_usuario='".strtoupper($_POST['celular_usuario'])."',direccion_usuario='".strtoupper($_POST['direccion_usuario'])."',mail_usuario='".strtoupper($_POST['mail_usuario'])."',fecha_usuario='".strtoupper($fecha)."',id_tipo_usuario='$_POST[id_tipo_usuario]',nick_usuario='$_POST[nick_usuario]',ci_usuario='$_POST[ci_usuario]' where id_usuario = '$_POST[id_usuario]'";
			$sql_clave = "update claves set nombre_clave='$_POST[nombre_clave]' where id_usuario='$_POST[id_usuario]'";
			$repetidos = repetidos($conexion,"ci_usuario",strtoupper($_POST["ci_usuario"]),"usuario","m",$_POST["id_usuario"],"id_usuario");	
			if( $repetidos == 'true'){
				$data = 3; /// esta cedula ya existe;
			}else{
				$repetidos = repetidos($conexion,"nick_usuario",$_POST["nick_usuario"],"usuario","m",$_POST["id_usuario"],"id_usuario");		
				if($repetidos == "true"){
					$data = 1; /// este nick ya existe;
				}else{
					$repetidos = repetidos($conexion,"nombre_clave",$_POST["clave_admin"],"claves","rs","1","id_clave");
					if($repetidos == "true"){
						$modificar = modificarSql($conexion,$sql);
						if( $modificar == 'true'){
							$modificar = modificarSql($conexion,$sql_clave);
							if( $modificar == 'true'){
								$data = 0; ////datos modificados
							}else{
								$data = 2;
							}
						}else{
							$data = 2; /// error al modificar
						}
					}else{
						$data = 4;////error clave de admin
					}
				}
			}
		}else{
			if($_POST['tipo'] == "p"){
				$vector_principales = "array[". $_POST['vector_principales']."]";
				$vector_secundarios = "array[".$_POST['vector_secundarios']."]";
				$sql = "update usuarios_permisos set estados_principales =$vector_principales,estados_segundarios=$vector_secundarios where id_usuario = '$_POST[id]'";				
				guardarSql($conexion,$sql);							
				$data = 0; ////datos guardados
			}
		}
	}
	echo $data;
?>