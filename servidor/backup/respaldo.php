<?php
/*C:\Program Files (x86)\PostgreSQL\9.2\bin>psql -U postgres -d restaurar -p 5432
-h localhost < "C:\Users\PERSONAL\Downloads\cuerpo_bomberos-2015-01-28 12-24-43.
sql"*///codigo para resutar la base de datos
session_start();
backup();
  function dl_file($file){
     date_default_timezone_set('America/Guayaquil');
     $fecha=date('Y-m-d H:i:s', time());   
     if (!is_file($file)) { die("<b>404 File not found!</b>"); }
     $len = filesize($file);     
     $filename = basename($file);
     $temp=explode('.', $filename);
     $nombre=$temp[0].'-'.$fecha.'.'.'sql';
     $file_extension = strtolower(substr(strrchr($filename,"."),1));
     $ctype="application/force-download";
     header("Pragma: public");
     header("Expires: 0");
     header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
     header("Cache-Control: public");
     header("Content-Description: File Transfer");
     header("Content-Type: $ctype");
     $header="Content-Disposition: attachment; filename=".$nombre.";";
     header($header );
     header("Content-Transfer-Encoding: binary");
     header("Content-Length: ".$len);
     @readfile($file);
     exit;
  }

  function backup(){       
    $dbname = "cuerpo_bomberos"; //database name        
    $id_unique =  uniqid();
    $nombre='cuerpo_bombreros_'.$id_unique;            
    $dbconn = pg_pconnect("host=localhost port=5432 dbname=$dbname user=postgres password=rootdow"); //connectionstring
    /*$dbconn = pg_pconnect("dbname=df2jp28bdkuafd host=ec2-54-204-32-91.compute-1.amazonaws.com port=5432 user=larfyvwbaurpxo password=WV84lJxFXf7aqF6BXCXgwcI-tC sslmode=require"); //cadena de conexion*/
    if (!$dbconn) {
      echo "Can't connect.\n";
    exit;
    }
    /////////id de la auditoria////////////
    date_default_timezone_set('UTC');
    $fecha=date("Y-m-d");
    //////////////  
    $consulta=pg_query("select  max(pk_audit) as maximo from tbl_audit");
    while($row=pg_fetch_row($consulta)){
      $max=$row[0];
    }
    $max=$max+1;
    //////////////    
    $back = fopen("$nombre.sql","w");
    /////////////////    
    $str="";
    $str .= "\nCREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog" .";";
    $str .= "\nCOMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language'" .";";
    $str .= "\nSET search_path = public, pg_catalog" .";";
    $str .= "\nSET client_encoding=LATIN1" . ";";
    ////////////
    $str .= "\nCREATE FUNCTION fn_log_audit() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
    IF (TG_OP = 'DELETE') THEN
      INSERT INTO tbl_audit (\"nombre_tabla\", \"operacion\", \"valor_anterior\", \"valor_nuevo\", \"fecha_cambio\", \"usuario\")
             VALUES (TG_TABLE_NAME, 'D', OLD, NULL, now(), USER);
      RETURN OLD;
    ELSIF (TG_OP = 'UPDATE') THEN
      INSERT INTO tbl_audit (\"nombre_tabla\", \"operacion\", \"valor_anterior\", \"valor_nuevo\", \"fecha_cambio\", \"usuario\")
             VALUES (TG_TABLE_NAME, 'U', OLD, NEW, now(), USER);
      RETURN NEW;
    ELSIF (TG_OP = 'INSERT') THEN
      INSERT INTO tbl_audit (\"nombre_tabla\", \"operacion\", \"valor_anterior\", \"valor_nuevo\", \"fecha_cambio\", \"usuario\")
             VALUES (TG_TABLE_NAME, 'I', NULL, NEW, now(), USER);
      RETURN NEW;
    END IF;
    RETURN NULL;
END;
$$;";
$str .= "\nLANGUAGE 'plpgsql' VOLATILE COST 100;";
$str .= "\nALTER FUNCTION public.fn_log_audit() OWNER TO postgres;";
    ///////////
    $table = 'c_x_cobrar';
    $str .= "\n--\n";
    $str .= "-- Estrutura de la tabla '$table'";
    $str .= "\n--\n";
    $str .= "\nDROP TABLE $table CASCADE;";
    $str .= "\nCREATE TABLE $table (";    
    $str .= "\n" . 'id_cxc' . " " . 'int4' . " " . 'NOT NULL' . ",";
    $str .= "\n" . 'id_emsion_permisos' . " " . 'int4' . ",";        
    $str .= "\n" . 'adelanto' . " " . 'text' . ",";
    $str .= "\n" . 'fecha_credito' . " " . 'date' . ",";
    $str .= "\n" . 'fecha_cancelacion' . " " . 'date' . ",";
    $str .= "\n" . 'id_usuario' . " " . 'int4' . ",";
    $str .= "\n" . 'tipo_documento' . " " . 'text' . ",";
    $str .= "\n" . 'saldo' . " " . 'text' . ",";          
    $str .= "\n" . 'total_factura' . " " . 'text' . ",";    
    $str .= "\n" . 'estado' . " " . 'int4';   

    $str=rtrim($str, ",");  
    $str .= "\n);\n";
    $str .= "\n--\n";
    $str .= "-- Creating data for '$table'";
    $str .= "\n--\n\n";

    $res3 = pg_query("SELECT * FROM $table");
    while($r = pg_fetch_row($res3))
    {
      $sql = "INSERT INTO $table VALUES ('";
      $sql .= utf8_decode(implode("','",$r));
      $sql .= "');";
      $str = str_replace("''","NULL",$str);
      $str .= $sql;  
      $str .= "\n";
    }       
    $res1 = pg_query("SELECT pg_index.indisprimary,
            pg_catalog.pg_get_indexdef(pg_index.indexrelid)
        FROM pg_catalog.pg_class c, pg_catalog.pg_class c2,
            pg_catalog.pg_index AS pg_index
        WHERE c.relname = '$table'
            AND c.oid = pg_index.indrelid
            AND pg_index.indexrelid = c2.oid
            AND pg_index.indisprimary");
    while($r = pg_fetch_row($res1))
    {
      $str .= "\n\n--\n";
      $str .= "-- Creating index for '$table'";
      $str .= "\n--\n\n";
      $t = str_replace("CREATE UNIQUE INDEX", "", $r[1]);
      $t = str_replace("USING btree", "|", $t);      
      $t = str_replace("ON", "|", $t);
      $Temparray = explode("|", $t);
      $str .= "ALTER TABLE ONLY ". $Temparray[1] . " ADD CONSTRAINT " . $Temparray[0] . " PRIMARY KEY " . $Temparray[2] .";\n";
    } //////////////////
    $table = 'claves';
    $str .= "\n--\n";
    $str .= "-- Estrutura de la tabla '$table'";
    $str .= "\n--\n";
    $str .= "\nDROP TABLE $table CASCADE;";
    $str .= "\nCREATE TABLE $table (";
    $str .= "\n" . 'id_clave' . " " . 'int4' . " " . 'NOT NULL' . ",";
    $str .= "\n" . 'nombre_clave' . " " . 'text' . ",";
    $str .= "\n" . 'id_usuario' . " " . 'int4';    
    $str=rtrim($str, ",");  
    $str .= "\n);\n";
    $str .= "\n--\n";
    $str .= "-- Creating data for '$table'";
    $str .= "\n--\n\n";
    $res3 = pg_query("SELECT * FROM $table");
    while($r = pg_fetch_row($res3))
    {
      $sql = "INSERT INTO $table VALUES ('";
      $sql .= utf8_decode(implode("','",$r));
      $sql .= "');";
      $str = str_replace("''","NULL",$str);
      $str .= $sql;  
      $str .= "\n";
    }       
     $res1 = pg_query("SELECT pg_index.indisprimary,
            pg_catalog.pg_get_indexdef(pg_index.indexrelid)
        FROM pg_catalog.pg_class c, pg_catalog.pg_class c2,
            pg_catalog.pg_index AS pg_index
        WHERE c.relname = '$table'
            AND c.oid = pg_index.indrelid
            AND pg_index.indexrelid = c2.oid
            AND pg_index.indisprimary");
    while($r = pg_fetch_row($res1))
    {
      $str .= "\n\n--\n";
      $str .= "-- Creating index for '$table'";
      $str .= "\n--\n\n";
      $t = str_replace("CREATE UNIQUE INDEX", "", $r[1]);
      $t = str_replace("USING btree", "|", $t);
      // Next Line Can be improved!!!
      $t = str_replace("ON", "|", $t);
      $Temparray = explode("|", $t);
      $str .= "ALTER TABLE ONLY ". $Temparray[1] . " ADD CONSTRAINT " . $Temparray[0] . " PRIMARY KEY " . $Temparray[2] .";\n";
    } ////////////////////    
    $table = 'detalle_devolucion_venta';
    $str .= "\n--\n";
    $str .= "-- Estrutura de la tabla '$table'";
    $str .= "\n--\n";
    $str .= "\nDROP TABLE $table CASCADE;";
    $str .= "\nCREATE TABLE $table (";
    $str .= "\n" . 'id_detalle_devolucion' . " " . 'int4' . " " . 'NOT NULL' . ",";
    $str .= "\n" . 'id_devolucion_venta' . " " . 'int4' . ",";     
    $str .= "\n" . 'cod_productos' . " " . 'int4' . ","; 
    $str .= "\n" . 'cantidad' . " " . 'text' . ","; 
    $str .= "\n" . 'precio_venta' . " " . 'text' . ","; 
    $str .= "\n" . 'total_venta' . " " . 'text' . ","; 
    $str .= "\n" . 'estado' . " " . 'text';   
    
    $str=rtrim($str, ",");  
    $str .= "\n);\n";
    $str .= "\n--\n";
    $str .= "-- Creating data for '$table'";
    $str .= "\n--\n\n";
    $res3 = pg_query("SELECT * FROM $table");
    while($r = pg_fetch_row($res3))
    {
      $sql = "INSERT INTO $table VALUES ('";
      $sql .= utf8_decode(implode("','",$r));
      $sql .= "');";
      $str = str_replace("''","NULL",$str);
      $str .= $sql;  
      $str .= "\n";
    }       
     $res1 = pg_query("SELECT pg_index.indisprimary,
            pg_catalog.pg_get_indexdef(pg_index.indexrelid)
        FROM pg_catalog.pg_class c, pg_catalog.pg_class c2,
            pg_catalog.pg_index AS pg_index
        WHERE c.relname = '$table'
            AND c.oid = pg_index.indrelid
            AND pg_index.indexrelid = c2.oid
            AND pg_index.indisprimary");
    while($r = pg_fetch_row($res1))
    {
      $str .= "\n\n--\n";
      $str .= "-- Creating index for '$table'";
      $str .= "\n--\n\n";
      $t = str_replace("CREATE UNIQUE INDEX", "", $r[1]);
      $t = str_replace("USING btree", "|", $t);
      // Next Line Can be improved!!!
      $t = str_replace("ON", "|", $t);
      $Temparray = explode("|", $t);
      $str .= "ALTER TABLE ONLY ". $Temparray[1] . " ADD CONSTRAINT " . $Temparray[0] . " PRIMARY KEY " . $Temparray[2] .";\n";      
  }////////////////// 
    $table = 'detalles_cxc';
    $str .= "\n--\n";
    $str .= "-- Estrutura de la tabla '$table'";
    $str .= "\n--\n";
    $str .= "\nDROP TABLE $table CASCADE;";
    $str .= "\nCREATE TABLE $table (";
    $str .= "\n" . 'id_detalle_cxc' . " " . 'int4' . " " . 'NOT NULL' . ",";
    $str .= "\n" . 'id_cxc' . " " . 'int4' . ",";    
    $str .= "\n" . 'fecha_abono' . " " . 'date' . ",";    
    $str .= "\n" . 'valor' . " " . 'text' . ",";    
    $str .= "\n" . 'detalle' . " " . 'text' . ",";    
    $str .= "\n" . 'forma_pago' . " " . 'text' . ",";    
    $str .= "\n" . 'id_usuario' . " " . 'int4';       
  
    $str=rtrim($str, ",");  
    $str .= "\n);\n";
    $str .= "\n--\n";
    $str .= "-- Creating data for '$table'";
    $str .= "\n--\n\n";
    $res3 = pg_query("SELECT * FROM $table");
    while($r = pg_fetch_row($res3))
    {
      $sql = "INSERT INTO $table VALUES ('";
      $sql .= utf8_decode(implode("','",$r));
      $sql .= "');";
      $str = str_replace("''","NULL",$str);
      $str .= $sql;  
      $str .= "\n";
    }       
     $res1 = pg_query("SELECT pg_index.indisprimary,
            pg_catalog.pg_get_indexdef(pg_index.indexrelid)
        FROM pg_catalog.pg_class c, pg_catalog.pg_class c2,
            pg_catalog.pg_index AS pg_index
        WHERE c.relname = '$table'
            AND c.oid = pg_index.indrelid
            AND pg_index.indexrelid = c2.oid
            AND pg_index.indisprimary");
    while($r = pg_fetch_row($res1))
    {
      $str .= "\n\n--\n";
      $str .= "-- Creating index for '$table'";
      $str .= "\n--\n\n";
      $t = str_replace("CREATE UNIQUE INDEX", "", $r[1]);
      $t = str_replace("USING btree", "|", $t);
      // Next Line Can be improved!!!
      $t = str_replace("ON", "|", $t);
      $Temparray = explode("|", $t);
      $str .= "ALTER TABLE ONLY ". $Temparray[1] . " ADD CONSTRAINT " . $Temparray[0] . " PRIMARY KEY " . $Temparray[2] .";\n";      
  }  
    $table = 'detalles_emision';
    $str .= "\n--\n";
    $str .= "-- Estrutura de la tabla '$table";
    $str .= "\n--\n";
    $str .= "\nDROP TABLE $table CASCADE;";
    $str .= "\nCREATE TABLE $table (";
    $str .= "\n" . 'id_detalle_emision' . " " . 'int4' . " " . 'NOT NULL' . ",";
    $str .= "\n" . 'tipo' . " " . 'text' . ",";      
    $str .= "\n" . 'id_informe' . " " . 'text' . ",";      
    $str .= "\n" . 'id_tasa' . " " . 'text' . ",";      
    $str .= "\n" . 'id_producto' . " " . 'text' . ",";      
    $str .= "\n" . 'cantidad' . " " . 'text' . ",";      
    $str .= "\n" . 'precio_unitario' . " " . 'text' . ",";
    $str .= "\n" . 'precio_total' . " " . 'text' . ",";
    $str .= "\n" . 'id_emsion' . " " . 'int4' . ",";    
    $str .= "\n" . 'detalle' . " " . 'text';          
    
   
    $str=rtrim($str, ",");  
    $str .= "\n);\n";
    $str .= "\n--\n";
    $str .= "-- Creating data for '$table'";
    $str .= "\n--\n\n";
    $res3 = pg_query("SELECT * FROM $table");
    while($r = pg_fetch_row($res3))
    {
      $sql = "INSERT INTO $table VALUES ('";
      $sql .= utf8_decode(implode("','",$r));
      $sql .= "');";
      $str = str_replace("''","NULL",$str);
      $str .= $sql;  
      $str .= "\n";
    }       
     $res1 = pg_query("SELECT pg_index.indisprimary,
            pg_catalog.pg_get_indexdef(pg_index.indexrelid)
        FROM pg_catalog.pg_class c, pg_catalog.pg_class c2,
            pg_catalog.pg_index AS pg_index
        WHERE c.relname = '$table'
            AND c.oid = pg_index.indrelid
            AND pg_index.indexrelid = c2.oid
            AND pg_index.indisprimary");
    while($r = pg_fetch_row($res1))
    {
    $str .= "\n\n--\n";
    $str .= "-- Creating index for '$table'";
    $str .= "\n--\n\n";
    $t = str_replace("CREATE UNIQUE INDEX", "", $r[1]);
    $t = str_replace("USING btree", "|", $t);
    // Next Line Can be improved!!!
    $t = str_replace("ON", "|", $t);
    $Temparray = explode("|", $t);
    $str .= "ALTER TABLE ONLY ". $Temparray[1] . " ADD CONSTRAINT " . 
$Temparray[0] . " PRIMARY KEY " . $Temparray[2] .";\n";
  }//////////////////  
  $table = 'detalles_fc';
    $str .= "\n--\n";
    $str .= "-- Estrutura de la tabla  '$table'";
    $str .= "\n--\n";
    $str .= "\nDROP TABLE $table CASCADE;";
    $str .= "\nCREATE TABLE $table (";
    $str .= "\n" . 'id_dfc' . " " . 'int4' . " " . 'NOT NULL' . ","; 
    $str .= "\n" . 'id_producto' . " " . 'int4' . ",";          
    $str .= "\n" . 'cantidad' . " " . 'text' . ",";      
    $str .= "\n" . 'precio_u' . " " . 'text' . ",";      
    $str .= "\n" . 'precio_total' . " " . 'text' . ",";          
    $str .= "\n" . 'id_fc' . " " . 'int4';
      
    $str=rtrim($str, ",");  
    $str .= "\n);\n";
    $str .= "\n--\n";
    $str .= "-- Creating data for '$table'";
    $str .= "\n--\n\n";
    $res3 = pg_query("SELECT * FROM $table");
    while($r = pg_fetch_row($res3))
    {
      $sql = "INSERT INTO $table VALUES ('";
      $sql .= utf8_decode(implode("','",$r));
      $sql .= "');";
      $str = str_replace("''","NULL",$str);
      $str .= $sql;  
      $str .= "\n";
    }       
     $res1 = pg_query("SELECT pg_index.indisprimary,
            pg_catalog.pg_get_indexdef(pg_index.indexrelid)
        FROM pg_catalog.pg_class c, pg_catalog.pg_class c2,
            pg_catalog.pg_index AS pg_index
        WHERE c.relname = '$table'
            AND c.oid = pg_index.indrelid
            AND pg_index.indexrelid = c2.oid
            AND pg_index.indisprimary");
    while($r = pg_fetch_row($res1))
    {
    $str .= "\n\n--\n";
    $str .= "-- Creating index for '$table'";
    $str .= "\n--\n\n";
    $t = str_replace("CREATE UNIQUE INDEX", "", $r[1]);
    $t = str_replace("USING btree", "|", $t);
    // Next Line Can be improved!!!
    $t = str_replace("ON", "|", $t);
    $Temparray = explode("|", $t);
    $str .= "ALTER TABLE ONLY ". $Temparray[1] . " ADD CONSTRAINT " . 
$Temparray[0] . " PRIMARY KEY " . $Temparray[2] .";\n";
  }///////////////////  
  $table = 'devolucion_venta';
    $str .= "\n--\n";
    $str .= "-- Estrutura de la tabla '$table'";
    $str .= "\n--\n";
    $str .= "\nDROP TABLE $table CASCADE;";
    $str .= "\nCREATE TABLE $table (";
    $str .= "\n" . 'id_devolucion_venta' . " " . 'int4' . " " . 'NOT NULL' . ",";    
    $str .= "\n" . 'id_usuario' . " " . 'int4' . ",";      
    $str .= "\n" . 'id_emision' . " " . 'int4' . ",";      
    $str .= "\n" . 'id_propietario' . " " . 'int4' . ",";   
    $str .= "\n" . 'fecha_actual' . " " . 'text' . ",";   
    $str .= "\n" . 'hora_actual' . " " . 'text' . ",";   
    $str .= "\n" . 'tipo_comprobante' . " " . 'text' . ",";      
    $str .= "\n" . 'subtotal' . " " . 'text' . ",";      
    $str .= "\n" . 'iva0' . " " . 'text' . ",";      
    $str .= "\n" . 'iva12' . " " . 'text' . ",";      
    $str .= "\n" . 'total_venta' . " " . 'text' . ",";      
    $str .= "\n" . 'estado' . " " . 'text';  
     
    $str=rtrim($str, ",");  
    $str .= "\n);\n";
    $str .= "\n--\n";
    $str .= "-- Creating data for '$table'";
    $str .= "\n--\n\n";
    $res3 = pg_query("SELECT * FROM $table");
    while($r = pg_fetch_row($res3))
    {
      $sql = "INSERT INTO $table VALUES ('";
      $sql .= utf8_decode(implode("','",$r));
      $sql .= "');";
      $str = str_replace("''","NULL",$str);
      $str .= $sql;  
      $str .= "\n";
    }       
     $res1 = pg_query("SELECT pg_index.indisprimary,
            pg_catalog.pg_get_indexdef(pg_index.indexrelid)
        FROM pg_catalog.pg_class c, pg_catalog.pg_class c2,
            pg_catalog.pg_index AS pg_index
        WHERE c.relname = '$table'
            AND c.oid = pg_index.indrelid
            AND pg_index.indexrelid = c2.oid
            AND pg_index.indisprimary");
    while($r = pg_fetch_row($res1))
    {
    $str .= "\n\n--\n";
    $str .= "-- Creating index for '$table'";
    $str .= "\n--\n\n";
    $t = str_replace("CREATE UNIQUE INDEX", "", $r[1]);
    $t = str_replace("USING btree", "|", $t);
    // Next Line Can be improved!!!
    $t = str_replace("ON", "|", $t);
    $Temparray = explode("|", $t);
    $str .= "ALTER TABLE ONLY ". $Temparray[1] . " ADD CONSTRAINT " . 
$Temparray[0] . " PRIMARY KEY " . $Temparray[2] .";\n";
  }////////////////////// 
  $table = 'emision_permisos';
    $str .= "\n--\n";
    $str .= "-- Estrutura de la tabla '$table'";
    $str .= "\n--\n";
    $str .= "\nDROP TABLE $table CASCADE;";
    $str .= "\nCREATE TABLE $table (";
    $str .= "\n" . 'id_emision' . " " . 'int4' . " " . 'NOT NULL' . ",";        
    $str .= "\n" . 'fecha' . " " . 'text' . ",";      
    $str .= "\n" . 'nro' . " " . 'text' . ",";      
    $str .= "\n" . 'nro1' . " " . 'text' . ",";      
    $str .= "\n" . 'nro_factura' . " " . 'text' . ",";      
    $str .= "\n" . 'sutotal' . " " . 'text' . ",";      
    $str .= "\n" . 'iva0' . " " . 'text' . ",";      
    $str .= "\n" . 'iva12' . " " . 'text' . ",";      
    $str .= "\n" . 'total' . " " . 'text' . ",";      
    $str .= "\n" . 'fecha_cancelacion' . " " . 'text' . ",";      
    $str .= "\n" . 'id_tipo_pago' . " " . 'int4' . ",";      
    $str .= "\n" . 'hora_factura' . " " . 'text' . ",";      
    $str .= "\n" . 'id_usuario' . " " . 'int4' . ",";      
    $str .= "\n" . 'id_propietario' . " " . 'int4';   
          
    $str=rtrim($str, ",");  
    $str .= "\n);\n";
    $str .= "\n--\n";
    $str .= "-- Creating data for '$table'";
    $str .= "\n--\n\n";
    $res3 = pg_query("SELECT * FROM $table");
    while($r = pg_fetch_row($res3))
    {
      $sql = "INSERT INTO $table VALUES ('";
      $sql .= utf8_decode(implode("','",$r));
      $sql .= "');";
      $str = str_replace("''","NULL",$str);
      $str .= $sql;  
      $str .= "\n";
    }       
     $res1 = pg_query("SELECT pg_index.indisprimary,
            pg_catalog.pg_get_indexdef(pg_index.indexrelid)
        FROM pg_catalog.pg_class c, pg_catalog.pg_class c2,
            pg_catalog.pg_index AS pg_index
        WHERE c.relname = '$table'
            AND c.oid = pg_index.indrelid
            AND pg_index.indexrelid = c2.oid
            AND pg_index.indisprimary");
    while($r = pg_fetch_row($res1))
    {
    $str .= "\n\n--\n";
    $str .= "-- Creating index for '$table'";
    $str .= "\n--\n\n";
    $t = str_replace("CREATE UNIQUE INDEX", "", $r[1]);
    $t = str_replace("USING btree", "|", $t);
    // Next Line Can be improved!!!
    $t = str_replace("ON", "|", $t);
    $Temparray = explode("|", $t);
    $str .= "ALTER TABLE ONLY ". $Temparray[1] . " ADD CONSTRAINT " . 
$Temparray[0] . " PRIMARY KEY " . $Temparray[2] .";\n";
  }/////////////////// 
  $table = 'empresa';
    $str .= "\n--\n";
    $str .= "-- Estrutura de la tabla '$table'";
    $str .= "\n--\n";
    $str .= "\nDROP TABLE $table CASCADE;";
    $str .= "\nCREATE TABLE $table (";
    $str .= "\n" . 'id_empresa' . " " . 'int4' . " " . 'NOT NULL' . ",";    
    $str .= "\n" . 'id_propietario' . " " . 'int4' . ",";      
    $str .= "\n" . 'nombre_empresa' . " " . 'text' . ",";      
    $str .= "\n" . 'direccion_empresa' . " " . 'text' . ",";      
    $str .= "\n" . 'telefono_empresa' . " " . 'text' . ",";      
    $str .= "\n" . 'representante_legal' . " " . 'text' . ",";      
    $str .= "\n" . 'ruc_empresa' . " " . 'text' . ",";      
    $str .= "\n" . 'actividad_empresa' . " " . 'text' . ",";      
    $str .= "\n" . 'parroquia' . " " . 'text' . ",";      
    $str .= "\n" . 'capital_giro' . " " . 'text' . ",";      
    $str .= "\n" . 'estado' . " " . 'text';        
  
    $str=rtrim($str, ",");  
    $str .= "\n);\n";
    $str .= "\n--\n";
    $str .= "-- Creating data for '$table'";
    $str .= "\n--\n\n";
    $res3 = pg_query("SELECT * FROM $table");
    while($r = pg_fetch_row($res3))
    {
      $sql = "INSERT INTO $table VALUES ('";      
      $sql .= utf8_decode(implode("','",$r));
      $sql .= "');";
      $str = str_replace("''","NULL",$str);
      $str .= $sql;  
      $str .= "\n";
    }       
     $res1 = pg_query("SELECT pg_index.indisprimary,
            pg_catalog.pg_get_indexdef(pg_index.indexrelid)
        FROM pg_catalog.pg_class c, pg_catalog.pg_class c2,
            pg_catalog.pg_index AS pg_index
        WHERE c.relname = '$table'
            AND c.oid = pg_index.indrelid
            AND pg_index.indexrelid = c2.oid
            AND pg_index.indisprimary");
    while($r = pg_fetch_row($res1))
    {
    $str .= "\n\n--\n";
    $str .= "-- Creating index for '$table'";
    $str .= "\n--\n\n";
    $t = str_replace("CREATE UNIQUE INDEX", "", $r[1]);
    $t = str_replace("USING btree", "|", $t);
    // Next Line Can be improved!!!
    $t = str_replace("ON", "|", $t);
    $Temparray = explode("|", $t);
    $str .= "ALTER TABLE ONLY ". $Temparray[1] . " ADD CONSTRAINT " . 
$Temparray[0] . " PRIMARY KEY " . $Temparray[2] .";\n";
  } 
  $table = 'factura_compra';
    $str .= "\n--\n";
    $str .= "-- Estrutura de la tabla '$table'";
    $str .= "\n--\n";
    $str .= "\nDROP TABLE $table CASCADE;";
    $str .= "\nCREATE TABLE $table (";
    $str .= "\n" . 'id_fc' . " " . 'int4' . " " . 'NOT NULL' . ",";    
    $str .= "\n" . 'fecha' . " " . 'text' . ",";      
    $str .= "\n" . 'fecha_cancelacion' . " " . 'text' . ","; 
    $str .= "\n" . 'hora_compra' . " " . 'text' . ",";     
    $str .= "\n" . 'nro' . " " . 'text' . ",";     
    $str .= "\n" . 'nro1' . " " . 'text' . ",";     
    $str .= "\n" . 'nro_factura' . " " . 'text' . ",";     
    $str .= "\n" . 'ruc_proveedor' . " " . 'text' . ",";     
    $str .= "\n" . 'nombre_proveedor' . " " . 'text' . ",";     
    $str .= "\n" . 'empresa' . " " . 'text' . ",";     
    $str .= "\n" . 'base12' . " " . 'text' . ",";     
    $str .= "\n" . 'base0' . " " . 'text' . ",";     
    $str .= "\n" . 'iva12' . " " . 'text' . ",";     
    $str .= "\n" . 'total' . " " . 'text' . ",";     
    $str .= "\n" . 'id_tipo_pago' . " " . 'int4' . ",";     
    $str .= "\n" . 'id_usuario' . " " . 'int4';   
            
    $str=rtrim($str, ",");  
    $str .= "\n);\n";
    $str .= "\n--\n";
    $str .= "-- Creating data for '$table'";
    $str .= "\n--\n\n";
    $res3 = pg_query("SELECT * FROM $table");
    while($r = pg_fetch_row($res3))
    {
      $sql = "INSERT INTO $table VALUES ('";
      $sql .= utf8_decode(implode("','",$r));
      $sql .= "');";
      $str = str_replace("''","NULL",$str);
      $str .= $sql;  
      $str .= "\n";
    }       
     $res1 = pg_query("SELECT pg_index.indisprimary,
            pg_catalog.pg_get_indexdef(pg_index.indexrelid)
        FROM pg_catalog.pg_class c, pg_catalog.pg_class c2,
            pg_catalog.pg_index AS pg_index
        WHERE c.relname = '$table'
            AND c.oid = pg_index.indrelid
            AND pg_index.indexrelid = c2.oid
            AND pg_index.indisprimary");
    while($r = pg_fetch_row($res1))
    {
    $str .= "\n\n--\n";
    $str .= "-- Creating index for '$table'";
    $str .= "\n--\n\n";
    $t = str_replace("CREATE UNIQUE INDEX", "", $r[1]);
    $t = str_replace("USING btree", "|", $t);
    // Next Line Can be improved!!!
    $t = str_replace("ON", "|", $t);
    $Temparray = explode("|", $t);
    $str .= "ALTER TABLE ONLY ". $Temparray[1] . " ADD CONSTRAINT " . 
$Temparray[0] . " PRIMARY KEY " . $Temparray[2] .";\n";
  }///////////////
  $table = 'informe_confirmar';
    $str .= "\n--\n";
    $str .= "-- Estrutura de la tabla '$table'";
    $str .= "\n--\n";
    $str .= "\nDROP TABLE $table CASCADE;";
    $str .= "\nCREATE TABLE $table (";
    $str .= "\n" . 'id_confirmar' . " " . 'int4' . " " . 'NOT NULL' . ",";    
    $str .= "\n" . 'id_informe_general' . " " . 'int4' . ",";      
    $str .= "\n" . 'disposiciones_finales' . " " . 'text' . ",";      
    $str .= "\n" . 'observaciones_finales' . " " . 'text' . ",";      
    $str .= "\n" . 'resolucion' . " " . 'text' . ",";      
    $str .= "\n" . 'para_extender' . " " . 'text' . ",";      
    $str .= "\n" . 'plazo' . " " . 'text' . ",";      
    $str .= "\n" . 'anexo' . " " . 'text' . ",";      
    $str .= "\n" . 'permiso' . " " . 'text' . ",";      
    $str .= "\n" . 'foto' . " " . 'text' . ",";      
    $str .= "\n" . 'documentos' . " " . 'text' . ",";      
    $str .= "\n" . 'id_usuario' . " " . 'int4';          
 
    $str=rtrim($str, ",");  
    $str .= "\n);\n";
    $str .= "\n--\n";
    $str .= "-- Creating data for '$table'";
    $str .= "\n--\n\n";
    $res3 = pg_query("SELECT * FROM $table");
    while($r = pg_fetch_row($res3))
    {
      $sql = "INSERT INTO $table VALUES ('";
      $sql .= utf8_decode(implode("','",$r));
      $sql .= "');";
      $str = str_replace("''","NULL",$str);
      $str .= $sql;  
      $str .= "\n";
    }       
     $res1 = pg_query("SELECT pg_index.indisprimary,
            pg_catalog.pg_get_indexdef(pg_index.indexrelid)
        FROM pg_catalog.pg_class c, pg_catalog.pg_class c2,
            pg_catalog.pg_index AS pg_index
        WHERE c.relname = '$table'
            AND c.oid = pg_index.indrelid
            AND pg_index.indexrelid = c2.oid
            AND pg_index.indisprimary");
    while($r = pg_fetch_row($res1))
    {
    $str .= "\n\n--\n";
    $str .= "-- Creating index for '$table'";
    $str .= "\n--\n\n";
    $t = str_replace("CREATE UNIQUE INDEX", "", $r[1]);
    $t = str_replace("USING btree", "|", $t);
    // Next Line Can be improved!!!
    $t = str_replace("ON", "|", $t);
    $Temparray = explode("|", $t);
    $str .= "ALTER TABLE ONLY ". $Temparray[1] . " ADD CONSTRAINT " . 
$Temparray[0] . " PRIMARY KEY " . $Temparray[2] .";\n";
  } ////////////////
  $table = 'informe_general';
    $str .= "\n--\n";
    $str .= "-- Estrutura de la tabla '$table'";
    $str .= "\n--\n";
    $str .= "\nDROP TABLE $table CASCADE;";
    $str .= "\nCREATE TABLE $table (";
    $str .= "\n" . 'id_informe_general' . " " . 'int4' . " " . 'NOT NULL' . ",";    
    $str .= "\n" . 'id_empresa' . " " . 'int4' . ",";      
    $str .= "\n" . 'area_total_m2' . " " . 'text' . ",";      
    $str .= "\n" . 'area_util_m2' . " " . 'text' . ",";      
    $str .= "\n" . 'pe' . " " . 'text' . ",";      
    $str .= "\n" . 'mmr' . " " . 'text' . ",";      
    $str .= "\n" . 'riesgo' . " " . 'text' . ",";      
    $str .= "\n" . 'visible_legible' . " " . 'text' . ",";      
    $str .= "\n" . 'ubicacion' . " " . 'text' . ",";      
    $str .= "\n" . 'solicitud_nro' . " " . 'text' . ",";      
    $str .= "\n" . 'nro_ocupantes_fijos' . " " . 'text' . ",";      
    $str .= "\n" . 'nro_flotantes' . " " . 'text' . ",";      
    $str .= "\n" . 'aforo' . " " . 'text' . ",";      
    $str .= "\n" . 'tipo_construccion' . " " . 'text' . ",";      
    $str .= "\n" . 'ventilacion' . " " . 'text' . ",";      
    $str .= "\n" . 'disposicion' . " " . 'text' . ",";      
    $str .= "\n" . 'hora_inicio' . " " . 'text' . ",";      
    $str .= "\n" . 'hora_fin' . " " . 'text' . ",";      
    $str .= "\n" . 'tipo_inspeccion' . " " . 'text' . ",";      
    $str .= "\n" . 'techo' . " " . 'text' . ",";      
    $str .= "\n" . 'nro_registro' . " " . 'text' . ",";      
    $str .= "\n" . 'id_tasa' . " " . 'int4' . ",";      
    $str .= "\n" . 'valor_tasa' . " " . 'text' . ",";      
    $str .= "\n" . 'fecha_general' . " " . 'date' . ",";      
    $str .= "\n" . 'estado_informe' . " " . 'int4';  

    $str=rtrim($str, ",");  
    $str .= "\n);\n";
    $str .= "\n--\n";
    $str .= "-- Creating data for '$table'";
    $str .= "\n--\n\n";
    $res3 = pg_query("SELECT * FROM $table");
    while($r = pg_fetch_row($res3))
    {
      $sql = "INSERT INTO $table VALUES ('";
      $sql .= utf8_decode(implode("','",$r));
      $sql .= "');";
      $str = str_replace("''","NULL",$str);
      $str .= $sql;  
      $str .= "\n";
    }       
     $res1 = pg_query("SELECT pg_index.indisprimary,
            pg_catalog.pg_get_indexdef(pg_index.indexrelid)
        FROM pg_catalog.pg_class c, pg_catalog.pg_class c2,
            pg_catalog.pg_index AS pg_index
        WHERE c.relname = '$table'
            AND c.oid = pg_index.indrelid
            AND pg_index.indexrelid = c2.oid
            AND pg_index.indisprimary");
    while($r = pg_fetch_row($res1))
    {
    $str .= "\n\n--\n";
    $str .= "-- Creating index for '$table'";
    $str .= "\n--\n\n";
    $t = str_replace("CREATE UNIQUE INDEX", "", $r[1]);
    $t = str_replace("USING btree", "|", $t);
    // Next Line Can be improved!!!
    $t = str_replace("ON", "|", $t);
    $Temparray = explode("|", $t);
    $str .= "ALTER TABLE ONLY ". $Temparray[1] . " ADD CONSTRAINT " . 
$Temparray[0] . " PRIMARY KEY " . $Temparray[2] .";\n";
  } /////////////////
  $table = ' informe_incendios';
    $str .= "\n--\n";
    $str .= "-- Estrutura de la tabla '$table'";
    $str .= "\n--\n";
    $str .= "\nDROP TABLE $table CASCADE;";
    $str .= "\nCREATE TABLE $table (";
    $str .= "\n" . 'id_incendios' . " " . 'int4' . " " . 'NOT NULL' . ",";    
    $str .= "\n" . 'id_informe_general' . " " . 'int4' . ",";                  
    $str .= "\n" . 'riesgo1' . " " . 'text' . ",";                  
    $str .= "\n" . 'observacion1' . " " . 'text' . ",";
    $str .= "\n" . 'riesgo2' . " " . 'text' . ",";                  
    $str .= "\n" . 'observacion2' . " " . 'text' . ",";
    $str .= "\n" . 'riesgo3' . " " . 'text' . ",";                  
    $str .= "\n" . 'observacion3' . " " . 'text' . ",";
    $str .= "\n" . 'riesgo4' . " " . 'text' . ",";                  
    $str .= "\n" . 'observacion4' . " " . 'text' . ",";
    $str .= "\n" . 'riesgo5' . " " . 'text' . ",";                  
    $str .= "\n" . 'observacion5' . " " . 'text' . ",";
    $str .= "\n" . 'riesgo6' . " " . 'text' . ",";                  
    $str .= "\n" . 'observacion6' . " " . 'text' . ",";
    $str .= "\n" . 'observacion7' . " " . 'text' . ",";
    $str .= "\n" . 'alma1' . " " . 'text' . ",";                  
    $str .= "\n" . 'alma2' . " " . 'text' . ",";
    $str .= "\n" . 'tipo_alma1' . " " . 'text' . ",";
    $str .= "\n" . 'alma3' . " " . 'text' . ",";                  
    $str .= "\n" . 'alma4' . " " . 'text' . ",";
    $str .= "\n" . 'tipo_alma2' . " " . 'text' . ",";
    $str .= "\n" . 'alma5' . " " . 'text' . ",";                  
    $str .= "\n" . 'alma6' . " " . 'text' . ",";
    $str .= "\n" . 'tipo_alma3' . " " . 'text' . ",";
    $str .= "\n" . 'alma7' . " " . 'text' . ",";    
    $str .= "\n" . 'tipo_alma4' . " " . 'text' . ",";
    $str .= "\n" . 'alma8' . " " . 'text' . ",";    
    $str .= "\n" . 'tipo_alma5' . " " . 'text' . ",";
    $str .= "\n" . 'alma9' . " " . 'text' . ",";    
    $str .= "\n" . 'tipo_alma6' . " " . 'text' . ",";
    $str .= "\n" . 'alma10' . " " . 'text' . ",";    
    $str .= "\n" . 'alma11' . " " . 'text' . ",";    
    $str .= "\n" . 'tipo_alma7' . " " . 'text' . ",";
    $str .= "\n" . 'alma12' . " " . 'text' . ",";    
    $str .= "\n" . 'tipo_alma8' . " " . 'text';  

    $str=rtrim($str, ",");  
    $str .= "\n);\n";
    $str .= "\n--\n";
    $str .= "-- Creating data for '$table'";
    $str .= "\n--\n\n";
    $res3 = pg_query("SELECT * FROM $table");
    while($r = pg_fetch_row($res3))
    {
      $sql = "INSERT INTO $table VALUES ('";
      $sql .= utf8_decode(implode("','",$r));
      $sql .= "');";
      $str = str_replace("''","NULL",$str);
      $str .= $sql;  
      $str .= "\n";
    }       
     $res1 = pg_query("SELECT pg_index.indisprimary,
            pg_catalog.pg_get_indexdef(pg_index.indexrelid)
        FROM pg_catalog.pg_class c, pg_catalog.pg_class c2,
            pg_catalog.pg_index AS pg_index
        WHERE c.relname = '$table'
            AND c.oid = pg_index.indrelid
            AND pg_index.indexrelid = c2.oid
            AND pg_index.indisprimary");
    while($r = pg_fetch_row($res1))
    {
    $str .= "\n\n--\n";
    $str .= "-- Creating index for '$table'";
    $str .= "\n--\n\n";
    $t = str_replace("CREATE UNIQUE INDEX", "", $r[1]);
    $t = str_replace("USING btree", "|", $t);
    // Next Line Can be improved!!!
    $t = str_replace("ON", "|", $t);
    $Temparray = explode("|", $t);
    $str .= "ALTER TABLE ONLY ". $Temparray[1] . " ADD CONSTRAINT " . 
$Temparray[0] . " PRIMARY KEY " . $Temparray[2] .";\n";
  } ////////////////
  $table = 'informe_prevencion';
    $str .= "\n--\n";
    $str .= "-- Estrutura de la tabla '$table'";
    $str .= "\n--\n";
    $str .= "\nDROP TABLE $table CASCADE;";
    $str .= "\nCREATE TABLE $table (";
    $str .= "\n" . 'id_prevencion' . " " . 'int4' . " " . 'NOT NULL' . ",";    
    $str .= "\n" . 'id_informe_general' . " " . 'int4' . ",";
    $str .= "\n" . 'cant1' . " " . 'text' . ",";                  
    $str .= "\n" . 'cumple1' . " " . 'text' . ","; 
    $str .= "\n" . 'cant_a1' . " " . 'text' . ","; 
    $str .= "\n" . 'lugar1' . " " . 'text' . ","; 
    $str .= "\n" . 'cant2' . " " . 'text' . ",";                  
    $str .= "\n" . 'cumple2' . " " . 'text' . ","; 
    $str .= "\n" . 'cant_a2' . " " . 'text' . ","; 
    $str .= "\n" . 'lugar2' . " " . 'text' . ","; 
    $str .= "\n" . 'cant3' . " " . 'text' . ",";                  
    $str .= "\n" . 'cumple3' . " " . 'text' . ","; 
    $str .= "\n" . 'cant_a3' . " " . 'text' . ","; 
    $str .= "\n" . 'lugar3' . " " . 'text' . ","; 
    $str .= "\n" . 'cant4' . " " . 'text' . ",";                  
    $str .= "\n" . 'cumple4' . " " . 'text' . ","; 
    $str .= "\n" . 'cant_a4' . " " . 'text' . ","; 
    $str .= "\n" . 'lugar4' . " " . 'text' . ","; 
    $str .= "\n" . 'cant5' . " " . 'text' . ",";                  
    $str .= "\n" . 'cumple5' . " " . 'text' . ","; 
    $str .= "\n" . 'cant_a5' . " " . 'text' . ","; 
    $str .= "\n" . 'lugar5' . " " . 'text' . ","; 
    $str .= "\n" . 'cant6' . " " . 'text' . ",";                  
    $str .= "\n" . 'cumple6' . " " . 'text' . ","; 
    $str .= "\n" . 'cant_a6' . " " . 'text' . ","; 
    $str .= "\n" . 'lugar6' . " " . 'text' . ","; 
    $str .= "\n" . 'cant7' . " " . 'text' . ",";                  
    $str .= "\n" . 'cumple7' . " " . 'text' . ","; 
    $str .= "\n" . 'cant_a7' . " " . 'text' . ","; 
    $str .= "\n" . 'lugar7' . " " . 'text' . ","; 
    $str .= "\n" . 'cant8' . " " . 'text' . ",";                  
    $str .= "\n" . 'cumple8' . " " . 'text' . ","; 
    $str .= "\n" . 'cant_a8' . " " . 'text' . ","; 
    $str .= "\n" . 'lugar8' . " " . 'text' . ","; 
    $str .= "\n" . 'cant9' . " " . 'text' . ",";                  
    $str .= "\n" . 'cumple9' . " " . 'text' . ","; 
    $str .= "\n" . 'cant_a9' . " " . 'text' . ","; 
    $str .= "\n" . 'lugar9' . " " . 'text' . ","; 
    $str .= "\n" . 'cant10' . " " . 'text' . ",";                  
    $str .= "\n" . 'cumple10' . " " . 'text' . ","; 
    $str .= "\n" . 'cant_a10' . " " . 'text' . ","; 
    $str .= "\n" . 'lugar10' . " " . 'text' . ","; 
    $str .= "\n" . 'cant11' . " " . 'text' . ",";                  
    $str .= "\n" . 'cumple11' . " " . 'text' . ","; 
    $str .= "\n" . 'cant_a11' . " " . 'text' . ","; 
    $str .= "\n" . 'lugar11' . " " . 'text' . ","; 
    $str .= "\n" . 'cant12' . " " . 'text' . ",";                  
    $str .= "\n" . 'cumple12' . " " . 'text' . ","; 
    $str .= "\n" . 'cant_a12' . " " . 'text' . ","; 
    $str .= "\n" . 'lugar12' . " " . 'text' . ","; 
    $str .= "\n" . 'cant13' . " " . 'text' . ",";                  
    $str .= "\n" . 'cumple13' . " " . 'text' . ","; 
    $str .= "\n" . 'cant_a13' . " " . 'text' . ","; 
    $str .= "\n" . 'lugar13' . " " . 'text' . ","; 
    $str .= "\n" . 'cant14' . " " . 'text' . ",";                  
    $str .= "\n" . 'cumple14' . " " . 'text' . ","; 
    $str .= "\n" . 'cant_a14' . " " . 'text' . ","; 
    $str .= "\n" . 'lugar14' . " " . 'text';  
     
    $str=rtrim($str, ",");  
    $str .= "\n);\n";
    $str .= "\n--\n";
    $str .= "-- Creating data for '$table'";
    $str .= "\n--\n\n";
    $res3 = pg_query("SELECT * FROM $table");
    while($r = pg_fetch_row($res3))
    {
      $sql = "INSERT INTO $table VALUES ('";
      $sql .= utf8_decode(implode("','",$r));
      $sql .= "');";
      $str = str_replace("''","NULL",$str);
      $str .= $sql;  
      $str .= "\n";
    }       
     $res1 = pg_query("SELECT pg_index.indisprimary,
            pg_catalog.pg_get_indexdef(pg_index.indexrelid)
        FROM pg_catalog.pg_class c, pg_catalog.pg_class c2,
            pg_catalog.pg_index AS pg_index
        WHERE c.relname = '$table'
            AND c.oid = pg_index.indrelid
            AND pg_index.indexrelid = c2.oid
            AND pg_index.indisprimary");
    while($r = pg_fetch_row($res1))
    {
    $str .= "\n\n--\n";
    $str .= "-- Creating index for '$table'";
    $str .= "\n--\n\n";
    $t = str_replace("CREATE UNIQUE INDEX", "", $r[1]);
    $t = str_replace("USING btree", "|", $t);
    // Next Line Can be improved!!!
    $t = str_replace("ON", "|", $t);
    $Temparray = explode("|", $t);
    $str .= "ALTER TABLE ONLY ". $Temparray[1] . " ADD CONSTRAINT " . 
$Temparray[0] . " PRIMARY KEY " . $Temparray[2] .";\n";
  } //////////////////
  $table = 'informe_proteccion';
    $str .= "\n--\n";
    $str .= "-- Estrutura de la tabla '$table'";
    $str .= "\n--\n";
    $str .= "\nDROP TABLE $table CASCADE;";
    $str .= "\nCREATE TABLE $table (";
    $str .= "\n" . 'id_proteccion' . " " . 'int4' . " " . 'NOT NULL' . ",";    
    $str .= "\n" . 'id_informe_general' . " " . 'int4' . ",";
    $str .= "\n" . 'extinto' . " " . 'text' . ",";                  
    $str .= "\n" . 'agua' . " " . 'text' . ",";
    $str .= "\n" . 'oper_1' . " " . 'text' . ",";
    $str .= "\n" . 'no_oper_1' . " " . 'text' . ",";
    $str .= "\n" . 'cumple_1' . " " . 'text' . ",";
    $str .= "\n" . 'disposiciones_1' . " " . 'text' . ",";
    $str .= "\n" . 'cant_1' . " " . 'text' . ",";
    $str .= "\n" . 'pqs' . " " . 'text' . ",";
    $str .= "\n" . 'oper_2' . " " . 'text' . ",";
    $str .= "\n" . 'no_oper_2' . " " . 'text' . ",";
    $str .= "\n" . 'cumple_2' . " " . 'text' . ",";
    $str .= "\n" . 'disposiciones_2' . " " . 'text' . ",";
    $str .= "\n" . 'cant_2' . " " . 'text' . ",";
    $str .= "\n" . 'co2' . " " . 'text' . ",";
    $str .= "\n" . 'oper_3' . " " . 'text' . ",";
    $str .= "\n" . 'no_oper_3' . " " . 'text' . ",";
    $str .= "\n" . 'cumple_3' . " " . 'text' . ",";
    $str .= "\n" . 'disposiciones_3' . " " . 'text' . ",";
    $str .= "\n" . 'cant_3' . " " . 'text' . ",";
    $str .= "\n" . 'espuma' . " " . 'text' . ",";
    $str .= "\n" . 'oper_4' . " " . 'text' . ",";
    $str .= "\n" . 'no_oper_4' . " " . 'text' . ",";
    $str .= "\n" . 'cumple_4' . " " . 'text' . ",";
    $str .= "\n" . 'disposiciones_4' . " " . 'text' . ",";
    $str .= "\n" . 'cant_4' . " " . 'text' . ",";
    $str .= "\n" . 'agentes' . " " . 'text' . ",";
    $str .= "\n" . 'oper_5' . " " . 'text' . ",";
    $str .= "\n" . 'no_oper_5' . " " . 'text' . ",";
    $str .= "\n" . 'cumple_5' . " " . 'text' . ",";
    $str .= "\n" . 'disposiciones_5' . " " . 'text' . ",";    
    $str .= "\n" . 'cant_5' . " " . 'text';                      
   
    $str=rtrim($str, ",");  
    $str .= "\n);\n";
    $str .= "\n--\n";
    $str .= "-- Creating data for '$table'";
    $str .= "\n--\n\n";
    $res3 = pg_query("SELECT * FROM $table");
    while($r = pg_fetch_row($res3))
    {
      $sql = "INSERT INTO $table VALUES ('";
      $sql .= utf8_decode(implode("','",$r));
      $sql .= "');";
      $str = str_replace("''","NULL",$str);
      $str .= $sql;  
      $str .= "\n";
    }       
     $res1 = pg_query("SELECT pg_index.indisprimary,
            pg_catalog.pg_get_indexdef(pg_index.indexrelid)
        FROM pg_catalog.pg_class c, pg_catalog.pg_class c2,
            pg_catalog.pg_index AS pg_index
        WHERE c.relname = '$table'
            AND c.oid = pg_index.indrelid
            AND pg_index.indexrelid = c2.oid
            AND pg_index.indisprimary");
    while($r = pg_fetch_row($res1))
    {
    $str .= "\n\n--\n";
    $str .= "-- Creating index for '$table'";
    $str .= "\n--\n\n";
    $t = str_replace("CREATE UNIQUE INDEX", "", $r[1]);
    $t = str_replace("USING btree", "|", $t);
    // Next Line Can be improved!!!
    $t = str_replace("ON", "|", $t);
    $Temparray = explode("|", $t);
    $str .= "ALTER TABLE ONLY ". $Temparray[1] . " ADD CONSTRAINT " . 
$Temparray[0] . " PRIMARY KEY " . $Temparray[2] .";\n";
  } /////////////
  $table = 'productos';
    $str .= "\n--\n";
    $str .= "-- Estrutura de la tabla '$table'";
    $str .= "\n--\n";
    $str .= "\nDROP TABLE $table CASCADE;";
    $str .= "\nCREATE TABLE $table (";
    $str .= "\n" . 'id_producto' . " " . 'int4' . " " . 'NOT NULL' . ",";                      
    $str .= "\n" . 'nombre_producto' . " " . 'text' . ",";
    $str .= "\n" . 'valor_iva' . " " . 'text' . ",";
    $str .= "\n" . 'precio_compra' . " " . 'text' . ","; 
    $str .= "\n" . 'precio_venta' . " " . 'text' . ","; 
    $str .= "\n" . 'stock' . " " . 'text' . ","; 
    $str .= "\n" . 'stock_minimo' . " " . 'text' . ","; 
    $str .= "\n" . 'stock_maximo' . " " . 'text' . ","; 
    $str .= "\n" . 'caracteristicas_producto' . " " . 'text';  
  
    $str=rtrim($str, ",");  
    $str .= "\n);\n";
    $str .= "\n--\n";
    $str .= "-- Creating data for '$table'";
    $str .= "\n--\n\n";
    $res3 = pg_query("SELECT * FROM $table");
    while($r = pg_fetch_row($res3))
    {
      $sql = "INSERT INTO $table VALUES ('";
      $sql .= utf8_decode(implode("','",$r));
      $sql .= "');";
      $str = str_replace("''","NULL",$str);
      $str .= $sql;  
      $str .= "\n";
    }       
     $res1 = pg_query("SELECT pg_index.indisprimary,
            pg_catalog.pg_get_indexdef(pg_index.indexrelid)
        FROM pg_catalog.pg_class c, pg_catalog.pg_class c2,
            pg_catalog.pg_index AS pg_index
        WHERE c.relname = '$table'
            AND c.oid = pg_index.indrelid
            AND pg_index.indexrelid = c2.oid
            AND pg_index.indisprimary");
    while($r = pg_fetch_row($res1))
    {
    $str .= "\n\n--\n";
    $str .= "-- Creating index for '$table'";
    $str .= "\n--\n\n";
    $t = str_replace("CREATE UNIQUE INDEX", "", $r[1]);
    $t = str_replace("USING btree", "|", $t);
    // Next Line Can be improved!!!
    $t = str_replace("ON", "|", $t);
    $Temparray = explode("|", $t);
    $str .= "ALTER TABLE ONLY ". $Temparray[1] . " ADD CONSTRAINT " . 
$Temparray[0] . " PRIMARY KEY " . $Temparray[2] .";\n";
  } //////////////////
  $table = 'propietario';
    $str .= "\n--\n";
    $str .= "-- Estrutura de la tabla '$table'";
    $str .= "\n--\n";
    $str .= "\nDROP TABLE $table CASCADE;";
    $str .= "\nCREATE TABLE $table (";
    $str .= "\n" . 'id_propietario' . " " . 'int4' . " " . 'NOT NULL' . ",";    
    $str .= "\n" . 'ruc_propietario' . " " . 'text' . ",";
    $str .= "\n" . 'nombre_propietario' . " " . 'text' . ",";
    $str .= "\n" . 'direccion_propietario' . " " . 'text' . ",";
    $str .= "\n" . 'telefono_propietario' . " " . 'text' . ","; 
    $str .= "\n" . 'celular_propietario' . " " . 'text';    
      
    $str=rtrim($str, ",");  
    $str .= "\n);\n";
    $str .= "\n--\n";
    $str .= "-- Creating data for '$table'";
    $str .= "\n--\n\n";
    $res3 = pg_query("SELECT * FROM $table");
    while($r = pg_fetch_row($res3))
    {
      $sql = "INSERT INTO $table VALUES ('";
      $sql .= utf8_decode(implode("','",$r));
      $sql .= "');";
      $str = str_replace("''","NULL",$str);
      $str .= $sql;  
      $str .= "\n";
    }       
     $res1 = pg_query("SELECT pg_index.indisprimary,
            pg_catalog.pg_get_indexdef(pg_index.indexrelid)
        FROM pg_catalog.pg_class c, pg_catalog.pg_class c2,
            pg_catalog.pg_index AS pg_index
        WHERE c.relname = '$table'
            AND c.oid = pg_index.indrelid
            AND pg_index.indexrelid = c2.oid
            AND pg_index.indisprimary");
    while($r = pg_fetch_row($res1))
    {
    $str .= "\n\n--\n";
    $str .= "-- Creating index for '$table'";
    $str .= "\n--\n\n";
    $t = str_replace("CREATE UNIQUE INDEX", "", $r[1]);
    $t = str_replace("USING btree", "|", $t);
    // Next Line Can be improved!!!
    $t = str_replace("ON", "|", $t);
    $Temparray = explode("|", $t);
    $str .= "ALTER TABLE ONLY ". $Temparray[1] . " ADD CONSTRAINT " . 
$Temparray[0] . " PRIMARY KEY " . $Temparray[2] .";\n";
  } //////////////////
  $table = 'servicios_administrativos';
    $str .= "\n--\n";
    $str .= "-- Estrutura de la tabla '$table'";
    $str .= "\n--\n";
    $str .= "\nDROP TABLE $table CASCADE;";
    $str .= "\nCREATE TABLE $table (";
    $str .= "\n" . 'id_servicio' . " " . 'int4' . " " . 'NOT NULL' . ",";                      
    $str .= "\n" . 'nombre_servicio' . " " . 'text' . ","; 
    $str .= "\n" . 'estado' . " " . 'int4';
   
    $str=rtrim($str, ",");  
    $str .= "\n);\n";
    $str .= "\n--\n";
    $str .= "-- Creating data for '$table'";
    $str .= "\n--\n\n";
    $res3 = pg_query("SELECT * FROM $table");
    while($r = pg_fetch_row($res3))
    {
      $sql = "INSERT INTO $table VALUES ('";
      $sql .= utf8_decode(implode("','",$r));
      $sql .= "');";
      $str = str_replace("''","NULL",$str);
      $str .= $sql;  
      $str .= "\n";
    }       
     $res1 = pg_query("SELECT pg_index.indisprimary,
            pg_catalog.pg_get_indexdef(pg_index.indexrelid)
        FROM pg_catalog.pg_class c, pg_catalog.pg_class c2,
            pg_catalog.pg_index AS pg_index
        WHERE c.relname = '$table'
            AND c.oid = pg_index.indrelid
            AND pg_index.indexrelid = c2.oid
            AND pg_index.indisprimary");
    while($r = pg_fetch_row($res1))
    {
    $str .= "\n\n--\n";
    $str .= "-- Creating index for '$table'";
    $str .= "\n--\n\n";
    $t = str_replace("CREATE UNIQUE INDEX", "", $r[1]);
    $t = str_replace("USING btree", "|", $t);
    // Next Line Can be improved!!!
    $t = str_replace("ON", "|", $t);
    $Temparray = explode("|", $t);
    $str .= "ALTER TABLE ONLY ". $Temparray[1] . " ADD CONSTRAINT " . 
$Temparray[0] . " PRIMARY KEY " . $Temparray[2] .";\n";
  } //////////////////
  $table = 'tasa_servicio';
    $str .= "\n--\n";
    $str .= "-- Estrutura de la tabla '$table'";
    $str .= "\n--\n";
    $str .= "\nDROP TABLE $table CASCADE;";
    $str .= "\nCREATE TABLE $table (";
    $str .= "\n" . 'id_tasa_servicio' . " " . 'int4' . " " . 'NOT NULL' . ",";    
    $str .= "\n" . 'little' . " " . 'text' . ",";                  
    $str .= "\n" . 'medium' . " " . 'text' . ",";
    $str .= "\n" . 'big' . " " . 'text' . ",";
    $str .= "\n" . 'sbig' . " " . 'text' . ","; 
    $str .= "\n" . 'id_servicio' . " " . 'int4' . ","; 
    $str .= "\n" . 'nombre_tasa' . " " . 'text';
       
    $str=rtrim($str, ",");  
    $str .= "\n);\n";
    $str .= "\n--\n";
    $str .= "-- Creating data for '$table'";
    $str .= "\n--\n\n";
    $res3 = pg_query("SELECT * FROM $table");
    while($r = pg_fetch_row($res3))
    {
      $sql = "INSERT INTO $table VALUES ('";
      $sql .= utf8_decode(implode("','",$r));
      $sql .= "');";
      $str = str_replace("''","NULL",$str);
      $str .= $sql;  
      $str .= "\n";
    }       
     $res1 = pg_query("SELECT pg_index.indisprimary,
            pg_catalog.pg_get_indexdef(pg_index.indexrelid)
        FROM pg_catalog.pg_class c, pg_catalog.pg_class c2,
            pg_catalog.pg_index AS pg_index
        WHERE c.relname = '$table'
            AND c.oid = pg_index.indrelid
            AND pg_index.indexrelid = c2.oid
            AND pg_index.indisprimary");
    while($r = pg_fetch_row($res1))
    {
    $str .= "\n\n--\n";
    $str .= "-- Creating index for '$table'";
    $str .= "\n--\n\n";
    $t = str_replace("CREATE UNIQUE INDEX", "", $r[1]);
    $t = str_replace("USING btree", "|", $t);
    // Next Line Can be improved!!!
    $t = str_replace("ON", "|", $t);
    $Temparray = explode("|", $t);
    $str .= "ALTER TABLE ONLY ". $Temparray[1] . " ADD CONSTRAINT " . 
$Temparray[0] . " PRIMARY KEY " . $Temparray[2] .";\n";
  } //////////////////

  $table = 'tbl_audit';
    $str .= "\n--\n";
    $str .= "-- Estrutura de la tabla '$table'";
    $str .= "\n--\n";
    $str .= "\nDROP TABLE $table CASCADE;";
    $str.="\nCREATE SEQUENCE tbl_audit_pk_audit_seq
    START WITH $max
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;";
    $str .= "\nCREATE TABLE $table (";
    $str .= "\n" . 'pk_audit' . " " . 'int4' . " " . "NOT NULL DEFAULT nextval('tbl_audit_pk_audit_seq'::regclass) " . ",";    
    $str .= "\n" . 'nombre_tabla' . " " . 'text' . " " .'NOT NULL' . ",";                  
    $str .= "\n" . 'operacion' . " " . 'character(1)' . " " . 'NOT NULL' .",";                  
    $str .= "\n" . 'valor_anterior' . " " . 'text' . ",";                  
    $str .= "\n" . 'valor_nuevo' . " " . 'text' . ",";                  
    $str .= "\n" . 'fecha_cambio' . " " . 'timestamp' . " " .'NOT NULL' . ",";                  
    $str .= "\n" . 'usuario' . " " . 'text' . " " .'NOT NULL' ;                      

    $str=rtrim($str, ",");  
    $str .= "\n);\n";
    $str .= "\n--\n";
    $str .= "-- Creating data for '$table'";
    $str .= "\n--\n\n";
    $res3 = pg_query("SELECT * FROM $table");
    while($r = pg_fetch_row($res3))
    {
      $sql = "INSERT INTO $table VALUES ('";
      $sql .= utf8_decode(implode("','",$r));
      $sql .= "');";
      $str = str_replace("''","NULL",$str);
      $str .= $sql;  
      $str .= "\n";
    }       
     $res1 = pg_query("SELECT pg_index.indisprimary,
            pg_catalog.pg_get_indexdef(pg_index.indexrelid)
        FROM pg_catalog.pg_class c, pg_catalog.pg_class c2,
            pg_catalog.pg_index AS pg_index
        WHERE c.relname = '$table'
            AND c.oid = pg_index.indrelid
            AND pg_index.indexrelid = c2.oid
            AND pg_index.indisprimary");
    while($r = pg_fetch_row($res1))
    {
    $str .= "\n\n--\n";
    $str .= "-- Creating index for '$table'";
    $str .= "\n--\n\n";
    $t = str_replace("CREATE UNIQUE INDEX", "", $r[1]);
    $t = str_replace("USING btree", "|", $t);
    // Next Line Can be improved!!!
    $t = str_replace("ON", "|", $t);
    $Temparray = explode("|", $t);
    $str .= "ALTER TABLE ONLY ". $Temparray[1] . " ADD CONSTRAINT " . 
$Temparray[0] . " PRIMARY KEY " . $Temparray[2] .";\n";
  } //////////////////

  $table = 'tipo_pago';
    $str .= "\n--\n";
    $str .= "-- Estrutura de la tabla '$table'";
    $str .= "\n--\n";
    $str .= "\nDROP TABLE $table CASCADE;";
    $str .= "\nCREATE TABLE $table (";
    $str .= "\n" . 'id_tipo_pago' . " " . 'int4' . " " . 'NOT NULL' . ",";    
    $str .= "\n" . 'tipo_pago' . " " . 'text' . ",";
    $str .= "\n" . ' estado' . " " . 'text'; 

    $str=rtrim($str, ",");  
    $str .= "\n);\n";
    $str .= "\n--\n";
    $str .= "-- Creating data for '$table'";
    $str .= "\n--\n\n";
    $res3 = pg_query("SELECT * FROM $table");
    while($r = pg_fetch_row($res3))
    {
      $sql = "INSERT INTO $table VALUES ('";
      $sql .= utf8_decode(implode("','",$r));
      $sql .= "');";
      $str = str_replace("''","NULL",$str);
      $str .= $sql;  
      $str .= "\n";
    }       
     $res1 = pg_query("SELECT pg_index.indisprimary,
            pg_catalog.pg_get_indexdef(pg_index.indexrelid)
        FROM pg_catalog.pg_class c, pg_catalog.pg_class c2,
            pg_catalog.pg_index AS pg_index
        WHERE c.relname = '$table'
            AND c.oid = pg_index.indrelid
            AND pg_index.indexrelid = c2.oid
            AND pg_index.indisprimary");
    while($r = pg_fetch_row($res1))
    {
    $str .= "\n\n--\n";
    $str .= "-- Creating index for '$table'";
    $str .= "\n--\n\n";
    $t = str_replace("CREATE UNIQUE INDEX", "", $r[1]);
    $t = str_replace("USING btree", "|", $t);
    // Next Line Can be improved!!!
    $t = str_replace("ON", "|", $t);
    $Temparray = explode("|", $t);
    $str .= "ALTER TABLE ONLY ". $Temparray[1] . " ADD CONSTRAINT " . 
$Temparray[0] . " PRIMARY KEY " . $Temparray[2] .";\n";
  } //////////////////

  $table = 'tipo_usuario';
    $str .= "\n--\n";
    $str .= "-- Estrutura de la tabla '$table'";
    $str .= "\n--\n";
    $str .= "\nDROP TABLE $table CASCADE;";
    $str .= "\nCREATE TABLE $table (";
    $str .= "\n" . 'id_tipo_usuario' . " " . 'int4' . " " . 'NOT NULL' . ",";    
    $str .= "\n" . 'nombre_tipo' . " " . 'text' . ",";
    $str .= "\n" . ' estado_tipo' . " " . 'text'; 

    $str=rtrim($str, ",");  
    $str .= "\n);\n";
    $str .= "\n--\n";
    $str .= "-- Creating data for '$table'";
    $str .= "\n--\n\n";
    $res3 = pg_query("SELECT * FROM $table");
    while($r = pg_fetch_row($res3))
    {
      $sql = "INSERT INTO $table VALUES ('";
      $sql .= utf8_decode(implode("','",$r));
      $sql .= "');";
      $str = str_replace("''","NULL",$str);
      $str .= $sql;  
      $str .= "\n";
    }       
     $res1 = pg_query("SELECT pg_index.indisprimary,
            pg_catalog.pg_get_indexdef(pg_index.indexrelid)
        FROM pg_catalog.pg_class c, pg_catalog.pg_class c2,
            pg_catalog.pg_index AS pg_index
        WHERE c.relname = '$table'
            AND c.oid = pg_index.indrelid
            AND pg_index.indexrelid = c2.oid
            AND pg_index.indisprimary");
    while($r = pg_fetch_row($res1))
    {
    $str .= "\n\n--\n";
    $str .= "-- Creating index for '$table'";
    $str .= "\n--\n\n";
    $t = str_replace("CREATE UNIQUE INDEX", "", $r[1]);
    $t = str_replace("USING btree", "|", $t);
    // Next Line Can be improved!!!
    $t = str_replace("ON", "|", $t);
    $Temparray = explode("|", $t);
    $str .= "ALTER TABLE ONLY ". $Temparray[1] . " ADD CONSTRAINT " . 
$Temparray[0] . " PRIMARY KEY " . $Temparray[2] .";\n";
  } //////////////////
  
   $table = 'usuario';
    $str .= "\n--\n";
    $str .= "-- Estrutura de la tabla '$table'";
    $str .= "\n--\n";
    $str .= "\nDROP TABLE $table CASCADE;";
    $str .= "\nCREATE TABLE $table (";
    $str .= "\n" . 'id_usuario' . " " . 'int4' . " " . 'NOT NULL' . ",";    
    $str .= "\n" . 'nombre_usuario' . " " . 'text' . ",";
    $str .= "\n" . 'telefono_usuario' . " " . 'text' . ",";
    $str .= "\n" . 'celular_usuario' . " " . 'text' . ",";
    $str .= "\n" . 'direccion_usuario' . " " . 'text' . ",";
    $str .= "\n" . 'mail_usuario' . " " . 'text' . ",";
    $str .= "\n" . 'fecha_usuario' . " " . 'date' . ",";
    $str .= "\n" . 'id_tipo_usuario' . " " . 'int4' . ",";
    $str .= "\n" . 'estado_usuario' . " " . 'int4' . ",";
    $str .= "\n" . 'nick_usuario' . " " . 'text' . ",";
    $str .= "\n" . ' ci_usuario' . " " . 'text'; 

    $str=rtrim($str, ",");  
    $str .= "\n);\n";
    $str .= "\n--\n";
    $str .= "-- Creating data for '$table'";
    $str .= "\n--\n\n";
    $res3 = pg_query("SELECT * FROM $table");
    while($r = pg_fetch_row($res3))
    {
      $sql = "INSERT INTO $table VALUES ('";
      $sql .= utf8_decode(implode("','",$r));
      $sql .= "');";
      $str = str_replace("''","NULL",$str);
      $str .= $sql;  
      $str .= "\n";
    }       
     $res1 = pg_query("SELECT pg_index.indisprimary,
            pg_catalog.pg_get_indexdef(pg_index.indexrelid)
        FROM pg_catalog.pg_class c, pg_catalog.pg_class c2,
            pg_catalog.pg_index AS pg_index
        WHERE c.relname = '$table'
            AND c.oid = pg_index.indrelid
            AND pg_index.indexrelid = c2.oid
            AND pg_index.indisprimary");
    while($r = pg_fetch_row($res1))
    {
    $str .= "\n\n--\n";
    $str .= "-- Creating index for '$table'";
    $str .= "\n--\n\n";
    $t = str_replace("CREATE UNIQUE INDEX", "", $r[1]);
    $t = str_replace("USING btree", "|", $t);
    // Next Line Can be improved!!!
    $t = str_replace("ON", "|", $t);
    $Temparray = explode("|", $t);
    $str .= "ALTER TABLE ONLY ". $Temparray[1] . " ADD CONSTRAINT " . 
$Temparray[0] . " PRIMARY KEY " . $Temparray[2] .";\n";
  } //////////////////
  
  /////////////////////////////// 
  $res = pg_query(" SELECT
  cl.relname AS tabela,ct.conname,
   pg_get_constraintdef(ct.oid)
   FROM pg_catalog.pg_attribute a
   JOIN pg_catalog.pg_class cl ON (a.attrelid = cl.oid AND cl.relkind = 'r')
   JOIN pg_catalog.pg_namespace n ON (n.oid = cl.relnamespace)
   JOIN pg_catalog.pg_constraint ct ON (a.attrelid = ct.conrelid AND
   ct.confrelid != 0 AND ct.conkey[1] = a.attnum)
   JOIN pg_catalog.pg_class clf ON (ct.confrelid = clf.oid AND 
clf.relkind = 'r')
   JOIN pg_catalog.pg_namespace nf ON (nf.oid = clf.relnamespace)
   JOIN pg_catalog.pg_attribute af ON (af.attrelid = ct.confrelid AND
   af.attnum = ct.confkey[1]) order by cl.relname ");
  while($row = pg_fetch_row($res))
  {
    $str .= "\n\n--\n";
    $str .= "-- Creating relacionships for '".$row[0]."'";
    $str .= "\n--\n\n";
    $str .= "ALTER TABLE ONLY ".$row[0] . " ADD CONSTRAINT " . $row[1] . 
" " . $row[2] . ";";
  }     
  ////////////////////
   $table = 'usuarios_permisos';
    $str .= "\n--\n";
    $str .= "-- Estrutura de la tabla '$table'";
    $str .= "\n--\n";
    $str .= "\nDROP TABLE $table CASCADE;";
    $str .= "\nCREATE TABLE $table (";
    $str .= "\n" . 'id_usuario_permiso' . " " . 'int4' . " " . 'NOT NULL' . ",";    
    $str .= "\n" . 'id_usuario' . " " . 'int4' . ",";
    $str .= "\n" . 'estados_principales' . " " . '_int4' . ",";
    $str .= "\n" . ' estados_segundarios' . " " . '_int4'; 

    $str=rtrim($str, ",");  
    $str .= "\n);\n";
    $str .= "\n--\n";
    $str .= "-- Creating data for '$table'";
    $str .= "\n--\n\n";
    $res3 = pg_query("SELECT * FROM $table");
    while($r = pg_fetch_row($res3))
    {
      $sql = "INSERT INTO $table VALUES ('";
      $sql .= utf8_decode(implode("','",$r));
      $sql .= "');";
      $str = str_replace("''","NULL",$str);
      $str .= $sql;  
      $str .= "\n";
    }       
     $res1 = pg_query("SELECT pg_index.indisprimary,
            pg_catalog.pg_get_indexdef(pg_index.indexrelid)
        FROM pg_catalog.pg_class c, pg_catalog.pg_class c2,
            pg_catalog.pg_index AS pg_index
        WHERE c.relname = '$table'
            AND c.oid = pg_index.indrelid
            AND pg_index.indexrelid = c2.oid
            AND pg_index.indisprimary");
    while($r = pg_fetch_row($res1))
    {
    $str .= "\n\n--\n";
    $str .= "-- Creating index for '$table'";
    $str .= "\n--\n\n";
    $t = str_replace("CREATE UNIQUE INDEX", "", $r[1]);
    $t = str_replace("USING btree", "|", $t);
    // Next Line Can be improved!!!
    $t = str_replace("ON", "|", $t);
    $Temparray = explode("|", $t);
    $str .= "ALTER TABLE ONLY ". $Temparray[1] . " ADD CONSTRAINT " . 
$Temparray[0] . " PRIMARY KEY " . $Temparray[2] .";\n";
  } ////////////////// 

  $table = 'detalles_permiso';
    $str .= "\n--\n";
    $str .= "-- Estrutura de la tabla '$table'";
    $str .= "\n--\n";
    $str .= "\nDROP TABLE $table CASCADE;";
    $str .= "\nCREATE TABLE $table (";
    $str .= "\n" . 'id_detalle_permiso' . " " . 'int4' . " " . 'NOT NULL' . ",";    
    $str .= "\n" . 'id_permiso' . " " . 'int4' . ",";
    $str .= "\n" . 'nro_detalle' . " " . 'text' . ",";
    $str .= "\n" . 'nombre_detalle' . " " . 'text' . ",";
    $str .= "\n" . ' estado_detalle' . " " . 'text'; 

    $str=rtrim($str, ",");  
    $str .= "\n);\n";
    $str .= "\n--\n";
    $str .= "-- Creating data for '$table'";
    $str .= "\n--\n\n";
    $res3 = pg_query("SELECT * FROM $table");
    while($r = pg_fetch_row($res3))
    {
      $sql = "INSERT INTO $table VALUES ('";
      $sql .= utf8_decode(implode("','",$r));
      $sql .= "');";
      $str = str_replace("''","NULL",$str);
      $str .= $sql;  
      $str .= "\n";
    }       
     $res1 = pg_query("SELECT pg_index.indisprimary,
            pg_catalog.pg_get_indexdef(pg_index.indexrelid)
        FROM pg_catalog.pg_class c, pg_catalog.pg_class c2,
            pg_catalog.pg_index AS pg_index
        WHERE c.relname = '$table'
            AND c.oid = pg_index.indrelid
            AND pg_index.indexrelid = c2.oid
            AND pg_index.indisprimary");
    while($r = pg_fetch_row($res1))
    {
    $str .= "\n\n--\n";
    $str .= "-- Creating index for '$table'";
    $str .= "\n--\n\n";
    $t = str_replace("CREATE UNIQUE INDEX", "", $r[1]);
    $t = str_replace("USING btree", "|", $t);
    // Next Line Can be improved!!!
    $t = str_replace("ON", "|", $t);
    $Temparray = explode("|", $t);
    $str .= "ALTER TABLE ONLY ". $Temparray[1] . " ADD CONSTRAINT " . 
$Temparray[0] . " PRIMARY KEY " . $Temparray[2] .";\n";
  } ////////////////// 
  

  $table = 'permisos';
    $str .= "\n--\n";
    $str .= "-- Estrutura de la tabla '$table'";
    $str .= "\n--\n";
    $str .= "\nDROP TABLE $table CASCADE;";
    $str .= "\nCREATE TABLE $table (";
    $str .= "\n" . 'id_permisos' . " " . 'int4' . " " . 'NOT NULL' . ",";    
    $str .= "\n" . 'nro_permiso' . " " . 'int4' . ",";
    $str .= "\n" . 'nombre_permiso' . " " . 'text' . ",";    
    $str .= "\n" . ' estado_permiso' . " " . 'text'; 

    $str=rtrim($str, ",");  
    $str .= "\n);\n";
    $str .= "\n--\n";
    $str .= "-- Creating data for '$table'";
    $str .= "\n--\n\n";
    $res3 = pg_query("SELECT * FROM $table");
    while($r = pg_fetch_row($res3))
    {
      $sql = "INSERT INTO $table VALUES ('";
      $sql .= utf8_decode(implode("','",$r));
      $sql .= "');";
      $str = str_replace("''","NULL",$str);
      $str .= $sql;  
      $str .= "\n";
    }       
     $res1 = pg_query("SELECT pg_index.indisprimary,
            pg_catalog.pg_get_indexdef(pg_index.indexrelid)
        FROM pg_catalog.pg_class c, pg_catalog.pg_class c2,
            pg_catalog.pg_index AS pg_index
        WHERE c.relname = '$table'
            AND c.oid = pg_index.indrelid
            AND pg_index.indexrelid = c2.oid
            AND pg_index.indisprimary");
    while($r = pg_fetch_row($res1))
    {
    $str .= "\n\n--\n";
    $str .= "-- Creating index for '$table'";
    $str .= "\n--\n\n";
    $t = str_replace("CREATE UNIQUE INDEX", "", $r[1]);
    $t = str_replace("USING btree", "|", $t);
    // Next Line Can be improved!!!
    $t = str_replace("ON", "|", $t);
    $Temparray = explode("|", $t);
    $str .= "ALTER TABLE ONLY ". $Temparray[1] . " ADD CONSTRAINT " . 
$Temparray[0] . " PRIMARY KEY " . $Temparray[2] .";\n";
  } ////////////////// 
  $str .= "\nCREATE TRIGGER c_x_cobrar_tg_audit AFTER INSERT OR UPDATE OR DELETE ON c_x_cobrar FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();";
  $str .= "\nCREATE TRIGGER claves_tg_audit AFTER INSERT OR UPDATE OR DELETE ON claves FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();";
  $str .= "\nCREATE TRIGGER detalle_devolucion_venta_tg_audit AFTER INSERT OR UPDATE OR DELETE ON detalle_devolucion_venta FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();";
  $str .= "\nCREATE TRIGGER detalles_cxc_tg_audit AFTER INSERT OR UPDATE OR DELETE ON detalles_cxc FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();";
  $str .= "\nCREATE TRIGGER detalles_emision_tg_audit AFTER INSERT OR UPDATE OR DELETE ON detalles_emision FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();";
  $str .= "\nCREATE TRIGGER detalles_fc_tg_audit AFTER INSERT OR UPDATE OR DELETE ON detalles_fc FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();";
  $str .= "\nCREATE TRIGGER devolucion_venta_tg_audit AFTER INSERT OR UPDATE OR DELETE ON devolucion_venta FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();";
  $str .= "\nCREATE TRIGGER emision_permisos_tg_audit AFTER INSERT OR UPDATE OR DELETE ON emision_permisos FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();";
  $str .= "\nCREATE TRIGGER empresa_tg_audit AFTER INSERT OR UPDATE OR DELETE ON empresa FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();";
  $str .= "\nCREATE TRIGGER factura_compra_tg_audit AFTER INSERT OR UPDATE OR DELETE ON factura_compra FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();";
  $str .= "\nCREATE TRIGGER informe_confirmar_tg_audit AFTER INSERT OR UPDATE OR DELETE ON informe_confirmar FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();";
  $str .= "\nCREATE TRIGGER informe_general_tg_audit AFTER INSERT OR UPDATE OR DELETE ON informe_general FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();";
  $str .= "\nCREATE TRIGGER informe_incendios_tg_audit AFTER INSERT OR UPDATE OR DELETE ON informe_incendios FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();";
  $str .= "\nCREATE TRIGGER informe_prevencion_tg_audit AFTER INSERT OR UPDATE OR DELETE ON informe_prevencion FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();";
  $str .= "\nCREATE TRIGGER informe_proteccion_tg_audit AFTER INSERT OR UPDATE OR DELETE ON informe_proteccion FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();";
  $str .= "\nCREATE TRIGGER productos_tg_audit AFTER INSERT OR UPDATE OR DELETE ON productos FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();";
  $str .= "\nCREATE TRIGGER propietario_tg_audit AFTER INSERT OR UPDATE OR DELETE ON propietario FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();";
  $str .= "\nCREATE TRIGGER servicios_administrativos_tg_audit AFTER INSERT OR UPDATE OR DELETE ON servicios_administrativos FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();";
  $str .= "\nCREATE TRIGGER tasa_servicio_tg_audit AFTER INSERT OR UPDATE OR DELETE ON tasa_servicio FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();";
  $str .= "\nCREATE TRIGGER tipo_pago_tg_audit AFTER INSERT OR UPDATE OR DELETE ON tipo_pago FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();";
  $str .= "\nCREATE TRIGGER tipo_usuario_tg_audit AFTER INSERT OR UPDATE OR DELETE ON tipo_usuario FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();";
  $str .= "\nCREATE TRIGGER usuario_tg_audit AFTER INSERT OR UPDATE OR DELETE ON usuario FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();";
  $str .= "\nCREATE TRIGGER usuarios_permisos_tg_audit AFTER INSERT OR UPDATE OR DELETE ON usuarios_permisos FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();";
  $str .= "\nCREATE TRIGGER detalles_permiso_tg_audit AFTER INSERT OR UPDATE OR DELETE ON detalles_permiso FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();";
  $str .= "\nCREATE TRIGGER permisos_permiso_tg_audit AFTER INSERT OR UPDATE OR DELETE ON permisos FOR EACH ROW EXECUTE PROCEDURE fn_log_audit();";

    
  ////////////////  
  
  if(fwrite($back,$str)){
    echo '1';
    fclose($back);
  } else{
    echo '0';
  } 
  //dl_file("$dbname.sql");
  
}

?>
 