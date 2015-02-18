<form class="form-horizontal " action="" rol="form" id="form_permisos" method="post">
 	<div class="panel panel-default">
	    <div class="panel-heading"><span class="glyphicon glyphicon-filter"></span> <b> PERMISOS </b></div>
	    <div class="panel-body form-styles">
       		<div class="row" id="checks_permisos">
       			<div class="container">
       			<div class="form-group col-md-11">
		            <label class="col-sm-2 control-label" for='buscar_usuario'> BUSCAR USUARIO:</label>
		            <div class="col-sm-6">
		            	<input type="hidden" id="id_usuarioPermisos" >
		                <input type="text" class="form-control" id='buscar_usuario' name="buscar_usuario" value="" placeholder="Nombre o CI/RUC del Usuario a Modificar" required data-toggle="tooltip" data-original-title="Nombre o CI del usuario" autocomplete = 'off' >  
		            </div>
		            <button class="btn btn-primary" type="button" id="btn_buscarUsuario">  
           			<span class="glyphicon glyphicon-log-in"></span> Buscar Usuario</button>
		        </div>
		        </div>
				<div class="col-sm-3">
					<div class="tree">
					    <ul>
					        <li>
					            <span><input type="checkbox" class="cdcheck" id="check_generales"> <i class="glyphicon glyphicon-calendar"></i> Datos generales</span>
					            <ul>
					                <li>
						                <input type="checkbox"  id="check_inicio" class="cdcheck"> <span>Inicio</span>						                    						                    
					                </li>
				                    <li>
			                        	<input type="checkbox"  id="check_servicios" class="cdcheck"> <span>Servicios Administrativos</span>
			                        </li>						                						                
			                        <li>
			                        	<input type="checkbox"  id="check_tasa" class="cdcheck"> <span>Tasa por Servicio</span>
			                        </li>						                						                
			                        <li>
			                        	<input type="checkbox"  id="check_propietario" class="cdcheck"> <span>Propietario</span>
			                        </li>						                						                
			                        <li>
			                        	<input type="checkbox"  id="check_empresas" class="cdcheck"> <span>Empresas</span>
			                        </li>						                						                
			                        <li>
			                        	<input type="checkbox"  id="check_informe" class="cdcheck"> <span>Informe General</span>
			                        </li>						                						                
			                        <li>
			                        	<input type="checkbox" id="check_reportes" class="cdcheck"> <span>Reportes</span>
			                        </li>						                						                
					            </ul>
					        </li>						        
					    </ul>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="tree">
					    <ul>
					        <li>
					            <span><input type="checkbox" class="cdcheck" id="check_facturacion"> <i class="glyphicon glyphicon-calendar"></i> Facturación</span>
					            <ul>
					                <li>
						                <input type="checkbox" id="check_ingresosProductos" class="cdcheck"> <span>Ingreso Productos</span>						                    						                    
					                </li>
				                    <li>
			                        	<input type="checkbox" id="check_EmisionPermisos" class="cdcheck"> <span>Emisión de Permisos</span>
			                        </li>						                						                
			                        <li>
			                        	<input type="checkbox" id="check_NotasCredito" class="cdcheck"> <span>Notas de Crédito</span>
			                        </li>						                						                
			                        <li>
			                        	<input type="checkbox" id="check_Cxc" class="cdcheck"> <span>Cuentas por Cobrar</span>
			                        </li>						                						                
			                        <li>
			                        	<input type="checkbox" id="check_ReportesVentas" class="cdcheck"> <span>Reporte Ventas</span>
			                        </li>						                						                				                        
					            </ul>
					        </li>						        
					    </ul>
					</div>
				</div>	
				<div class="col-sm-3">
					<div class="tree">
					    <ul>
					        <li>
					            <span><input type="checkbox" class="cdcheck" id="check_compras"> <i class="glyphicon glyphicon-calendar"></i> Gastos/Compras</span>
					            <ul>
					                <li>
						                <input type="checkbox" class="cdcheck" id="check_comprasFactura"> <span>Compras</span>						                    						                    
					                </li>
				                    <li>
			                        	<input type="checkbox" class="cdcheck" id="check_reporteCompras"> <span>Reporte Compras</span>
			                        </li>						                						                
					            </ul>
					        </li>						        
					    </ul>
					</div>
				</div>	
				<div class="col-sm-3">
					<div class="tree">
					    <ul>
					        <li>
					            <span><input type="checkbox" class="cdcheck" id="check_administracion"> <i class="glyphicon glyphicon-calendar"></i> Administración</span>
					            <ul>
					                <li>
						                <input type="checkbox" class="cdcheck" id="check_ingresoUsuarios"> <span>Ingreso Usuarios</span>						                    						                    
					                </li>
				                    <li>
			                        	<input type="checkbox" class="cdcheck" id="check_respaldo"> <span>Respaldo Base datos</span>
			                        </li>						                						                
			                        <li>
			                        	<input type="checkbox" class="cdcheck" id="check_reportesGenerales"> <span>Reportes Generales</span>
			                        </li>						                						                
			                        <li>
			                        	<input type="checkbox" class="cdcheck" id="check_subirInfo"> <span>Subir Información</span>
			                        </li>						                						                
			                        <li>
			                        	<input type="checkbox" class="cdcheck" id="check_permisos"> <span>Permisos</span>
			                        </li>						                						                

					            </ul>
					        </li>						        
					    </ul>
					</div>
				</div>

			</div>	       			      	
	    </div>
	    <div class="panel-footer form-footer">
	     	<div>
	        	<button class="btn btn-primary" id="btn_guardarPermisos" type="button">  
	        	<span class="glyphicon glyphicon-log-in"></span> Guardar</button>
	      	</div>      
	      	<div>
	        	<button class="btn btn-primary" id="btn_limpiarPermisos" type="button">  
	        	<span class="glyphicon glyphicon-edit"></span> Limpiar</button>
	      	</div>   
	  	</div>
    </div>    
</form>

<style type="text/css">
.tree {
    /*border:1px solid #999;   */
}
.tree ul{
	border:0px;
	padding: 10px!important;
}
.tree li {
    /*list-style-type:none;*/
    /*margin:0;*/
}
.tree li::before, .tree li::after {
    left:-10px;
    position:absolute;
    right:auto;
}
.tree li::before {
    border-left:1px solid #999;
    height:100%;
    top:0;
    width:1px
}
.tree li::after {
    border-top:1px solid #999;
    height:10px;
    top:5px;
    width:25px
}
.tree li span {        
    border:1px solid #999;
    border-radius:3px;
    display:inline-block;
    padding:1px;
    text-decoration:none;
}
.tree li.parent_li>span {
    cursor:pointer
}
.tree>ul>li::before, .tree>ul>li::after {
    border:0
}
.tree li:last-child::before {
    height:30px
}
.tree li.parent_li>span:hover, .tree li.parent_li>span:hover+ul li span {
    background:#eee;
    border:1px solid #94a0b4;
    color:#000
}
</style>
