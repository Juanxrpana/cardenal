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

	private $proveedor;
	private $fecha;
	private $usuario;
	private $calidad1; //recuerden que en php, las variables no tienen tipo predefinido
	private $calidad2;
	private $cantidad1;
	private $cantidad2;

	//Ok ya tenemos los atributos, pero como son privados no podemos acceder a ellos desde fueran
	//por lo que debemos colcoar metodos (funciones) que me permitan leer (get) y colocar (set)
	
	function set_proveedor($valor)
	{
		$this->proveedor  = $valor;
	}
	function set_fecha($valor)
	{
		$this->fecha  = $valor;
	}
	function set_usuario($valor)
	{
		$this->usuario  = $valor;
	}
	function set_calidad1($valor)
	{
		$this->calidad1  = $valor;
	}
	function set_calidad2($valor)
	{
		$this->calidad2  = $valor;
	}
	function set_cantidad1($valor)
	{
		$this->cantidad1  = $valor;
	}
	function set_cantidad2($valor)
	{
		$this->cantidad2  = $valor;
	}

	//ahora la misma cosa pero para leer, es decir get



	function get_proveedor()
	{
		return $this->proveedor;
	}
	function get_fecha()
	{
		return $this->proveedor;
	}
	function get_usuario()
	{
		return $this->proveedor;
	}

	function get_calidad1()
	{
		return $this->calidad1;
	}
	function get_calidad2()
	{
		return $this->calidad2;
	}
	function get_cantidad1()
	{
		return $this->cantidad1;
	}
	function get_cantidad2()
	{
		return $this->cantidad2;
	}


	//----//Lo siguiente que demos hacer es crear los metodos para incluir, consultar y borrar----//----//
	//lo primero es chequear si el id ya fue registrado//
	public function existe($id_materia_prima)
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {
			$resultado = $co->query("Select * from materia_prima where id_materia_prima	='$id_materia_prima'");
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
	//ahora incluiremos una materia_prima//
	function agregarmateria_prima()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//if (!$this->existe($this->id_materia_prima)) {
		try {
			$co->query("INSERT INTO compra(
			  proveedor_id_proveedor,
			  usuario_idusuario,
			  fecha_compra
			  ) VALUES (
			  '$this->proveedor',
			  '12312',
			  '$this->fecha'
			  )");
 				
				 $idCompra = $co->lastInsertId();
		if($this->cantidad1 != NULL){

			$co->query("INSERT INTO quintal(
					idcompra,
					cantidad,
					calidad_idcalidad
					) VALUES (
						'$idCompra',
					'$this->cantidad1',
					'$this->calidad1'
					)");
		}		
			if($this->cantidad2 != NULL){

				$co->query("INSERT INTO quintal(
				idcompra,
				cantidad,
				calidad_idcalidad
				) VALUES (
					'$idCompra',
				'$this->cantidad2',
				'$this->calidad2'
				)");

			}
			return "Registro incluido";
		} catch (Exception $e) {
			return $e->getMessage();
		}
		//} 
		//else{
		//	return "Ya existe la cedula que desea ingresar";
		//}
	}

	function consultar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{

			$resultado = $co->query("SELECT p_natural_identificacion, id_prov FROM `proveedor`");

			if($resultado){

				$respuesta = '';
				$respuesta ="<option value=''selected>Proveedor</option>";
				foreach($resultado as $r){
					$respuesta = $respuesta."<option value=";
						$respuesta = $respuesta." '";
							$respuesta = $respuesta.$r['id_prov'];
						$respuesta = $respuesta."'>";
							$respuesta = $respuesta.$r['p_natural_identificacion'];	
					$respuesta = $respuesta."</option>";
				}
				return $respuesta;

			}
			else{
				return '';
			}

		}catch(Exception $e){
			return $e->getMessage();
		}

	}


	public function mostrarmateria_prima()
	{


		$co1 = $this->conecta();
		$co1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = $co1->query("SELECT c.fecha_compra, pn.nombre_prov, p.p_natural_identificacion, q.cantidad, c.idcompra
		FROM proveedor p
		INNER JOIN compra c ON p.id_prov= c.proveedor_id_proveedor
		INNER JOIN p_natural pn ON p.p_natural_identificacion = pn.identificacion
		INNER JOIN quintal q ON c.idcompra = q.idcompra" );

		return $sql;
	}

	public function borrarmateria_prima()
	{
		$co1 = $this->conecta();

		if (!$co1) {
			// En caso de error de conexión, devuelve una respuesta JSON de error
			return array("status" => "error", "message" => "No se pudo conectar a la base de datos");
		}

		$co1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		if ($this->existe($this->id_materia_prima)) {
			try {
				$co1->query("DELETE FROM materia_prima WHERE id_materia_prima = '$this->id_materia_prima'");

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
