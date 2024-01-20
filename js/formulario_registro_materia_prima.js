$(document).ready(function() {

    mostrarDatosmateria_prima();
    llenarLista();





    $("#incluir").on("click", function() {
        // if(validarenvio()){
        //console.log("I1")

        var datos = new FormData();
        datos.append('accion', 'incluir');
        datos.append('proveedor', $("#proveedor").val());
        datos.append('fecha', $("#fecha").val());
        datos.append('calidad1', $("#calidad1").val());
        datos.append('calidad2', $("#calidad2").val());
        datos.append('cantidad1', $("#cantidad1").val());
        datos.append('cantidad2', $("#cantidad2").val());


        if (validarSuma() && validarselect()) {
            // Si todos los campos son válidos, envía los datos al servidor
            enviaAjax(datos, 'incluir');
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Hay un error en los datos. Por favor, verifica los datos.'
            });
        }


    });



});

//  }  


function validarSuma() {
    console.log("validarSuma");
    var cantidad1 = parseInt(document.getElementById('cantidad1').value) || 0;
    var cantidad2 = parseInt(document.getElementById('cantidad2').value) || 0;
    var suma = cantidad1 + cantidad2;

    if (suma > 2010) {
        // Utilizar SweetAlert para mostrar el mensaje
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'La suma total de quintales no puede ser mayor a 2010',
        });
        return false;
    } else {
        // Utilizar SweetAlert para mostrar el mensaje
        Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: 'La suma de quintaleses: ' + suma,
        });
        return true;

    }
}


function validarselect() {
    console.log("validarselect");
    // Obtener los valores de los campos select
    var valorOpcion1 = document.getElementById('proveedor').value;

    // Validar si alguno de los campos tiene valor 0
    if (valorOpcion1 === '1000') {
        console.log("fuera d ranking");

        return false; // Evita que el formulario se envíe
    }

    // Si llegamos aquí, el formulario es válido y se puede enviar
    else {
        return true;
        console.log("en ranking");
    }
}

function borrarmateria_prima(valor) {
    var datos = new FormData();
    datos.append('accion', 'eliminar');
    datos.append('idcompra', valor);
    enviaAjax(datos, 'eliminar');


}

function modificarDatos(valor) {
    var datos = new FormData();
    alert("gola");
    datos.append('accion', 'modificar');
    datos.append('fecha', $("#fecha").val());
    datos.append('calidad1', $("#calidad1").val());
    datos.append('calidad2', $("#calidad2").val());
    datos.append('cantidad1', $("#cantidad1").val());
    datos.append('cantidad2', $("#cantidad2").val());
    console.log(valor);
    console.log("sadasd");
    datos.append('idcompra', valor);
    enviaAjax(datos, 'modificar');


}

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

            //si resulto exitosa la transmision
            if (accion == "consultar") {
                $("#proveedor").html(respuesta);
            } else {

                mostrarDatosmateria_prima();
                llenar_contador_total();



                $("#hola").html(respuesta);
                Swal.fire({
                    title: 'Proveedor ingresado exitosamente',
                    text: respuesta,
                    icon: 'success',
                    timer: 4033330, // Establece el tiempo en milisegundos (5 segundos en este caso)

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

function llenarLista() {
    var datos = new FormData();
    datos.append('accion', 'consultar');
    enviaAjax(datos, 'consultar');
}



function mostrarDatosmateria_prima() {
    // La función realiza una petición AJAX al archivo mostrarDatosmateria_prima.php
    /*  console.log("entrando mostrando data Datosmateria_prima"); */

    $.ajax({ url: './Modelo/mostrarDatosmateria_prima.php' }).done(function(r) {
        // Cuando se recibe la respuesta de la petición AJAX, se agrega la tabla al elemento con el ID 'tablaDatosDatosmateria_prima'
        console.log("Mostrando data de materiaprima satisfactoriamente");
        $('#tablaDatosmateria_prima').html(r);
    });

}

function llenar_contador_total() {
    $.ajax({ url: './Modelo/contador_materia_prima.php' }).done(function(r) {
        console.log("Mostrando contador satisfactoriamente");
        $('#contador_materia_prima').html(r);
    });
}