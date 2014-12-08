<form class="form-horizontal " action="" rol="form" id="form_empresas" method="post">
  <div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-share"></span> <b> EMPRESAS </b></div>
    <div class="panel-body form-styles">
      <div class="container">
        <div class="form-group col-md-5">
          <label class="col-sm-4 control-label" for='ruc_propie'> RUC/CI PROPIETARIO</label>
          <div class="col-sm-8 has-error">
            <input type="hidden" class="form-control" id='id_propie' name="id_propie" >  
            <input type="hidden" class="form-control" id='id_empresaPropietario' name="id_empresaPropietario" >  
            <input type="text" class="form-control" id='ruc_propie' name="ruc_propie" data-toggle="tooltip" data-original-title="Digite el RUC/CI del propietario" maxlength="10" required pattern="[0-9]{10,13}" autocomplete="off">   
          </div>
        </div>
        <div class="form-group col-md-5">
          <label class="col-sm-4 control-label" for='nombres_pro'> NOMBRES</label>
          <div class="col-sm-8 has-error">
            <input type="text" class="form-control" id='nombres_pro' name="nombres_pro" data-toggle="tooltip" data-original-title="Nombres completos del propietario" required pattern="[A-Za-záéíóúÁÉÍÓÚ0-9 ]{1,}" minlength="1" style="text-transform: uppercase">   
          </div>
        </div>
        <div class="form-group col-md-5">
          <label class="col-sm-4 control-label" for='razon_socialEmpresa'> RAZON SOCIAL</label>
          <div class="col-sm-8 has-error">
            <input type="text" class="form-control" id='razon_socialEmpresa' name="razon_socialEmpresa" data-toggle="tooltip" data-original-title="Nombres de la empresa" required pattern="[A-Za-záéíóúÁÉÍÓÚ0-9 ]{1,}" minlength="1" style="text-transform: uppercase">   
          </div>
        </div>
        <div class="form-group col-md-5">
          <label class="col-sm-4 control-label" for='ruc_empresa'> RUC/CI EMPRESA</label>
          <div class="col-sm-8 has-error">
            <input type="text" class="form-control" id='ruc_empresa' name="ruc_empresa" data-toggle="tooltip" data-original-title="RUC de la empresa" required pattern="[0-9 ]{13}" minlength="13" maxlength="13" style="text-transform: uppercase">   
          </div>
        </div>
        <div class="form-group col-md-5">
          <label class="col-sm-4 control-label" for='actividad_empresa'> ACTIVIDAD</label>
          <div class="col-sm-8 has-error">
            <input type="text" class="form-control" id='actividad_empresa' name="actividad_empresa" required data-toggle="tooltip" data-original-title="Actividad de la empresa" pattern="[A-Za-záéíóúÁÉÍÓÚ0-9 ]{1,}" minlength="1" style="text-transform: uppercase">   
          </div>
        </div>
        <div class="form-group col-md-5">
          <label class="col-sm-4 control-label" for='direccion_empresa'> DIRECCIÓN</label>
          <div class="col-sm-8 has-error"> 
            <input type="text" class="form-control" id='direccion_empresa' name="direccion_empresa" required data-toggle="tooltip" data-original-title="Dirección del local" pattern="[A-Za-záéíóúÁÉÍÓÚ0-9 ]{1,}" minlength="1" style="text-transform: uppercase">   
          </div>
        </div>
        <div class="form-group col-md-5">
          <label class="col-sm-4 control-label" for='representante_empresa'> REPRESENTANTE LEGAL</label>
          <div class="col-sm-8 has-error">
            <input type="text" class="form-control" id='representante_empresa' name="representante_empresa" required data-toggle="tooltip" data-original-title="Representante legal de la empresa" pattern="[A-Za-záéíóúÁÉÍÓÚ0-9 ]{1,}" minlength="1" style="text-transform: uppercase">   
          </div>
        </div>
        <div class="form-group col-md-5">
          <label class="col-sm-4 control-label" for='telefono_empresa'> TELÉFONO</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id='telefono_empresa' name="telefono_empresa"  style="text-transform: uppercase">   
          </div>
        </div>
        <div class="form-group col-md-5">
          <label class="col-sm-4 control-label" for='parroquia_empresa'> PARROQUIA</label>
          <div class="col-sm-8 has-error">
            <input type="text" class="form-control" id='parroquia_empresa' name="parroquia_empresa"  required  data-toggle="tooltip" data-original-title="Parroquia donde se encuentre  el negocio" pattern="[A-Za-záéíóúÁÉÍÓÚ0-9 ]{1,}" minlength="1" style="text-transform: uppercase">   
          </div>
        </div>
        <div class="form-group col-md-5">
          <label class="col-sm-4 control-label" for='capital_giro'> CAPITAL EN GRIO</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id='capital_giro' name="capital_giro"  style="text-transform: uppercase" value="0.00">   
          </div>
        </div>
        <div class="form-group col-md-10">
          <div id="lista_empresas">
            <div class="list-group panel" id="grupo_empresas">
              
            </div>
          </div>
        </div>                
      </div>
    </div>
    <div class="panel-footer form-footer">
      <div>
        <button class="btn btn-primary" id="btn_guardarEmpresas" type="submit">  
        <span class="glyphicon glyphicon-log-in"></span> Guardar</button>
      </div>
      <!--<div>
        <button class="btn btn-primary" id="btn_eliminarCliente" type="submit">  
        <span class="glyphicon glyphicon-log-in"></span> Eliminar</button>
      </div>-->
      <div>
        <button class="btn btn-primary" id="btn_limpiarEmpresas" type="button">  
        <span class="glyphicon glyphicon-edit"></span> Limpiar</button>
      </div>   
  </div>
    </div>    
</form>

  
