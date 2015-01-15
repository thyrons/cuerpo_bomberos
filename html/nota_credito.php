<form class="form-horizontal " action="" rol="form" id="form_notasCredito" name="form_notasCredito" method="post">
  <div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-pushpin"></span> <b> Notas de Crédito </b></div>
    <div class="panel-body form-styles">
      <div class="container">
        <div class="form-group col-md-3">
          <label class="col-sm-3 control-label" for='fecha_factura_n_credito'> FECHA</label>
          <div class="col-sm-9">            
            <input type="text" class="form-control" id='fecha_factura_n_credito' readonly name="fecha_factura_n_credito" data-toggle="tooltip" data-original-title="Fecha actual" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ0-9 ]{1,}" minlength="1" style="text-transform: uppercase">              
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

