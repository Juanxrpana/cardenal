$(document).ready(function() {
    mostrarDatoscafe_tostado_final();
    mostrarDatoscafe_final();


});


function incluir_final(valor) {

    var cantidad = document.getElementById('cantidad').innerText;
    var cantidad_paquetes = (parseFloat(cantidad) * 37) / 5;
    var cantidad_paquetesredondeado = Math.round(cantidad_paquetes, 2);
    var idcafe_tostado = valor;
    var datos = new FormData();
    datos.append('accion', 'incluir');
    datos.append('idcafe_tostado', idcafe_tostado); //toma el id de la tabla
    datos.append('cantidad_paquetes', cantidad_paquetes);
    console.log(valor);
    console.log("cantidad" + cantidad);
    console.log("Cantidad Paquetes: " + cantidad_paquetes);
    console.log("Cantidad Paquetesredondeado: " + cantidad_paquetesredondeado);

    enviaAjax(datos, 'incluir');


}


function borrarcafe_tostado(valor) {
    var datos = new FormData();
    datos.append('accion', 'eliminar');
    datos.append('idcafe_tostado', valor);
    enviaAjax(datos, 'eliminar');


}

function modificarDatos(valor) {
    var datos = new FormData();
    alert("Modificar funciona");
    datos.append('accion', 'modificar');
    datos.append('nivel_tostado', $("#nivel_tostado").val());
    datos.append('nivel_molido', $("#nivel_molido").val());
    console.log(valor);
    console.log("sadasd");
    datos.append('idcafe_tostado', valor);
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
                /*  mostrarDatoscafe_tostado_final();
                mostrarDatoscafe_final();
 */

                /*  mostrarcontador(); */

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

function mostrarDatoscafe_final() {
    // La función realiza una petición AJAX al archivo mostrarDatoscafe_tostado.php
    /*  console.log("entrando mostrando data Datoscafe_tostado"); */

    $.ajax({ url: './Modelo/mostrarDatoscafe_final.php' }).done(function(r) {
        // Cuando se recibe la respuesta de la petición AJAX, se agrega la tabla al elemento con el ID 'tablaDatosDatoscafe_tostado'
        console.log("Mostrando data de cafe final");

        $('#tablaDatoscafe_final').html(r);
        $('#tabla_cafe_final').DataTable({
            "language": {
                "url": "./js/es-ES.json"
            }
        });
        /* mostrarcontador(); */
    });
}

function mostrarDatoscafe_tostado_final() {
    // La función realiza una petición AJAX al archivo mostrarDatoscafe_tostado.php
    /*  console.log("entrando mostrando data Datoscafe_tostado"); */

    $.ajax({ url: './Modelo/mostrarDatoscafe_tostado_final.php' }).done(function(r) {
        // Cuando se recibe la respuesta de la petición AJAX, se agrega la tabla al elemento con el ID 'tablaDatosDatoscafe_tostado'
        console.log("Mostrando data de cafe tostado satisfactoriamente");
        $('#tablaDatoscafe_tostado_final').html(r);
        $('#tabla_cafe_tostado').DataTable({
            "language": {
                "url": "./js/es-ES.json"
            }
        });
        /*  mostrarcontador(); */
    });
}

/* function mostrarcontador() {
    $.ajax({ url: './Modelo/contador_cafe_tostado.php' }).done(function(r) {
        console.log("Mostrando contador satisfactoriamente");
        $('#contador_cafe_tostado').html(r);
    });
} */