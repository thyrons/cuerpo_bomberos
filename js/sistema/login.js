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
	    		alert("Mensaje del servidor","Bienvenido");
	    		location.href='html/index.php';
	    	}
	    	else{
	    		if(data==2){
	    			alert("Mensaje del servidor","Usuario o clave incorrectas vuelva a ingresar");
	    		}else{
	    			if(data==3){
		    			alert("Mensaje del servidor","Complete todos los campos para poder continuar");
	    			}else{
	    				alert("Intente nuevamente","Error.. al momento de enviar datos");
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
var oAlert = alert;
function alert(title,texto){
	try{
		$.prompt(texto, {
	       	title: title,
    	   	buttons: { "Aceptar": true},
    	   	submit:function(e){
    	   		limpiar();
    	   	},
    	   	close:function(e){
    	   		limpiar();	
    	   	}
    	});
	}catch (e){
		oAlert(texto);
	}
}

        
   

