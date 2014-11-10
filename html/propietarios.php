<form class="form-horizontal " action="" rol="form" id="form_propietarios" method="post">
   <div class="panel panel-default">
     <div class="panel-heading"><span class="glyphicon glyphicon-pushpin"></span> <b> Propietarios </b></div>
       <div class="panel-body form-styles">
         <div class="container">
            <div class="form-group col-md-5">
              <label class="col-sm-3 control-label" for='ruc_propietario'> RUC:</label>
              <div class="col-sm-9 has-error">
                <input type="hidden" class="form-control" id='id_propietario' name="id_propietario" >  
                <input type="text" class="form-control" id='ruc_propietario' name="ruc_propietario" data-toggle="tooltip" data-original-title="Solo Números. Máximo 13 carácteres" required pattern="[0-9 ]{13,13}" minlength="13" style="text-transform: uppercase">  
              </div>
            </div>
            <div class="form-group col-md-5">
             <label class="col-sm-3 control-label" for='nombre_propietario'> NOMBRES:</label>
             <div class="col-sm-9 has-error">
               <input type="text" class="form-control" id='nombre_propietario' name="nombre_propietario" data-toggle="tooltip" data-original-title="Nombres Completos del propietario" required pattern="[A-Za-záéíóúÁÉÍÓÚ0-9 ]{1,}" minlength="1" style="text-transform: uppercase">  
             </div>
            </div>
            <div class="form-group col-md-5">
             <label class="col-sm-3 control-label" for='direccion_propietario'> DIRECCIÓN:</label>
             <div class="col-sm-9 has-error">
               <input type="text" class="form-control" id='direccion_propietario' name="direccion_propietario" required data-toggle="tooltip" data-original-title="Dirección del local"  pattern="[A-Za-záéíóúÁÉÍÓÚ0-9 ]{1,}" minlength="1" style="text-transform: uppercase">  
             </div>
            </div>
            <div class="form-group col-md-5">
             <label class="col-sm-3 control-label" for='telefono_propietario'> TELÉFONO:</label>
             <div class="col-sm-9 has-error">
               <input type="text" class="form-control" id='telefono_propietario' name="telefono_propietario" required data-toggle="tooltip" data-original-title="Solo números"  pattern="[0-9 ]{1,}" minlength="1" style="text-transform: uppercase">  
             </div>
            </div>
            <div class="form-group col-md-5">
             <label class="col-sm-3 control-label" for='celular_propietario'> CELULAR:</label>
             <div class="col-sm-9">
               <input type="text" class="form-control" id='celular_propietario' name="celular_propietario"  style="text-transform: uppercase">  
             </div>
            </div>
         </div>
       </div>
       <div class="panel-footer form-footer">
         <div>
           <button class="btn btn-primary" id="btn_guardarPropietarios" type="submit">  
           <span class="glyphicon glyphicon-log-in"></span> Guardar</button>
         </div>
         <!--<div>
           <button class="btn btn-primary" id="btn_eliminarCliente" type="submit">  
           <span class="glyphicon glyphicon-log-in"></span> Eliminar</button>
         </div>-->
         <div>
           <button class="btn btn-primary" id="btn_limpiarPropietarios" type="button">  
           <span class="glyphicon glyphicon-edit"></span> Limpiar</button>
         </div>
         <div>
           <button class="btn btn-primary" id="btn_buscarPropietarios" type="button" data-toggle="modal" >  
           <span class="glyphicon glyphicon-log-in"></span> Buscar</button>
         </div>
       </div>
     </div>
    
 </form>

