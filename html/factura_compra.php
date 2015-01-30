<form class="form-horizontal " action="" rol="form" id="form_factura_compra" name="form_factura_compra" method="post">
  <div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-pushpin"></span> <b> Emisión de Permisos / Factura Venta </b></div>
    <div class="panel-body form-styles">
      <div class="container">
        <div class="form-group col-md-3">
          <label class="col-sm-3 control-label" for='fecha_factura_compra'> FECHA</label>
          <div class="col-sm-9">            
            <input type="text" class="form-control" id='fecha_factura_compra' readonly name="fecha_factura_compra" data-toggle="tooltip" data-original-title="Nombre del Producto" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ0-9 ]{1,}" minlength="1" style="text-transform: uppercase">  
            <input type="hidden" id="id_factura_compra" name="id_factura_compra">            
          </div>
        </div>            
        <div class="form-group col-md-3">
          <label class="col-sm-3 control-label" for='hora_factura_compra'> HORA</label>
          <div class="col-sm-9">            
            <input type="text" class="form-control" id='hora_factura_compra' readonly name="hora_factura_compra" data-toggle="tooltip" data-original-title="Nombre del Producto" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ0-9 ]{1,}" minlength="1" style="text-transform: uppercase">  
          </div>
        </div>            
        <div class="form-group col-md-5">
          <label class="col-sm-3 control-label" for='nombre_usuario_compra'> DIGITADOR</label>
          <div class="col-sm-8">            
            <input type="text" class="form-control" id='nombre_usuario_compra' readonly name="nombre_usuario_compra" data-toggle="tooltip" data-original-title="Nombre del Producto" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ0-9 ]{1,}" minlength="1" style="text-transform: uppercase" value="<?php echo $_SESSION['usuario'];?>">  
          </div>
        </div>   
        <div class="form-group col-md-7">
          <label class="col-sm-4 control-label" for='nro_factura_preimpresa_compra'> NRO. FACTURA PREIMPRESA</label>
          <div class="col-sm-2">            
            <input type="text" class="form-control" id='nro_1_compra' name="nro_1_compra" data-toggle="tooltip" required pattern="[0-9 ]{3}" minlength="3" value="001" maxlength="3" style="text-transform: uppercase">  
          </div>
          <div class="col-sm-2">            
            <input type="text" class="form-control" id='nro_2_compra' name="nro_2_compra" data-toggle="tooltip" required pattern="[0-9 ]{3}" minlength="3"  value="001" maxlength="3" style="text-transform: uppercase">  
          </div>
          <div class="col-sm-3">            
            <input type="text" class="form-control" id='nro_factura_preimpresa_compra' name="nro_factura_preimpresa_compra" data-toggle="tooltip" data-original-title="Nro de factura preimpresa" required pattern="[0-9]{9}" minlength="1" maxlength="9" style="text-transform: uppercase">  
          </div>
        </div>  
        <div class="form-group col-md-4">
          <label class="col-sm-5 control-label" for='fecha_cancelacion_compra'> F. CANCELACIÓN</label>
          <div class="col-sm-5">            
            <input type="text" class="form-control" id='fecha_cancelacion_compra' readonly name="fecha_cancelacion_compra" data-toggle="tooltip" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ0-9 ]{1,}" minlength="1" style="text-transform: uppercase">  
          </div>
        </div>             
        <div class="form-group col-md-4">
          <label class="col-sm-3 control-label" for=' ci_ruc_compra'> CÉDULA/RUC</label>
          <div class="col-sm-9">                        
            <input type="text" class="form-control" id='ci_ruc_compra'  autocomplete="OFF" name="ci_ruc_compra" data-toggle="tooltip" data-original-title="Ruc del proveedor" pattern="[0-9 ]{1,}" minlength="1" style="text-transform: uppercase">  
          </div>
        </div>   
        <div class="form-group col-md-7">
          <label class="col-sm-4 control-label" for='nombre_compra'> NOMBRES COMPLETOS</label>
          <div class="col-sm-7">            
            <input type="text" class="form-control" id='nombre_compra'  autocomplete="OFF" name="nombre_compra" data-toggle="tooltip" data-original-title="Nombre del Producto" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ0-9 ]{1,}" minlength="1" style="text-transform: uppercase">  
          </div>
        </div>          
        <div class="form-group col-md-4 ">
          <label class="col-sm-3 control-label" for='empresa_compra'> EMPRESA</label>
          <div class="col-sm-9">            
            <input type="text" class="form-control" id='empresa_compra'  name="empresa_compra" data-toggle="tooltip" data-original-title="Nombre del Producto" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ0-9 ]{1,}" minlength="1" style="text-transform: uppercase">  
          </div>
        </div>
        <div class="form-group col-md-7">          
          <div class="col-sm-4">                        
            <label class="control-label" for='forma_pago_compra'> FORMA PAGO</label>            
          </div>        
          <div class="col-sm-7">            
            <select id="select_emision" name="forma_pago_compra" class="form-control" >
                <option value="1">CONTADO</option>
                <option value="2">CRÉDITO</option>
            </select>
          </div>                                   
        </div>
        <div class="form-group col-md-11">                    
          <div class="col-sm-5">                        
            <label class="control-label" for='nombre_productoCompra'> PRODUCTO</label>
          </div>        
          <div class="col-sm-2">                        
            <label class="control-label" for='cantidadCompra'> CANTIDAD</label>
          </div>                    
          <div class="col-sm-2">                        
            <label class="control-label" for='precio_ventaCompra'> PRECIO VENTA</label>
          </div>
          <div class="col-sm-2">                        
            <label class="control-label" for='precio_totalCompra'> TOTAL</label>
          </div>        
        </div>     
        <div class="form-group col-md-11">                         
          <div class="col-sm-5">    
            <input type="hidden" id="id_productoCompra" name="id_productoCompra">                               
            <input type="hidden" id="tipoIva" name="tipoIva">                               
            <input type="text" class="form-control" id='nombre_productoCompra'  name="nombre_productoCompra" style="text-transform: uppercase">  
          </div>        
          <div class="col-sm-2">                        
            <input type="number" class="form-control" id='cantidadCompra'  name="cantidadCompra" style="text-transform: uppercase" min="0" value="0">  
          </div>                   
          <div class="col-sm-2">                        
            <input type="text" class="form-control" id='precio_ventaCompra'  name="precio_ventaCompra" style="text-transform: uppercase" value="0.00">  
          </div>
          <div class="col-sm-2">                        
            <input type="text" class="form-control" id='precio_totalCompra'  name="precio_totalCompra" style="text-transform: uppercase" readonly value="0.00">  
          </div>   
        </div> 
        <div class="form-group col-md-10">          
          <br />          
          <table id="lista_factura_compra"></table>          
        </div>   
        <div class="form-group col-md-10">
          <label class="col-sm-10 control-label" for='' style="text-align:right !important;"> BASE 12%</label>          
          <div class="col-sm-2">         
            <input type="text" class="form-control" id='subtotal_compra'  name="subtotal_compra" style="text-transform: uppercase" readonly value="0.00">  
          </div>
        </div>   
        <div class="form-group col-md-10"> 
          <label class="col-sm-10 control-label" for='' style="text-align:right !important;"> BASE 0%</label>         
          <div class="col-sm-2">         
            <input type="text" class="form-control" id='iva_0compra'  name="iva_0compra" style="text-transform: uppercase" readonly value="0.00">  
          </div>
        </div>   
        <div class="form-group col-md-10"> 
          <label class="col-sm-10 control-label" for='' style="text-align:right !important;"> IVA 12%</label>         
          <div class="col-sm-2">         
            <input type="text" class="form-control" id='iva_12compra'  name="iva_12compra" style="text-transform: uppercase" readonly value="0.00">  
          </div>
        </div>   
        <div class="form-group col-md-10"> 
          <label class="col-sm-10 control-label" for='' style="text-align:right !important;"> TOTAL $</label>         
          <div class="col-sm-2">         
            <input type="text" class="form-control" id='total_compra'  name="total_compra" style="text-transform: uppercase" readonly value="0.00">  
          </div>
        </div>   

      </div>
    </div>
    <div class="panel-footer form-footer">
      <div>
        <button class="btn btn-primary" id="btn_guardarCompra" type="button">  
        <span class="glyphicon glyphicon-log-in"></span> Guardar</button>
      </div>
      <!--<div>
        <button class="btn btn-primary" id="btn_eliminarCliente" type="submit">  
        <span class="glyphicon glyphicon-log-in"></span> Eliminar</button>
      </div>-->
      <div>
        <button class="btn btn-primary" id="btn_limpiarCompra" type="button">  
        <span class="glyphicon glyphicon-edit"></span> Limpiar</button>
      </div>
      <div>
        <button class="btn btn-primary" id="btn_buscarCompra" type="button" data-toggle="modal" >  
        <span class="glyphicon glyphicon-log-in"></span> Buscar</button>
      </div>
       <div>
        <button class="btn btn-primary" id="btn_atrasFC" type="button">  
        <span class="glyphicon glyphicon-fast-backward"></span> Atras</button>
      </div>
       <div>
        <button class="btn btn-primary" id="btn_adelanteFC" type="button">  
        Adelante <span class="glyphicon glyphicon-fast-forward"></span></button>
      </div>
      <div>
        <button class="btn btn-primary" id="btn_imprimirCompra" type="button">  
        <span class="glyphicon glyphicon-print"></span> Imprimir</button>
      </div>
    </div>
  </div>    
</form>

