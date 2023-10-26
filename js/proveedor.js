//En esta parte añadiremos el codigo necesario para validar antes de enviar
//al servidor, anteriormente validamos las entradas, pero es necesario
//verificar antes de enviar que a pesar de que se le dijo al usuario que hacer
//este no haya pulsado 

document.getElementById('incluir').onclick = function() {

    /* a = valida_datos(); */
    /* if(a!=''){
    	$("#contenidodemodal").html(a);
    	$("#mostrarmodal").modal("show");
    	setTimeout(function() {
    			$("#mostrarmodal").modal("hide");
    	},4000);
    } */
    try {
        var datos = new FormData();
        datos.append('accion', 'incluir');
        datos.append('rif', $("#rif").val());
        datos.append('nombre', $("#nombre").val());
        datos.append('estado', $("#estado").val());
        datos.append('municipio', $("#municipio").val());
        datos.append('parroquia', $("#parroquia").val());
        datos.append('ciudad', $("#ciudad").val());
        datos.append('direccion', $("#direccion").val());
        datos.append('telefono', $("#telefono").val());
        enviaAjax(datos);
        limpia();
    } catch (error) {
        console.log("error en incluir");
        // Expected output: ReferenceError: nonExistentFunction is not defined
        // (Note: the exact output may be browser-dependent)
    }

}

document.getElementById('modificar').onclick = function() {
    /* a = valida_datos(); */
    /* if (a != '') {
        $("#contenidodemodal").html(a);
        $("#mostrarmodal").modal("show");
        setTimeout(function() {
            $("#mostrarmodal").modal("hide");
        }, 4000);
    } */
    try {
        var datos = new FormData();
        datos.append('accion', 'incluir');
        datos.append('rif', $("#rif").val());
        datos.append('nombre', $("#nombre").val());
        datos.append('estado', $("#estado").val());
        datos.append('municipio', $("#municipio").val());
        datos.append('parroquia', $("#parroquia").val());
        datos.append('ciudad', $("#ciudad").val());
        datos.append('direccion', $("#direccion").val());
        datos.append('telefono', $("#telefono").val());
        enviaAjax(datos);
        limpia();
    } catch (error) {
        console.log("error en modificar");
        // Expected output: ReferenceError: nonExistentFunction is not defined
        // (Note: the exact output may be browser-dependent)
    }

}

function mostrarproveedor() {
    // La función realiza una petición AJAX al archivo mostrarproveedor.php
    console.log("entrando mostrando data proveedor");

    $.ajax({ url: './Modelo/mostrarDatosproveedor.php' }).done(function(r) {
        // Cuando se recibe la respuesta de la petición AJAX, se agrega la tabla al elemento con el ID 'tablaDatosproveedor'
        console.log("Mostrando data proveedor satisfactoriamente");
        $('#tablaDatosproveedor').html(r);
    });
}

document.getElementById('eliminar').onclick = function() {

    /*  a = valida_datos();
     if (a != '') {
         $("#contenidodemodal").html(a);
         $("#mostrarmodal").modal("show");
         setTimeout(function() {
             $("#mostrarmodal").modal("hide");
         }, 4000);
     } */
    try {
        var datos = new FormData();
        datos.append('accion', 'eliminar');
        datos.append('rif', $("#rif").val());
        datos.append('rsocial', $("#rsocial").val());
        datos.append('telefonop', $("#telefonop").val());
        datos.append('direccion', $("#direccion").val());
        enviaAjax(datos);
        limpia();
    } catch (error) {
        console.log("error en eliminar");
        // Expected output: ReferenceError: nonExistentFunction is not defined
        // (Note: the exact output may be browser-dependent)
    }




}





//Ahora vamos a agregar una función para el envio de los datos por ajax
//La diferencia en este envio es que solo se manda los datos que se 
//requieran y no es necesario que el cliente recargue toda la pagina
//es un metodo muy usado cuando se quiere realizar consultas puntuales
//o se quiere hacer mas liguera la carga de la pagina (la vista)
function enviaAjax(datos) {
    $.ajax({
        async: true,
        url: '', //la pagina a donde se envia por estar en mvc, se omite la ruta ya que siempre estaremos en la misma pagina
        type: 'POST', //tipo de envio 
        contentType: false,
        data: datos,
        processData: false,
        cache: false,
        success: function(respuesta) { //si resulto exitosa la transmision
            Swal.fire({
                title: 'Proveedor ingresado exitosamente',
                text: 'El proveedor ha sido registrado con éxito.',
                icon: 'success',
                timer: 4000, // Establece el tiempo en milisegundos (5 segundos en este caso)

            }).then((result) => {
                if (result.dismiss === Swal.DismissReason.timer) {
                    // Esto se ejecutará después de que se cierre el mensaje automáticamente
                    console.log('Mensaje modal cerrado');
                }
            });

        },
        error: function() {
            Swal.fire({
                title: 'Error al ingresar el proveedor',
                text: 'Hubo un problema al registrar el proveedor.',
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


function limpia() {
    $("#rif").val('');
    $("#nombre").val('');
    $("#estado").val($("#estado option:first").val());
    $("#municipio").val($("#municipio option:first").val());
    $("#parroquia").val($("#parroquia option:first").val());
    $("#ciudad").val($("#ciudad option:first").val());
    $("#direccion").val('');
    $("#telefono").val('');
}

function prototipo() {
    Swal.fire({
        title: 'Error al ingresar el proveedor',
        text: 'Hubo un problema al registrar el proveedor:' + nombreprov,
        icon: 'warning',
        timer: 4000, // Establece el tiempo en milisegundos (5 segundos en este caso)

    }).then((result) => {
        if (result.dismiss === Swal.DismissReason.timer) {
            // Esto se ejecutará después de que se cierre el mensaje automáticamente
            console.log('Mensaje modal de error cerrado');
        }
    });
}