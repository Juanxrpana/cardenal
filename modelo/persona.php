<?php
//llamda al archivo que contiene la clase
//datos, en ella posteriormente se colcora el codigo
//para enlazar a su base de datos
require_once('Conexion.php');

//declaracion de la clase usuarios que hereda de la clase datos
//la herencia se declara con la palabra extends y no es mas
//que decirle a esta clase que puede usar los mismos metodos
//que estan en la clase de dodne hereda (La padre) como sir fueran de el

class RegistroPersonas extends Conexion
{
	//el primer paso dentro de la clase
	//sera declarar los atributos (variables) que describen la clase
	//para nostros no es mas que colcoar los inputs (controles) de
	//la vista como variables aca
	//cada atributo debe ser privado, es decir, ser visible solo dentro de la
	//misma clase, la forma de colcoarlo privado es usando la palabra private
	private $id_persona;
	private $nombre; //recuerden que en php, las variables no tienen tipo predefinido
	private $nombre1;
	private $apellido;
	private $apellido1;
	private $telefono;
	private $rif;
	private $tipo_cliente_id;
	//Ok ya tenemos los atributos, pero como son privados no podemos acceder a ellos desde fueran
	//por lo que debemos colcoar metodos (funciones) que me permitan leer (get) y colocar (set)
	function set_id_persona($valor)
	{
		$this->id_persona = $valor; //fijencen como se accede a los elementos dentro de una clase
		//this que singnifica esto es decir esta clase luego -> simbolo que indica que apunte
	}
	function set_nombre($valor)
	{
		$this->nombre = $valor;
	}
	function set_nombre1($valor)
	{
		$this->nombre1 = $valor;
	}

	function set_apellido($valor)
	{
		$this->apellido = $valor;
	}
	
	function set_apellido1($valor)
	{
		$this->apellido1 = $valor;
	}
	function set_telefono($valor)
	{
		$this->telefono  = $valor;
	}
	function set_rif($valor)
	{
		$this->rif  = $valor;
	}
	function set_tipo_cliente_id($valor)
	{
		$this->tipo_cliente_id  = $valor;
	}
	//ahora la misma cosa pero para leer, es decir get
	
	//----//Lo siguiente que demos hacer es crear los metodos para incluir, consultar y eliminar----//----//
	//lo primero es chequear si el id ya fue registrado//
	public function existe($id_persona)
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {
			$resultado = $co->query("Select * from persona where id_persona	='$id_persona'");
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
	//ahora incluiremos una persona//
	function agregarPersona()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//if (!$this->existe($this->id_persona)) {
			try {
				$co->query("INSERT INTO personas (
			  id_persona,
			  nombre,
			  nombre1,
			  apellido,
			  apellido1,
			  telefono,
			  rif,
			  tipo_cliente_id
			  ) VALUES (
			  '$this->id_persona',
			  '$this->nombre',
			  '$this->nombre1',
			  '$this->apellido',
			  '$this->apellido1',
			  '$this->telefono',
			  '$this->rif',
			  '$this->tipo_cliente_id'
			  )");
			
			return "Registro incluido";
				

			} catch(Exception $e) {
				return $e->getMessage();
			}
		//} 
		//else{
		//	return "Ya existe la cedula que desea ingresar";
		//}
	}
	
	public function mostrarPersonas(){

		
		$co1 = $this->conecta();
		$co1->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	
		$sql=$co1->query("SELECT *from personas");
	
			return $sql;
		  
		}

		public function eliminarPersona() {
			$co1 = $this->conecta();
		
			if (!$co1) {
				// En caso de error de conexión, devuelve una respuesta JSON de error
				return array("status" => "error", "message" => "No se pudo conectar a la base de datos");
			}
		
			$co1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
			if ($this->existe($this->id_persona)) {
				try {
					$co1->query("DELETE FROM personas WHERE id_persona = '$this->id_persona'");
		
					// En caso de éxito, devuelve una respuesta JSON de éxito
					return array("status" => "success", "message" => "Entrada Eliminada");
				} catch (Exception $e) {
					// En caso de error en la consulta, devuelve una respuesta JSON de error
					return array("status" => "error", "message" => $e->getMessage());
				}
			} else {
				// Si no existe la cédula, devuelve una respuesta JSON de error
				return array("status" => "error", "message" => "Cedula no registrada");
			}
		}
		
		
}
?>