<?php  
session_start();

	if (!isset($_SESSION['nombre'])) {
		header('Location: ./vista/login.php');
	}
	else{
		$pagina = "principal";
		echo "Conexion exitosa en index";
		if (!empty($_GET['pagina'])) {
			echo "cambio de valor"; // Si no está vacía la variable $pagina que viene por GET
		 // Cambia el valor de $pagina por el obtenido por GET
		}
		
		// Verifica si existe el archivo
		if (is_file("controlador/" . $pagina . ".php")) { // Verifica que exista dentro
			echo "verificacion de existencia de controlador ";
			echo $_SESSION['nombre'];
			
			require_once("controlador/" . $pagina . ".php");
		} else {
			echo "PAGINA EN CONSTRUCCIÓN INDEX";
		}
	}
?>

