<?php
    function conectarse()
    {
    	$conexion = null;
        try
        {
         //$conexion = pg_connect("dbname=ddpk3icqarlmm7 host=ec2-54-243-42-236.compute-1.amazonaws.com port=5432 user=eoqnnirloohnjj password=jymXc-eEappNp3PBgzwjKmwbeJ sslmode=require");
         $conexion = pg_connect("host=localhost dbname=cuerpo_bomberos port=5432 user=postgres password=root");
         if( $conexion == false )
                 throw new Exception( "Error PostgreSQL ".pg_last_error() );
        }
        catch( Exception $e )
        {
          throw $e;
        }
        return $conexion;
    }
?>