$(document).ready(function() {

    mostrarDatosmateria_prima();
    llenarLista();



    $("#incluir").on("click", function() {
        // if(validarenvio()){
        //console.log("I1")
        alert("Funciona");
        var datos = new FormData();
        datos.append('accion', 'incluir');
        datos.append('proveedor', $("#proveedor").val());
        datos.append('fecha', $("#fecha").val());
        datos.append('calidad1', $("#calidad1").val());
        datos.append('calidad2', $("#calidad2").val());
        datos.append('cantidad1', $("#cantidad1").val());
        datos.append('cantidad2', $("#cantidad2").val());

        enviaAjax(datos, 'incluir');

    });



});

//  }  



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