<form class="form-horizontal " action="" rol="form" id="form_empresas" method="post">
 	<div class="panel panel-default">
	    <div class="panel-heading"><span class="glyphicon glyphicon-filter"></span> <b> PERMISOS </b></div>
	    <div class="panel-body form-styles">
	       		<div class="row">
					<div class="col-sm-3">
						<div class="tree">
						    <ul>
						        <li>
						            <span><input type="checkbox" class="cdcheck"> <i class="glyphicon glyphicon-calendar"></i> Datos generales</span>
						            <ul>
						                <li>
							                <input type="checkbox" class="cdcheck"> <span>Ejemplo de probabilidad</span>						                    						                    
						                </li>
					                    <li>
				                        	<input type="checkbox" class="cdcheck"> <span>Ejemplo de probabilidad</span>
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
						            <span><input type="checkbox" class="cdcheck"> <i class="glyphicon glyphicon-calendar"></i> Datos generales</span>
						            <ul>
						                <li>
							                <input type="checkbox" class="cdcheck"> <span>Ejemplo de probabilidad</span>						                    						                    
						                </li>
					                    <li>
				                        	<input type="checkbox" class="cdcheck"> <span>Ejemplo de probabilidad</span>
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
						            <span><input type="checkbox" class="cdcheck"> <i class="glyphicon glyphicon-calendar"></i> Datos generales</span>
						            <ul>
						                <li>
							                <input type="checkbox" class="cdcheck"> <span>Ejemplo de probabilidad</span>						                    						                    
						                </li>
					                    <li>
				                        	<input type="checkbox" class="cdcheck"> <span>Ejemplo de probabilidad</span>
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
						            <span><input type="checkbox" class="cdcheck"> <i class="glyphicon glyphicon-calendar"></i> Datos generales</span>
						            <ul>
						                <li>
							                <input type="checkbox" class="cdcheck"> <span>Ejemplo de probabilidad</span>						                    						                    
						                </li>
					                    <li>
				                        	<input type="checkbox" class="cdcheck"> <span>Ejemplo de probabilidad</span>
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
	        	<button class="btn btn-primary" id="btn_guardarEmpresas" type="submit">  
	        	<span class="glyphicon glyphicon-log-in"></span> Guardar</button>
	      	</div>      
	      	<div>
	        	<button class="btn btn-primary" id="btn_limpiarEmpresas" type="button">  
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
