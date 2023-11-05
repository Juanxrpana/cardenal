$(document).ready(function() {
    mostrarDatosmateria_prima();
    llenarLista();

    var $form = $("#formulario");
    $form.on("submit", function(event) {
        event.preventDefault();
        var FormData = $form.serialize();
        console.log(FormData);
    })

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
        enviaAjax(datos, 'incluir');
        console.log('Con JSON.stringify: ' + JSON.stringify(datos));
        console.log(datos.get('datos'));
        datos.forEach((value, key) => {
            console.log(key, value);
        });
        //  }  

    });

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

            //si resulto exitosa la transmision
            if (accion == "consultar") {
                $("#proveedor").html(respuesta);
            }

            $("#hola").html(respuesta);
            /*  Swal.fire({
                 title: 'Proveedor ingresado exitosamente',
                 text: 'El proveedor ha sido registrado con éxito.',
                 icon: 'success',
                 timer: 4000, // Establece el tiempo en milisegundos (5 segundos en este caso)

             }).then((result) => {
                 if (result.dismiss === Swal.DismissReason.timer) {
                     // Esto se ejecutará después de que se cierre el mensaje automáticamente
                     console.log('Mensaje modal cerrado');
                 }
             }); */

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
    console.log("entrando mostrando data Datosmateria_prima");

    $.ajax({ url: './Modelo/mostrarDatosmateria_prima.php' }).done(function(r) {
        // Cuando se recibe la respuesta de la petición AJAX, se agrega la tabla al elemento con el ID 'tablaDatosDatosmateria_prima'
        console.log("Mostrando data satisfactoriamente");
        $('#tablaDatosmateria_prima').html(r);
    });
}