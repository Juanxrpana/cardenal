<?php

require_once('Conexion.php');

class inicio extends Conexion{

	
	
	private $usuario;
	private $clave;
	private $cargo;
	
	
	function set_usuario($valor){
		$this->usuario = $valor;
	}
	
	function set_clave($valor){
		$this->clave = $valor;
	}

	function set_cargo($valor){
		$this->cargo = $valor;
	}
	

	
	function get_clave(){
		return $this->clave;
	}
	
	function get_usuario(){
		return $this->usuario;
	}

	function get_cargo(){
		return $this->cargo;
	}
	
	function busca(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
		
			$resultado = $co->prepare("SELECT idusuario  FROM usuario WHERE 
			idusuario=:usuario AND password=:clave");
			
			$resultado->bindParam(':usuario',$this->usuario);
			$resultado->bindParam(':clave',$this->clave);
			
			$resultado->execute();
			
			
			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
			
			if($fila){
			
				return $fila;
			    
			}
			else{
				
				return "¡Error en los datos ingresados!";
			}
			
		}catch(Exception $e){
			return $e;
		}
	}


	function busca_cargo(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {
			$id_usuario = $_SESSION['id_usuario']; // obtienen el ID de usuario de la sesión
			$resultado = $co->prepare("SELECT cargo_idcargo FROM usuario WHERE idusuario = :idusuario");
			$resultado->bindParam(':idusuario', $id_usuario, PDO::PARAM_INT); // Asigna el valor del parámetro
			$resultado->execute();
			$cargo = $resultado->fetchColumn(); // Obtiene una sola columna de la primera fila del conjunto de resultados
			return $cargo !== false ? $cargo : "No se encontró ningún cargo.";
		} catch(Exception $e) {
			return $e->getMessage(); // Devuelve el mensaje de error en caso de excepción
		}
	}
	
}	
?>