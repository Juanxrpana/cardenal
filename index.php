<?php  
	session_start();
	if (!isset($_SESSION['nombre'])) {
		header('Location: ./vista/login.php');
	}
	else{
		echo "Conexion exitosa";
	}
?>
<?php


$pagina = "principal";

if (!empty($_GET['pagina'])) { // Si no está vacía la variable $pagina que viene por GET
    $pagina = $_GET['pagina']; // Cambia el valor de $pagina por el obtenido por GET
}

// Verifica si existe el archivo
if (is_file("controlador/" . $pagina . ".php")) { // Verifica que exista dentro
    require_once("controlador/" . $pagina . ".php");
} else {
    echo "PAGINA EN CONSTRUCCIÓN INDEX";
}
?>
