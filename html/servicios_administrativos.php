<form class="form-horizontal " action="" rol="form" id="form_marcas" method="post">
   <div class="panel panel-default">
     <div class="panel-heading"><span class="glyphicon glyphicon-th"></span> <b> Servicios Administrativos</b></div>
       <div class="panel-body form-styles">
         <div class="container">
           <div class="form-group col-md-6">
             <label class="col-sm-3 control-label" for='servicio_administrativo'>Servicio</label>
             <div class="col-sm-9 has-error">
               <input type="hidden" class="form-control" id='id_servicioAdministrativo' name="id_servicioAdministrativo" >  
               <input type="text" class="form-control" id='servicio_administrativo' name="servicio_administrativo" data-toggle="tooltip" data-original-title="Tipos de Usuarios" required pattern="[A-Za-záéíóúÁÉÍÓÚ0-9]{1,}" >  
             </div>
           </div>
         </div>
       </div>
       <div class="panel-footer form-footer">
         <div>
           <button class="btn btn-primary" id="btn_guardarMarca" type="submit">  
           <span class="glyphicon glyphicon-log-in"></span> Guardar</button>
         </div>
         <!--<div>
           <button class="btn btn-primary" id="btn_eliminarCliente" type="submit">  
           <span class="glyphicon glyphicon-log-in"></span> Eliminar</button>
         </div>-->
         <div>
           <button class="btn btn-primary" id="btn_limpiarMarca" type="button">  
           <span class="glyphicon glyphicon-edit"></span> Limpiar</button>
         </div>
         <div>
           <button class="btn btn-primary" id="btn_buscarMarca" type="button" data-toggle="modal" >  
           <span class="glyphicon glyphicon-log-in"></span> Buscar</button>
         </div>
       </div>
     </div>
 </form>

 