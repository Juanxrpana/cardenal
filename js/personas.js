$(document).ready(function() {
    // La función se ejecutará cuando el documento esté listo
    console.log("jquery");
    mostrarPersonas();


});


$("#incluir").on("click", function() {
    var datos = new FormData();
    datos.append('accion', 'incluir');
    datos.append('id_persona', $("#id_persona").val());
    datos.append('nombre', $("#nombre").val());
    datos.append('nombre1', $("#nombre1").val());
    datos.append('apellido', $("#apellido").val());
    datos.append('apellido1', $("#apellido1").val());
    datos.append('telefono', $("#telefono").val());
    datos.append('rif', $("#rif").val());
    datos.append('tipo_cliente_id', $("#tipo_cliente_id").val());
    enviar(datos);
});



/*function agregarPersona() {



    var datos = new FormData();
    datos.append('accion','incluir');
    datos.append('id_persona', $("#id_persona").val());
    datos.append('nombre', $("#nombre").val());
    datos.append('apellido', $("#apellido").val());
    datos.append('telefono', $("#telefono").val());
    datos.append('rif', $("#rif").val());
    datos.append('tipo_cliente_id', $("#tipo_cliente_id").val());
    enviar(datos);

}*/

function enviar(datos) {

    console.log($("#id_persona").val());


    // for (const entry of datos) {
    //     console.log(entry[0] + ': ' + entry[1]);
    //  }

    console.log(datos); /* pa saber si tomó los datos */

    console.log('A pelo: ' + datos);
    console.log('Con JSON.stringify: ' + JSON.stringify(datos));


    $.ajax({
        async: true,
        url: '', //la pagina a donde se envia por estar en mvc, se omite la ruta ya que siempre estaremos en la misma pagina
        type: 'POST', //tipo de envio
        contentType: false,
        data: datos,
        processData: false,
        cache: false,
        success: function(response) { //si resulto exitosa la transmision
            console.log("entrando a insertar con Ajax");

            if (false) {
                swal({
                    title: "Hay un error",
                    text: "Algo está mal, vuelve a chequear la conexión",
                    icon: "warning",
                    button: "Salir",
                });
            } else {
                console.log(response);
                // Éxito en la respuesta del servidor
                swal({
                    title: "Registrado",
                    text: "¿Qué acción desea realizar?",
                    icon: "success",
                    buttons: {
                        salir: "Salir",
                        comprarCafe: {
                            text: "Comprar Café",
                            value: "comprar",
                        },
                        venderCafe: {
                            text: "Vender Café",
                            value: "vender",
                        },
                    },
                }).then((value) => {
                    if (value === "comprar") {
                        // Acción cuando se presiona "Comprar Café"
                        window.location.href = "?pagina=modulo2";
                    } else if (value === "vender") {
                        // Acción cuando se presiona "Vender Café"
                        window.location.href = "?pagina=modulo3";
                    } else {
                        // Acción cuando se presiona "Salir" o se cierra el SweetAlert
                    }
                });
            }
        },
        error: function(xhr, textStatus, errorThrown) {
            // Manejo de error en la solicitud AJAX
            console.log("Error en la solicitud AJAX:");
            console.log("Estado: " + textStatus);
            console.log("Error: " + errorThrown);
        }
    });


}


function mostrarPersonas() {
    // La función realiza una petición AJAX al archivo mostrarPersonas.php
    console.log("entrando mostrando data personas");

    $.ajax({ url: './Modelo/mostrarDatosPersonas.php' }).done(function(r) {
        // Cuando se recibe la respuesta de la petición AJAX, se agrega la tabla al elemento con el ID 'tablaDatosPersonas'
        console.log("Mostrando data Personas satisfactoriamente");
        $('#tablaDatosPersonas').html(r);
    });
}

function eliminarPersona(id_persona) {
    console.log("Valor de id_persona:", id_persona);

    if ($.isNumeric(id_persona)) {
        // Realiza una solicitud AJAX para eliminar la persona
        $.ajax({
            url: './controlador/persona.php',
            type: 'POST',
            dataType: 'json',
            data: {
                accion: 'eliminar',
                id_persona: id_persona
            },

            success: function(response) {
                // Maneja la respuesta del servidor (puede ser un mensaje de éxito o error)
                if (response.status === 'success') {
                    // Si la eliminación fue exitosa, puedes hacer lo que necesites aquí
                    console.log("Persona eliminada con éxito");
                } else {
                    // Si hubo un error en la eliminación, muestra un mensaje de error
                    console.error("Error al eliminar la persona: " + response.message);
                }
            },
            error: function(xhr, status, error) {
                // Maneja errores en la solicitud AJAX (por ejemplo, problemas de conexión)
                console.error("Error en la solicitud AJAX: " + error);
            }
        });
    } else {
        // Si no se obtuvo un id_persona válido, muestra un mensaje de error
        console.error("ID de persona no válido");
    }
}







// Obtén los elementos HTML de las secciones
const clienteNaturalSection = document.getElementById("clienteNaturalSection");
const organizacionSection = document.getElementById("organizacionSection");
const siguienteClienteNatural = document.getElementById("siguienteClienteNatural");
const siguienteOrganizacion = document.getElementById("siguienteOrganizacion");


// Obtén el botón "Siguiente" del primer formulario
const siguiente = document.getElementById("siguiente");


// Maneja el evento clic del botón "Siguiente" del primer formulario
siguiente.addEventListener("click", function() {
    // Oculta el formulario actual
    document.getElementById("formulario").style.display = "none";

    // Muestra las secciones correspondientes
    clienteNaturalSection.style.display = "block";
    organizacionSection.style.display = "block";
    console.log("siguiente pagina");
});

// Obtén el botón "Atrás" del segundo formulario (Organización)
const atras = document.getElementById("atras");
// Maneja el evento clic del botón "atras" del segundo formulario
atras.addEventListener("click", function() {
    // Oculta el formulario actual
    document.getElementById("formulario").style.display = "none";

    // Muestra las secciones correspondientes
    clienteNaturalSection.style.display = "block";
    organizacionSection.style.display = "block";
    console.log("anterior pagina");
});



// Maneja el evento clic del botón "Cliente Natural"
/*siguienteClienteNatural.addEventListener("click", function(event) {
    // Aquí puedes realizar acciones específicas para Cliente Natural

    // Por ejemplo, puedes enviar datos a tu servidor si es necesario
    event.preventDefault();
    agregarPersona();
    // Luego, puedes ocultar la sección de Cliente Natural
    clienteNaturalSection.style.display = "block";

    // Mostrar la siguiente parte o realizar acciones adicionales
    console.log("guardar");
});*/

// Maneja el evento clic del botón "Organización"
siguienteOrganizacion.addEventListener("click", function() {
    // Aquí puedes realizar acciones específicas para Organización

    // Por ejemplo, puedes enviar datos a tu servidor si es necesario

    // Luego, puedes ocultar la sección de Organización
    organizacionSection.style.display = "none";

    // Mostrar la siguiente parte o realizar acciones adicionales
});