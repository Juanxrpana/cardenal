$(document).ready(function() {
    llenarLista();
    mostrarDatosproveedor();




    $("#incluir").on("click", function() {
        alert("ingresas un nuevo proveedor");
        var datos = new FormData();
        datos.append('accion', 'incluir');
        datos.append('cedula_fiscal_id', $("#cedula_fiscal_id").val());
        datos.append('identificacion', $("#identificacion").val());
        datos.append('telefono', $("#telefono").val());
        datos.append('nombre_prov', $("#nombre_prov").val());
        datos.append('nombre_finca', $("#nombre_finca").val());
        datos.append('estado', $("#estado").val());
        datos.append('municipio', $("#municipio").val());
        datos.append('parroquia', $("#parroquia").val());
        datos.append('ciudad', $("#ciudad").val());
        datos.append('ubicacion', $("#ubicacion").val());
        datos.append('coordenadas', $("#coordenadas").val());
        enviaAjax(datos, 'incluir');
    });



});

function borrarproveedor(valor) {
    var datos = new FormData();
    datos.append('accion', 'eliminar');
    datos.append('id_prov', valor);
    enviaAjax(datos, 'eliminar');
}

function modificarDatos(valor) {
    alert("ingresas un nuevo proveedor");
    var datos = new FormData();
    datos.append('accion', 'incluir');
    datos.append('cedula_fiscal_id', $("#cedula_fiscal_id").val());
    datos.append('identificacion', $("#identificacion").val());
    datos.append('telefono', $("#telefono").val());
    datos.append('nombre_prov', $("#nombre_prov").val());
    datos.append('nombre_finca', $("#nombre_finca").val());
    datos.append('estado', $("#estado").val());
    datos.append('municipio', $("#municipio").val());
    datos.append('parroquia', $("#parroquia").val());
    datos.append('ciudad', $("#ciudad").val());
    datos.append('ubicacion', $("#ubicacion").val());
    datos.append('coordenadas', $("#coordenadas").val());
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
                $("#cedula_fiscal_id").html(respuesta);
            } else {

                mostrarDatosproveedor();



                $("#hola").html(respuesta);
                Swal.fire({
                    title: 'Registrado exitosamente',
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
                title: 'Error al ingresar los datos',
                text: 'Hubo un problema al registrar los datos.',
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

function mostrarDatosproveedor() {
    // La función realiza una petición AJAX al archivo mostrarDatosmateria_prima.php
    console.log("entrando data DatosProveedor");

    $.ajax({ url: './Modelo/mostrarDatosProveedor.php' }).done(function(r) {
        // Cuando se recibe la respuesta de la petición AJAX, se agrega la tabla al elemento con el ID 'tablaDatosDatosProveedor'
        console.log("Mostrando data satisfactoriamente");
        $('#tablaDatosProveedor').html(r);
    });
}