<?php
//llamda al archivo que contiene la clase
//datos, en ella posteriormente se colcora el codigo
//para enlazar a su base de datos
require_once('Conexion.php');

//declaracion de la clase usuarios que hereda de la clase datos
//la herencia se declara con la palabra extends y no es mas
//que decirle a esta clase que puede usar los mismos metodos
//que estan en la clase de dodne hereda (La padre) como sir fueran de el

class Registrocafe_final extends Conexion
{
	//el primer paso dentro de la clase
	//sera declarar los atributos (variables) que describen la clase
	//para nostros no es mas que colcoar los inputs (controles) de
	//la vista como variables aca
	//cada atributo debe ser privado, es decir, ser visible solo dentro de la
	//misma clase, la forma de colcoarlo privado es usando la palabra private
    private $id_cafe_final;
	private $idcafe_tostado;
	private $cantidad_paquetes;
    private $fecha_empaquetado;
    private $id_bulto;
    private $estado;

	//Ok ya tenemos los atributos, pero como son privados no podemos acceder a ellos desde fueran
	//por lo que debemos colcoar metodos (funciones) que me permitan leer (get) y colocar (set)

	function set_id_cafe_final($valor)
	{
		$this->id_cafe_final  = $valor;
	}
	function set_idcafe_tostado($valor)
	{
		$this->idcafe_tostado  = $valor;
	}
	function set_cantidad_paquetes($valor)
	{
		$this->cantidad_paquetes  = $valor;
	}
	
    function set_fecha_empaquetado($valor)
	{
		$this->fecha_empaquetado  = $valor;
	}
    function set_id_bulto($valor)
	{
		$this->id_bulto  = $valor;
	}
    function set_estado($valor)
	{
		$this->estado  = $valor;
	}
	

	//ahora la misma cosa pero para leer, es decir get


    function get_id_cafe_final($valor)
	{
		$this->id_cafe_final  = $valor;
	}
	function get_idcafe_tostado($valor)
	{
		$this->idcafe_tostado  = $valor;
	}
	function get_cantidad_paquetes($valor)
	{
		$this->cantidad_paquetes  = $valor;
	}
	
    function get_fecha_empaquetado($valor)
	{
		$this->fecha_empaquetado  = $valor;
	}
    function get_id_bulto($valor)
	{
		$this->id_bulto  = $valor;
	}
    function get_estado($valor)
	{
		$this->estado  = $valor;
	}
	


	public function existe($id_cafe_final)
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {
			$resultado = $co->query("Select * from cafe_final where id_cafe_final	='$id_cafe_final'");
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
	//ahora incluiremos una cafe_final//
	function agregarcafe_final()
{
    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        // Obtener el último id_cafe_tostado
        $resultado = $co->query("SELECT MAX(id_cafe_tostado) AS ultimo_id FROM cafe_tostado");
        $ultimoIdCafeTostado = $resultado->fetch(PDO::FETCH_ASSOC)['ultimo_id'];

        // Insertar en cafe_final
        $co->query("INSERT INTO cafe_final(
            idcafe_tostado,
            cantidad_paquetes,
            fecha_empaquetado,
            id_bulto,
            estado) VALUES (
                '$ultimoIdCafeTostado',
                '$this->cantidad_paquetes',
                NOW(),
                '$this->id_bulto',
                1
            )");

        return "Registro de café final exitoso";
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

	function modificarcafe_final()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//if (!$this->existe($this->id_materia_prima)) {
		try {
			$co->query("UPDATE cafe_final SET
            cantidad_paquetes='$this->cantidad_paquetes',
            estado='$this->estado',
			WHERE id_cafe_final='$this->id_cafe_final'");
			return "Registro Modificado";
		} catch (Exception $e) {
			return $e->getMessage();
		}
		//} 
		//else{
		//	return "Ya existe la cedula que desea ingresar";
		//}
	}

    public function contadorcafe_final()
	{
    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = $co->query("
						INSERT INTO total_cafe (id_total_cafe, total)
						SELECT 3, COALESCE(SUM(cantidad), 0)
						FROM cafe_final
						WHERE estado = 1
						ON DUPLICATE KEY UPDATE TOTAL = VALUES(TOTAL);
						");
	}


	public function mostrarcafe_final()
	{
		$co1 = $this->conecta();
		$co1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = $co1->query("SELECT *
		FROM `cafe_final` where   `estado` = 1");
		return $sql;
	}


	public function borrarcafe_final()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try {
			$co->query("delete from cafe_final
						where
						id_cafe_final = '$this->id_cafe_final'
						");
			return "Registro Eliminado";
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}
}
