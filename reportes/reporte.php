<?php

    header('Content-Type: text/html; charset=ISO-8859-1'); 
    require_once('../lib/nusoap.php');

    //Variables
    $slengua = "C";
    $scurso = "2011-12";
    $scoddep = "B142";
    $scodest = "";
    
    //url del webservice que invocaremos
    $wsdl="https://cvnet.cpd.ua.es/servicioweb/publicos/pub_gestdocente.asmx?wsdl";
    
    //instanciando un nuevo objeto cliente para consumir el webservice
    $client=new nusoap_client($wsdl,'wsdl');

    //pasando parametros de entrada que seran pasados hacia el metodo
    $param=array('plengua'=>$slengua, 'pcurso' => $scurso, 'pcoddep' => $scoddep, 'pcodest' => $scodest);

    //llamando al metodo y recuperando el array de productos en una variable
    $resultado = $client->call('wsasidepto', $param);
   
    //¿ocurrio error al llamar al web service?
    if ($client->fault) { // si
        $error = $client->getError();
    if ($error) { // Hubo algun error
            //echo 'Error:' . $error;
            //echo 'Error2:' . $error->faultactor;
            //echo 'Error3:' . $error->faultdetail;faultstring
            echo 'Error:  ' . $client->faultstring;
        }
        
        die();
    }
    
    //Si es vacio
    echo "<pre>";
    print_r($resultado);
    echo "</pre>";
 
 
?>