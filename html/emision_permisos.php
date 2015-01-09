<form class="form-horizontal " action="" rol="form" id="form_emisionPermisos" name="form_emisionPermisos" method="post">
  <div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-pushpin"></span> <b> Emisión de Permisos / Factura Venta </b></div>
    <div class="panel-body form-styles">
      <div class="container">
        <div class="form-group col-md-3">
          <label class="col-sm-3 control-label" for='fecha_factura'> FECHA</label>
          <div class="col-sm-9">            
            <input type="text" class="form-control" id='fecha_factura' readonly name="fecha_factura" data-toggle="tooltip" data-original-title="Nombre del Producto" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ0-9 ]{1,}" minlength="1" style="text-transform: uppercase">  
            <input type="hidden" id="id_emision" name="id_emision">            
          </div>
        </div>            
        <div class="form-group col-md-3">
          <label class="col-sm-3 control-label" for='hora_factura'> HORA</label>
          <div class="col-sm-9">            
            <input type="text" class="form-control" id='hora_factura' readonly name="hora_factura" data-toggle="tooltip" data-original-title="Nombre del Producto" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ0-9 ]{1,}" minlength="1" style="text-transform: uppercase">  
          </div>
        </div>            
        <div class="form-group col-md-5">
          <label class="col-sm-3 control-label" for='nombre_usuario'> DIGITADOR</label>
          <div class="col-sm-9">            
            <input type="text" class="form-control" id='nombre_usuario' readonly name="nombre_usuario" data-toggle="tooltip" data-original-title="Nombre del Producto" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ0-9 ]{1,}" minlength="1" style="text-transform: uppercase" value="<?php echo $_SESSION['usuario'];?>">  
          </div>
        </div>   
        <div class="form-group col-md-7">
          <label class="col-sm-4 control-label" for='nro_factura_preimpresa'> NRO. FACTURA PREIMPRESA</label>
          <div class="col-sm-2">            
            <input type="text" class="form-control" id='nro_1' name="nro_1" data-toggle="tooltip" required pattern="[0-9 ]{3}" minlength="3" value="001" maxlength="3" style="text-transform: uppercase">  
          </div>
          <div class="col-sm-2">            
            <input type="text" class="form-control" id='nro_2' name="nro_2" data-toggle="tooltip" required pattern="[0-9 ]{3}" minlength="3"  value="001" maxlength="3" style="text-transform: uppercase">  
          </div>
          <div class="col-sm-3">            
            <input type="text" class="form-control" id='nro_factura_preimpresa' name="nro_factura_preimpresa" data-toggle="tooltip" data-original-title="Nro de factura preimpresa" required pattern="[0-9]{9}" minlength="1" maxlength="9" style="text-transform: uppercase">  
          </div>
        </div>  
        <div class="form-group col-md-4">
          <label class="col-sm-5 control-label" for='fecha_cancelacion'> F. CANCELACIÓN</label>
          <div class="col-sm-6  ">            
            <input type="text" class="form-control" id='fecha_cancelacion' readonly name="fecha_cancelacion" data-toggle="tooltip" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ0-9 ]{1,}" minlength="1" style="text-transform: uppercase">  
          </div>
        </div>             
        <div class="form-group col-md-4">
          <label class="col-sm-3 control-label" for='ci_ruc_emision'> CÉDULA/RUC</label>
          <div class="col-sm-9">            
            <input type="hidden" id='id_emisionPropietario'  name="id_emisionPropietario">  
            <input type="text" class="form-control" id='ci_ruc_emision'  autocomplete="OFF" name="ci_ruc_emision" data-toggle="tooltip" data-original-title="Nombre del Producto" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ0-9 ]{1,}" minlength="1" style="text-transform: uppercase">  
          </div>
        </div>   
        <div class="form-group col-md-7">
          <label class="col-sm-4 control-label" for='nombres_emision'> NOMBRES COMPLETOS</label>
          <div class="col-sm-7">            
            <input type="text" class="form-control" id='nombres_emision'  autocomplete="OFF" name="nombres_emision" data-toggle="tooltip" data-original-title="Nombre del Producto" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ0-9 ]{1,}" minlength="1" style="text-transform: uppercase">  
          </div>
        </div>  
        <div class="form-group col-md-4 ocultar">
          <label class="col-sm-3 control-label" for=''> DIRECCIÓN</label>
          <div class="col-sm-9">            
            <input type="text" class="form-control" id='' readonly name="" data-toggle="tooltip" data-original-title="Nombre del Producto" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ0-9 ]{1,}" minlength="1" style="text-transform: uppercase">  
          </div>
        </div>   
        <div class="form-group col-md-3 ocultar">
          <label class="col-sm-4 control-label" for=''> TELÉFONO</label>
          <div class="col-sm-8">            
            <input type="text" class="form-control" id='' readonly name="" data-toggle="tooltip" data-original-title="Nombre del Producto" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ0-9 ]{1,}" minlength="1" style="text-transform: uppercase">  
          </div>
        </div>   
        <div class="form-group col-md-4 ocultar">
          <label class="col-sm-4 control-label" for=''> EMAIL</label>
          <div class="col-sm-8">            
            <input type="text" class="form-control" id='' readonly name="" data-toggle="tooltip" data-original-title="Nombre del Producto" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ0-9 ]{1,}" minlength="1" style="text-transform: uppercase">  
          </div>
        </div>
        <div class="form-group col-md-11">          
          <div class="col-sm-2">                        
            <label class="control-label" for='nombre_productoEmision'> FORMA PAGO</label>            
          </div>        
          <div class="col-sm-3">            
            <select id="select_emision" name="select_emision" class="form-control" >
                <option value="1">CONTADO</option>
                <option value="2">CRÉDITO</option>
            </select>
          </div>               
          <div class="col-sm-3">            
            <input type="text" id="adelanto_emision" class="form-control"  name="adelanto_emision" readonly="" placeholder="Adelanto"  data-toggle="tooltip" data-original-title="Adelanto"/>
          </div>
          <div class="col-sm-3">            
            <input type="text" id="adelanto_emision_total" class="form-control"  name="adelanto_emision_total" readonly="" placeholder="Total Factura" data-toggle="tooltip" data-original-title="Valor total" />
          </div>
        </div>
        <div class="form-group col-md-11">                    
          <div class="col-sm-5">                        
            <label class="control-label" for='nombre_productoEmision'> PRODUCTO</label>
          </div>        
          <div class="col-sm-2">                        
            <label class="control-label" for='cantidadEmision'> CANTIDAD</label>
          </div>                    
          <div class="col-sm-2">                        
            <label class="control-label" for='precio_ventaEmision'> PRECIO VENTA</label>
          </div>
          <div class="col-sm-2">                        
            <label class="control-label" for='precio_totalEmsiion'> TOTAL</label>
          </div>        
        </div>     
        <div class="form-group col-md-11">                         
          <div class="col-sm-5">           
            <input type="hidden" id="id_productoEmision" name="id_productoEmision">             
            <input type="text" class="form-control" id='nombre_productoEmision'  name="nombre_productoEmision" style="text-transform: uppercase">  
          </div>        
          <div class="col-sm-2">                        
            <input type="number" class="form-control" id='cantidadEmision'  name="cantidadEmision" style="text-transform: uppercase" min="0" value="0">  
          </div>                   
          <div class="col-sm-2">                        
            <input type="text" class="form-control" id='precio_ventaEmision'  name="precio_ventaEmision" style="text-transform: uppercase" value="0.00">  
          </div>
          <div class="col-sm-2">                        
            <input type="text" class="form-control" id='precio_totalEmsiion'  name="precio_totalEmsiion" style="text-transform: uppercase" readonly value="0.00">  
          </div>   
        </div> 
        <div class="form-group col-md-10">          
          <br />          
          <table id="lista_factura"></table>          
        </div>   
        <div class="form-group col-md-10">
          <label class="col-sm-10 control-label" for='' style="text-align:right !important;"> SUBTOTAL</label>          
          <div class="col-sm-2">         
            <input type="text" class="form-control" id='subtotal_emision'  name="subtotal_emision" style="text-transform: uppercase" readonly value="0.00">  
          </div>
        </div>   
        <div class="form-group col-md-10"> 
          <label class="col-sm-10 control-label" for='' style="text-align:right !important;"> IVA 0%</label>         
          <div class="col-sm-2">         
            <input type="text" class="form-control" id='iva_0Emision'  name="iva_0Emision" style="text-transform: uppercase" readonly value="0.00">  
          </div>
        </div>   
        <div class="form-group col-md-10"> 
          <label class="col-sm-10 control-label" for='' style="text-align:right !important;"> IVA 12%</label>         
          <div class="col-sm-2">         
            <input type="text" class="form-control" id='iva_12Emision'  name="iva_12Emision" style="text-transform: uppercase" readonly value="0.00">  
          </div>
        </div>   
        <div class="form-group col-md-10"> 
          <label class="col-sm-10 control-label" for='' style="text-align:right !important;"> TOTAL $</label>         
          <div class="col-sm-2">         
            <input type="text" class="form-control" id='total_emision'  name="total_emision" style="text-transform: uppercase" readonly value="0.00">  
          </div>
        </div>   

      </div>
    </div>
    <div class="panel-footer form-footer">
      <div>
        <button class="btn btn-primary" id="btn_guardarEmision" type="button">  
        <span class="glyphicon glyphicon-log-in"></span> Guardar</button>
      </div>
      <!--<div>
        <button class="btn btn-primary" id="btn_eliminarCliente" type="submit">  
        <span class="glyphicon glyphicon-log-in"></span> Eliminar</button>
      </div>-->
      <div>
        <button class="btn btn-primary" id="btn_limpiarEmision" type="button">  
        <span class="glyphicon glyphicon-edit"></span> Limpiar</button>
      </div>
      <div>
        <button class="btn btn-primary" id="btn_buscarEmision" type="button" data-toggle="modal" >  
        <span class="glyphicon glyphicon-log-in"></span> Buscar</button>
      </div>
       <div>
        <button class="btn btn-primary" id="btn_atras" type="button">  
        <span class="glyphicon glyphicon-fast-backward"></span> Atras</button>
      </div>
       <div>
        <button class="btn btn-primary" id="btn_adelante" type="button">  
        Adelante <span class="glyphicon glyphicon-fast-forward"></span></button>
      </div>
      <div>
        <button class="btn btn-primary" id="btn_imprimirEmision" type="button">  
        <span class="glyphicon glyphicon-print"></span> Imprimir</button>
      </div>
    </div>
  </div>    
</form>

