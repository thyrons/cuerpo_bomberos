<form class="form-horizontal " action="" rol="form" id="form_empresas" method="post">
  <div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-share"></span> <b> EMPRESAS </b></div>
    <div class="panel-body form-styles">
      <div class="container">
        <div class="form-group col-md-5">
          <label class="col-sm-4 control-label" for='ruc_propie'> RUC PROPIETARIO</label>
          <div class="col-sm-8 has-error">
            <input type="hidden" class="form-control" id='id_propie' name="id_propie" >  
            <input type="hidden" class="form-control" id='id_empresaPropietario' name="id_empresaPropietario" >  
            <input type="text" class="form-control" id='ruc_propie' name="ruc_propie" data-toggle="tooltip" data-original-title="Digite el RUC del propietario" maxlength="13" required pattern="[0-9]{13}" autocomplete="off">   
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
          <label class="col-sm-4 control-label" for='ruc_empresa'> RUC EMPRESA</label>
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
          <div class="col-sm-8">
            <input type="text" class="form-control" id='representante_empresa' name="representante_empresa" data-toggle="tooltip" data-original-title="Representante legal de la empresa" pattern="[A-Za-záéíóúÁÉÍÓÚ0-9 ]{1,}" minlength="1" style="text-transform: uppercase">   
          </div>
        </div>
        <div class="form-group col-md-5">
          <label class="col-sm-4 control-label" for='telefono_empresa'> TELÉFONO</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id='telefono_empresa' name="telefono_empresa"  style="text-transform: uppercase">   
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
      <style type="text/css">
      .au{
        float: right; 
      }
      .au span:hover{
        color:red!important;
      }
      </style>  
      <div class="au">
    
        <span class="glyphicon glyphicon-hand-up btn" data-toggle="tooltip" data-placement="top" title="Tooltipe encuentras en esta vidaleft" >
          Info..Ayuda
        </span>
       
      </div>
  </div>
    </div>    
</form>

<style type="text/css">


.modalmask {
  position: fixed;
  font-family: Arial, sans-serif;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background: rgba(0,0,0,0.8);
  z-index: 99999;
  opacity:0;
  -webkit-transition: opacity 400ms ease-in;
  -moz-transition: opacity 400ms ease-in;
  transition: opacity 400ms ease-in;
  pointer-events: none;
}
.modalmask:target {
  opacity:1;
  pointer-events: auto;
}
.modalbox{
  width: 400px;
  position: relative;
  padding: 5px 20px 13px 20px;
  background: #fff;
  border-radius:3px;
  -webkit-transition: all 500ms ease-in;
  -moz-transition: all 500ms ease-in;
  transition: all 500ms ease-in;
  
}

.movedown {
  margin: 0 auto;
}
.rotate {
  margin: 10% auto;
  -webkit-transform: scale(-5,-5); 
  transform: scale(-5,-5);
}
.resize {
  margin: 10% auto;
  width:0;
  height:0;

}
.modalmask:target .movedown{    
  margin:10% auto;
}
.modalmask:target .rotate{    
  transform: rotate(360deg) scale(1,1);
    -webkit-transform: rotate(360deg) scale(1,1);
}

.modalmask:target .resize{
  width:400px;
  height:200px;
}



.close {
  background: #606061;
  color: #FFFFFF;
  line-height: 25px;
  position: absolute;
  right: 1px;
  text-align: center;
  top: 1px;
  width: 24px;
  text-decoration: none;
  font-weight: bold;
  border-radius:3px;
  font-size:16px;
}

.close:hover { 
  background: #FAAC58; 
  color:#222;
}

ul{
  width:500px;
  margin:20% auto;
  list-style:none;
}
ul li{

  float:left;
  margin-right:35px;

}
ul li a{
  font-family: Arial, sans-serif;
  font-size:16px;
  text-decoration:none;
  background:#222;
  padding:20px;
  color:#fff;
  font-weight:bold;
  border-radius:3px;
  -webkit-transition: all 200ms ease-in;
  -moz-transition: all 200ms ease-in;
  transition: all 200ms ease-in;
}
ul li a:hover{
  background:#FAAC58;
  color:#222;

}


</style>
<a href="#modal3">REDIMENSIONAR</a>
  
    <div id="modal3" class="modalmask">
    <div class="modalbox resize">
      <a href="#close" title="Close" class="close">X</a>
      


    </div>
  </div>
  
