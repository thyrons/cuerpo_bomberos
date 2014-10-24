$(document).on("ready",inicio);
function inicio(){
	$("#btn_loginIngreso").on("click",ingresoLogin);
	$("#btn_loginLimpiar").on("click",limpiar);
}
function ingresoLogin(){
	if($("#txt_loginUsuario").val()!="" && $("#txt_loginPass").val()!=""){
		$("#form_loginUsuario").on("submit",function (e){		
			var valores = $("#form_loginUsuario").serialize();
			comprobar(valores);
			e.preventDefault();
    		$(this).unbind("submit")
		});
	}
}
function comprobar(valores){
	$.ajax({				
		type: "POST",
		data: valores,
		url: "servidor/login/login_usuario.php",			
	    success: function(data) {	
	    	if(data==1){
	    		alertify.confirm("<b>Datos Correctos. Desea Ingresar?</b>", function(e){
	    			if(e){
	    				location.href='html/index.php';	
	    			}else{
	    				alertify.error('Ingreso Cancelado');	
	    				limpiar();
	    			}
  				});
	    	}
	    	else{
	    		if(data==2){
	    			alertify.alert("<b>Usuario o clave incorrectas vuelva a ingresar</b>", function () {
						alertify.error('Vuelva a ingresar los datos');	
						limpiar();	
					});

	    		}else{
	    			if(data==3){
	    				alertify.alert("<b>Complete todos los campos para poder continuar</b>", function () {});

	    			}else{
	    				alertify.alert("<b>Error.. al momento de enviar datos</b>", function () {});
	    			}
	    		}
	    	}
		}
	}); 
}
function limpiar(){
	$("#txt_loginUsuario").val("");
	$("#txt_loginPass").val("");
	$("#txt_loginUsuario").focus();
}

   

