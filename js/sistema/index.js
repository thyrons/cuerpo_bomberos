$(document).on("ready",inicio);
function inicio(){
	var tab = window.location.hash.substring(1); //obtengo el url del navegador
	if(tab){
		$('.tab_index ul li').each(function(){
		    $(this).removeClass("active");
		    var href= $(this).children()[0].href
		    var tab1 = href.split('#').pop();
		    if( tab1 == tab){
		    	$(this).addClass("active");	
		    }
		});//recorro toda la clase removiendo la clace active y comparando con el hash para agregar la clase active
		$('.content_index div').each(function(){
			if(this.id == "tab_general"){
				$(this).addClass("active");
				$(this).parent().parent().children().next().children().removeClass("active");
				$(this).parent().parent().children().next().children(':first').addClass("active");
			}else{
				$(this).removeClass("active");
			}
		});
		$("#"+tab).addClass("active").find(':input:visible:first').focus();//hago focus al primer elemento de cada formulario
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
				$(this).parent().parent().each(function (){
					$(this).children().prev().children().each(function (){
						if(this.id == "tab_general"){
							$("#"+this.id).show("fast");	
						}else{
							$("#"+this.id).hide("fast");	
						}
					});
				});		
				$(this).parent().parent().children().next().children().removeClass("active");
				$(this).parent().parent().children().next().children(':first').addClass("active");

			}else{
				$(this).removeClass("active");
			}
		});
		$("#"+tab).addClass("active").find(':input:visible:first').focus();
	});
	$("input").on("keyup click",function (e){
		comprobarCamposRequired(e.currentTarget.form.id);
	});
	$("input").tooltip({
       placement : 'bottom'
	});
	/*validaciones de check como radio*/
	$("#check_val1 input").on("click",checkbox);
	$("#check_val2 input:checkbox").on("click",checkbox);
	$("#check_val3 input:checkbox").on("click",checkbox);
	/*--------------------------------*/
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
	/*Ingresos de empresas*/
	$("#btn_limpiarEmpresas").on("click",limpiar_form);
	$("#btn_guardarEmpresas").on("click",guardar_empresas);
	$("#ruc_propie").keyup(function (){
		autocompletar("ruc_propie","nombres_pro","id_propie","../servidor/empresas/buscar_empresas.php?tipo=0");
	});
	$("#nombres_pro").keyup(function (){
		autocompletar("nombres_pro","ruc_propie","id_propie","../servidor/empresas/buscar_empresas.php?tipo=1");
	});
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
				$("#"+tab_informe).show( "fold", 100 );
				$('#form_informe > div > div').children().children().children().children(':first').find(':input:first').focus();	
				$("#"+tab_informe).find(':input:visible:first').focus();
			}else{
				$("#"+tab_animar[i].id).hide("fast");
			}
		}
	 });
	var cont = 0;
	var cont_tab = 0;
	var cont_li = 0;
	var ids = new Array ();
	var ids_tab = new Array ();
	var ids_li = new Array ();
	$("#navegador > li").each(function (){
		ids_li[cont_li] = $(this).attr("id");
		cont_li++; 
	});
	$('#tab_informe > div > div').each(function(){
		var last = $(this);
		ids_tab[cont_tab] = $(this).attr("id");
		cont_tab++;
		$(last).find(':input:last').each(function (){
			ids[cont] = $(this).attr("id");
			cont++;
		});
		$(last).find(':input:last').keydown(function(e){
		 	if (e.which == 9){
		 		$("#navegador > li").each(function (){
		 			$(this).removeClass("active");
		 		});////
		 		var pos = 0;
		 		for(var i = 0; i < ids.length; i++){
		 			if(ids[i] == this.id){
		 				pos = i;
		 			}
		 		}
		 		$("#tab_informe").children().prev().children().removeClass("active").hide("fast");
		 		if(!ids_tab[pos+1]){
		 			$("#"+ids_tab[0]).addClass("active").show( "fold", 100 );	
		 			$("#"+ids_li[0]).addClass("active");
		 			var temp =$("#"+ids_tab[0]).find(':input:visible:first').attr("id");
		 			$("#"+temp).focus()

		 		}else{
		 			$("#"+ids_tab[pos+1]).addClass("active").show( "fold", 100 );
		 			$("#"+ids_li[pos+1]).addClass("active");

		 		}
		 	}
		})
	});
	/*------------*/
}
/* function para poder dar el comportamiento de un grupo de radiobutton a un grupo de checkbox */
function checkbox(){
	var ck = $(this).parent().parent().find(':input');
	ck.each(function (){
		$(this).removeAttr("checked");
	});
	var id = this.id;
	$("#"+id).prop('checked',true);
}
/*-----------*/
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
	    			$("#ruc_propietario").val("");	
	    			$("#ruc_propietario").focus();
	    			alertify.error('Este nro. de Ruc ya existe. Ingrese otro');	
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
/*Formularios para empresas*/
function guardar_empresas(){
	var resp=comprobarCamposRequired("form_empresas");
	if(resp==true){
		$("#form_empresas").on("submit",function (e){	
			var valores = $("#form_empresas").serialize();
			var texto=($("#btn_guardarEmpresas").text()).trim();	
			if(texto=="Guardar"){		
				datos_empresas(valores,"g",e);
			}else{
				datos_empresas(valores,"m",e);
			}
			e.preventDefault();
    		$(this).unbind("submit")
		});
	}
}
function datos_empresas(valores,tipo,p){
	$.ajax({				
		type: "POST",
		data: valores+"&tipo="+tipo,
		url: "../servidor/empresas/empresas.php",			
	    success: function(data) {	
	    	if( data == 0 ){
	    		alertify.primary('Datos Agregados Correctamente');	
				limpiar_form(p);	
	    	}else{
	    		if( data == 2 ){
	    			alertify.error('Error al enviar los datos. Ingrese nuevamente');	
	    			limpiar_form(p);
	   			}
	    	}
		}
	}); 
}
/*---------------------------------*/
/*function para limpiar el formulario activo y dar focus al primer elemento*/
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
/*------------*/
/*functio que nos comprueba los campos requeidos de cada form que tenga el atributo required y nos marca la clase como error usando bootstrap3*/
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
/*---------*/
/*function para crear el jqgrid de cada formulario necesario*/
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
/*funcion para autocompleta con el campo a mostar el id oculto y la direccion donde se encuentra*/
function autocompletar(campo,campoNombre,campoId,direccion){
	$("#"+campo).autocomplete({
        source: direccion,
        minLength:1,
        focus: function( event, ui ) {
	        $( "#"+campoId ).val( ui.item.value );
	        $( "#"+campo ).val( ui.item.label1 );  
	        $( "#"+campoNombre ).val( ui.item.label2 );  
	        return false;
        },
	    select: function( event, ui ) {
	        $( "#"+campoId ).val( ui.item.value );
	        $( "#"+campo ).val( ui.item.label1 );     
	        $( "#"+campoNombre ).val( ui.item.label2 );   
	        cargarTabla(ui.item.value);
	        return false;
        }     
        }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
        return $( "<li>" )
        .append( "<a>"+ item.label1 + "</a>" )
        .appendTo( ul );
    };
}
/*---------------*/
/*funcion para cargar la tabla de las empresas*/
function cargarTabla(idPropietario){
	$.ajax({        
        type: "POST",
        dataType: 'json',
        data:"id="+idPropietario,
        url: "../servidor/empresas/cargaEmpresa.php",        
        success: function(response) {     
            for (var i = 0; i < response.length; i=i+4) {
                $("#tablaEmpresas tbody").append( "<tr>" +
                "<td align=center style=display:none>" + response[i+0] + "</td>" +
                "<td align=center>" + response[i+1] + "</td>" +             
                "<td align=center>" + response[i+2] + "</td>" +      
                "<td align=center>" + response[i+3] + "</td>" +      
                "<td align=center>" + " <a class='elimina'><img src='../images/cancel.png' onclick='return fn_dar_eliminar(event)'/>"  + "</td>" + "</tr>" );
            }
        }                   
    }); 
}