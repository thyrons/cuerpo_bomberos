$(document).on("ready",inicio);
function inicio(){
	var tab = window.location.hash.substring(1); 
	if(tab){
		$('.tab_index ul li').each(function(){
		    $(this).removeClass("active");
		    var href= $(this).children()[0].href
		    var tab1 = href.split('#').pop();
		    if( tab1 == tab){
		    	$(this).addClass("active");	
		    }
		});
		$('.content_index div').each(function(){
			if(this.id == "tab_general"){
				$(this).addClass("active");
				$(this).parent().parent().children().next().children().removeClass("active");
				$(this).parent().parent().children().next().children(':first').addClass("active");
			}else{
				$(this).removeClass("active");
			}
		});
		$("#"+tab).addClass("active").find(':input:visible:first').focus();
	}
	/*activar contenido de las listas*/
	$('.tab_index a').on('click', function(e){
	  	var href = $(this).attr('href');
		var tab = href.split('#').pop();
		$('.tab_index ul li').each(function(){
	    	$(this).removeClass("active");
		});
		$(this).parent().addClass("active");
		$('.content_index div').each(function(){
			if(this.id == "tab_general"){
				$(this).addClass("active");
				$(this).parent().parent().children().next().children().removeClass("active");
				$(this).parent().parent().children().next().children(':first').addClass("active");
			}else{
				$(this).removeClass("active");
			}
		});
		$("#"+tab).addClass("active").find(':input:visible:first').focus();
	});
	$("input").on("keyup click",function (e){
		comprobarCamposRequired(e.currentTarget.form.id)
	});
	$("input").tooltip({
       placement : 'bottom'
	});

	/*Servicios Administrativos*/
	$("#btn_guardarServicios").on("click",guardar_serviciosAdministrativos);
	$("#btn_limpiarServicios").on("click",limpiar_form);
	$("#btn_buscarServicios").on("click",modal);
	/*----------------------------*/
	/*Tasa por Servicio Administrativo*/
	$("#select_servicio").load("../servidor/serviciosAdministrativos/carga_servicio.php");
	$("#btn_limpiarTasaServicios").on("click",limpiar_form);
	$("#btn_buscarTasaServicios").on("click",modal);
	$("#btn_guardarTasaServicios").on("click",guardar_Tasaservicios);
	/*----------------------------*/
	/*Ingresos de usuarios*/
	$("#id_tipo_usuario").load("../servidor/usuarios/carga_usuarios.php");
	$("#btn_limpiarUsuarios").on("click",limpiar_form);
	$("#btn_buscarUsuarios").on("click",modal);
	$("#btn_guardarUsuarios").on("click",guardar_usuarios);
	/*--------------------------------*/
	/*Ingresos de propietarios*/
	$("#btn_limpiarPropietarios").on("click",limpiar_form);
	$("#btn_buscarPropietarios").on("click",modal);
	$("#btn_guardarPropietarios").on("click",guardar_propietarios);
	/*--------------------------------*/
	/*TABS DEL INFORME*/
	$('#form_informe > div > div').children().children().children().children(':first').find(':input:first').focus();	
	$('#navegador a').on('click',function(e){
		//obtengo el tab que se hizo click 
		var href_informe = $(this).attr('href');
		var tab_informe = href_informe.split('#').pop();		
		var tab_animar = $(this).parent().parent().parent().children().prev().children();
		for(var i=0; i < tab_animar.length; i++){
			if(tab_animar[i].id == tab_informe){
				$("#"+tab_informe).show(1000);
				$('#form_informe > div > div').children().children().children().children(':first').find(':input:first').focus();	
			}else{
				$("#"+tab_animar[i].id).hide();
			}
		}

	 });
	/*------------*/
}
/*Formularios Servicios Administrativos*/
function guardar_serviciosAdministrativos(){
	var resp=comprobarCamposRequired("form_serviciosAdministrativos");
	if(resp==true){
		$("#form_serviciosAdministrativos").on("submit",function (e){	
			var valores = $("#form_serviciosAdministrativos").serialize();
			var texto=($("#btn_guardarServicios").text()).trim();	
			if(texto=="Guardar"){		
				datos_serviciosAdministrativos(valores,"g",e);
			}else{
				datos_serviciosAdministrativos(valores,"m",e);
			}
			e.preventDefault();
    		$(this).unbind("submit")
		});
	}
}
function datos_serviciosAdministrativos(valores,tipo,p){
	$.ajax({				
		type: "POST",
		data: valores+"&tipo="+tipo,
		url: "../servidor/serviciosAdministrativos/serviciosAdministrativos.php",			
	    success: function(data) {	
	    	if( data == 0 ){
	    		alertify.primary('Datos Agregados Correctamente');	
				limpiar_form(p);	
				$("#select_servicio").load("../servidor/serviciosAdministrativos/carga_servicio.php");
	    	}else{
	    		if( data == 1 ){
	    			alertify.error('Este servicio ya existe. Ingrese otro');	
	    			limpiar_form(p);		
	    		}else{
	    			
	    		}
	    	}

		}
	}); 
}
/*---------------------------------*/
/*Formularios Tasa por Servicios Administrativos*/
function guardar_Tasaservicios(){
	var resp=comprobarCamposRequired("tasa_servicio");
	if(resp==true){
		$("#tasa_servicio").on("submit",function (e){	
			var valores = $("#tasa_servicio").serialize();
			var texto=($("#btn_guardarTasaServicios").text()).trim();	
			if(texto=="Guardar"){		
				datos_TasaServicios(valores,"g",e);
			}else{
				datos_TasaServicios(valores,"m",e);
			}
			e.preventDefault();
    		$(this).unbind("submit")
		});
	}
}
function datos_TasaServicios(valores,tipo,p){
	$.ajax({				
		type: "POST",
		data: valores+"&tipo="+tipo,
		url: "../servidor/tasasServicios/tasasServicios.php",			
	    success: function(data) {	
	    	if( data == 0 ){
	    		alertify.primary('Datos Agregados Correctamente');	
				limpiar_form(p);	
	    	}else{
	    		if( data == 1 ){
	    			alertify.error('Este servicio ya existe. Ingrese otro');	
	    			limpiar_form(p);		
	    		}else{
	    			
	    		}
	    	}

		}
	}); 
}
/*----------------------*/
/*Formularios para usuarios*/
function guardar_usuarios(){
	var resp=comprobarCamposRequired("usuarios");
	if(resp==true){
		$("#usuarios").on("submit",function (e){	
			var valores = $("#usuarios").serialize();
			var texto=($("#btn_guardarUsuarios").text()).trim();	
			if(texto=="Guardar"){		
				datos_usuarios(valores,"g",e);
			}else{
				datos_usuarios(valores,"m",e);
			}
			e.preventDefault();
    		$(this).unbind("submit")
		});
	}
}
function datos_usuarios(valores,tipo,p){
	$.ajax({				
		type: "POST",
		data: valores+"&tipo="+tipo,
		url: "../servidor/usuarios/usuarios.php",			
	    success: function(data) {	
	    	if( data == 0 ){
	    		alertify.primary('Datos Agregados Correctamente');	
				limpiar_form(p);	
	    	}else{
	    		if( data == 1 ){
	    			alertify.error('Este nombre de usuario ya existe. Ingrese otro');	
	    			$("#nick_usuario").val("");	
	    			$("#nick_usuario").focus();
	    		}else{
	    			if( data == 2 ){
	    				alertify.error('Error al enviar los datos. Ingrese nuevamente');	
	    				limpiar_form(p);
	    			}else{
	    				if( data == 3 ){
	    					alertify.error('Este nro de cédula  ya existe. Ingrese otro');	
	    					$("#ci_usuario").val("");	
	    					$("#ci_usuario").focus();
	    				}else{
	    					alertify.error('La clave de admin es incorrecta. Ingrese  nuevamente');	
	    					$("#clave_admin").val("");	
	    					$("#clave_admin").focus();
	    				}
	    			}	
	    		}
	    	}

		}
	}); 
}
/*--------------------------*/
/*Formularios para propietarios*/
function guardar_propietarios(){
	var resp=comprobarCamposRequired("form_propietarios");
	if(resp==true){
		$("#form_propietarios").on("submit",function (e){	
			var valores = $("#form_propietarios").serialize();
			var texto=($("#btn_guardarPropietarios").text()).trim();	
			if(texto=="Guardar"){		
				datos_propietarios(valores,"g",e);
			}else{
				datos_propietarios(valores,"m",e);
			}
			e.preventDefault();
    		$(this).unbind("submit")
		});
	}
}
function datos_propietarios(valores,tipo,p){
	$.ajax({				
		type: "POST",
		data: valores+"&tipo="+tipo,
		url: "../servidor/propietarios/propietarios.php",			
	    success: function(data) {	
	    	if( data == 0 ){
	    		alertify.primary('Datos Agregados Correctamente');	
				limpiar_form(p);	
	    	}else{
	    		if( data == 1 ){
	    			alertify.error('Este nro. de Ruc ya existe. Ingrese otro');	
	    			$("#ruc_propietario").val("");	
	    			$("#ruc_propietario").focus();
	    		}else{
	    			if( data == 2 ){
	    				alertify.error('Error al enviar los datos. Ingrese nuevamente');	
	    				limpiar_form(p);
	    			}
	    		}
	    	}

		}
	}); 
}
/*---------------------------------*/

