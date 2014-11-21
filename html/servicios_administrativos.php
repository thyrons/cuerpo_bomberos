<form class="form-horizontal " action="" rol="form" id="form_serviciosAdministrativos" method="post" enctype="multipart/form-data">
   <div class="panel panel-default">
     <div class="panel-heading"><span class="glyphicon glyphicon-paperclip"></span> <b> Servicios Administrativos </b></div>
       <div class="panel-body form-styles">
         <div class="container">
           <div class="form-group col-md-6">
             <label class="col-sm-3 control-label" for='nombre_servicio'> SERVICIOS</label>
             <div class="col-sm-9 has-error">
               <input type="hidden" class="form-control" id='id_servicio' name="id_servicio" >  
               <input type="text" class="form-control" id='nombre_servicio' name="nombre_servicio" data-toggle="tooltip" data-original-title="Solo Números. Min. 10 carácteres Max. 20 carácteres" required pattern="[A-Za-záéíóúÁÉÍÓÚ0-9 ]{1,}" minlength="1" style="text-transform: uppercase">  
             </div>
           </div>
         </div>
       </div>
       <div class="panel-footer form-footer">
         <div>
           <button class="btn btn-primary" id="btn_guardarServicios" type="submit">  
           <span class="glyphicon glyphicon-log-in"></span> Guardar</button>
         </div>
         <!--<div>
           <button class="btn btn-primary" id="btn_eliminarCliente" type="submit">  
           <span class="glyphicon glyphicon-log-in"></span> Eliminar</button>
         </div>-->
         <div>
           <button class="btn btn-primary" id="btn_limpiarServicios" type="button">  
           <span class="glyphicon glyphicon-edit"></span> Limpiar</button>
         </div>
         <div>
           <button class="btn btn-primary" id="btn_buscarServicios" type="button" data-toggle="modal" >  
           <span class="glyphicon glyphicon-log-in"></span> Buscar</button>
         </div>
       </div>
     </div>
 </form>

