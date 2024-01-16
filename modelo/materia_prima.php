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
	private $idcompra1;
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
	function set_idcompra1($valor)
	{
		$this->idcompra1  = $valor;
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
			if ($this->cantidad1 != NULL) {

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
			if ($this->cantidad2 != NULL) {

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



	function modificar()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//if (!$this->existe($this->id_materia_prima)) {
		try {
			$co->query("Update compra set
					fecha_compra = '$this->fecha'
					where
					compra.idcompra = '$this->idcompra1'
				");

			// Verificar si ya existe una entrada con calidad 2 para el mismo idcompra
			$verificarSQL = "SELECT COUNT(*) AS count FROM quintal WHERE idcompra = '$this->idcompra1' AND calidad_idcalidad = '$this->calidad2'";
			$resultado = $co->query($verificarSQL);
			$registro = $resultado->fetch(PDO::FETCH_ASSOC);

			if ($registro['count'] > 0) {
				// Actualizar la cantidad existente para calidad 2
				$co->query("UPDATE quintal
        SET cantidad = '$this->cantidad1'
        WHERE idcompra = '$this->idcompra1' AND calidad_idcalidad = '$this->calidad1'");
			} else {
				// Insertar una nueva fila para calidad 2
				$co->query("INSERT INTO quintal (idcompra, calidad_idcalidad, cantidad)
        VALUES ('$this->idcompra1', '$this->calidad1', '$this->cantidad1')");
			}

			if ($registro['count'] > 0) {
				// Actualizar la cantidad existente para calidad 2
				$co->query("UPDATE quintal
        SET cantidad = '$this->cantidad2'
        WHERE idcompra = '$this->idcompra1' AND calidad_idcalidad = '$this->calidad2'");
			} else {
				// Insertar una nueva fila para calidad 2
				$co->query("INSERT INTO quintal (idcompra, calidad_idcalidad, cantidad)
        VALUES ('$this->idcompra1', '$this->calidad2', '$this->cantidad2')");
			}

			$co->query("Update compra set
					fecha_compra = '$this->fecha'
					where
					compra.idcompra = '$this->cantidad1'
				");
			return "Registro Modificado";
		} catch (Exception $e) {
			return $e->getMessage();
		}
		//} 
		//else{
		//	return "Ya existe la cedula que desea ingresar";
		//}
	}


	function consultar()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {

			$resultado = $co->query("SELECT datos_prov_identificacion, id_prov FROM `proveedor`");
			$resultado2 = $co->query("SELECT idcompra, SUM(cantidad) AS total_cantidad
			FROM (
			  SELECT idcompra, cantidad
			  FROM quintal
			  WHERE idcompra = '10'
			  LIMIT 2
			) AS subconsulta
			GROUP BY idcompra
			HAVING COUNT(*) > 1;");


			if ($resultado) {

				$respuesta = '';
				$respuesta = "<option value=''selected>Proveedor</option>";
				foreach ($resultado as $r) {
					$respuesta = $respuesta . "<option value=";
					$respuesta = $respuesta . " '";
					$respuesta = $respuesta . $r['id_prov'];
					$respuesta = $respuesta . "'>";
					$respuesta = $respuesta . $r['datos_prov_identificacion'];
					$respuesta = $respuesta . "</option>";
				}
				return $respuesta;
			} else {
				return '';
			}
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}


	public function contadormateria_prima()
{
    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        $resultado = $co->query("SELECT SUM(cantidad) AS total_cafe_verde FROM quintal");
        $totalCafeVerde = $resultado->fetch(PDO::FETCH_ASSOC)['total_cafe_verde'];

        return $totalCafeVerde;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}



	public function mostrarmateria_prima()
	{


		$co1 = $this->conecta();
		$co1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = $co1->query("SELECT c.fecha_compra, pn.nombre_prov, p.datos_prov_identificacion, SUM(q.cantidad) AS total_cantidad, c.idcompra
		FROM proveedor p
		INNER JOIN datos_prov pn ON p.datos_prov_identificacion = pn.identificacion
		LEFT JOIN compra c ON p.id_prov = c.proveedor_id_proveedor
		LEFT JOIN quintal q ON c.idcompra = q.idcompra
		GROUP BY c.idcompra");

		return $sql;
	}

	public function borrarmateria_prima()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try {
			$co->query("delete from compra
						where
						idcompra = '$this->idcompra1'
						");
			return "Registro Eliminado";
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}
}
