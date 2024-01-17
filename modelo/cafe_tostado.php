<?php
//llamda al archivo que contiene la clase
//datos, en ella posteriormente se colcora el codigo
//para enlazar a su base de datos
require_once('Conexion.php');

//declaracion de la clase usuarios que hereda de la clase datos
//la herencia se declara con la palabra extends y no es mas
//que decirle a esta clase que puede usar los mismos metodos
//que estan en la clase de dodne hereda (La padre) como sir fueran de el

class Registrocafe_tostado extends Conexion
{
	//el primer paso dentro de la clase
	//sera declarar los atributos (variables) que describen la clase
	//para nostros no es mas que colcoar los inputs (controles) de
	//la vista como variables aca
	//cada atributo debe ser privado, es decir, ser visible solo dentro de la
	//misma clase, la forma de colcoarlo privado es usando la palabra private
    private $idcafe_tostado;
	private $cantidad;
	private $fecha_tostado;
    private $nivel_tostado;
    private $nivel_molido;

	//Ok ya tenemos los atributos, pero como son privados no podemos acceder a ellos desde fueran
	//por lo que debemos colcoar metodos (funciones) que me permitan leer (get) y colocar (set)

	function set_cantidad($valor)
	{
		$this->cantidad  = $valor;
	}
	function set_fecha_tostado($valor)
	{
		$this->fecha_tostado  = $valor;
	}
	
    function set_nivel_tostado($valor)
	{
		$this->nivel_tostado  = $valor;
	}
    function set_nivel_molido($valor)
	{
		$this->nivel_molido  = $valor;
	}
	

	//ahora la misma cosa pero para leer, es decir get



    function get_cantidad($valor)
	{
		$this->cantidad  = $valor;
	}
	function get_fecha_tostado($valor)
	{
		$this->fecha_tostado  = $valor;
	}
	
    function get_nivel_tostado($valor)
	{
		$this->nivel_tostado  = $valor;
	}
    function get_nivel_molido($valor)
	{
		$this->nivel_molido  = $valor;
	}
	


	public function existe($idcafe_tostado)
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {
			$resultado = $co->query("Select * from cafe_tostado where idcafe_tostado	='$idcafe_tostado'");
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
	//ahora incluiremos una cafe_tostado//
	function agregarcafe_tostado()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//if (!$this->existe($this->id_cafe_tostado)) {
		try {
            $co->query("INSERT INTO cafe_tostado(
              cantidad,
              nivel_tostado,
              nivel_molido,
              estado,
              fecha_tostado) VALUES (
                '$this->cantidad',
                '$this->nivel_tostado',
                '$this->nivel_molido',
                '1',
                NOW
              )");
			return "Registro de café para tostar";
		} catch (Exception $e) {
			return $e->getMessage();
		}
		//} 
		//else{
		//	return "Ya existe la cedula que desea ingresar";
		//}
	}



	function modificarcafe_tostado()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//if (!$this->existe($this->id_materia_prima)) {
		try {
			$co->query("UPDATE cafe_tostado SET
            cantidad='$this->cantidad',
            nivel_tostado='$this->nivel_tostado',
            nivel_molido='$this->nivel_molido'");
			return "Registro Modificado";
		} catch (Exception $e) {
			return $e->getMessage();
		}
		//} 
		//else{
		//	return "Ya existe la cedula que desea ingresar";
		//}
	}

    public function contadorcafe_tostado()
	{
    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = $co->query("
						INSERT INTO total_cafe (id_total_cafe, total)
						SELECT 2, COALESCE(SUM(cantidad), 0)
						FROM cafe_tostado
						WHERE estado = 1
						ON DUPLICATE KEY UPDATE TOTAL = VALUES(TOTAL);
						");
	}



	public function mostrarcafe_tostado()
	{


		$co1 = $this->conecta();
		$co1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = $co1->query("SELECT *
		FROM `cafe_tostado` where   `estado` = 1");

		return $sql;
	}



	public function borrarmateria_prima()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try {
			$co->query("delete from cafe_tostado
						where
						idcafe_tostado = '$this->idcafe_tostado'
						");
			return "Registro Eliminado";
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}
}
