<form class="form-horizontal " action="" rol="form" id="form_emisionPermisos" method="post">
  <div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-pushpin"></span> <b> Emisión de Permisos / Factura Venta </b></div>
    <div class="panel-body form-styles">
      <div class="container">
        <div class="form-group col-md-3">
          <label class="col-sm-3 control-label" for='fecha_factura'> FECHA</label>
          <div class="col-sm-9">            
            <input type="text" class="form-control" id='fecha_factura' readonly name="fecha_factura" data-toggle="tooltip" data-original-title="Nombre del Producto" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ0-9 ]{1,}" minlength="1" style="text-transform: uppercase">  
          </div>
        </div>            
        <div class="form-group col-md-3">
          <label class="col-sm-3 control-label" for='hora_factura'> HORA</label>
          <div class="col-sm-9">            
            <input type="text" class="form-control" id='hora_factura' readonly name="hora_factura" data-toggle="tooltip" data-original-title="Nombre del Producto" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ0-9 ]{1,}" minlength="1" style="text-transform: uppercase">  
          </div>
        </div>            
        <div class="form-group col-md-5">
          <label class="col-sm-3 control-label" for='nombre_producto'> DIGITADOR</label>
          <div class="col-sm-9">            
            <input type="text" class="form-control" id='nombre_producto' readonly name="nombre_producto" data-toggle="tooltip" data-original-title="Nombre del Producto" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ0-9 ]{1,}" minlength="1" style="text-transform: uppercase">  
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
            <input type="text" class="form-control" id='ci_ruc_emision'  name="ci_ruc_emision" data-toggle="tooltip" data-original-title="Nombre del Producto" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ0-9 ]{1,}" minlength="1" style="text-transform: uppercase">  
          </div>
        </div>   
        <div class="form-group col-md-7">
          <label class="col-sm-4 control-label" for='nombres_emision'> NOMBRES COMPLETOS</label>
          <div class="col-sm-7">            
            <input type="text" class="form-control" id='nombres_emision'  name="nombres_emision" data-toggle="tooltip" data-original-title="Nombre del Producto" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ0-9 ]{1,}" minlength="1" style="text-transform: uppercase">  
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
      </div>
    </div>
    <div class="panel-footer form-footer">
      <div>
        <button class="btn btn-primary" id="btn_guardarEmision" type="submit">  
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
    </div>
  </div>    
</form>

