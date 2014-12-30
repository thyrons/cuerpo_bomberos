$(document).on("ready",inicio);
/*para cargar la imange*/
$(function(){
    Test = {
        UpdatePreview: function(obj){
            // if IE < 10 doesn't support FileReader
            if(!window.FileReader){
            // don't know how to proceed to assign src to image tag
            } else {
                var reader = new FileReader();
                var target = null;
             
                reader.onload = function(e) {
                    target =  e.target || e.srcElement;
                    $("#foto").prop("src", target.result);
                };
                reader.readAsDataURL(obj.files[0]);
            }
        }
    };
});
/*------------*/
function inicio(){
	/*----para la imagen----*/
	function getDoc(frame) {
    	var doc = null;     
     	
     	try {
        	if (frame.contentWindow) {
            	doc = frame.contentWindow.document;
         	}
     	} catch(err) {
    	}
	    if (doc) { 
	         return doc;
	    }
	    try { 
	         doc = frame.contentDocument ? frame.contentDocument : frame.document;
	    } catch(err) {
	       
	         doc = frame.document;
	    }
	    return doc;
 	}
 	/*------------*/
	var tab = window.location.hash.substring(1); //obtengo el url del navegador
	if(tab){				
		$('.tab_index ul li').each(function(){
		    $(this).removeClass("active");
		    var href= $(this).children()[0].href
		    var tab1 = href.split('#').pop();		    
		    if( tab1 == tab){		    	
		    	if(tab == 'tab_a' || tab == 'tab_b' || tab == 'tab_c' || tab == 'tab_d' || tab == 'tab_e' || tab == 'tab_f' || tab == 'tab_i'){
		    		var acor1 =$("#accordion").children();
					var act1 = acor1.children().next()[0];					
					var ac1 = $(act1).attr('id');					
					$("#"+ac1).addClass("collapse in");		    		
		    	}
		    	else{
		    		if(tab == 'tab_j' || tab == 'tab_k' || tab == 'tab_l' || tab == 'tab_m'){
		    			
			    		var acor2 =$("#accordion").children();
						var acor2 = acor2.next();
						var act2 = acor2.children().next()[0];						
						var ac2 = $(act2).attr('id');
						$("#"+ac2).addClass("collapse in");												
		    		}else{
		    			if(tab == 'tab_n' || tab == 'tab_o' || tab == 'tab_p'){
		    				var acor1 =$("#accordion").children();
							var act1 = acor1.children().next()[2];					
							var ac1 = $(act1).attr('id');									
							$("#"+ac1).addClass("collapse in");							
		    			}else{
		    				if(tab == 'tab_q' || tab == 'tab_r' ){
		    					var acor1 =$("#accordion").children();
								var act1 = acor1.children().next()[3];					
								var ac1 = $(act1).attr('id');									
								$("#"+ac1).addClass("collapse in");					
		    				}else{
		    					var acor1 =$("#accordion").children();
								var act1 = acor1.children().next()[0];					
								var ac1 = $(act1).attr('id');					
								$("#"+ac1).addClass("collapse in");		    		
		    				}
		    			}	
		    		}		    		
		    	}
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
		limpiar_form($("#"+tab).addClass("active").children().attr("id"));
	});
	$("input").on("keyup click",function (e){
		comprobarCamposRequired(e.currentTarget.form.id);
	});
	$("input").tooltip({
       placement : 'rigth'
	});
	/*--------------*/
	/*funcion solu numeros*/
	$(".soloNumeros").keydown(function(event){
	    if((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode == 9) || (event.keyCode == 116) || (event.keyCode == 8) || (event.keyCode >= 96 && event.keyCode <= 105) || (event.keyCode == 110) || (event.keyCode == 190)) {
	        return true;
	    }else{
	    	return false;
	    }
	});
	/*-------------*/
	/*validaciones de check como radio*/
	$("#tipo_inspeccion input:checkbox").on("click",checkbox);
	$("#extintores input:checkbox").on("click",checkbox);
	
	$("input[name='check_incendio_1']").on("click",checkboxTabla);
	$("input[name='check_incendio_2']").on("click",checkboxTabla);
	$("input[name='check_incendio_3']").on("click",checkboxTabla);
	$("input[name='check_incendio_4']").on("click",checkboxTabla);
	$("input[name='check_incendio_5']").on("click",checkboxTabla);
	$("input[name='check_incendio_6']").on("click",checkboxTabla);
	$("input[name='check_incendio_7']").on("click",checkboxTabla);
	$("input[name='check_incendio_8']").on("click",checkboxTabla);
	$("input[name='check_incendio_9']").on("click",checkboxTabla);
	$("input[name='check_incendio_10']").on("click",checkboxTabla);
	$("input[name='check_incendio_11']").on("click",checkboxTabla);
	$("input[name='check_incendio_12']").on("click",checkboxTabla);
	$("input[name='check_incendio_13']").on("click",checkboxTabla);
	$("input[name='check_incendio_14']").on("click",checkboxTabla);
	$("input[name='check_incendio_15']").on("click",checkboxTabla);
	$("input[name='check_incendio_16']").on("click",checkboxTabla);
	$("input[name='check_incendio_17']").on("click",checkboxTabla);
	$("input[name='check_incendio_18']").on("click",checkboxTabla);
	$("input[name='check_incendio_19']").on("click",checkboxTabla);
	$("input[name='check_incendio_20']").on("click",checkboxTabla);
	$("input[name='check_riesgo1']").on("click",checkboxTabla);
	$("input[name='check_riesgo2']").on("click",checkboxTabla);
	$("input[name='check_riesgo3']").on("click",checkboxTabla);
	$("input[name='check_riesgo4']").on("click",checkboxTabla);
	$("input[name='check_riesgo5']").on("click",checkboxTabla);
	$("input[name='check_riesgo6']").on("click",checkboxTabla);
	$("input[name='check_alma1']").on("click",checkboxTabla);
	$("input[name='check_alma2']").on("click",checkboxTabla);
	$("input[name='check_alma3']").on("click",checkboxTabla);
	$("input[name='check_alma4']").on("click",checkboxTabla);
	$("input[name='check_alma5']").on("click",checkboxTabla);
	$("input[name='check_alma6']").on("click",checkboxTabla);
	$("input[name='check_alma7']").on("click",checkboxTabla);
	$("input[name='check_alma8']").on("click",checkboxTabla);
	$("input[name='check_anexo']").on("click",checkboxTabla);
	$("input[name='check_permiso']").on("click",checkboxTabla);
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
	
	$("#ci_usuario").keyup(function (){
		ci_ruc("ci_usuario");
	})
	/*--------------------------------*/
	/*Ingresos de propietarios*/
	$("#btn_limpiarPropietarios").on("click",limpiar_form);
	$("#btn_buscarPropietarios").on("click",modal);
	$("#btn_guardarPropietarios").on("click",guardar_propietarios);
	$("#ruc_propietario").keyup(function (){
		ci_ruc("ruc_propietario");
	});
	/*--------------------------------*/
	/*Ingresos de empresas*/
	$("#btn_limpiarEmpresas").on("click",limpiar_form);
	$("#btn_guardarEmpresas").on("click",guardar_empresas);
	$("#btn_imprimirInforme").click(function (){
		window.open('../reportes/informe_general.php?id='+$("#id_informe_empresa").val(),'_blank');      		
	});
	$("#ruc_propie").keyup(function (){
		autocompletar("ruc_propie","nombres_pro","id_propie","../servidor/empresas/buscar_empresas.php?tipo=0","ruc_empresa","representante_empresa","form_empresas");

	});
	$("#nombres_pro").keyup(function (){
		autocompletar("nombres_pro","ruc_propie","id_propie","../servidor/empresas/buscar_empresas.php?tipo=1","representante_empresa","ruc_empresa","form_empresas");
	});
	$("#nombres_pro").keyup(function (e){
		if($("#nombres_pro").val().length == 0){
			comprobarCamposRequired("form_empresas");		
			$("#grupo_empresas").html(" ");						
			$("#form_empresas input").val("");
		}	
	});
	$("#ruc_propie").keyup(function (e){
		if($("#ruc_propie").val().length == 0){
			comprobarCamposRequired("form_empresas");		
			$("#grupo_empresas").html(" ");						
			$("#form_empresas input").val("");
		}	
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
	$('#fecha_general').datepicker({
        dateFormat: 'yy-mm-dd'
    }).datepicker('setDate', 'today');
	$("#ruc_informe").keyup(function (){
		autocompletarEmpresa("ruc_informe","nombres_propietario","id_empresa","actividad","direccion","razon_social","telefono","ubicacion","../servidor/informe/cargaEmpresa.php?tipo=0","tab_general");
	});
	$("#nombres_propietario").keyup(function (){
		autocompletarEmpresa("nombres_propietario","ruc_informe","id_empresa","actividad","direccion","razon_social","telefono","ubicacion","../servidor/informe/cargaEmpresa.php?tipo=1","tab_general");
	});
	$("#actividad").keyup(function (){
		autocompletarEmpresa("actividad","ruc_informe","nombres_propietario","id_empresa","direccion","razon_social","telefono","ubicacion","../servidor/informe/cargaEmpresa.php?tipo=2","tab_general");
	});
	$("#razon_social").keyup(function (){
		autocompletarEmpresa("razon_social","ruc_informe","nombres_propietario","id_empresa","actividad","direccion","telefono","ubicacion","../servidor/informe/cargaEmpresa.php?tipo=3","tab_general");
	});
	
	$("#ruc_informe").keyup(function (){
		if($("#ruc_informe").val().length == 0){	
			location.reload();		
		}
	});
	$("#nombres_propietario").keyup(function (){
		if($("#nombres_propietario").val().length == 0){	
			location.reload();		
		}
	});
	$("#actividad").keyup(function (){
		if($("#actividad").val().length == 0){	
			location.reload();		
		}
	});
	$("#razon_social").keyup(function (){
		if($("#razon_social").val().length == 0){	
			location.reload();		
		}
	});

	$("#input_tasa").keyup(function (){
		if($("#input_tasa").val().length == 0){			
			$("#id_inputTasa").val("");
			$("#input_tasa").val("");
			$("#select_valor").find('option').remove();
		}else{
			autocompletarTasa("id_inputTasa","input_tasa","../servidor/informe/carga_tasa.php?tipo=0");
		}			
	});
	$("#id_inputTasa").keyup(function (){	
		if($("#id_inputTasa").val().length == 0){			
			$("#id_inputTasa").val("");
			$("#input_tasa").val("");
			$("#select_valor").find('option').remove();
		}else{
			autocompletarTasa("input_tasa","id_inputTasa","../servidor/informe/carga_tasa.php?tipo=1");
		}
	});
	
	$("#btn_limpiarInforme").on("click",limpiar_form);
	$("#btn_buscarInforme").on("click",modal);
	$("#btn_guardarInforme").on("click",guardar_Informe);
	/*Ingresos de Productos*/
	$("#btn_guardarProductos").on("click",guardar_productos);
	$("#btn_limpiarProductos").on("click",limpiar_form);
	$("#btn_buscarProductos").on("click",modal);
	/**/
	/*Facturas ventas / emision de permisos*/
	$('#fecha_factura').datepicker({
        dateFormat: 'yy-mm-dd'
    }).datepicker('setDate', 'today');
    $('#fecha_cancelacion').datepicker({
        dateFormat: 'yy-mm-dd'
    }).datepicker('setDate', 'today');
    mostrar("hora_factura");
	$("#ci_ruc_emision").keyup(function (){	
		autocompletarPropietario("ci_ruc_emision","nombres_emision","id_emisionPropietario","../servidor/emision_permisos/buscar_propietario.php?tipo=0");
	});
	$("#nombres_emision").keyup(function (){	
		autocompletarPropietario("nombres_emision","ci_ruc_emision","id_emisionPropietario","../servidor/emision_permisos/buscar_propietario.php?tipo=1");	
	});
	$("#ci_ruc_emision").keyup(function() {
		if($("#ci_ruc_emision").val().length == 0  ){			
			$("#ci_ruc_emision").val("");
			$("#nombres_emision").val("");	
			$("#id_emisionPropietario").val("");
		}
	});
	$("#nombres_emision").keyup(function() {
		if($("#nombres_emision").val().length == 0  ){			
			$("#ci_ruc_emision").val("");
			$("#nombres_emision").val("");	
			$("#id_emisionPropietario").val("");
		}
	});	
	$("#nro_factura_preimpresa").blur(function (){		
		zeros($("#nro_factura_preimpresa").val().length,"nro_factura_preimpresa");
		$.ajax({				
			type: "POST",				  
			data: "id="+$("#nro_factura_preimpresa").val(),		
			url: "../servidor/emision_permisos/verifica_nro.php",			
		    success: function(data) {			 
				if(data != ''){
					alert("Error este nro. de factura ya existe. Se cargara el nro de factura disponible");
					$("#nro_factura_preimpresa").val("");				
					$("#nro_factura_preimpresa").val(data);				
		    		zeros(data.length,"nro_factura_preimpresa");
		    		$("#nro_factura_preimpresa").focus();	
		    		$("#fecha_cancelacion").datepicker("hide")	   			    		
				}
			}
		})
	});
	/*tabla factura*/	
	jQuery("#lista_factura").jqGrid({
        datatype: "local",
        colNames: ['', 'ID', 'tipo', 'Cantidad', 'Detalle', 'PVP', 'Total'],
        colModel: [
            {name: 'myac', width: 40, fixed: true, sortable: false, resize: false, formatter: 'actions',
                formatoptions: {keys: false, delbutton: true, editbutton: false}
            },
            {name: 'id_producto', index: 'id_producto', editable: false, search: false, hidden: false, editrules: {edithidden: false}, align: 'left',
                frozen: true, width: 100},
            {name: 'tipo', index: 'tipo', editable: false, search: false, hidden: false, editrules: {edithidden: false}, align: 'left',
                frozen: true, width: 200},
            {name: 'cantidad', index: 'cantidad', editable: true, frozen: true, editrules: {required: true}, align: 'center', width: 100},
            {name: 'detalle', index: 'detalle', editable: false, frozen: true, editrules: {required: true}, align: 'left', width:400},            
            {name: 'precio_u', index: 'precio_u', editable: true, search: false, frozen: true, editrules: {required: true}, align: 'center', width: 120, editoptions:{maxlength: 10, size:15}},             
            {name: 'total', index: 'total', editable: false, search: false, frozen: true, editrules: {required: true}, align: 'center', width: 120},            
        ],
        rowNum: 30, 
        width: null,              
        height: 150,
        rownumbers: true,
        sortable: true,
        rowList: [10, 20, 30],
        pager: jQuery('#pager'),
        sortname: 'id_producto',
        sortorder: 'asc',
        viewrecords: true,
        cellEdit: true,
        cellsubmit: 'clientArray',
        shrinkToFit: false,
        delOptions: {
            modal: true,
            jqModal: true,
            onclickSubmit: function(rp_ge, rowid) {
                var id = jQuery("#lista_factura").jqGrid('getGridParam', 'selrow');
                var filas = jQuery("#lista_factura").jqGrid("getRowData");
                jQuery('#lista_factura').jqGrid('restoreRow', id);
                var ret = jQuery("#lista_factura").jqGrid('getRowData', id);
                var rids = $('#lista_factura').jqGrid('getDataIDs');            
                rp_ge.processing = true;
                var id_producto = ret.id_producto;
                var tipo = ret.tipo;
                var pos1 = 0;
                var pos2 = 0;                
                if(tipo == "producto"){
					jQuery("#lista_factura").jqGrid('delRowData', rowid);                                
                }else{
                	for (var i = 0; i < filas.length; i++) {
	                    var id = filas[i];                                        
	                    if (id['tipo'] == "informe") {
	                        pos1 = rids[i];                        	                        
	                    }else{
	                        if (id['tipo'] == "tasa") {
	                            pos2 = rids[i];                            	                            
	                        }
	                    }
                	}  
                	jQuery("#lista_factura").jqGrid('delRowData', pos1);                                
                	jQuery("#lista_factura").jqGrid('delRowData', pos2);                     	
                }                     
                total_factura();                           
                $(".ui-icon-closethick").trigger('click');                
                return true;
            },
            processing: true,            
        },
        afterSaveCell : function(rowid,name,val,iRow,iCol) {           	
        	//console.log(jQuery('#lista_factura').jqGrid('getRowData'));                    
            var id = jQuery("#lista_factura").jqGrid('getGridParam', 'selrow');                                                
            var ret = jQuery("#lista_factura").jqGrid('getRowData', id);                        
            if(name == 'cantidad') {
              	var precio = jQuery("#lista_factura").jqGrid('getCell',rowid,iCol+2);              	
               	var operacion = (parseFloat(val)* parseFloat(precio)).toFixed(2); 
               	jQuery("#lista_factura").jqGrid('setRowData',rowid,{total: operacion });                                              
            }else{
            	if(name == 'precio_u') {
	              	var cantidad = jQuery("#lista_factura").jqGrid('getCell',rowid,iCol-2);              		              		               	
	               	var operacion = (parseFloat(cantidad)* parseFloat(val)).toFixed(2); 
	               	jQuery("#lista_factura").jqGrid('setRowData',rowid,{total: operacion });                                              
	            }
            }   
            total_factura();                     
        }
  	});
	jQuery("#lista_factura").jqGrid('hideCol', "tipo");    
	jQuery("#lista_factura").jqGrid('hideCol', "id_producto");    
	/*buscador productos*/
	$("#nombre_productoEmision").keyup(function (){	
		autocompletarProducto("id_productoEmision","nombre_productoEmision","cantidadEmision","precio_ventaEmision","../servidor/emision_permisos/buscar_productos.php");	
	});
	$("#cantidadEmision").on("change keyup",function (e){
		if(!$.isNumeric($(this).val())){
			$(this).val("");			
		}else{
			var t = $("#cantidadEmision").val() * $("#precio_ventaEmision").val()
			t = (parseFloat(t)).toFixed(2);
			$("#precio_totalEmsiion").val(t)
		}
	});
	$("#precio_ventaEmision").on("keyup",function (e){
		if(!$.isNumeric($(this).val())){
			$(this).val("");			
		}else{
			var t = $("#cantidadEmision").val() * $("#precio_ventaEmision").val()
			t = (parseFloat(t)).toFixed(2);
			$("#precio_totalEmsiion").val(t)
		}
	});
	$("#precio_totalEmsiion").keyup(function(e){
		var key = window.Event ? e.which : e.keyCode
		if(key == 9){
			if($("#nombre_productoEmision").val() == ""){
				alert("Ingrese un producto antes de continuar");
				$("#nombre_productoEmision").focus();
			}else{
				if($("#cantidadEmision").val() == ""){
					alert("Ingrese una cantidad antes de continuar");
					$("#cantidadEmision").focus();
				}else{
					if($("#precio_ventaEmision").val() == ""){
						alert("Ingrese precio antes de continuar");
						$("#precio_ventaEmision").focus();
					}else{						
						var filas = jQuery("#lista_factura").jqGrid("getRowData");									            			            
			            var rids = $('#lista_factura').jqGrid('getDataIDs');                        			            
			            if (filas.length === 0) {                			            	
			                var datarow = {
			                    id_producto: "idp"+$("#id_productoEmision").val(),//referente al id producto
			                    tipo: "producto", 
			                    detalle: $("#nombre_productoEmision").val(), 
			                    cantidad: $("#cantidadEmision").val(), 
			                    precio_u: $("#precio_ventaEmision").val(),                     
			                    total: (parseFloat($("#cantidadEmision").val() * $("#precio_ventaEmision").val())).toFixed(2),                     
			                };
			                su = jQuery("#lista_factura").jqGrid('addRowData', $("#id_productoEmision").val()+"idp", datarow);			                
			            }else{
			            	var repe = 0;
			                var pos1 = 0;			                                                			                
			                for (var i = 0; i < filas.length; i++) {			                	
			                    var id = filas[i];                  			                    
			                    if (id.id_producto == "idp"+$("#id_productoEmision").val()) {
			                        pos1 = rids[i];                        
			                        repe = 1;
			                    }			                
			                }       			                
			                if(repe == 0){
			                	//console.log(jQuery('#lista_factura').jqGrid('getRowData'));
			                   var datarow = {
				                    id_producto: "idp"+$("#id_productoEmision").val(),//referente al id producto
				                    tipo: "producto", 
				                    detalle: $("#nombre_productoEmision").val(), 
				                    cantidad: $("#cantidadEmision").val(), 
				                    precio_u: $("#precio_ventaEmision").val(),                     
				                    total: (parseFloat($("#cantidadEmision").val() * $("#precio_ventaEmision").val())).toFixed(2),                     
				                };				                
				                jQuery("#lista_factura").jqGrid('addRowData', $("#id_productoEmision").val()+"idp", datarow);			                				                
			                }else{                   
			                   var datarow = {
			                    id_producto: "idp"+$("#id_productoEmision").val(),//referente al id producto
				                    tipo: "producto", 
				                    detalle: $("#nombre_productoEmision").val(), 
				                    cantidad: $("#cantidadEmision").val(), 
				                    precio_u: $("#precio_ventaEmision").val(),                     
				                    total: (parseFloat($("#cantidadEmision").val() * $("#precio_ventaEmision").val())).toFixed(2),                     
				                };				                
			                    jQuery("#lista_factura").jqGrid('setRowData', pos1, datarow);								
			                }
			            }
			            $("#id_productoEmision").val("");
			            $("#nombre_productoEmision").val("");
			            $("#nombre_productoEmision").focus();
			            $("#cantidadEmision").val("0");
			            $("#precio_ventaEmision").val("0.00");
			            $("#precio_totalEmsiion").val("0.00");
					}
				}
			}
			total_factura();                           
		}

	});
	$("#nro_factura_preimpresa").load(
		$.ajax({				
			type: "POST",			
			url: "../servidor/emision_permisos/nro_factura.php",			
		    success: function(data) {			 
				$("#nro_factura_preimpresa").val(data);				
		    	zeros(data.length,"nro_factura_preimpresa");   			    			    	
			}
		})
	);	

	$("#btn_guardarEmision").on("click",guardar_emision);
	$("#btn_limpiarEmision").on("click",limpiar_form);
	$("#btn_buscarEmision").on("click",modal);
	$("#btn_atras").on("click",function(){
		atras("id_emision","emision_permisos","secuencia.php");//campo id la carpeta y el archivo donde esta el proceso
	});
	$("#btn_adelante").on("click",function(){
		adelante("id_emision","emision_permisos","secuencia.php");//campo id la carpeta y el archivo donde esta el proceso
	});
	$("#btn_imprimirEmision").on("click",function(){
		if($("#id_emision").val() != ""){
			window.open('../reportes/reporte_emsion.php?id='+$("#id_emision").val(),'_blank');      		
		}else{
			alert("No se puede imprimir");
		}
	});		
	/**/
}
function llenarSelect(lt,md,bg,sbg){
	$("#select_valor").find('option').remove();
	$('#select_valor').append('<option value='+lt+'>$ '+lt+'</option>');
	$('#select_valor').append('<option value='+md+'>$ '+md+'</option>');
	$('#select_valor').append('<option value='+bg+'>$ '+bg+'</option>');
	$('#select_valor').append('<option value='+sbg+'>$ '+sbg+'</option>');	
}
/* function para poder dar el comportamiento de un grupo de radiobutton a un grupo de checkbox */
function checkbox(){
	var ck = $(this).parent().parent().find(':input');	
	console.log(ck)
	ck.each(function (){
		$(this).removeAttr("checked");
	});
	var id = this.id;
	$("#"+id).prop('checked',true);
}
function checkboxTabla(){
	var name = $(this).attr("name");
	var id = $(this).attr("id");
	var ck = $(this).parent().parent().find(":input[name='"+name+"']");
	
	if($(this).prop('checked')){
		$("#"+id).prop('checked',true);		
		ck.not($(this)).each(function (){
			$(this).removeAttr("checked");
		});
	}else{
		ck.last('checkbox').prop('checked',true);
	}
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
/*procesos informe*/
function guardar_Informe(){		
	if($("#ruc_informe").val() != "" && $("#id_empresa").val() != "" && $("#nombres_propietario").val()!= ""){    	    	
    	if($("#nro_registro").val() != ""){    		
			if($("#id_inputTasa").val() != "" && $("#input_tasa").val() != ""){				
				alertify.confirm("<b>Recuerde Llenar todos los campos <br>Deséa Continuar?</b>", function(e){		    			
	    			if(e){		    							
	    				alertify.set({ labels: {
						    ok     : "Guardar e Imprimir",
						    cancel : "Guardar",				    
						} });
						alertify.confirm("<b>Seleccione una opción</b>", function(e){		    			
		    				var option = 0;
		    				if(e){	
		    					option = 0;
		    				}else{
		    					option = 1;
		    				}
		    				$("#form_informe").on("submit",function (e){		
								var texto=($("#btn_guardarInforme").text()).trim();								
								var formObj = $(this);		
								if(window.FormData !== undefined) {	
									var formData = new FormData(this); 		    
			    					serializarTabla("tabla_incendios");
									serializarTabla("tabla_prevencion");
									serializarTabla("tabla_sistemaE");
									serializarTabla("tabla_almacenamiento");
									if(texto=="Guardar"){		
										data_informe(formData,"g",e,option)  		    		    
									}else{
										data_informe(formData,"m",e,option)  		    		    
									}
								e.preventDefault();						
								}else{
								    var  iframeId = "unique" + (new Date().getTime());
								    var iframe = $('<iframe src="javascript:false;" name="'+iframeId+'" />');
								    iframe.hide();
								    formObj.attr("target",iframeId);
								    iframe.appendTo("body");
							    	iframe.load(function(e) {
							        	var doc = getDoc(iframe[0]);
								        var docRoot = doc.body ? doc.body : doc.documentElement;
								        var data = docRoot.innerHTML;
								    });			
								}
							});
							$("#form_informe").submit();	  																								
		    			});
					}else{								
    					alertify.error('Operación Cancelada');		    						    						    			
					}		
				});
			}else{				
				alertify.error("Seleccione un valor de Tasa por servicio administrativo");	
				$("#id_inputTasa").focus();
			}
		}else{			
			alertify.error("Ingrese el número correspondiente al registro");									
			$("#tab_confirmacion").show("fast");	
			$("#tab_general").hide("fast");			
			$("#nro_registro").focus();
		}
	}else{
		alertify.error("Ingrese un número de RUC/CI o nombre de Propietario")						;
		$("#tab_confirmacion").hide("fast");	
		$("#t_e").removeClass("active");		
		$("#t_a").addClass("active");		
		$("#tab_general").show("fast");			
		$("#ruc_informe").focus();
	}
}
function data_informe(formData,tipo,p,option){
	$.ajax({
	    url: "../servidor/informe/informe_general.php?tipo="+tipo,	
	    type: "POST",
	    data:  formData,
	    mimeType:"multipart/form-data",
	    contentType: false,
	    cache: false,
	    processData:false,
	    success: function(data, textStatus, jqXHR)
	    {
	    	alertify.set({ labels: {
			    ok     : "Accept",
			    cancel : "Deny"
			} });
	        var res=data;
	        if(res > 0){	        	
	        	if(option == 0){
            		window.open('../reportes/informe_general.php?id='+res,'_blank');      		
            		location.reload();
            	}else{
            		location.reload();
            	}
	            alertify.alert("Datos Guardados Correctamente");
            		            	               	            
	        } else{
	            alertify.alert("Error..... Datos no Guardados La Página se recargara");
	            location.reload();
	        }
	    },
	    error: function(jqXHR, textStatus, errorThrown) 
	    {
	    } 	        
	}); 
}
/*------------*/
/*Formularios Productos*/
function guardar_productos(){
	var resp=comprobarCamposRequired("form_productos");
	if(resp==true){
		$("#form_productos").on("submit",function (e){	
			var valores = $("#form_productos").serialize();
			var texto=($("#btn_guardarProductos").text()).trim();	
			if(texto=="Guardar"){		
				datos_productos(valores,"g",e);
			}else{
				datos_productos(valores,"m",e);
			}
			e.preventDefault();
    		$(this).unbind("submit")
		});
	}
}
function datos_productos(valores,tipo,p){
	var tp = $("#tipo_iva").val();
	$.ajax({				
		type: "POST",
		data: valores+"&tipo="+tipo+"&tipo_iva="+tp,
		url: "../servidor/productos/productos.php",			
	    success: function(data) {	
	    	if( data == 0 ){	    		
	    		alertify.primary('Datos Agregados Correctamente');	
				limpiar_form(p);					
	    	}else{
	    		if( data == 1 ){
	    			alertify.error('Este producto ya existe. Ingrese otro');	
	    			limpiar_form(p);		
	    		}else{
	    			
	    		}
	    	}

		}
	}); 
}
/*----------------------*/
/*formulario emision*/
function guardar_emision(){
	var nro = nro_row();	
	if($("#id_emisionPropietario").val() != ""){
		if(nro > 0){
			$("#form_emisionPermisos").on("submit",function (e){					
				var valores = $("#form_emisionPermisos").serialize();
				var texto=($("#btn_guardarEmision").text()).trim();	
				var serializar = serializarJqTabla("lista_factura");
				if(texto=="Guardar"){		
					datos_emision(valores,"g",e,serializar);
				}else{
					alert("No se puede modifcar los datos de una factura ya impresa");
				}
				e.preventDefault();
	    		$(this).unbind("submit")
			});
			$("#form_emisionPermisos").submit();	 
		}else{
			alert("Agregue productos para poder continuar");
			$("#nombre_productoEmision").focus();
		}
	}else{
		alert("Indique un  propietario antes de continuar");
		$("#ci_ruc_emision").focus();
	}
}
function datos_emision(valores,tipo,p,serializar){	
	var productosJSON = JSON.stringify(serializar);
	$.ajax({				
		type: "POST",
		data: valores,
		url: "../servidor/emision_permisos/emision.php?v="+productosJSON,			
	    success: function(data) {	
	    	if( data > 0 ){	    		
	    		alertify.set({ delay: 1000 });
	    		alertify.primary('Datos Agregados Correctamente');						    		
	    		setTimeout(function() {
				    window.open('../reportes/reporte_emsion.php?id='+data,'_blank');      		
				}, 1500);
				setTimeout(function() {
				    location.reload();
				}, 1800);

	    	}	
	    	else{
	    		alertify.danger("Error al momento de guardar los datos la página se recargara");
	    		location.reload();
	    	}

		}
	});
}
/*------------------*/
/*function para limpiar el formulario activo y dar focus al primer elemento*/
function limpiar_form(e){
	if(e != undefined)
	{
		var form;
		if(e.type == "click"){///mediante el click del boton
			$("#"+e.currentTarget.form.id+" input").val("");
			comprobarCamposRequired(e.currentTarget.form.id);		
			form = e.currentTarget.form.id;
		}else{//form por el evento submit
			if(e.type == "submit"){
				$("#"+e.target.id+" input").val("");
				comprobarCamposRequired(e.target.id);		
				form = e.target.id
			}else{///id directo del form
				$("#"+e+" input").val("");
				comprobarCamposRequired(e);		
				form = e;
			}
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
						if(form == "form_empresas"){
							$("#btn_guardarEmpresas").text("");
							$("#btn_guardarEmpresas").append("<span class='glyphicon glyphicon-log-in'></span> Guardar");     
							$("#capital_giro").val("0.00");
							$("#grupo_empresas").html(" ");						
						}else{
							if(form == "form_informe"){
								location.reload();					
							}else{
								if(form == "form_productos"){
									$("#btn_guardarProductos").text("");
									$("#btn_guardarProductos").append("<span class='glyphicon glyphicon-log-in'></span> Guardar");     
									$("#stock_producto").val("0");
									$("#stock_minimoProducto").val("0");
									$("#stock_maximoProducto").val("0");
									$("#precio_compraProducto").val("0.00");
									$("#precio_ventaProducto").val("0.00");
								}else{
									if(form == "form_emisionPermisos"){
										location.reload();
									}else{
										if(form == ""){
											
										}
									}
								}
							}
						}
					}
				}	
			}	
		}	
		$("#fecha_factura").datepicker("hide")
		$("input:not([readonly='readonly']):text:visible:first").focus();	
	}
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
				}else{
					if(form == "form_informe"){
						buscar_informe("600");	
					}else{
						if(form == "form_productos"){
							buscar_productos("600");	
						}else{
							if(form == "form_emisionPermisos"){
								buscar_emision("600");	
							}else{								
							}
						}
					}	
				}	
			}	
		}	
	}
	$("#tabla_busquedas").trigger('reloadGrid');
}
/*funcion para autocompleta con el campo a mostar el id oculto y la direccion donde se encuentra*/
function autocompletar(campo,campoNombre,campoId,direccion,campoCopia,campoCopia1,form){
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
	        $( "#"+campoCopia ).val( ui.item.label1 );     
	        $( "#"+campoCopia1 ).val( ui.item.label2 );   
	        comprobarCamposRequired(form);		
	        cargarTabla(ui.item.value);
	        return false;
        }     
        }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
        return $( "<li>" )
        .append( "<a>"+ item.label1 + "</a>" )
        .appendTo( ul );
    };
}
function autocompletarPropietario(campo,campoNombre,campoId,direccion){
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
	        informesGenerales();      
	        return false;
        }     
        }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
        return $( "<li>" )
        .append( "<a>"+ item.label1 + "</a>" )
        .appendTo( ul );
    };
}
/*---------------*/
/*funcion para autocompleta con el campo a mostar el id oculto y la direccion donde se encuentra*/
function autocompletarEmpresa(campo,campoNombre,campoId,actividad,direccion,razon_social,telefono,ubicacion,form,tab){
	$("#"+campo).autocomplete({
        source: form,
        minLength:1,
        focus: function( event, ui ) {
	        $( "#"+campoId ).val( ui.item.label2 );
	        $( "#"+campo ).val( ui.item.value );  
	        $( "#"+campoNombre ).val( ui.item.label1 );  
	        $( "#"+actividad ).val( ui.item.label3 );  
	        $( "#"+direccion ).val( ui.item.label4 );  
	        $( "#"+razon_social ).val( ui.item.label5 );  
	        $( "#"+telefono ).val( ui.item.label6 );  
			$( "#"+ubicacion ).val( ui.item.label7 );  
	        return false;
        },
	    select: function( event, ui ) {
	        $( "#"+campoId ).val( ui.item.label2 );
	        $( "#"+campo ).val( ui.item.value );  
	        $( "#"+campoNombre ).val( ui.item.label1 );  
	        $( "#"+actividad ).val( ui.item.label3 );  
	        $( "#"+direccion ).val( ui.item.label4 );  
	        $( "#"+razon_social ).val( ui.item.label5 );  
	        $( "#"+telefono ).val( ui.item.label6 );  
			$( "#"+ubicacion ).val( ui.item.label7 );  
			$("#"+tab).find(':input:visible:first').focus();
			cargarInforme(ui);
	        return false;
        }     
        }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
        return $( "<li>" )
        .append( "<a>"+ item.value + "</a>" )
        .appendTo( ul );
    };
}
/*---------------*/
/*funcion para autocompleta con el campo a mostar el id oculto y la direccion donde se encuentra*/
function autocompletarTasa(campo,campo1,direccion){
	$("#"+campo1).autocomplete({
        source: direccion,
        minLength:1,
        focus: function( event, ui ) {
	        $( "#"+campo ).val( ui.item.label1 );
	        $( "#"+campo1 ).val( ui.item.label2 );  	        
	        return false;
        },
	    select: function( event, ui ) {
	        $( "#"+campo ).val( ui.item.label1 );
	        $( "#"+campo1 ).val( ui.item.label2 );
	        llenarSelect(ui.item.label4,ui.item.label5,ui.item.label6,ui.item.label7);
	        return false;
        }     
        }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
        return $( "<li>" )
        .append( "<a>"+ item.label2 + "</a>" )
        .appendTo( ul );
    };
}
/*---------------*/
/*funcion para autocompletar la parte de producto en la emision con el campo a mostar el id oculto y la direccion donde se encuentra*/
function autocompletarProducto(campo,campo1,campo2,campo3,direccion){//id nombre cantidad precio venta direccion
	$("#"+campo1).autocomplete({
        source: direccion,
        minLength:1,
        focus: function( event, ui ) {
	        $( "#"+campo ).val( ui.item.label );
	        $( "#"+campo1 ).val( ui.item.label1 );  	        
	        $( "#"+campo2 ).val( ui.item.label2 );  	        
	        $( "#"+campo3 ).val( ui.item.label3 );  	        
	        return false;
        },
	    select: function( event, ui ) {
	        $( "#"+campo ).val( ui.item.label );
	        $( "#"+campo1 ).val( ui.item.label1 );
	        $( "#"+campo2 ).val( ui.item.label2 );  	        
	        $( "#"+campo3 ).val( ui.item.label3 );  	        	        
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
	$("#grupo_empresas").html(" ");
	$.ajax({        
        type: "POST",
        dataType: 'json',
        data:"id="+idPropietario+"&tipo="+"1",
        url: "../servidor/empresas/cargaEmpresa.php",        
        success: function(response) {     
            for (var i = 0; i < response.length; i=i+2) {
				$("#grupo_empresas").append("<a href='#"+response[i+0]+"' onclick='cargarEstados(this)'   class='list-group-item list-group-item-success' data-toggle='collapse' data-parent='#lista_empresas'><b>"+response[i+1]+"</b></a><div class='collapse' id='"+response[i+0]+"'><div class='table-responsive'><table class='table table-bordered table-condensed table-hover' id='tabla"+response[i+0]+"'><thead><th style='display:none;'></th><th width='15%'>RUC EMPRESA</th><th width='20%'>RAZON SOCIAL</th><th width='20%'>ACTIVIDAD</th><th width='22%'>REPRESENTANTE LEGAL</th><th width='13%'>FECHA ESTADO</th><th width='10%'>PERMISO</th><th style='display:none;'>idempresa</th><th style='display:none;'>direccion</th><th style='display:none;'>telefono</th><th style='display:none;'>parroquia</th><th style='display:none;'>capital</th></thead><tbody><tr></tr></tbody></table></div><button class='btn btn-warning' onclick='modificaEmpresa(this)' type='button'><span class='glyphicon glyphicon-edit'></span> Modificar Empresa</button><br><br>");            	
            }
        }                   
    }); 
}
/*------------------*/
/*funcion para cargar la tabla de las empresas con sus estados*/
function cargarEstados(e){
	var hr =$(e).attr("href");
	var hr = hr.split('#').pop();
	hre = "tabla"+hr;
	$("#"+hre+" tbody").html(" ");
	$.ajax({        
        type: "POST",
        dataType: 'json',
        data:"id="+$("#id_propie").val()+"&tipo="+"2"+"&id_e="+hr,
        url: "../servidor/empresas/cargaEmpresa.php",        
        success: function(response) {     
            for (var i = 0; i < response.length; i=i+12) {
				$("#"+hre+" tbody").append( "<tr ondblclick=imprimirReporte(this)>" +
                "<td align=center style=display:none>" + response[i+0] + "</td>" +
                "<td align=center>" + response[i+1] + "</td>" +             
                "<td align=center>" + response[i+2] + "</td>" +      
                "<td align=center>" + response[i+3] + "</td>" +      
                "<td align=center>" + response[i+4] + "</td>" +      
                "<td align=center>" + response[i+5] + "</td>" + 
                "<td align=center>" + response[i+6]  + "</td>" + 
                "<td align=center style=display:none>" + response[i+7] + "</td>" +
                "<td align=center style=display:none>" + response[i+8] + "</td>" +
                "<td align=center style=display:none>" + response[i+9] + "</td>" +
                "<td align=center style=display:none>" + response[i+10] + "</td>" +
                "<td align=center style=display:none>" + response[i+11] + "</td>" + "</tr>" );	
            }
        }                   
    }); 
}
/*-----------*/
/*funcion para enviar los datos a la empresa y poder modificar*/
function modificaEmpresa(e){
	//console.log($(e).parent().attr("id"))
	var id_empresaM = $(e).parent().attr("id");
	var tablaM = "tabla"+id_empresaM;	
	$.ajax({        
        type: "POST",
        dataType: 'json',
        data:"id="+id_empresaM+"&tipo="+"3",
        url: "../servidor/empresas/cargaEmpresa.php",       
        success: function(response) {                 
        	$("#razon_socialEmpresa").val(response[0]);                
        	$("#ruc_empresa").val(response[1]);                        	        	               
        	$("#representante_empresa").val(response[2]);                
        	$("#actividad_empresa").val(response[4]); 
        	$("#direccion_empresa").val(response[5]);                
        	$("#telefono_empresa").val(response[6]);                
        	$("#parroquia_empresa").val(response[7]);                                    	        	                                   	
        	$("#capital_giro").val(response[8]);   
        	comprobarCamposRequired("form_empresas");                                  	        	
        	
       	}
    });
	$("#id_empresaPropietario").val(id_empresaM);
	$("#"+id_empresaM).removeClass('in');	
    $("#btn_guardarEmpresas").text("");
    $("#btn_guardarEmpresas").append("<span class='glyphicon glyphicon-log-in'></span> Modificar");     
}
/*-------------*/
/*function que me permite serializar la tabla para poder enviar los datos en el submit*/
function serializarTabla(tabla){	
	var tabla_serialize = new Object();
	$("#" +tabla+ " > tr").each(function () {				

	  var tablerow = $(this);
	  $("td input", tablerow).each(function () {
	    var input = $(this);	    
	  });
	});
}
function serializarJqTabla(tabla){	
	var tabla_serialize = new Object();
	var filas = 0;
	var columnas = 0;
	var cont = 0;
	$("#" +tabla+ " tbody > tr").each(function () {						
		var tablerow = $(this);		
		if(cont == 1){
			$("td", tablerow).each(function () {
			    var input = $(this).text();	    	    
			    tabla_serialize[filas,columnas] = input;
			    columnas++;
		  	});
		  	filas = 0;
		  	columnas++;	
		}
		cont = 1;	 	
	});
	return tabla_serialize;
}
/**/
function cargarInforme(id){
	var ids = 0;
	ids = $("#id_empresa").val();	
	$.ajax({				
		type: "POST",
		data: "id="+ids+"&tipo="+"0",
		url: "../servidor/informe/cargaInforme.php",			
	    success: function(data) {	
	    	if(data == 1){
	    		alertify.alert("<b>Esta empresa ya tiene un registro este año <br>El informe se cargara</b>", function(e){	    			
					cargaInforme(ids);	    			
  				});	    		
	    	}	   		 
		}
	});		
}
function cargaInforme(id){
	var ids = 0;
	ids = $("#id_empresa").val();	
	$.ajax({				
		type: "POST",
		dataType: 'json',
		data: "id="+ids+"&tipo="+"1",
		url: "../servidor/informe/cargaInforme.php",			
	    success: function(data) {		    			        	    	
	    	carga(data)		    
		}
	});		
}
function carga(valores){
//console.log(valores)		
	$("#id_informe_empresa").val(valores[0]);		
	if(valores[1] == "SI"){
		$("#check_per1").prop('checked', true);
		$("#check_per2").prop('checked', false);
	}else{
		$("#check_per2").prop('checked', true);
		$("#check_per1").prop('checked', false);
	}	
	$("#select_valor").find('option').remove();
    $("#select_valor").load("../servidor/informe/carga_tasaB.php?texto="+valores[13]+"&ids="+valores[11]);    
    $("#id_inputTasa").val(valores[11]);		
    $("#input_tasa").val(valores[13]);		    
    $("#area_util").val(valores[14]);		    
    $("#pe").val(valores[15]);		    
    $("#mmr").val(valores[16]);		    
    $("#riesgo").val(valores[17]);		    
    $("#area_total").val(valores[18]);
    $("#visible").val(valores[19]);
    $("#solicitud_nro").val(valores[20]);
    $("#ocupantes_fijos").val(valores[21]);
    $("#flotantes").val(valores[22]);
    $("#aforo").val(valores[23]);    
    $("#tipo_construccion").val(valores[24]);
    $("#techo_cubierta").val(valores[25]);
    /*$(".radio_ventilacion").val(valores[26]);*/
    if(valores[26] == "NATURAL"){
		$("#radioEnLinea1").prop('checked', true);
		$("#radioEnLinea2").prop('checked', false);
		$("#radioEnLinea3").prop('checked', false);
		$("#radioEnLinea4").prop('checked', false);
	}else{
		if(valores[26] == "MECÁNICA"){
			$("#radioEnLinea2").prop('checked', true);
			$("#radioEnLinea1").prop('checked', false);
			$("#radioEnLinea3").prop('checked', false);
			$("#radioEnLinea4").prop('checked', false);
		}else{
			if(valores[26] == "FUNCIONAL"){
				$("#radioEnLinea3").prop('checked', true);
				$("#radioEnLinea2").prop('checked', false);
				$("#radioEnLinea1").prop('checked', false);
				$("#radioEnLinea4").prop('checked', false);
			}else{
				if(valores[26] == "NO FUNCIONAL"){
					$("#radioEnLinea4").prop('checked', true);
					$("#radioEnLinea1").prop('checked', false);
					$("#radioEnLinea2").prop('checked', false);
					$("#radioEnLinea3").prop('checked', false);
				}	
			}	
		}
	}	
    $("#disposicion").val(valores[27]);
    $("#fecha_general").val(valores[28]);
    $("#hora_inicio").val(valores[29]);
    $("#hora_final").val(valores[30]);
    /*$("#check_inspeccion").val(valores[31]);*/
    if(valores[31] == "INSPECCION"){
		$("#check_inspeccion").prop('checked', true);
		$("#check_reinsperccion").prop('checked', false);
	}else{
		if(valores[31] == "REINSPECCION"){		
			$("#check_reinsperccion").prop('checked', true);
			$("#check_inspeccion").prop('checked', false);
		}
	}/*DATOS GENERALES*/
	if(valores[32] == "SI"){
		$("#check_extintor_si").prop('checked', true);
		$("#check_extintor_no").prop('checked', false);
		$("#check_extintor_sm").prop('checked', false);
	}else{
		if(valores[32] == "NO"){
			$("#check_extintor_si").prop('checked', false);
			$("#check_extintor_no").prop('checked', true);
			$("#check_extintor_sm").prop('checked', false);
		}else{
			$("#check_extintor_si").prop('checked', false);
			$("#check_extintor_no").prop('checked', false);
			$("#check_extintor_sm").prop('checked', true);
		}
	}	
	if(valores[33] == "5"){
		$("#checkI_1").prop('checked', true);
		$("#checkI_2").prop('checked', false);
		$("#checkI_3").prop('checked', false);
		$("#checkI_4").prop('checked', false);
		$("#checkI_5").prop('checked', false);
	}else{		
		if(valores[33] == "10"){
			$("#checkI_1").prop('checked', false);
			$("#checkI_2").prop('checked', true);
			$("#checkI_3").prop('checked', false);
			$("#checkI_4").prop('checked', false);
			$("#checkI_5").prop('checked', false);
		}else{
			if(valores[33] == "20"){
				$("#checkI_1").prop('checked', false);
				$("#checkI_2").prop('checked', false);
				$("#checkI_3").prop('checked', true);
				$("#checkI_4").prop('checked', false);
				$("#checkI_5").prop('checked', false);
			}else{
				if(valores[33] == "50"){
					$("#checkI_1").prop('checked', false);
					$("#checkI_2").prop('checked', false);
					$("#checkI_3").prop('checked', false);
					$("#checkI_4").prop('checked', true);
					$("#checkI_5").prop('checked', false);
				}
			}
		}
	}
	if(valores[34] == "SI"){
		$("#checkI_6").prop('checked', true);
		$("#checkI_7").prop('checked', false);			
	}
	if(valores[35] == "SI"){
		$("#checkI_8").prop('checked', true);
		$("#checkI_9").prop('checked', false);			
	}
	if(valores[36] == "SI"){
		$("#checkI_10").prop('checked', true);
		$("#checkI_11").prop('checked', false);			
	}
	$("#disposicionI1").val(valores[37]);
	$("#cantI1").val(valores[38]);

	if(valores[39] == "5"){
		$("#checkI_12").prop('checked', true);
		$("#checkI_13").prop('checked', false);
		$("#checkI_14").prop('checked', false);
		$("#checkI_15").prop('checked', false);
		$("#checkI_16").prop('checked', false);
	}else{		
		if(valores[39] == "10"){
			$("#checkI_12").prop('checked', false);
			$("#checkI_13").prop('checked', true);
			$("#checkI_14").prop('checked', false);
			$("#checkI_15").prop('checked', false);
			$("#checkI_16").prop('checked', false);
		}else{
			if(valores[39] == "20"){
				$("#checkI_12").prop('checked', false);
				$("#checkI_13").prop('checked', false);
				$("#checkI_14").prop('checked', true);
				$("#checkI_15").prop('checked', false);
				$("#checkI_16").prop('checked', false);
			}else{
				if(valores[39] == "50"){
					$("#checkI_12").prop('checked', false);
					$("#checkI_13").prop('checked', false);
					$("#checkI_14").prop('checked', false);
					$("#checkI_15").prop('checked', true);
					$("#checkI_16").prop('checked', false);
				}
			}
		}
	}
	if(valores[40] == "SI"){
		$("#checkI_17").prop('checked', true);
		$("#checkI_18").prop('checked', false);			
	}
	if(valores[41] == "SI"){
		$("#checkI_19").prop('checked', true);
		$("#checkI_20").prop('checked', false);			
	}
	if(valores[42] == "SI"){
		$("#checkI_21").prop('checked', true);
		$("#checkI_22").prop('checked', false);			
	}
	$("#disposicionI2").val(valores[43]);
	$("#cantI2").val(valores[44]);
	if(valores[45] == "5"){
		$("#checkI_23").prop('checked', true);
		$("#checkI_24").prop('checked', false);
		$("#checkI_25").prop('checked', false);
		$("#checkI_26").prop('checked', false);
		$("#checkI_27").prop('checked', false);
	}else{		
		if(valores[45] == "10"){
			$("#checkI_23").prop('checked', false);
			$("#checkI_24").prop('checked', true);
			$("#checkI_25").prop('checked', false);
			$("#checkI_26").prop('checked', false);
			$("#checkI_27").prop('checked', false);
		}else{
			if(valores[45] == "20"){
				$("#checkI_23").prop('checked', false);
				$("#checkI_24").prop('checked', false);
				$("#checkI_25").prop('checked', true);
				$("#checkI_26").prop('checked', false);
				$("#checkI_27").prop('checked', false);
			}else{
				if(valores[45] == "50"){
					$("#checkI_23").prop('checked', false);
					$("#checkI_24").prop('checked', false);
					$("#checkI_25").prop('checked', false);
					$("#checkI_26").prop('checked', true);
					$("#checkI_27").prop('checked', false);
				}
			}
		}
	}
	if(valores[46] == "SI"){
		$("#checkI_28").prop('checked', true);
		$("#checkI_29").prop('checked', false);			
	}
	if(valores[47] == "SI"){
		$("#checkI_30").prop('checked', true);
		$("#checkI_31").prop('checked', false);			
	}
	if(valores[48] == "SI"){
		$("#checkI_32").prop('checked', true);
		$("#checkI_33").prop('checked', false);			
	}
	$("#disposicionI3").val(valores[49]);
	$("#cantI3").val(valores[50]);
	if(valores[51] == "5"){
		$("#checkI_34").prop('checked', true);
		$("#checkI_35").prop('checked', false);
		$("#checkI_36").prop('checked', false);
		$("#checkI_37").prop('checked', false);
		$("#checkI_38").prop('checked', false);
	}else{		
		if(valores[51] == "10"){
			$("#checkI_34").prop('checked', false);
			$("#checkI_35").prop('checked', true);
			$("#checkI_36").prop('checked', false);
			$("#checkI_37").prop('checked', false);
			$("#checkI_38").prop('checked', false);
		}else{
			if(valores[51] == "20"){
				$("#checkI_34").prop('checked', false);
				$("#checkI_35").prop('checked', false);
				$("#checkI_36").prop('checked', true);
				$("#checkI_37").prop('checked', false);
				$("#checkI_38").prop('checked', false);
			}else{
				if(valores[51] == "50"){
					$("#checkI_34").prop('checked', false);
					$("#checkI_35").prop('checked', false);
					$("#checkI_36").prop('checked', false);
					$("#checkI_37").prop('checked', true);
					$("#checkI_38").prop('checked', false);
				}
			}
		}
	}
	if(valores[52] == "SI"){
		$("#checkI_39").prop('checked', true);
		$("#checkI_40").prop('checked', false);			
	}
	if(valores[53] == "SI"){
		$("#checkI_41").prop('checked', true);
		$("#checkI_42").prop('checked', false);			
	}
	if(valores[54] == "SI"){
		$("#checkI_43").prop('checked', true);
		$("#checkI_44").prop('checked', false);			
	}
	$("#disposicionI4").val(valores[55]);
	$("#cantI4").val(valores[56]);
	if(valores[57] == "5"){
		$("#checkI_45").prop('checked', true);
		$("#checkI_46").prop('checked', false);
		$("#checkI_47").prop('checked', false);
		$("#checkI_48").prop('checked', false);
		$("#checkI_49").prop('checked', false);
	}else{		
		if(valores[57] == "10"){
			$("#checkI_45").prop('checked', false);
			$("#checkI_46").prop('checked', true);
			$("#checkI_47").prop('checked', false);
			$("#checkI_48").prop('checked', false);
			$("#checkI_49").prop('checked', false);
		}else{
			if(valores[57] == "20"){
				$("#checkI_45").prop('checked', false);
				$("#checkI_46").prop('checked', false);
				$("#checkI_47").prop('checked', true);
				$("#checkI_48").prop('checked', false);
				$("#checkI_49").prop('checked', false);
			}else{
				if(valores[57] == "50"){
					$("#checkI_45").prop('checked', false);
					$("#checkI_46").prop('checked', false);
					$("#checkI_47").prop('checked', false);
					$("#checkI_48").prop('checked', true);
					$("#checkI_49").prop('checked', false);
				}
			}
		}
	}
	if(valores[58] == "SI"){
		$("#checkI_50").prop('checked', true);
		$("#checkI_51").prop('checked', false);			
	}
	if(valores[59] == "SI"){
		$("#checkI_52").prop('checked', true);
		$("#checkI_53").prop('checked', false);			
	}
	if(valores[60] == "SI"){
		$("#checkI_54").prop('checked', true);
		$("#checkI_55").prop('checked', false);			
	}
	$("#disposicionI5").val(valores[61]);
	$("#cantI5").val(valores[62]);
	/*proteccion*/
	$("#cantP1").val(valores[63]);
	if(valores[64] == "SI"){
		$("#check_CN1").prop('checked', true);
		$("#check_CN2").prop('checked', false);			
	}
	$("#cantPA1").val(valores[65]);
	$("#lugarP1").val(valores[66]);

	$("#cantP2").val(valores[67]);
	if(valores[68] == "SI"){
		$("#check_CN3").prop('checked', true);
		$("#check_CN4").prop('checked', false);			
	}
	$("#cantPA2").val(valores[69]);
	$("#lugarP2").val(valores[70]);

	$("#cantP3").val(valores[71]);
	if(valores[72] == "SI"){
		$("#check_CN5").prop('checked', true);
		$("#check_CN6").prop('checked', false);			
	}
	$("#cantPA3").val(valores[73]);
	$("#lugarP3").val(valores[74]);

	$("#cantP4").val(valores[75]);
	if(valores[76] == "SI"){
		$("#check_CN7").prop('checked', true);
		$("#check_CN8").prop('checked', false);			
	}
	$("#cantPA4").val(valores[77]);
	$("#lugarP4").val(valores[78]);

	$("#cantP5").val(valores[79]);
	if(valores[80] == "SI"){
		$("#check_CN9").prop('checked', true);
		$("#check_CN10").prop('checked', false);			
	}
	$("#cantPA5").val(valores[81]);
	$("#lugarP5").val(valores[82]);

	$("#cantP6").val(valores[83]);
	if(valores[84] == "SI"){
		$("#check_CN11").prop('checked', true);
		$("#check_CN12").prop('checked', false);			
	}
	$("#cantPA6").val(valores[85]);
	$("#lugarP6").val(valores[86]);

	$("#cantP7").val(valores[87]);
	if(valores[88] == "SI"){
		$("#check_CN13").prop('checked', true);
		$("#check_CN14").prop('checked', false);			
	}
	$("#cantPA7").val(valores[89]);
	$("#lugarP7").val(valores[90]);

	$("#cantP8").val(valores[91]);
	if(valores[92] == "SI"){
		$("#check_CN15").prop('checked', true);
		$("#check_CN16").prop('checked', false);			
	}
	$("#cantPA8").val(valores[93]);
	$("#lugarP8").val(valores[94]);

	$("#cantP9").val(valores[95]);
	if(valores[96] == "SI"){
		$("#check_CN17").prop('checked', true);
		$("#check_CN18").prop('checked', false);			
	}
	$("#cantPA9").val(valores[97]);
	$("#lugarP9").val(valores[98]);

	$("#cantP10").val(valores[99]);
	if(valores[100] == "SI"){
		$("#check_CN19").prop('checked', true);
		$("#check_CN20").prop('checked', false);			
	}
	$("#cantPA10").val(valores[101]);
	$("#lugarP10").val(valores[102]);

	$("#cantP11").val(valores[103]);
	if(valores[104] == "SI"){
		$("#check_CN21").prop('checked', true);
		$("#check_CN22").prop('checked', false);			
	}
	$("#cantPA11").val(valores[105]);
	$("#lugarP11").val(valores[106]);

	$("#cantP12").val(valores[107]);
	if(valores[108] == "SI"){
		$("#check_CN23").prop('checked', true);
		$("#check_CN24").prop('checked', false);			
	}
	$("#cantPA12").val(valores[109]);
	$("#lugarP12").val(valores[110]);

	$("#cantP13").val(valores[111]);
	if(valores[112] == "SI"){
		$("#check_CN25").prop('checked', true);
		$("#check_CN26").prop('checked', false);			
	}
	$("#cantPA13").val(valores[113]);
	$("#lugarP13").val(valores[114]);

	$("#cantP14").val(valores[115]);
	if(valores[116] == "SI"){
		$("#check_CN27").prop('checked', true);
		$("#check_CN28").prop('checked', false);			
	}
	$("#cantPA14").val(valores[117]);
	$("#lugarP14").val(valores[118]);
	/*PREVENCION*/
	if(valores[119] == "SI"){
		$("#checkR1").prop('checked', true);
		$("#checkR2").prop('checked', false);			
		$("#checkR3").prop('checked', false);			
	}else{
		if(valores[119] == "NO"){
			$("#checkR1").prop('checked', false);
			$("#checkR2").prop('checked', true);			
			$("#checkR3").prop('checked', false);			
		}
	}
	$("#observacionesR_1").val(valores[120]);
	if(valores[121] == "SI"){
		$("#checkR4").prop('checked', true);
		$("#checkR5").prop('checked', false);			
		$("#checkR6").prop('checked', false);			
	}else{
		if(valores[121] == "NO"){
			$("#checkR4").prop('checked', false);
			$("#checkR5").prop('checked', true);			
			$("#checkR6").prop('checked', false);			
		}
	}
	$("#observacionesR_2").val(valores[122]);
	if(valores[123] == "SI"){
		$("#checkR7").prop('checked', true);
		$("#checkR8").prop('checked', false);			
		$("#checkR9").prop('checked', false);			
	}else{
		if(valores[123] == "NO"){
			$("#checkR7").prop('checked', false);
			$("#checkR8").prop('checked', true);			
			$("#checkR9").prop('checked', false);			
		}
	}
	$("#observacionesR_3").val(valores[124]);
	if(valores[125] == "SI"){
		$("#checkR10").prop('checked', true);
		$("#checkR11").prop('checked', false);			
		$("#checkR12").prop('checked', false);			
	}else{
		if(valores[125] == "NO"){
			$("#checkR10").prop('checked', false);
			$("#checkR11").prop('checked', true);			
			$("#checkR12").prop('checked', false);			
		}
	}
	$("#observacionesR_4").val(valores[126]);
	if(valores[127] == "SI"){
		$("#checkR13").prop('checked', true);
		$("#checkR14").prop('checked', false);			
		$("#checkR15").prop('checked', false);			
	}else{
		if(valores[127] == "NO"){
			$("#checkR13").prop('checked', false);
			$("#checkR14").prop('checked', true);			
			$("#checkR15").prop('checked', false);			
		}
	}
	$("#observacionesR_5").val(valores[128]);
	if(valores[129] == "SI"){
		$("#checkR16").prop('checked', true);
		$("#checkR17").prop('checked', false);			
		$("#checkR18").prop('checked', false);			
	}else{
		if(valores[129] == "NO"){
			$("#checkR16").prop('checked', false);
			$("#checkR17").prop('checked', true);			
			$("#checkR18").prop('checked', false);			
		}
	}
	$("#observacionesR_6").val(valores[130]);
	$("#observacionesR_7").val(valores[131]);

	$("#almacenamiento1").val(valores[132]);
	$("#almacenamiento2").val(valores[133]);
	if(valores[134] == "IN"){
		$("#checkAl1").prop('checked', true);
		$("#checkAl2").prop('checked', false);			
		$("#checkAl3").prop('checked', false);			
		$("#checkAl4").prop('checked', false);			
	}else{
		if(valores[134] == "EX"){
			$("#checkAl1").prop('checked', false);
			$("#checkAl2").prop('checked', true);			
			$("#checkAl3").prop('checked', false);			
			$("#checkAl4").prop('checked', false);			
		}else{
			if(valores[134] == "AL"){
				$("#checkAl1").prop('checked', false);
				$("#checkAl2").prop('checked', false);			
				$("#checkAl3").prop('checked', true);			
				$("#checkAl4").prop('checked', false);			
			}
		}
	}
	$("#almacenamiento3").val(valores[135]);
	$("#almacenamiento4").val(valores[136]);
	if(valores[137] == "IN"){
		$("#checkAl5").prop('checked', true);
		$("#checkAl6").prop('checked', false);			
		$("#checkAl7").prop('checked', false);			
		$("#checkAl8").prop('checked', false);			
	}else{
		if(valores[137] == "EX"){
			$("#checkAl5").prop('checked', false);
			$("#checkAl6").prop('checked', true);			
			$("#checkAl7").prop('checked', false);			
			$("#checkAl8").prop('checked', false);			
		}else{
			if(valores[137] == "AL"){
				$("#checkAl5").prop('checked', false);
				$("#checkAl6").prop('checked', false);			
				$("#checkAl7").prop('checked', true);			
				$("#checkAl8").prop('checked', false);			
			}
		}
	}
	$("#almacenamiento5").val(valores[138]);
	$("#almacenamiento6").val(valores[139]);
	if(valores[140] == "IN"){
		$("#checkAl9").prop('checked', true);
		$("#checkAl10").prop('checked', false);			
		$("#checkAl11").prop('checked', false);			
		$("#checkAl12").prop('checked', false);			
	}else{
		if(valores[140] == "EX"){
			$("#checkAl9").prop('checked', false);
			$("#checkAl10").prop('checked', true);			
			$("#checkAl11").prop('checked', false);			
			$("#checkAl12").prop('checked', false);			
		}else{
			if(valores[140] == "AL"){
				$("#checkAl9").prop('checked', false);
				$("#checkAl10").prop('checked', false);			
				$("#checkAl11").prop('checked', true);			
				$("#checkAl12").prop('checked', false);			
			}
		}
	}
	$("#almacenamiento7").val(valores[141]);
	if(valores[142] == "IN"){
		$("#checkAl13").prop('checked', true);
		$("#checkAl14").prop('checked', false);			
		$("#checkAl15").prop('checked', false);			
		$("#checkAl16").prop('checked', false);			
	}else{
		if(valores[142] == "EX"){
			$("#checkAl13").prop('checked', false);
			$("#checkAl14").prop('checked', true);			
			$("#checkAl15").prop('checked', false);			
			$("#checkAl16").prop('checked', false);			
		}else{
			if(valores[142] == "AL"){
				$("#checkAl13").prop('checked', false);
				$("#checkAl14").prop('checked', false);			
				$("#checkAl15").prop('checked', true);			
				$("#checkAl16").prop('checked', false);			
			}
		}
	}
	$("#almacenamiento8").val(valores[143]);
	if(valores[144] == "IN"){
		$("#checkAl17").prop('checked', true);
		$("#checkAl18").prop('checked', false);			
		$("#checkAl19").prop('checked', false);			
		$("#checkAl20").prop('checked', false);			
	}else{
		if(valores[144] == "EX"){
			$("#checkAl17").prop('checked', false);
			$("#checkAl18").prop('checked', true);			
			$("#checkAl19").prop('checked', false);			
			$("#checkAl20").prop('checked', false);			
		}else{
			if(valores[144] == "AL"){
				$("#checkAl17").prop('checked', false);
				$("#checkAl18").prop('checked', false);			
				$("#checkAl19").prop('checked', true);			
				$("#checkAl20").prop('checked', false);			
			}
		}
	}
	$("#almacenamiento9").val(valores[145]);
	if(valores[146] == "AL"){
		$("#checkAl21").prop('checked', true);
		$("#checkAl22").prop('checked', false);					
	}
	$("#almacenamiento10").val(valores[147]);
	$("#almacenamiento11").val(valores[148]);
	if(valores[149] == "IN"){
		$("#checkAl23").prop('checked', true);
		$("#checkAl24").prop('checked', false);			
		$("#checkAl24").prop('checked', false);			
		$("#checkAl26").prop('checked', false);			
	}else{
		if(valores[149] == "EX"){
			$("#checkAl23").prop('checked', false);
			$("#checkAl24").prop('checked', true);			
			$("#checkAl24").prop('checked', false);			
			$("#checkAl26").prop('checked', false);			
		}else{
			if(valores[149] == "AL"){
				$("#checkAl23").prop('checked', false);
				$("#checkAl24").prop('checked', false);			
				$("#checkAl24").prop('checked', true);			
				$("#checkAl26").prop('checked', false);			
			}
		}
	}
	$("#almacenamiento12").val(valores[150]);	
	if(valores[151] == "IN"){
		$("#checkAl27").prop('checked', true);
		$("#checkAl28").prop('checked', false);			
		$("#checkAl29").prop('checked', false);			
		$("#checkAl30").prop('checked', false);			
	}else{
		if(valores[151] == "EX"){
			$("#checkAl27").prop('checked', false);
			$("#checkAl28").prop('checked', true);			
			$("#checkAl29").prop('checked', false);			
			$("#checkAl30").prop('checked', false);			
		}else{
			if(valores[151] == "AL"){
				$("#checkAl27").prop('checked', false);
				$("#checkAl28").prop('checked', false);			
				$("#checkAl29").prop('checked', true);			
				$("#checkAl30").prop('checked', false);			
			}
		}
	}	
	/*incendios*/
	$("#disposiciones_finales").val(valores[152]);
	$("#observaciones_finales").val(valores[153]);
	$("#resolucion").val(valores[154]);
	$("#para_extender_permiso").val(valores[155]);
	$("#plazo").val(valores[156]);
	if(valores[157] == "SI"){
		$("#check_an1").prop('checked', true);
		$("#check_an2").prop('checked', false);			
		$("#check_an3").prop('checked', false);					
	}else{
		if(valores[157] == "NO"){
			$("#check_an1").prop('checked', false);
			$("#check_an2").prop('checked', true);			
			$("#check_an3").prop('checked', false);					
		}
	}
	$("#nro_registro").val(valores[158]);
	$("#foto").attr("src","../fotos/"+valores[159]);	
	$("#documentos_adjuntos").val(valores[160]);

	$("#btn_guardarInforme").text("");
    $("#btn_guardarInforme").append("<span class='glyphicon glyphicon-log-in'></span> Modificar");     
	alertify.primary("Datos cargados correctamente...");	   
}
function imprimirReporte(e){	
	var e =$(e).children()[7];
	//console.log(e)
	e = $(e)[0].textContent;
	window.open('../reportes/informe_general.php?id='+e,'_blank');      		
	
}
function ci_ruc(campo){	
    var numero = $("#"+campo).val();
    var suma = 0;      
    var residuo = 0;      
    var pri = false;      
    var pub = false;            
    var nat = false;                     
    var modulo = 11;
    var p1;
    var p2;
    var p3;
    var p4;
    var p5;
    var p6;
    var p7;
    var p8;            
    var p9; 
    var d1  = numero.substr(0,1);         
    var d2  = numero.substr(1,1);         
    var d3  = numero.substr(2,1);         
    var d4  = numero.substr(3,1);         
    var d5  = numero.substr(4,1);         
    var d6  = numero.substr(5,1);         
    var d7  = numero.substr(6,1);         
    var d8  = numero.substr(7,1);         
    var d9  = numero.substr(8,1);         
    var d10 = numero.substr(9,1);  

    if (d3 < 6){           
        nat = true;            
        p1 = d1 * 2;
        if (p1 >= 10) p1 -= 9;
        p2 = d2 * 1;
        if (p2 >= 10) p2 -= 9;
        p3 = d3 * 2;
        if (p3 >= 10) p3 -= 9;
        p4 = d4 * 1;
        if (p4 >= 10) p4 -= 9;
        p5 = d5 * 2;
        if (p5 >= 10) p5 -= 9;
        p6 = d6 * 1;
        if (p6 >= 10) p6 -= 9; 
        p7 = d7 * 2;
        if (p7 >= 10) p7 -= 9;
        p8 = d8 * 1;
        if (p8 >= 10) p8 -= 9;
        p9 = d9 * 2;
        if (p9 >= 10) p9 -= 9;             
        modulo = 10;
    } else if(d3 == 6){           
        pub = true;             
        p1 = d1 * 3;
        p2 = d2 * 2;
        p3 = d3 * 7;
        p4 = d4 * 6;
        p5 = d5 * 5;
        p6 = d6 * 4;
        p7 = d7 * 3;
        p8 = d8 * 2;            
        p9 = 0;            
    } else if(d3 == 9) {          
        pri = true;                                   
        p1 = d1 * 4;
        p2 = d2 * 3;
        p3 = d3 * 2;
        p4 = d4 * 7;
        p5 = d5 * 6;
        p6 = d6 * 5;
        p7 = d7 * 4;
        p8 = d8 * 3;
        p9 = d9 * 2;            
    }

    suma = p1 + p2 + p3 + p4 + p5 + p6 + p7 + p8 + p9;                
    residuo = suma % modulo;                                         

    var digitoVerificador = residuo==0 ? 0: modulo - residuo; 
    ////////////verificamos del tipo cedula o ruc////////////////////        
    if (numero.length === 10) {    	
        if(nat == true){
            if (digitoVerificador != d10){                          
            	alertify.set({ delay: 1000 });
                alertify.error('El número de cédula es incorrecto.');
                $("#"+campo).val("");
            }else{
            	alertify.set({ delay: 1000 });
                alertify.success('El número de cédula es correcto.');
            }
        }
    }
    else{    	
    	var ruc = numero.substr(10,13);
        var digito3 = numero.substring(2,3);	        	        
        if(ruc == "001" ){
            if(digito3 < 6){ 
                if(nat == true){
                	if (digitoVerificador != d10){    
                		alertify.set({ delay: 1000 });                      
                  		alertify.error('El ruc persona natural es incorrecto.');
                  		$("#"+campo).val("");
                  	}else{
                  		alertify.set({ delay: 1000 });
                   		alertify.success('El ruc persona natural es correcto.');    
                  	} 
                }
            }else{
                if(digito3 == 6){ 
                    if (pub==true){  
                        if (digitoVerificador != d9){     
                        	alertify.set({ delay: 1000 });                     
                            alertify.error('El ruc público es incorrecto.');
                            $("#"+campo).val("");
                        }else{
                        	alertify.set({ delay: 1000 });
                            alertify.success('El ruc público es correcto.'); 
                        } 
                    }
                }else{
                    if(digito3 == 9){
                        if(pri == true){
                            if (digitoVerificador != d10){    
                            	alertify.set({ delay: 1000 });                      
                                alertify.error('El ruc privado es incorrecto.');
                                $("#"+campo).val("");
                            }else{
                            	alertify.set({ delay: 1000 });
                                alertify.success('El ruc privado es correcto.');      
                            } 
                        }
                    } 
                }
            }
        }else{
            if(numero.length === 13){
            	alertify.set({ delay: 1000 });
                alertify.error('El ruc es incorrecto.'); 
                $("#"+campo).val("");
            }
        }    
	
    }    	    
}

function mostrar(input) {
    var Digital = new Date();
    var hours = Digital.getHours();
    var minutes = Digital.getMinutes();
    var seconds = Digital.getSeconds();
    var dn = "AM";    
    if (hours > 12) {
        dn = "PM";
        hours = hours - 12;
    }
    if (hours === 0)
        hours = 12;
    if (minutes <= 9)
        minutes = "0" + minutes;
    if (seconds <= 9)
        seconds = "0" + seconds;
    $("#"+input).val(hours + ":" + minutes + ":" + seconds + " " + dn);
    var input = input;

    setTimeout("mostrar('"+input+"')", 1000);    
}
function zeros(tamaño,input){
	var zero="";	
	for(var i = tamaño; i < 9; i++){
		zero = zero + "0"
	}
	zero = zero + $("#"+input).val()
	$("#"+input).val(zero);
}
function informesGenerales(){	
	$("#busquedasModificar").html("");
	$("#busquedasModificar").append("<table id='tabla_busquedas'></table><div id='pager'></div>");
	$("#pager").html("");
	$('#modalBusquedas').modal('show');
	buscar_informes_propietarios("600");	
	

}
function total_factura(){
	var subtotal = 0;
	var filas = jQuery("#lista_factura").jqGrid("getRowData");
	for (var i = 0; i < filas.length; i++) {
    	var id = filas[i];    
    	subtotal = subtotal + parseFloat(id.total);	
    }

    $("#subtotal_emision").val(parseFloat(subtotal).toFixed(2));
    $("#total_emision").val(parseFloat(subtotal).toFixed(2));
    
}
function nro_row(){		
	var filas = jQuery("#lista_factura").jqGrid("getRowData");
	return filas.length;	    
}
function atras(id,carpeta,archivo){///campo carpeta y el archivo
	var url = '';
	if($("#"+id).val()!=""){
		url = "../servidor/"+carpeta+"/"+archivo+"?id="+$("#"+id).val()+"&fn=0";
	}else{
		url = "../servidor/"+carpeta+"/"+archivo+"?id="+$("#"+id).val()+"&fn=0";
	}	
	$.ajax({				
		type: "POST",
		dataType: 'json',		
		url: url,			
	    success: function(data) {		    	
	    	/*detalles de la factura*/    			        	    		    	
	    	$("#id_emision").val(data.Cabecera[0][0]);
	    	$("#fecha_factura").val(data.Cabecera[0][1]);
	    	$("#hora_factura").val(data.Cabecera[0][2]);
	    	$("#nombre_usuario").val(data.Cabecera[0][3]);
	    	$("#nro_1").val(data.Cabecera[0][4]);
	    	$("#nro_2").val(data.Cabecera[0][5]);
	    	$("#nro_factura_preimpresa").val(data.Cabecera[0][6]);
	    	$("#fecha_cancelacion").val(data.Cabecera[0][10]);
	    	$("#id_emisionPropietario").val(data.Cabecera[0][7]);
	    	$("#ci_ruc_emision").val(data.Cabecera[0][8]);
	    	$("#nombres_emision").val(data.Cabecera[0][9]);
	    	$("#select_emision").val(data.Cabecera[0][11]);
	    	$("#subtotal_emision").val(data.Cabecera[0][12]);
	    	$("#iva_0Emision").val(data.Cabecera[0][13]);
	    	$("#iva_12Emision").val(data.Cabecera[0][14]);
	    	$("#total_emision").val(data.Cabecera[0][15]);
	    	/*-------------------------*/
	    	/*detalles de los productos*/

	    	$("#lista_factura").jqGrid("clearGridData",true);
	    	for(var i = 0; i < data.Detalles[0].length; i++){
	    		var datarow = {
	                id_producto: "idp"+$("#id_productoEmision").val(),//referente al id producto
	                tipo: data.Detalles[0][i]["tipo"], 
	                detalle: data.Detalles[0][i]["detalle"], 
	                cantidad: data.Detalles[0][i]["cantidad"], 
	                precio_u: data.Detalles[0][i]["precio_unitario"], 
	                total: data.Detalles[0][i]["precio_total"],
	            };				                
	            jQuery("#lista_factura").jqGrid('addRowData', $("#id_productoEmision").val()+"idp", datarow);			                				                	    	
	    	}            
	    	/*-------------------------*/
	    	$("#btn_guardarEmision").text("");
            $("#btn_guardarEmision").append("<span class='glyphicon glyphicon-log-in'></span> ---------");     
		}
	});		
}
function adelante(id,carpeta,archivo){///campo carpeta y el archivo
	var url = '';
	if($("#"+id).val()!=""){
		url = "../servidor/"+carpeta+"/"+archivo+"?id="+$("#"+id).val()+"&fn=1";
	}else{
		url = "../servidor/"+carpeta+"/"+archivo+"?id="+$("#"+id).val()+"&fn=1";
	}	
	$.ajax({				
		type: "POST",
		dataType: 'json',		
		url: url,			
	    success: function(data) {		    	
	    	/*detalles de la factura*/    			        	    		    	
	    	$("#id_emision").val(data.Cabecera[0][0]);
	    	$("#fecha_factura").val(data.Cabecera[0][1]);
	    	$("#hora_factura").val(data.Cabecera[0][2]);
	    	$("#nombre_usuario").val(data.Cabecera[0][3]);
	    	$("#nro_1").val(data.Cabecera[0][4]);
	    	$("#nro_2").val(data.Cabecera[0][5]);
	    	$("#nro_factura_preimpresa").val(data.Cabecera[0][6]);
	    	$("#fecha_cancelacion").val(data.Cabecera[0][10]);
	    	$("#id_emisionPropietario").val(data.Cabecera[0][7]);
	    	$("#ci_ruc_emision").val(data.Cabecera[0][8]);
	    	$("#nombres_emision").val(data.Cabecera[0][9]);
	    	$("#select_emision").val(data.Cabecera[0][11]);
	    	$("#subtotal_emision").val(data.Cabecera[0][12]);
	    	$("#iva_0Emision").val(data.Cabecera[0][13]);
	    	$("#iva_12Emision").val(data.Cabecera[0][14]);
	    	$("#total_emision").val(data.Cabecera[0][15]);
	    	/*-------------------------*/
	    	/*detalles de los productos*/

	    	$("#lista_factura").jqGrid("clearGridData",true);
	    	for(var i = 0; i < data.Detalles[0].length; i++){
	    		var datarow = {
	                id_producto: "idp"+$("#id_productoEmision").val(),//referente al id producto
	                tipo: data.Detalles[0][i]["tipo"], 
	                detalle: data.Detalles[0][i]["detalle"], 
	                cantidad: data.Detalles[0][i]["cantidad"], 
	                precio_u: data.Detalles[0][i]["precio_unitario"], 
	                total: data.Detalles[0][i]["precio_total"],
	            };				                
	            jQuery("#lista_factura").jqGrid('addRowData', $("#id_productoEmision").val()+"idp", datarow);			                				                	    	
	    	}            
	    	/*-------------------------*/
	    	$("#btn_guardarEmision").text("");
            $("#btn_guardarEmision").append("<span class='glyphicon glyphicon-log-in'></span> ---------");     
		}
	});		
}
function cargar_emision(id,carpeta,archivo){
	var url = '';	
	url = "../servidor/"+carpeta+"/"+archivo+"?id="+id+"&fn=2";	
	$.ajax({				
		type: "POST",
		dataType: 'json',		
		url: url,			
	    success: function(data) {		    	
	    	/*detalles de la factura*/    			        	    		    	
	    	$("#id_emision").val(data.Cabecera[0][0]);
	    	$("#fecha_factura").val(data.Cabecera[0][1]);
	    	$("#hora_factura").val(data.Cabecera[0][2]);
	    	$("#nombre_usuario").val(data.Cabecera[0][3]);
	    	$("#nro_1").val(data.Cabecera[0][4]);
	    	$("#nro_2").val(data.Cabecera[0][5]);
	    	$("#nro_factura_preimpresa").val(data.Cabecera[0][6]);
	    	$("#fecha_cancelacion").val(data.Cabecera[0][10]);
	    	$("#id_emisionPropietario").val(data.Cabecera[0][7]);
	    	$("#ci_ruc_emision").val(data.Cabecera[0][8]);
	    	$("#nombres_emision").val(data.Cabecera[0][9]);
	    	$("#select_emision").val(data.Cabecera[0][11]);
	    	$("#subtotal_emision").val(data.Cabecera[0][12]);
	    	$("#iva_0Emision").val(data.Cabecera[0][13]);
	    	$("#iva_12Emision").val(data.Cabecera[0][14]);
	    	$("#total_emision").val(data.Cabecera[0][15]);
	    	/*-------------------------*/
	    	/*detalles de los productos*/

	    	$("#lista_factura").jqGrid("clearGridData",true);
	    	for(var i = 0; i < data.Detalles[0].length; i++){
	    		var datarow = {
	                id_producto: "idp"+$("#id_productoEmision").val(),//referente al id producto
	                tipo: data.Detalles[0][i]["tipo"], 
	                detalle: data.Detalles[0][i]["detalle"], 
	                cantidad: data.Detalles[0][i]["cantidad"], 
	                precio_u: data.Detalles[0][i]["precio_unitario"], 
	                total: data.Detalles[0][i]["precio_total"],
	            };				                
	            jQuery("#lista_factura").jqGrid('addRowData', $("#id_productoEmision").val()+"idp", datarow);			                				                	    	
	    	}            
	    	/*-------------------------*/
	    	$("#btn_guardarEmision").text("");
            $("#btn_guardarEmision").append("<span class='glyphicon glyphicon-log-in'></span> ---------");     
		}
	});		
}