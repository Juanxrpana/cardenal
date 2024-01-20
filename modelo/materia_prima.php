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
	private $estado;

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

		try {
			// Insertar en compra
			$stmtCompra = $co->prepare("INSERT INTO compra (
				proveedor_id_proveedor,
				usuario_idusuario,
				fecha_compra
			) VALUES (
				:proveedor,
				'28150004',
				:fecha
			)");
			$stmtCompra->bindParam(':proveedor', $this->proveedor, PDO::PARAM_INT);
			$stmtCompra->bindParam(':fecha', $this->fecha, PDO::PARAM_STR);
			$stmtCompra->execute();

			$idCompra = $co->lastInsertId();

			// Insertar en quintal
			if ($this->cantidad1 != NULL) {
				$stmtQuintal1 = $co->prepare("INSERT INTO quintal (
					idcompra,
					cantidad,
					calidad_idcalidad,
					estado
				) VALUES (
					:idCompra,
					:cantidad1,
					:calidad1,
					'1'
				)");
				$stmtQuintal1->bindParam(':idCompra', $idCompra, PDO::PARAM_INT);
				$stmtQuintal1->bindParam(':cantidad1', $this->cantidad1, PDO::PARAM_INT);
				$stmtQuintal1->bindParam(':calidad1', $this->calidad1, PDO::PARAM_INT);
				$stmtQuintal1->execute();
			}

			if ($this->cantidad2 != NULL) {
				$stmtQuintal2 = $co->prepare("INSERT INTO quintal (
					idcompra,
					cantidad,
					calidad_idcalidad,
					estado
				) VALUES (
					:idCompra,
					:cantidad2,
					:calidad2,
					'1'
				)");
				$stmtQuintal2->bindParam(':idCompra', $idCompra, PDO::PARAM_INT);
				$stmtQuintal2->bindParam(':cantidad2', $this->cantidad2, PDO::PARAM_INT);
				$stmtQuintal2->bindParam(':calidad2', $this->calidad2, PDO::PARAM_INT);
				$stmtQuintal2->execute();
			}

			return "Registro incluido";
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}




	function modificar()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try {
			// Consulta SQL para actualizar la fecha de compra
			$stmtFechaCompra = $co->prepare("UPDATE compra SET fecha_compra = :fecha WHERE idcompra = :idcompra");
			$stmtFechaCompra->bindParam(':fecha', $this->fecha, PDO::PARAM_STR);
			$stmtFechaCompra->bindParam(':idcompra', $this->idcompra1, PDO::PARAM_INT);
			$stmtFechaCompra->execute();

			// Consulta SQL para verificar la existencia de una entrada con calidad 2
			$verificarSQL = "SELECT COUNT(*) AS count FROM quintal WHERE idcompra = :idcompra AND calidad_idcalidad = :calidad";
			$stmtVerificar = $co->prepare($verificarSQL);

			// Consulta SQL para actualizar o insertar en la tabla quintal para calidad 1
			$stmtQuintal1 = $co->prepare("INSERT INTO quintal (idcompra, calidad_idcalidad, cantidad) VALUES (:idcompra, :calidad, :cantidad) ON DUPLICATE KEY UPDATE cantidad = :cantidad");
			$stmtQuintal1->bindParam(':idcompra', $this->idcompra1, PDO::PARAM_INT);
			$stmtQuintal1->bindParam(':calidad', $this->calidad1, PDO::PARAM_INT);
			$stmtQuintal1->bindParam(':cantidad', $this->cantidad1, PDO::PARAM_INT);
			$stmtQuintal1->execute();

			// Consulta SQL para actualizar o insertar en la tabla quintal para calidad 2
			$stmtQuintal2 = $co->prepare("INSERT INTO quintal (idcompra, calidad_idcalidad, cantidad) VALUES (:idcompra, :calidad, :cantidad) ON DUPLICATE KEY UPDATE cantidad = :cantidad");
			$stmtQuintal2->bindParam(':idcompra', $this->idcompra1, PDO::PARAM_INT);
			$stmtQuintal2->bindParam(':calidad', $this->calidad2, PDO::PARAM_INT);
			$stmtQuintal2->bindParam(':cantidad', $this->cantidad2, PDO::PARAM_INT);
			$stmtQuintal2->execute();

			// Actualizar la fecha de compra nuevamente (¿es necesario?)
			$stmtFechaCompra->execute();

			return "Registro Modificado";
		} catch (Exception $e) {
			return $e->getMessage();
		}
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


	public function contador_total_materia_prima()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = $co->query("
						UPDATE total_cafe
						SET total = COALESCE((SELECT SUM(cantidad) FROM quintal WHERE estado = 1), 0) + total where id_total_cafe = 1;
						WHERE id_total_cafe = 1;
						
						");
	}

	public function inactivadormateria_prima()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {
			$co->query("UPDATE quintal
						SET estado = 0
						WHERE estado = 1;");
			return "Desactivando estados";
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}

	public function descontador_total_materia_prima()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = $co->query("DELIMITER //
	CREATE TRIGGER restar_valor_total_cafe
	AFTER INSERT ON cafe_tostado
	FOR EACH ROW
	BEGIN
		-- Restar el valor de cantidad al campo total de id_total_cafe 2 en total_cafe
		UPDATE total_cafe
		SET total = total - NEW.cantidad
		WHERE id_total_cafe = 1;
	END;
	//
	
	-- Modificar el trigger para también ejecutarse después de una actualización
	CREATE TRIGGER restar_valor_total_cafe_update
	AFTER UPDATE ON cafe_tostado
	FOR EACH ROW
	BEGIN
		-- Obtener la diferencia entre el nuevo y viejo valor de cantidad
		DECLARE diferencia INT;
		SET diferencia = NEW.cantidad - OLD.cantidad;
	
		-- Restar la diferencia al campo total de id_total_cafe 2 en total_cafe
		UPDATE total_cafe
		SET total = total - diferencia
		WHERE id_total_cafe = 1;
	END;
	//
	DELIMITER ;");
	}



	public function mostrarmateria_prima()
	{
		$co1 = $this->conecta();
		$co1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = $co1->query("SELECT q.estado, c.fecha_compra, pn.nombre_prov, p.datos_prov_identificacion, SUM(q.cantidad) AS total_cantidad, c.idcompra
                        FROM proveedor p
                        INNER JOIN datos_prov pn ON p.datos_prov_identificacion = pn.identificacion
                        LEFT JOIN compra c ON p.id_prov = c.proveedor_id_proveedor
                        LEFT JOIN quintal q ON c.idcompra = q.idcompra
                        
                        GROUP BY c.idcompra");

		return $sql;
	}




	public function mostrar_contador()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {
			$resultado = $co->query("SELECT total FROM total_cafe WHERE id_total_cafe = 1;");
			$totalCafeVerde = $resultado->fetch(PDO::FETCH_ASSOC)['total'];
			return $totalCafeVerde;
		} catch (Exception $e) {
			return $e->getMessage();
		}
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
