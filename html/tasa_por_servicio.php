<form class="form-horizontal " action="" rol="form" id="tasa_servicio" method="post">
  <div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-wrench"></span> <b> TASA POR SERVICIO ADMINISTRATIVO </b></div>
    <div class="panel-body form-styles">
      <div class="container">
        <div class="form-group col-md-5">
          <label class="col-sm-3 control-label" for='select_servicio'> SERVICIO</label>
          <div class="col-sm-9">
            <select class="form-control" id="select_servicio" name="select_servicio">
            </select>
          </div>
        </div>
        <div class="form-group col-md-5">
          <label class="col-sm-4 control-label" for='nombre_tasa'> TASA SERVICIO</label>
          <div class="col-sm-8 has-error">
            <input type="hidden" class="form-control" id='id_tasa_servicio' name="id_tasa_servicio" >  
            <input type="text" class="form-control" id='nombre_tasa' name="nombre_tasa" data-toggle="tooltip" data-original-title="Solo Números. Min. 10 carácteres Max. 20 carácteres" required pattern="[A-Za-záéíóúÁÉÍÓÚ0-9 ]{1,}" minlength="1" style="text-transform: uppercase">   
          </div>
        </div>
        
        <div class="form-group col-md-10">
          <div class="panel panel-default">
            <div class="panel-heading"><b>CAPITAL INVERTIDO</b></div>
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <td class="col-sm-8 negrilla">PEQUEÑO (DESDE 1 A 10.000 $USD o HASTA 50 T.)</td>  
                  <td class="col-sm-3">
                    <div class="input-group has-error">
                      <span class="input-group-addon">$</span>
                      <input type="number" class="form-control" id='little' name="little" data-toggle="tooltip" data-original-title="Solo Números. Min. 10 carácteres Max. 20 carácteres" required pattern="[0-9.]{1,}" minlength="1">   
                    </div>    
                  </td>  
                </tr>
                <tr>
                  <td class="col-sm-8 negrilla">MEDIANO (DESDE 10.001 A 50.000 $USD o HASTA 100 T.)</td>  
                  <td class="col-sm-3">
                    <div class="input-group has-error">
                      <span class="input-group-addon">$</span>
                      <input type="number" class="form-control" id='medium' name="medium" data-toggle="tooltip" data-original-title="Solo Números. Min. 10 carácteres Max. 20 carácteres" required pattern="[0-9.]{1,}" minlength="1">   
                    </div>  
                  </td>  
                </tr>
                <tr>
                  <td class="col-sm-8 negrilla">GRANDE (DESDE 50.001 A 100.000 $USD o HASTA 200 T.)</td>  
                  <td class="col-sm-3">
                    <div class="input-group has-error">
                      <span class="input-group-addon">$</span>
                      <input type="number" class="form-control" id='big' name="big" data-toggle="tooltip" data-original-title="Solo Números. Min. 10 carácteres Max. 20 carácteres" required pattern="[0-9.]{1,}" minlength="1">   
                    </div>  
                  </td>  
                </tr>
                <tr>
                  <td class="col-sm-8 negrilla">S. GRANDE (S. GRANDE (DESDE 100.001 $USD EN ADELANTE o X # TANQUES.)</td>  
                  <td class="col-sm-3" >
                    <div class="input-group has-error">
                      <span class="input-group-addon">$</span>
                      <input type="number" class="form-control" id='sbig' name="sbig" data-toggle="tooltip" data-original-title="Solo Números. Min. 10 carácteres Max. 20 carácteres" required pattern="[0-9.]{1,}" minlength="1">   
                    </div>  
                  </td>  
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="panel-footer form-footer">
      <div>
        <button class="btn btn-primary" id="btn_guardarTasaServicios" type="submit">  
        <span class="glyphicon glyphicon-log-in"></span> Guardar</button>
      </div>
      <!--<div>
        <button class="btn btn-primary" id="btn_eliminarCliente" type="submit">  
        <span class="glyphicon glyphicon-log-in"></span> Eliminar</button>
      </div>-->
      <div>
        <button class="btn btn-primary" id="btn_limpiarTasaServicios" type="button">  
        <span class="glyphicon glyphicon-edit"></span> Limpiar</button>
      </div>
      <div>
        <button class="btn btn-primary" id="btn_buscarTasaServicios" type="button" data-toggle="modal" >  
        <span class="glyphicon glyphicon-log-in"></span> Buscar</button>
      </div>
    </div>
  </div>
</form>

 
