$(document).ready(function() {
    validacion_user();

});

function validacion_user() {
    $.ajax({ url: './Modelo/validacion_user.php' }).done(function(r) {
        console.log("Mostrando user");
        $('#id_user').html(r);
    });
}