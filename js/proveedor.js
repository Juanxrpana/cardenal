$(document).ready(function() {


    validarenvio();
    validarselect();
    llenarLista();
    mostrarDatosproveedor();

    $("#incluir").on("click", function() {


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
        if (validarenvio() && validarselect()) {
            // Si todos los campos son válidos, envía los datos al servidor
            enviaAjax(datos, 'incluir');
        } else {
            // Muestra un mensaje de error con SweetAlert
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Hay campos incorrectos. Por favor, verifica la información.'
            });
        }

    });



});




function borrarproveedor(valor) {
    var datos = new FormData();
    datos.append('accion', 'eliminar');
    datos.append('id_prov', valor);
    enviaAjax(datos, 'eliminar');
}

function modificarDatos(valor) {

    var datos = new FormData();
    datos.append('accion', 'modificar');
    datos.append('id_prov', valor);
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
    if (validarenvio() && validarselect()) {
        // Si todos los campos son válidos, envía los datos al servidor
        enviaAjax(datos, 'incluir');
    } else {
        // Muestra un mensaje de error con SweetAlert
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Hay campos incorrectos. Por favor, verifica la información.'
        });
    }
};







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
                    title: 'Eliminado exitosamente',
                    text: respuesta,
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
                title: 'Error en los datos',
                text: 'Hubo un problema al eliminar los datos.',
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
    /*  console.log("entrando data DatosProveedor"); */

    $.ajax({ url: './Modelo/mostrarDatosProveedor.php' }).done(function(r) {
        // Cuando se recibe la respuesta de la petición AJAX, se agrega la tabla al elemento con el ID 'tablaDatosDatosProveedor'
        /*  console.log("Mostrando data satisfactoriamente"); */
        $('#tablaDatosProveedor').html(r);
        $('#tproveedor').DataTable({
            "language": {
                "url": "./js/es-ES.json"
            }
        });

    });
}

function validarenvio() {
    const identificacion = document.getElementById("identificacion");
    const telefono = document.getElementById("telefono");
    const proveedor = document.getElementById("nombre_prov");
    const finca = document.getElementById("nombre_finca");
    const estado = document.getElementById("estado");
    const municipio = document.getElementById("municipio");
    const parroquia = document.getElementById("parroquia");
    const ciudad = document.getElementById("ciudad");
    const ubicacion = document.getElementById("ubicacion");

    const validacion = (message, e) => {
        const value = e.target;
        const campovalue = e.target.value;

        if (campovalue.trim().length < 3) {
            value.classList.add("invalido");
            value.nextElementSibling.classList.add("error");
            value.nextElementSibling.innerText = message;
        } else {
            value.classList.remove("invalido");
            value.nextElementSibling.classList.remove("error");
            value.nextElementSibling.innerText = "";

        }
    }

    identificacion.addEventListener("blur", (e) => validacion("cedula no debe estar vacio", e));
    telefono.addEventListener("blur", (e) => validacion("telefono no debe estar vacio", e));
    proveedor.addEventListener("blur", (e) => validacion("Los datos del proveedor no debe estar vacio", e));
    finca.addEventListener("blur", (e) => validacion("finca no debe estar vacio", e));

    estado.addEventListener("blur", (e) => validacion("Estado no debe estar vacio", e));
    municipio.addEventListener("blur", (e) => validacion("Municipio no debe estar vacio", e));
    parroquia.addEventListener("blur", (e) => validacion("Parroquia no debe estar vacio", e));
    ciudad.addEventListener("blur", (e) => validacion("Ciudad no debe estar vacio", e));
    ubicacion.addEventListener("blur", (e) => validacion("No debe estar vacio", e));

    const validacion1 = e => {
        const value = e.target;
        const campovalue = e.target.value;
        const regex = /^[0-9]{8}$/;
        console.log(regex.test(value.value))
        if (campovalue.trim().length < 8 && !regex.test(campovalue)) {
            value.classList.add("invalido");
            value.nextElementSibling.classList.add("error");
            value.nextElementSibling.innerText = "No se toman letras y caratecres limite de 8 numeros";
        } else {
            value.classList.remove("invalido");
            value.nextElementSibling.classList.remove("error");
            value.nextElementSibling.innerText = "";

        }
    }

    identificacion.addEventListener("blur", validacion1)

    const validacion2 = e => {
        const value = e.target;
        const campovalue = e.target.value;
        const regex = /^(0412|0416|0414|0424|0426)[0-9]{7}$/;
        console.log(regex.test(value.value))
        if (campovalue.trim().length < 11 && !regex.test(campovalue)) {
            value.classList.add("invalido");
            value.nextElementSibling.classList.add("error");
            value.nextElementSibling.innerText = "ingresar numero de telefono valido";
        } else {
            value.classList.remove("invalido");
            value.nextElementSibling.classList.remove("error");
            value.nextElementSibling.innerText = "";

        }
    }
    telefono.addEventListener("input", validacion2)

    const validacion3 = e => {
        const value = e.target;
        const campovalue = e.target.value;
        const regex = /^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ\s.0-9]{3,45}$/;

        if (campovalue.trim().length < 5 || !regex.test(campovalue)) {
            value.classList.add("invalido");
            value.nextElementSibling.classList.add("error");
            value.nextElementSibling.innerText = "Debe tener al menos 3 caracteres y máximo 20";
        } else {
            value.classList.remove("invalido");
            value.nextElementSibling.classList.remove("error");
            value.nextElementSibling.innerText = "";
        }
    }



    const validacion4 = e => {
        const value = e.target;
        const campovalue = e.target.value;
        const regex = /^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ\s]{3,20}$/;

        if (campovalue.trim().length < 3 || !regex.test(campovalue)) {
            value.classList.add("invalido");
            value.nextElementSibling.classList.add("error");
            value.nextElementSibling.innerText = "Debe tener al menos 3 caracteres y máximo 20";
        } else {
            value.classList.remove("invalido");
            value.nextElementSibling.classList.remove("error");
            value.nextElementSibling.innerText = "";
        }
    }

    proveedor.addEventListener("blur", validacion3);
    finca.addEventListener("blur", validacion3);
    estado.addEventListener("blur", validacion4);
    municipio.addEventListener("blur", validacion4);
    parroquia.addEventListener("blur", validacion4);
    ciudad.addEventListener("blur", validacion4);
    ubicacion.addEventListener("blur", validacion3);


    return !(identificacion.classList.contains("invalido") || telefono.classList.contains("invalido") || proveedor.classList.contains("invalido") ||
        estado.classList.contains("invalido") || municipio.classList.contains("invalido") || parroquia.classList.contains("invalido") ||
        ciudad.classList.contains("invalido") || ubicacion.classList.contains("invalido"));

}


function validarselect() {
    // Obtener los valores de los campos select
    var valorOpcion1 = document.getElementById('cedula_fiscal_id').value;

    // Validar si alguno de los campos tiene valor 0
    if (valorOpcion1 === '0') {
        console.log("fuera d ranking");

        return false; // Evita que el formulario se envíe
    }

    // Si llegamos aquí, el formulario es válido y se puede enviar
    return true;
}