function limpiar_form(e){
	var form;
	if(e.type == "click"){
		$("#"+e.currentTarget.form.id+" input").val("");
		comprobarCamposRequired(e.currentTarget.form.id);		
		form = e.currentTarget.form.id;
	}else{
		$("#"+e.target.id+" input").val("");
		comprobarCamposRequired(e.target.id);		
		form = e.target.id
	}
	if(form == "form_serviciosAdministrativos"){
		$("#btn_guardarServicios").text("");
    	$("#btn_guardarServicios").append("<span class='glyphicon glyphicon-log-in'></span> Guardar");     
	}else{
		if(form == "tasa_servicio"){
			$("#btn_guardarTasaServicios").text("");
	    	$("#btn_guardarTasaServicios").append("<span class='glyphicon glyphicon-log-in'></span> Guardar");     
		}else{
			if(form == "usuarios"){
				$("#btn_guardarUsuarios").text("");
		    	$("#btn_guardarUsuarios").append("<span class='glyphicon glyphicon-log-in'></span> Guardar");     
			}else{
				if(form == "form_propietarios"){
					$("#btn_guardarPropietarios").text("");
					$("#btn_guardarPropietarios").append("<span class='glyphicon glyphicon-log-in'></span> Guardar");     
				}else{

				}
			}	
		}	
	}	
	$("input:text:visible:first").focus();
}
function comprobarCamposRequired(form){
   	var correcto=true;
   	var campos_text=$('#'+form+' input:required');
   	$(campos_text).each(function() {
	   	var pattern = new RegExp("^" + $(this)[0].pattern + "$");
      	if($(this).val() != '' && pattern.test($(this).val())){
	        $(this).parent().removeClass('has-error');
    	  	$(this).parent().addClass('has-success');
	      }else{
    	  	correcto=false;
        	$(this).parent().addClass('has-error');
      	}
   	});
   	return correcto;
}
function modal(e){
	$("#busquedasModificar").html("");
	$("#busquedasModificar").append("<table id='tabla_busquedas'></table><div id='pager'></div>");
	$("#pager").html("");
	$('#modalBusquedas').modal('show');
	var form;
	if(e.type == "click"){
		form = e.currentTarget.form.id;
	}else{
		form = e.target.id
	}
	//////////////
	if(form == "form_serviciosAdministrativos"){
		buscar_servicios("400");	
	}else{
		if(form == "tasa_servicio"){
			buscar_tasaServicios("600");	
		}else{
			if(form == "usuarios"){
				buscar_usuarios("600");	
			}else{
				if(form == "form_propietarios"){
					buscar_propietarios("600");	
				}	
			}	
		}	
	}
	$("#tabla_busquedas").trigger('reloadGrid');
}