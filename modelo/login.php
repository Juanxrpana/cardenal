<?php 
	require_once 'conexion.php';
	$conexion = new Conexion(); // Crea una instancia de la clase Conexion
	$pdo = $conexion->conecta(); // Obtén la conexión PDO

	session_start();
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sentencia = $pdo->prepare('select * from usuarios where 
								username = ? and password = ?;');
	$sentencia->execute([$username, $password]);
	$datos = $sentencia->fetch(PDO::FETCH_OBJ);

	if ($datos === FALSE) {
		header('Location: login.php');
	}elseif($sentencia->rowCount() == 1){
		$_SESSION['nombre'] = $datos->username;
		header('Location: ../index.php');
	}
?>