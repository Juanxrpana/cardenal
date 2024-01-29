<?php

require_once('Conexion.php');

class inicio extends Conexion
{



	private $usuario;
	private $nombres;
	private $apellidos;
	private $clave;
	private $cargo;
	private $id_pregunta_s;
	private $respuesta;


	function set_usuario($valor)
	{
		$this->usuario = $valor;
	}

	function set_clave($valor)
	{
		$this->clave = $valor;
	}

	function set_nombres($valor)
	{
		$this->nombres = $valor;
	}

	function set_apellidos($valor)
	{
		$this->apellidos = $valor;
	}

	function set_id_pregunta_s($valor)
	{
		$this->id_pregunta_s = $valor;
	}

	function set_respuesta($valor)
	{
		$this->respuesta = $valor;
	}

	function set_cargo($valor)
	{
		$this->cargo = $valor;
	}
	



	function get_clave()
	{
		return $this->clave;
	}

	function get_usuario()
	{
		return $this->usuario;
	}

	function get_nombres($valor)
	{
		$this->nombres = $valor;
	}

	function get_apellidos($valor)
	{
		$this->apellidos = $valor;
	}

	function get_id_pregunta_s($valor)
	{
		$this->id_pregunta_s = $valor;
	}

	function get_respuesta($valor)
	{
		$this->respuesta = $valor;
	}

	function get_cargo($valor)
	{
		$this->cargo = $valor;
	}


	function busca()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {

			$resultado = $co->prepare("SELECT idusuario  FROM usuario WHERE 
			idusuario=:usuario AND password=:clave");
			$resultado->bindParam(':usuario', $this->usuario);
			$resultado->bindParam(':clave', $this->clave);
			$resultado->execute();
			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
			if ($fila) {
				return $fila;
			} else {
				return "¡Error en los datos ingresados!";
			}
		} catch (Exception $e) {
			return $e;
		}
	}
	function busca_cargo()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {
			$id_usuario = $_SESSION['id_usuario']; // obtienen el ID de usuario de la sesión
			$resultado = $co->prepare("SELECT cargo_idcargo FROM usuario WHERE idusuario = :idusuario");
			$resultado->bindParam(':idusuario', $id_usuario, PDO::PARAM_INT); // Asigna el valor del parámetro
			$resultado->execute();
			$cargo = $resultado->fetchColumn(); // Obtiene una sola columna de la primera fila del conjunto de resultados
			return $cargo !== false ? $cargo : "No se encontró ningún cargo.";
		} catch (Exception $e) {
			return $e->getMessage(); // Devuelve el mensaje de error en caso de excepción
		}
	}

	public function existe($idusuario)
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {
			$resultado = $co->query("Select * from cafe_tostado where idusuario	='$idusuario'");
			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
			if ($fila) {

				return true;
			} else {

				return false;;
			}
		} catch (Exception $e) {
			return false;
		}
	}

	function agregarcafe_tostado()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try {
			// Consulta SQL con marcadores de posición
			$sql = "INSERT INTO usuario (
                idusuario,
                nombres,
                apellidos,
                password,
                cargo_idcargo,
                id_pregunta_s,
                respuesta
            ) VALUES (
                :idusuario,
                :nombres,
                :apellidos,
                :password,
                1,  -- cargo_idcargo siempre es igual a 1
                :id_pregunta_s,
                :respuesta
            )";

			// Preparar la consulta
			$stmt = $co->prepare($sql);

			// Asociar valores a los marcadores de posición con bindParam
			$stmt->bindParam(':idusuario', $this->usuario, PDO::PARAM_STR);
			$stmt->bindParam(':nombres', $this->nombres, PDO::PARAM_STR);
			$stmt->bindParam(':apellidos', $this->apellidos, PDO::PARAM_STR);
			$stmt->bindParam(':password', $this->clave, PDO::PARAM_STR);
			$stmt->bindParam(':id_pregunta_s', $this->id_pregunta_s, PDO::PARAM_INT);
			$stmt->bindParam(':respuesta', $this->respuesta, PDO::PARAM_STR);

			// Aquí debes asignar valores a las variables $idusuario, $nombres, $apellidos, $password, $id_pregunta_s, $respuesta
			// Estos valores deben provenir de tus variables o de algún otro proceso de tu aplicación

			// Ejecutar la consulta preparada
			$stmt->execute();

			return "Usuario registrado exitosamente";
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}
}
