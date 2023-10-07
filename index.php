<?php  
session_start();
$pagina = "principal";
	
	if (!isset($_SESSION['nombre'])) {
		header('Location: ./vista/login.php');
	}
	else{
		echo "Conexion exitosa2";
		if (!empty($_GET['pagina'])) { // Si no está vacía la variable $pagina que viene por GET
			$pagina = $_GET['pagina']; // Cambia el valor de $pagina por el obtenido por GET
		echo "cambio de valor";
		}
		
		// Verifica si existe el archivo
		if (is_file("controlador/" . $pagina . ".php")) { // Verifica que exista dentro
			echo "verificacion de existencia";
			require_once("controlador/" . $pagina . ".php");
		} else {
			echo "PAGINA EN CONSTRUCCIÓN INDEX";
		}
	}
?>

