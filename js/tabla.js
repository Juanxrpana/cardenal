//En esta parte añadiremos el codigo necesario para validar antes de enviar
//al servidor, anteriormente validamos las entradas, pero es necesario
//verificar antes de enviar que a pesar de que se le dijo al usuario que hacer
//este no haya pulsado 

mostrarproveedor();
mostrarmateria_prima();

function mostrarproveedor() {
    // La función realiza una petición AJAX al archivo mostrarproveedor.php
    console.log("entrando mostrando data proveedor");

    $.ajax({ url: './modelo/mostrarDatosProveedor.php' }).done(function(r) {
        // Cuando se recibe la respuesta de la petición AJAX, se agrega la tabla al elemento con el ID 'tablaDatosproveedor'
        console.log("Mostrando data proveedor satisfactoriamente");
        $('#tablaDatosproveedor').html(r);
    });
}

function mostrarmateria_prima() {
    // La función realiza una petición AJAX al archivo mostrarmateria_prima.php
    console.log("entrando mostrando data materia_prima");

    $.ajax({ url: './modelo/mostrarDatosmateria_prima.php' }).done(function(r) {
        // Cuando se recibe la respuesta de la petición AJAX, se agrega la tabla al elemento con el ID 'tablaDatosmateria_prima'
        console.log("Mostrando data materia_prima satisfactoriamente");
        $('#tablaDatosmateria_prima').html(r);
    });
}

$(document).on('click', '.borrar', function() {
    var rif = $(this).data("rif");
    if (confirm("Estas seguro de que quieres borrar este registro?:" + rif)) {
        $.ajax({

            method: "POST",
            data: {
                accion: "eliminar",
                rif: rif
            },

            success: function(data) {
                console.log(data);
                alert(data);
                mostrarproveedor();
            }
        })
    }
})