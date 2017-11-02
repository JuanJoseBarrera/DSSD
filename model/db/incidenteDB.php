<?php

class IncidenteDB extends ModelDB {

	private static $instance;

	public static function getInstance() {
		if (!isset(self::$instance)) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function selectByUserId($userId) {
		$mapper = function($row) {
			$incidente = new Usuario($row['id'], $row['username'], $row['password'] , $row['nombre'], $row['apellido'], $row['fecha_alta'], $row['idRol']);
			return $incidente;
		};

		$query = "SELECT * FROM incidente i WHERE i.nro_cliente = ?";
		$answer = $this->queryList($query, [$userId], $mapper);

		$incidentes = $answer;

		return $incidentes;
	}

	public function save($incidente, $objetos) {
		$connection = $this->getConnection();
		$connection->beginTransaction();
		try {
			$query = "INSERT INTO incidente (descripcion, nro_cliente) VALUES (?, ?)";
			$stmt = $connection->prepare($query);
			$params = array($incidente->getDescripcion(), $incidente->getNroCliente());
			$stmt->execute($params);
			$incidentId = $connection->lastInsertId();
			foreach ($objetos as $objeto) {
				$query = "INSERT INTO objeto (descripcion) VALUES (?)";
				$stmt = $connection->prepare($query);
				$params = array(htmlentities($objeto));
				$stmt->execute($params);

				$objectId = $connection->lastInsertId();
				$query = "INSERT INTO incidente_objeto (incidente_id, objeto_id) VALUES (?, ?)";
				$stmt = $connection->prepare($query);
				$params = array($incidentId, $objectId);
				$stmt->execute($params);
			}
			$connection->commit();
		} catch (Exception $e) {
			$connection->rollBack();
		}
		return;
	}
}
