<form class="form-horizontal " action="" rol="form" id="form_emisionCxc" name="form_emisionCxc" method="post">
  <div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-pushpin"></span> <b> Cuentas por cobrar </b></div>
    <div class="panel-body form-styles">
      <div class="container">
        <div class="form-group col-md-3">
          <label class="col-sm-3 control-label" for='fecha_factura_cxc'> FECHA</label>
          <div class="col-sm-9">            
            <input type="text" class="form-control" id='fecha_factura_cxc' readonly name="fecha_factura_cxc" data-toggle="tooltip" data-original-title="Fecha actual" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ0-9 ]{1,}" minlength="1" style="text-transform: uppercase">  
            <input type="hidden" id="id_emision" name="id_emision">            
            <input type="hidden" id="id_cxc" name="id_cxc">            
          </div>
        </div>            
        <div class="form-group col-md-3">
          <label class="col-sm-3 control-label" for='hora_factura_cxc'> HORA</label>
          <div class="col-sm-9">            
            <input type="text" class="form-control" id='hora_factura_cxc' readonly name="hora_factura_cxc" data-toggle="tooltip" data-original-title="Hora actual" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ0-9 ]{1,}" minlength="1" style="text-transform: uppercase">  
          </div>
        </div>            
        <div class="form-group col-md-5">
          <label class="col-sm-3 control-label" for='nombre_usuario_cxc'> DIGITADOR</label>
          <div class="col-sm-9">            
            <input type="text" class="form-control" id='nombre_usuario_cxc' readonly name="nombre_usuario_cxc" data-toggle="tooltip" data-original-title="Usuario activo" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ0-9 ]{1,}" minlength="1" style="text-transform: uppercase">  
          </div>
        </div>   
        <div class="form-group col-md-5">
          <label class="col-sm-3 control-label" for='ci_cxc'> CI / RUC</label>
          <div class="col-sm-9">            
            <input type="text" class="form-control" id='ci_cxc'  name="ci_cxc" data-toggle="tooltip" data-original-title="CI / RUC del cliente" style="text-transform: uppercase" value="">  
            <input type="hidden" id="txt_0" name="txt_0">
          </div>
        </div>   
        <div class="form-group col-md-6">
          <label class="col-sm-3 control-label" for='cliente_cxc'> CLIENTE</label>
          <div class="col-sm-8">            
            <input type="text" class="form-control" id='cliente_cxc'  name="cliente_cxc" data-toggle="tooltip" data-original-title="Nombre del cliente" style="text-transform: uppercase" value="">  
          </div>
        </div>   
        <div class="form-group col-md-5">
          <label class="col-sm-4 control-label" for='forma_pago'> FORMA DE PAGO</label>
          <div class="col-sm-8">            
            <select class="form-control" id='forma_pago'  name="forma_pago" data-toggle="tooltip" data-original-title="Indique la forma de pago" style="text-transform: uppercase" value="">
            <option value="Efectivo">Efectivo</option>
            <option value="Cheque">Cheque</option>
            <option value="Tarjeta">Tarjeta</option>
            </select>
          </div>
        </div>
        <div class="form-group col-md-5">
          <label class="col-sm-4 control-label" for='total_a_pagar'> TOTAL A PAGAR</label>
          <div class="col-sm-4">            
            <input type="text" class="form-control" id='total_a_pagar'  name="total_a_pagar" data-toggle="tooltip" data-original-title="Nombre del cliente" style="text-transform: uppercase" value="">  
          </div>
          <div class="col-sm-4">            
            <button class="btn btn-primary" id="btn_agregarCxc" type="button">  
            <span class="glyphicon glyphicon-list"></span> Agregar Pago</button>    
          </div>
        </div>   
        <div class="form-group col-md-10">          
          <br />          
          <table id="lista_cxc"></table>          
        </div>      
         <div class="form-group col-md-11">
          <label class="col-sm-9 control-label" for='total_saldo' style="text-align:right !important"> TOTAL SALDO</label>
          <div class="col-sm-2">            
            <input type="text" readonly class="form-control" id='total_saldo'  name="total_saldo" data-toggle="tooltip" data-original-title="Nombre del cliente" style="text-transform: uppercase" value="">  
          </div>
        </div>   
      </div>
    </div>
    <div class="panel-footer form-footer">
      <div>
        <button class="btn btn-primary" id="btn_guardarCxc" type="submit">  
        <span class="glyphicon glyphicon-log-in"></span> Guardar</button>
      </div>
      <!--<div>
        <button class="btn btn-primary" id="btn_eliminarCliente" type="submit">  
        <span class="glyphicon glyphicon-log-in"></span> Eliminar</button>
      </div>-->
      <div>
        <button class="btn btn-primary" id="btn_limpiarCxc" type="button">  
        <span class="glyphicon glyphicon-edit"></span> Limpiar</button>
      </div>
      <div>
        <button class="btn btn-primary" id="btn_buscarCxc" type="button" data-toggle="modal" >  
        <span class="glyphicon glyphicon-log-in"></span> Buscar</button>
      </div>             
      <div>
        <button class="btn btn-primary" id="btn_imprimirCxc" type="button">  
        <span class="glyphicon glyphicon-print"></span> Imprimir</button>
      </div>
    </div>
  </div>    
</form>

