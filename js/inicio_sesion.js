$(document).ready(function(){

//Seccion para mostrar lo enviado en el modal mensaje//

//Función que verifica que exista algo dentro de un div
//oculto y lo muestra por el modal
if($.trim($("#mensajes").text()) != ""){
	mensajemodal($("#mensajes").html());
}


$("#iniciar").on("click", function(){
		if (validarboton()) {
			$("#accion_inicio_sesion").val("usuario");
			$("#f").submit();
		}
	});
$("#usuario").on("keypress",function(e){
    validarkeypress(/^[A-Z0-9-\b]*$/,e);
    });
$("#usuario").on("keyup",function(){
    validarkeyup(/^[VE]{1}[-]{1}[0-9]{6,8}$/,$(this),
    $("#pCiRepre"),"El formato debe ser V-10123123 ");
});

$("#contra").on("keypress",function(e){
    validarkeypress(/^[0-9a-zA-Z*\b-]*$/,e);
    });
$("#contra").on("keyup",function(){
	    validarkeyup(/^[0-9a-zA-Z*\b-]{4,10}$/,$(this),$("#sclave"),"De 4 a 10 caracteres");
	});




});

//console.log("aisdioj");


function mensajemodal(mensaje){
		
	$("#contenidodemodal").html(mensaje);
	$("#mostrarmodal").modal("show");
	setTimeout(function() {
		$("#mostrarmodal").modal("hide");
	},4000);
}

function validarboton(){
	return true;
}

//Función para validar por Keypress
function validarkeypress(er,e){

	key = e.keyCode;


    tecla = String.fromCharCode(key);


    a = er.test(tecla);

    if(!a){

		e.preventDefault();
    }


}
//Función para validar por keyup
function validarkeyup(er,etiqueta,etiquetamensaje,
mensaje){
	a = er.test(etiqueta.val());
	if(a){
		etiquetamensaje.text("");
		//console.log("A1");
		return 1;
	}
	else{
		etiquetamensaje.text(mensaje);
		return 0;
	}
}