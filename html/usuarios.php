<form class="form-horizontal " action="" rol="form" id="usuarios" method="post">
  <div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-user"></span> <b> INGRESO DE USUARIOS </b></div>
    <div class="panel-body form-styles">
      <div class="container">
        <div class="form-group col-md-5">
          <label class="col-sm-4 control-label" for='ci_usuario'> CI. USUARIO</label>
          <div class="col-sm-8 has-error">
            <input type="hidden" class="form-control" id='id_usuario' name="id_usuario" >  
            <input type="text" class="form-control" id='ci_usuario' name="ci_usuario" data-toggle="tooltip" data-original-title="Solo Números. CI del usuario" maxlength="13" required pattern="[0-9]{10,13}" >   
          </div>
        </div>
        <div class="form-group col-md-5">
          <label class="col-sm-4 control-label" for='nombre_usuario'> NOMBRES</label>
          <div class="col-sm-8 has-error">
            <input type="text" class="form-control" id='nombre_usuario' name="nombre_usuario" data-toggle="tooltip" data-original-title="Nombres completos del usuario" required pattern="[A-Za-záéíóúÁÉÍÓÚ0-9 ]{1,}" minlength="1" style="text-transform: uppercase">   
          </div>
        </div>
        <div class="form-group col-md-5">
          <label class="col-sm-4 control-label" for='telefono_usuario'> TÉLEFONO</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id='telefono_usuario' name="telefono_usuario">   
          </div>
        </div>
        <div class="form-group col-md-5">
          <label class="col-sm-4 control-label" for='celular_usuario'> CELULAR</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id='celular_usuario' name="celular_usuario" >   
          </div>
        </div>
        <div class="form-group col-md-5">
          <label class="col-sm-4 control-label" for='direccion_usuario'> DIRECCIÓN</label>
          <div class="col-sm-8 has-error">
            <input type="text" class="form-control" id='direccion_usuario' name="direccion_usuario" data-toggle="tooltip" data-original-title="Ingrese aquí la direccion" required pattern="[A-Za-záéíóúÁÉÍÓÚ0-9 ]{1,}" minlength="1" style="text-transform: uppercase">   
          </div>
        </div>
        <div class="form-group col-md-5">
          <label class="col-sm-4 control-label" for='mail_usuario'> EMAIL</label>
          <div class="col-sm-8">
            <input type="mail" class="form-control" id='mail_usuario' name="mail_usuario" >   
          </div>
        </div>
        <div class="form-group col-md-5">
          <label class="col-sm-4 control-label" for='id_tipo_usuario'> TIPO USUARIO</label>
          <div class="col-sm-8">
            <select class="form-control" id='id_tipo_usuario' name="id_tipo_usuario" >             
            </select> 
          </div>
        </div>
        <div class="form-group col-md-5">
          <label class="col-sm-4 control-label" for='nick_usuario'> NOMBRE USUARIO</label>
          <div class="col-sm-8 has-error">
            <input type="text" class="form-control" id='nick_usuario' name="nick_usuario" data-toggle="tooltip" data-original-title="Nick del usuario a crear" required pattern="[A-Za-záéíóúÁÉÍÓÚ0-9 ]{1,}" minlength="1" >   
          </div>
        </div>
        <div class="form-group col-md-5">
          <label class="col-sm-4 control-label" for='nombre_clave'> CLAVE</label>
          <div class="col-sm-8 has-error">
            <input type="password" class="form-control" id='nombre_clave' name="nombre_clave" data-toggle="tooltip" data-original-title="Clave del usuario Min. 4 carácteres" required pattern="[A-Za-záéíóúÁÉÍÓÚ0-9 ]{4,}" minlength="4" >   
          </div>
        </div>
        <div class="form-group col-md-5">
          <label class="col-sm-4 control-label" for='clave_admin'> CLAVE ADMIN</label>
          <div class="col-sm-8 has-error">
            <input type="password" class="form-control" id='clave_admin' name="clave_admin" data-toggle="tooltip" data-original-title="Ingrese aquí la clave del administrador para poder realizar las acciones necesarias" required pattern="[A-Za-záéíóúÁÉÍÓÚ0-9 ]{1,}" minlength="1" >   
          </div>
        </div>        
      </div>
    </div>
    <div class="panel-footer form-footer">
      <div>
        <button class="btn btn-primary" id="btn_guardarUsuarios" type="submit">  
        <span class="glyphicon glyphicon-log-in"></span> Guardar</button>
      </div>
      <!--<div>
        <button class="btn btn-primary" id="btn_eliminarCliente" type="submit">  
        <span class="glyphicon glyphicon-log-in"></span> Eliminar</button>
      </div>-->
      <div>
        <button class="btn btn-primary" id="btn_limpiarUsuarios" type="button">  
        <span class="glyphicon glyphicon-edit"></span> Limpiar</button>
      </div>
      <div>
        <button class="btn btn-primary" id="btn_buscarUsuarios" type="button" data-toggle="modal" >  
        <span class="glyphicon glyphicon-log-in"></span> Buscar</button>
      </div>
    </div>
  </div>
</form>

 
