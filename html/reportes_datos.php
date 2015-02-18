<form class="form-horizontal " action="" rol="form" id="form_reportes_generales" method="post">
  <div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-list"></span> <b> REPORTES GENERALES</b></div>
      <div class="panel-body form-styles">
        <div class="container">
          <div class="form-group col-md-8">
            <label class="col-sm-6 control-label" for='serivicios'> SERVICIOS ADMINISTRATIVOS</label>            
          </div>                      
          <div class="form-group col-md-3">
            <button class="btn btn-primary" id="bnt_reporte_sevicios" type="button" data-toggle="modal" >  
            <span class="glyphicon glyphicon-log-in"></span> Generar Reporte</button>
          </div>          
          <div class="form-group col-md-8">
            <label class="col-sm-6 control-label" for='bnt_reporte_tasa_sevicios'> TASA SERVICIOS ADMINISTRATIVOS</label>            
          </div>                      
          <div class="form-group col-md-3">
            <button class="btn btn-primary" id="bnt_reporte_tasa_sevicios" type="button" data-toggle="modal" >  
            <span class="glyphicon glyphicon-log-in"></span> Generar Reporte</button>
          </div>          
          <div class="form-group col-md-8">
            <label class="col-sm-6 control-label" for='bnt_reporte_propietarios'> LISTA DE PROPIETARIOS</label>            
          </div>                      
          <div class="form-group col-md-3">
            <button class="btn btn-primary" id="bnt_reporte_propietarios" type="button" data-toggle="modal" >  
            <span class="glyphicon glyphicon-log-in"></span> Generar Reporte</button>
          </div>          
          <div class="form-group col-md-8">
            <label class="col-sm-6 control-label" for='bnt_reporte_empresas'> LISTA DE EMPRESAS</label>            
          </div>                      
          <div class="form-group col-md-3">
            <button class="btn btn-primary" id="bnt_reporte_empresas" type="button" data-toggle="modal" >  
            <span class="glyphicon glyphicon-log-in"></span> Generar Reporte</button>
          </div>
          <div class="form-group col-md-8">
            <label class="col-sm-3 control-label" for='btn_permisos'> REPORTE PERMISOS</label>            
            <div class="col-sm-8">
              <input type="hidden" id="id_empresa_reporte" />
              <input type="text" class="form-control" id='nombre_empresa_reporte' placeholder="NOMBRE EMPRESA" name="nombre_empresa_reporte" data-toggle="tooltip" data-original-title="Nombres del responsable legal/Propietario" style="text-transform: uppercase">  
            </div>                        
          </div>                      
          <div class="form-group col-md-3">
            <button class="btn btn-primary" id="btn_reporte_permisos" type="button" data-toggle="modal" >  
            <span class="glyphicon glyphicon-log-in"></span> Generar Reporte</button>
          </div>            
        </div>
      </div>      
    </div>    
 </form>

