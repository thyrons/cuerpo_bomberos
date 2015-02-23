<form class="form-horizontal " action="" rol="form" id="form_reportes_generales" method="post">
  <div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-list"></span> <b> REPORTES GENERALES</b></div>
      <div class="panel-body form-styles">
        <div class="container">
          <div class="form-group col-md-8">
            <label class="col-sm-6 control-label" for='serivicios'>  LISTA DE PRODUCTOS</label>            
          </div>                      
          <div class="form-group col-md-3">
            <button class="btn btn-primary" id="btn_lista_productos" type="button" data-toggle="modal" >  
            <span class="glyphicon glyphicon-log-in"></span> Generar Reporte</button>
          </div>
          <div class="form-group col-md-8">
            <label class="col-sm-4 control-label" for='btn_permisos'> FACTURAS PROPIETARIOS</label>            
            <div class="col-sm-4">
              <input type="hidden" id="id_propietario_reporte" name="id_propietario_reporte" />
              <input type="text" class="form-control" id='ci_cliente_reporte' placeholder=" CI/RUC PROPIETARIO" name="ci_cliente_reporte" data-toggle="tooltip" data-original-title="Nombres del responsable legal/Propietario" style="text-transform: uppercase">  
            </div>                        
            <div class="col-sm-4">              
              <input type="text" class="form-control" id='nombre_cliente_reporte' placeholder=" NOMBRE PROPIETARIO" name="nombre_cliente_reporte" data-toggle="tooltip" data-original-title="Nombres del responsable legal/Propietario" style="text-transform: uppercase">  
            </div>                        
          </div>                      
          <div class="form-group col-md-3">
            <button class="btn btn-primary" id="btn_facturas_cliente" type="button" data-toggle="modal" >  
            <span class="glyphicon glyphicon-log-in"></span> Generar Reporte</button>
          </div>                                                               
        </div>
      </div>      
    </div>    
 </form>

