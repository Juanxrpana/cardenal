// Captura los elementos de los formularios y botones
const formulario1 = document.getElementById("frminsertproveedor");
const formulario2 = document.getElementById("frminsertproveedor2");
const botonSiguiente = document.getElementById("incluir2");
const botonGuardar = document.getElementById("guardar2");

// Agrega un evento de clic al botón "Siguiente" para cambiar de formulario
botonSiguiente.addEventListener("click", () => {
    formulario1.style.display = "none";
    formulario2.style.display = "block";
});

// Agrega un evento de clic al botón "Guardar" para enviar el formulario o hacer lo que necesites
botonGuardar.addEventListener("click", () => {
    // Aquí puedes agregar la lógica para guardar el formulario
    // Por ejemplo, puedes enviar una solicitud AJAX o realizar una acción en el backend
    // Después de guardar, puedes redirigir o realizar cualquier otra acción necesaria
});

// Captura el botón "Volver" y el formulario 1
const botonVolver1 = document.getElementById("volver1");
const formulario1 = document.getElementById("frminsertproveedor");
const formulario2 = document.getElementById("frminsertproveedor2");

// Agrega un evento de clic al botón "Volver" para regresar al formulario 1
botonVolver1.addEventListener("click", () => {
    formulario2.style.display = "none";
    formulario1.style.display = "block";
});