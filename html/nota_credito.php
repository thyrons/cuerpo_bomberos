<form class="form-horizontal " action="" rol="form" id="form_notasCredito" name="form_notasCredito" method="post">
  <div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-pushpin"></span> <b> Notas de Crédito </b></div>
    <div class="panel-body form-styles">
      <div class="container">
        <div class="form-group col-md-3">
          <label class="col-sm-3 control-label" for='fecha_factura_n_credito'> FECHA</label>
          <div class="col-sm-9">            
            <input type="text" class="form-control" id='fecha_factura_n_credito' readonly name="fecha_factura_n_credito" data-toggle="tooltip" data-original-title="Fecha actual" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ0-9 ]{1,}" minlength="1" style="text-transform: uppercase">              
            <input type="hidden" id="id_facturaCredtio" name="id_facturaCredtio" >
          </div>
        </div>            
        <div class="form-group col-md-3">
          <label class="col-sm-3 control-label" for='hora_factura_n_credito'> HORA</label>
          <div class="col-sm-9">            
            <input type="text" class="form-control" id='hora_factura_n_credito' readonly name="hora_factura_n_credito" data-toggle="tooltip" data-original-title="Hora actual" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ0-9 ]{1,}" minlength="1" style="text-transform: uppercase">  
          </div>
        </div>            
        <div class="form-group col-md-5">
          <label class="col-sm-3 control-label" for='nombre_usuario_n_credito'> DIGITADOR</label>
          <div class="col-sm-9">            
            <input type="text" class="form-control" id='nombre_usuario_n_credito' readonly name="nombre_usuario_n_credito" data-toggle="tooltip" data-original-title="Usuario activo" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ0-9 ]{1,}" minlength="1" style="text-transform: uppercase">  
          </div>
        </div>   
        <div class="form-group col-md-5">
          <label class="col-sm-3 control-label" for='ci_n_credito'> CI / RUC</label>
          <div class="col-sm-9">            
            <input type="text" class="form-control" id='ci_n_credito'  name="ci_n_credito" data-toggle="tooltip" data-original-title="CI / RUC del cliente" style="text-transform: uppercase" value="">  
            <input type="hidden" id="txt_id_cliente_nC" name="txt_id_cliente_nC">
          </div>
        </div>   
        <div class="form-group col-md-6">
          <label class="col-sm-3 control-label" for='cliente_n_credito'> CLIENTE</label>
          <div class="col-sm-8">            
            <input type="text" class="form-control" id='cliente_n_credito'  name="cliente_n_credito" data-toggle="tooltip" data-original-title="Nombre del cliente" style="text-transform: uppercase" value="">  
          </div>
        </div>
        <div class="form-group col-md-11">                    
          <div class="col-sm-5">                        
            <label class="control-label" for='nombre_productoCredito'> PRODUCTO</label>
          </div>        
          <div class="col-sm-2">                        
            <label class="control-label" for='cantidadCredito'> CANTIDAD</label>
          </div>                    
          <div class="col-sm-2">                        
            <label class="control-label" for='precio_ventaCredito'> PRECIO VENTA</label>
          </div>
          <div class="col-sm-2">                        
            <label class="control-label" for='precio_totalCredito'> TOTAL</label>
          </div>        
        </div>     
        <div class="form-group col-md-11">                         
          <div class="col-sm-5">           
            <input type="hidden" id="id_productoCredito" name="id_productoCredito">             
            <input type="text" class="form-control" id='nombre_productoCredito'  name="nombre_productoCredito" style="text-transform: uppercase">  
          </div>        
          <div class="col-sm-2">                        
            <input type="number" class="form-control" id='cantidadCredito'  name="cantidadCredito" style="text-transform: uppercase" min="0" value="0">  
          </div>                   
          <div class="col-sm-2">                        
            <input type="text" class="form-control" id='precio_ventaCredito'  name="precio_ventaCredito" style="text-transform: uppercase" readonly  value="0.00">  
          </div>
          <div class="col-sm-2">                        
            <input type="text" class="form-control" id='precio_totalCredito'  name="precio_totalCredito" style="text-transform: uppercase" readonly value="0.00">  
          </div>   
        </div>   
        <div class="form-group col-md-10">          
          
          <table id="lista_nxc"></table>          
        </div>
        <div class="form-group col-md-10">
          <label class="col-sm-10 control-label" for='' style="text-align:right !important;"> SUBTOTAL</label>          
          <div class="col-sm-2">         
            <input type="text" class="form-control" id='subtotal_credito'  name="subtotal_credito" style="text-transform: uppercase" readonly value="0.00">  
          </div>
        </div>   
        <div class="form-group col-md-10"> 
          <label class="col-sm-10 control-label" for='' style="text-align:right !important;"> IVA 0%</label>         
          <div class="col-sm-2">         
            <input type="text" class="form-control" id='iva_0Credito'  name="iva_0Credito" style="text-transform: uppercase" readonly value="0.00">  
          </div>
        </div>   
        <div class="form-group col-md-10"> 
          <label class="col-sm-10 control-label" for='' style="text-align:right !important;"> IVA 12%</label>         
          <div class="col-sm-2">         
            <input type="text" class="form-control" id='iva_12Credito'  name="iva_12Credito" style="text-transform: uppercase" readonly value="0.00">  
          </div>
        </div>   
        <div class="form-group col-md-10"> 
          <label class="col-sm-10 control-label" for='' style="text-align:right !important;"> TOTAL $</label>         
          <div class="col-sm-2">         
            <input type="text" class="form-control" id='total_credito'  name="total_credito" style="text-transform: uppercase" readonly value="0.00">  
          </div>
        </div>                                    
      </div>
    </div>
    <div class="panel-footer form-footer">
      <div>
        <button class="btn btn-primary" id="btn_guardar_n_credito" type="submit">  
        <span class="glyphicon glyphicon-log-in"></span> Guardar</button>
      </div>
      <!--<div>
        <button class="btn btn-primary" id="btn_eliminarCliente" type="submit">  
        <span class="glyphicon glyphicon-log-in"></span> Eliminar</button>
      </div>-->
      <div>
        <button class="btn btn-primary" id="btn_limpiar_n_credito" type="button">  
        <span class="glyphicon glyphicon-edit"></span> Limpiar</button>
      </div>
      <div>
        <button class="btn btn-primary" id="btn_buscar_n_credito" type="button" data-toggle="modal" >  
        <span class="glyphicon glyphicon-log-in"></span> Buscar</button>
      </div>             
      <div>
        <button class="btn btn-primary" id="btn_imprimir_n_credito" type="button">  
        <span class="glyphicon glyphicon-print"></span> Imprimir</button>
      </div>
    </div>
  </div>    
</form>

