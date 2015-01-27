<form class="form-horizontal " action="" rol="form" id="form_productos" method="post">
   <div class="panel panel-default">
     <div class="panel-heading"><span class="glyphicon glyphicon-pushpin"></span> <b> Ingreso de Productos </b></div>
       <div class="panel-body form-styles">
         <div class="container">
            <div class="form-group col-md-5">
              <label class="col-sm-4 control-label" for='nombre_producto'> NOMBRE PRODUCTO:</label>
              <div class="col-sm-8 has-error">
                <input type="hidden" class="form-control" id='id_producto' name="id_producto" >  
                <input type="text" class="form-control" id='nombre_producto' name="nombre_producto" data-toggle="tooltip" data-original-title="Nombre del Producto" required pattern="[A-Za-záéíóúÁÉÍÓÚñÑ0-9 ]{1,}" minlength="1" style="text-transform: uppercase">  
              </div>
            </div>
            <div class="form-group col-md-5">
             <label class="col-sm-4 control-label" for='tipo_iva'> VALOR IVA:</label>
             <div class="col-sm-8">
              <div class="input-group">                
                <select class="form-control" id='tipo_iva' name="tipo_iva" style="text-transform: uppercase">
                  <option value="0">0</option>                  
                  <option value="12">12</option>                  
                </select>  
                <div class="input-group-addon">%</div>
               </div>
              </div>
            </div>
            <div class="form-group col-md-5">
             <label class="col-sm-4 control-label" for='precio_compraProducto'> PRECIO COMPRA:</label>
             <div class="col-sm-8 has-error">
               <input type="text" class="form-control" id='precio_compraProducto' name="precio_compraProducto" value="0.00" required data-toggle="tooltip" data-original-title="Precio de compra del producto"  pattern="[0-9.]{1,}" minlength="1" style="text-transform: uppercase">  
             </div>
            </div>
            <div class="form-group col-md-5">
             <label class="col-sm-4 control-label" for='precio_ventaProducto'> PRECIO VENTA:</label>
             <div class="col-sm-8 has-error">
               <input type="text" class="form-control" id='precio_ventaProducto' name="precio_ventaProducto" value="0.00" required data-toggle="tooltip" data-original-title="Precio de venta del producto"  pattern="[0-9.]{1,}" minlength="1" style="text-transform: uppercase">  
             </div>
            </div>
            <div class="form-group col-md-5">
             <label class="col-sm-4 control-label" for='stock_producto'> STOCK:</label>
             <div class="col-sm-8 has-error">
               <input type="number" class="form-control" id='stock_producto' name="stock_producto" required pattern="[0-9]{1,}" minlength="1" value="0" style="text-transform: uppercase">  
             </div>
            </div>
            <div class="form-group col-md-5">
             <label class="col-sm-4 control-label" for='stock_minimoProducto'> STOCK MÍNIMO:</label>
             <div class="col-sm-8 has-error">
               <input type="number" class="form-control" id='stock_minimoProducto' name="stock_minimoProducto" required pattern="[0-9]{1,}" minlength="1" value="0" style="text-transform: uppercase">  
             </div>
            </div>
            <div class="form-group col-md-5">
             <label class="col-sm-4 control-label" for='stock_maximoProducto'> STOCK MÁXIMO:</label>
             <div class="col-sm-8 has-error">
               <input type="number" class="form-control" id='stock_maximoProducto' name="stock_maximoProducto" required pattern="[0-9]{1,}" minlength="1" value="0" style="text-transform: uppercase">  
             </div>
            </div>
            <div class="form-group col-md-5">
             <label class="col-sm-4 control-label" for='caracteristicas_producto'> CARACTERÍSTICAS:</label>
             <div class="col-sm-8">
               <textarea class="form-control" id='caracteristicas_producto' name="caracteristicas_producto" style="text-transform: uppercase"></textarea>  
             </div>
            </div>
         </div>
       </div>
       <div class="panel-footer form-footer">
         <div>
           <button class="btn btn-primary" id="btn_guardarProductos" type="submit">  
           <span class="glyphicon glyphicon-log-in"></span> Guardar</button>
         </div>
         <!--<div>
           <button class="btn btn-primary" id="btn_eliminarCliente" type="submit">  
           <span class="glyphicon glyphicon-log-in"></span> Eliminar</button>
         </div>-->
         <div>
           <button class="btn btn-primary" id="btn_limpiarProductos" type="button">  
           <span class="glyphicon glyphicon-edit"></span> Limpiar</button>
         </div>
         <div>
           <button class="btn btn-primary" id="btn_buscarProductos" type="button" data-toggle="modal" >  
           <span class="glyphicon glyphicon-log-in"></span> Buscar</button>
         </div>
       </div>
     </div>
    
 </form>

