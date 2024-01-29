$(document).ready(function() {




    //Seccion para mostrar lo enviado en el modal mensaje//

    //Función que verifica que exista algo dentro de un div
    //oculto y lo muestra por el modal
    if ($.trim($("#mensajes").text()) != "") {
        mensajemodal($("#mensajes").html());
    }


    $("#iniciar").on("click", function() {
        if (validarboton()) {
            $("#accion_inicio_sesion").val("usuario");
            $("#f").submit();
        }
    });
    $("#usuario").on("keypress", function(e) {
        validarkeypress(/^[A-Z0-9-\b]*$/, e);
    });
    $("#usuario").on("keyup", function() {
        validarkeyup(/^[VE]{1}[-]{1}[0-9]{6,8}$/, $(this),
            $("#pCiRepre"), "El formato debe ser V-10123123 ");
    });

    $("#contra").on("keypress", function(e) {
        validarkeypress(/^[0-9a-zA-Z*\b-]*$/, e);
    });
    $("#contra").on("keyup", function() {
        validarkeyup(/^[0-9a-zA-Z*\b-]{4,10}$/, $(this), $("#sclave"), "De 4 a 10 caracteres");
    });


    $("#incluir").on("click", function() {
        var datos = new FormData();
        datos.append('accion', 'incluir');
        datos.append('nuevo_usuario', $("#nuevo_usuario").val());
        datos.append('clave', $("#clave").val());
        datos.append('nombres', $("#nombres").val());
        datos.append('apellidos', $("#apellidos").val());
        datos.append('id_pregunta_s', $("#preguntaSeguridad").val());
        datos.append('respuesta', $("#respuestaSeguridad").val());
        enviaAjax(datos, 'incluir');
    });

    $("#registrarse").on("click", function() {
        llenarLista();
    })
});

function enviaAjax(datos, accion) {
    $.ajax({
        async: true,
        url: '', //la pagina a donde se envia por estar en mvc, se omite la ruta ya que siempre estaremos en la misma pagina
        type: 'POST', //tipo de envio 
        contentType: false,
        data: datos,
        processData: false,
        cache: false,
        success: function(respuesta) {
            console.log(respuesta);
            //si resulto exitosa la transmision
            if (accion == "consultar") {
                $("#id_pregunta_s").html(respuesta);
            } else {
                Swal.fire({
                    title: 'Usuario registrado exitosamente',
                    text: "",
                    icon: 'success',
                    timer: 4000, // Establece el tiempo en milisegundos (5 segundos en este caso)

                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                        // Esto se ejecutará después de que se cierre el mensaje automáticamente
                        console.log('Mensaje modal cerrado');
                    }
                });

            }
        },
        error: function() {

            Swal.fire({
                title: 'Error al ingresar la materia primar',
                text: 'Hubo un problema al registrar la materia primar.',
                icon: 'error',
                timer: 4000, // Establece el tiempo en milisegundos (5 segundos en este caso)
                showConfirmButton: false // Oculta el botón "Aceptar"
            }).then((result) => {
                if (result.dismiss === Swal.DismissReason.timer) {
                    // Esto se ejecutará después de que se cierre el mensaje automáticamente
                    console.log('Mensaje modal de error cerrado');
                }
            });


        }

    });


}


function llenarLista() {
    console.log("llena lista");
    var datos = new FormData();
    datos.append('accion', 'consultar');
    enviaAjax(datos, 'consultar');
}


//console.log("aisdioj");


function mensajemodal(mensaje) {

    $("#contenidodemodal").html(mensaje);
    $("#mostrarmodal").modal("show");
    setTimeout(function() {
        $("#mostrarmodal").modal("hide");
    }, 4000);
}

function validarboton() {
    return true;
}

//Función para validar por Keypress
function validarkeypress(er, e) {

    key = e.keyCode;


    tecla = String.fromCharCode(key);


    a = er.test(tecla);

    if (!a) {

        e.preventDefault();
    }


}
//Función para validar por keyup
function validarkeyup(er, etiqueta, etiquetamensaje,
    mensaje) {
    a = er.test(etiqueta.val());
    if (a) {
        etiquetamensaje.text("");
        //console.log("A1");
        return 1;
    } else {
        etiquetamensaje.text(mensaje);
        return 0;
    }
}