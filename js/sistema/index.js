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
			$(this).removeClass("active");
		});
		$("#"+tab).addClass("active");
	}
	/*activar contenido de las listas*/
	$('a').on('click', function(e){
	  	var href = $(this).attr('href');
		var tab = href.split('#').pop();
	//Desactivar todo el contenido
		$('.tab_index ul li').each(function(){
	    	$(this).removeClass("active");
		});
		$(this).parent().addClass("active");
		$('.content_index div').each(function(){
			$(this).removeClass("active");
		});
		$("#"+tab).addClass("active");
	});
	/*----------------------------*/

}
