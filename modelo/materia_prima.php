<?php
//llamda al archivo que contiene la clase
//datos, en ella posteriormente se colcora el codigo
//para enlazar a su base de datos
require_once('Conexion.php');

//declaracion de la clase usuarios que hereda de la clase datos
//la herencia se declara con la palabra extends y no es mas
//que decirle a esta clase que puede usar los mismos metodos
//que estan en la clase de dodne hereda (La padre) como sir fueran de el

class Registromateria_prima extends Conexion
{
	//el primer paso dentro de la clase
	//sera declarar los atributos (variables) que describen la clase
	//para nostros no es mas que colcoar los inputs (controles) de
	//la vista como variables aca
	//cada atributo debe ser privado, es decir, ser visible solo dentro de la
	//misma clase, la forma de colcoarlo privado es usando la palabra private
	private $id_proveedor;
    private $rif;
	private $nombre; //recuerden que en php, las variables no tienen tipo predefinido
	private $estado;
    private $municipio;
    private $parroquia;
    private $ciudad;
	private $direccion;
    private $telefono;
	//Ok ya tenemos los atributos, pero como son privados no podemos acceder a ellos desde fueran
	//por lo que debemos colcoar metodos (funciones) que me permitan leer (get) y colocar (set)
	function set_id_proveedor($valor)
	{
		$this->id_proveedor = $valor; //fijencen como se accede a los elementos dentro de una clase
		//this que singnifica esto es decir esta clase luego -> simbolo que indica que apunte
	}

    function set_rif($valor)
	{
		$this->rif  = $valor;
	}

	function set_nombre($valor)
    {
		$this->nombre = $valor;
	}

    function set_estado($valor)
    {
		$this->estado = $valor;
	}

    function set_municipio($valor)
    {
		$this->municipio = $valor;
	}

    function set_parroquia($valor)
    {
		$this->parroquia = $valor;
	}

    function set_ciudad($valor)
    {
		$this->ciudad = $valor;
	}

	function set_direccion($valor)
    {
		return $this->direccion = $valor;
	}

    function set_telefono($valor)
    {
		$this->telefono = $valor;
	}
	
	//ahora la misma cosa pero para leer, es decir get

    function get_id_proveedor(){
        return $this->id_proveedor;
    }

    function get_rif(){
        return $this->rif;
    }

    function get_nombre($valor)
    {
		return $this->nombre = $valor;
	}

    function get_estado($valor)
    {
		return $this->estado = $valor;
	}

    function get_municipio($valor)
    {
		return $this->municipio = $valor;
	}

    function get_parroquia($valor)
    {
		return $this->parroquia = $valor;
	}
	
    function get_ciudad($valor)
    {
		return $this->ciudad = $valor;
	}

	function get_direccion($valor)
    {
		return $this->direccion = $valor;
	}

    function get_telefono($valor)
    {
		return $this->telefono = $valor;
	}
	//----//Lo siguiente que demos hacer es crear los metodos para incluir, consultar y eliminar----//----//
	//lo primero es chequear si el id ya fue registrado//
	public function existe($id_proveedor)
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {
			$resultado = $co->query("Select * from proveedor where id_proveedor	='$id_proveedor'");
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
	//ahora incluiremos una proveedor//
	function agregarproveedor()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//if (!$this->existe($this->id_proveedor)) {
			try {
				$co->query("INSERT INTO proveedor(
			  id_proveedor,
			  rif,
			  nombre,
			  estado,
			  municipio,
              parroquia,
              ciudad,
			  direccion,
              telefono
			  ) VALUES (
			  '$this->id_proveedor',
			  '$this->rif',
			  '$this->nombre',
			  '$this->estado',
			  '$this->municipio',
			  '$this->parroquia',
			  '$this->ciudad',
			  '$this->direccion',
			  '$this->telefono'
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
	
	public function mostrarproveedor(){

		
		$co1 = $this->conecta();
		$co1->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	
		$sql=$co1->query("SELECT *from proveedor");
	
			return $sql;
		  
		}

		public function eliminarproveedor() {
			$co1 = $this->conecta();
		
			if (!$co1) {
				// En caso de error de conexión, devuelve una respuesta JSON de error
				return array("status" => "error", "message" => "No se pudo conectar a la base de datos");
			}
		
			$co1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
			if ($this->existe($this->id_proveedor)) {
				try {
					$co1->query("DELETE FROM proveedor WHERE id_proveedor = '$this->id_proveedor'");
		
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