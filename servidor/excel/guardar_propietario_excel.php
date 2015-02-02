<?php
    session_start();
    include '../conexion.php';
    include '../funciones_generales.php';
    $data= 0;
    $conexion = conectarse();   
    error_reporting(0);

    $fecha = date("d-m-Y");
    $resp = '';
    $sql = "select id_propietario from propietario where ruc_propietario = '$_POST[var]'";
    $resp = consulta($conexion,$sql);    
    if ($resp == 'false') {
        $id_propietario = id_tabla($conexion,"propietario",'id_propietario');                
        if ($_POST['var1'] == "null") {                                    
            $data = 2;
        } else {      
            if ($_POST['var2'] == "null") {                                    
                $data = 2;
            }else{
                $sql = "insert into propietario values ('$id_propietario','$_POST[var]','$_POST[var1]','$_POST[2]','','')";
                $resp1 = guardarSql($conexion,$sql);
                if($resp1 == 'true'){
                    $data = 1;
                }else{
                    $data = 3;
                }   
            }      
        }
    } else {
        $data = 2;
    }

echo $data;
?>