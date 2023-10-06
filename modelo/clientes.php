<?php
//llamda al archivo que contiene la clase
//datos, en ella posteriormente se colcora el codigo
//para enlazar a su base de datos
require_once('Conexion.php');

//declaracion de la clase usuarios que hereda de la clase datos
//la herencia se declara con la palabra extends y no es mas
//que decirle a esta clase que puede usar los mismos metodos
//que estan en la clase de dodne hereda (La padre) como sir fueran de el

class registro_clientes extends Conexion{
	//el primer paso dentro de la clase
	//sera declarar los atributos (variables) que describen la clase
	//para nostros no es mas que colcoar los inputs (controles) de
	//la vista como variables aca
	//cada atributo debe ser privado, es decir, ser visible solo dentro de la
	//misma clase, la forma de colcoarlo privado es usando la palabra private

    private $id_clientes ;
	private $persona_id; //recuerden que en php, las variables no tienen tipo predefinido
	private $organizacion_id;
	private $tipo_cliente_id;

	
	//Ok ya tenemos los atributos, pero como son privados no podemos acceder a ellos desde fueran
	//por lo que debemos colcoar metodos (funciones) que me permitan leer (get) y colocar (set)

	function set_id_clientes($valor){
		$this->id_clientes = $valor; //fijencen como se accede a los elementos dentro de una clase
		//this que singnifica esto es decir esta clase luego -> simbolo que indica que apunte
	}

	function set_persona_id($valor){
		$this->persona_id = $valor;
	}


	function set_organizacion_id ($valor){
        $this->organizacion_id  = $valor;
    }

	function set_tipo_cliente_id($valor){
		$this->tipo_cliente_id = $valor;
	}


		
		
		
		

	//ahora la misma cosa pero para leer, es decir get


	function get_id_clientes(){//fijencen como se accede a los elementos dentro de una clase
		//this que singnifica esto es decir esta clase luego -> simbolo que indica que apunte
        return $this->id_clientes;
    }

    function get_persona_id(){
        return $this->persona_id;
    }

    function get_usuario_id_usuario(){
        return $this->usuario_id_usuario;
    }

    function get_organizacion_id (){
        return $this->organizacion_id ;
    }
	
	function get_tipo_cliente_id(){
        return $this->tipo_cliente_id;
    }




	//Lo siguiente que demos hacer es crear los metodos para incluir, consultar y eliminar

	//Prechequeo para obtener los datos foraneos//
	public function consultapersona_id_persona(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql=$co->prepare("SELECT id_persona, persona_nombre, persona_apellido FROM persona");
		$sql->execute();
		$persona_id_persona = $sql->fetchAll(PDO::FETCH_ASSOC);
		
		return $persona_id_persona;
	}

    public function consultaid_organizacion(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql=$co->prepare("SELECT id_organizacion, id_organizacion FROM organización");
		$sql->execute();
		$persona_id_persona = $sql->fetchAll(PDO::FETCH_ASSOC);
		
		return $persona_id_persona;
	}


	function incluirclientes(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if(!$this->existe($this->id_clientes)){
		  try {
			$co->query("INSERT INTO clientes(
			  id_clientes,
			  persona_id_persona,
			  usuario_id_usuario,
			  organizacion_id_organizacion ,
			  tipo_cliente_id
			  VALUES(
			  '$this->id_clientes',
			  '$this->persona_id_persona',
			  '$this->usuario_id_usuario',
			  '$this->organizacion_id_organizacion ',
			  '$this->tipodecliente')");
			$response = array('message' => 'done');
			echo json_encode($response);

		  } catch(Exception $e) {
			return json_encode(array("status" => "error", "message" => $e->getMessage()));
		  }
		}
		else{
		  return json_encode(array("status" => "error", "message" => "Ya existe la id_clientes que desea ingresar"));
		}
	  }


	function modificarDatos(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if($this->existe($this->id_clientes)){
			try {
					$co->query("Update clientes set
					    id_clientes = '$this->id_clientes',
                        persona_id_persona = '$this->persona_id_persona',
                        usuario_id_usuario = '$this->usuario_id_usuario',
                        organizacion_id_organizacion  = '$this->organizacion_id_organizacion ',
						tipodecliente= '$this->tipodecliente'
						where
						id_clientes = '$this->id_clientes'
						");
						return "clientes Modificado";
			} catch(Exception $e) {
				return json_encode(array("status" => "error", "message" => $e->getMessage()));
			}
		}
		else{
			return json_encode(array("status" => "error", "message" => "id_clientes que desea ingresar no se encuentra registrada"));
		}

	}

	function eliminarDatos(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if($this->existe($this->id_clientes)){
			try {
					$co->query("delete from clientes
						where
						id_clientes = '$this->id_clientes'
						");
						return "clientes Eliminado";
			} catch(Exception $e) {
				return $e->getMessage();
			}
		}
		else{
			return "id_clientes no registrada";
		}
	}

	public function existe($id_clientes){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{

			$resultado = $co->query("Select * from clientes where id_clientes='$id_clientes'");


			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
			if($fila){

				return true;

			}
			else{

				return false;;
			}

		}catch(Exception $e){
			return false;
		}
	}

	public function mostrarDatosclientes(){

		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	
		$sql=$co->query("SELECT *from clientes");
	
			return $sql;
		  
		}




}
?>