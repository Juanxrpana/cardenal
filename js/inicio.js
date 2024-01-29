$(document).ready(function() {

});

document.addEventListener('DOMContentLoaded', function() {
    var nivel_usuario = document.getElementById("nivelUsuario").value;
    // Obtener el elemento de la lista de proveedores y si es usuario, entonces se elimina proveedores
    if (nivel_usuario == 1) {

        proveedores = document.getElementById("proveedor-lista");
        if (proveedores) {
            console.log("Eliminando proveedores");
            proveedores.parentNode.removeChild(proveedores);
        };


    }

});