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
        console.log("error en eliminar");
        // Expected output: ReferenceError: nonExistentFunction is not defined
        // (Note: the exact output may be browser-dependent)
    }




}