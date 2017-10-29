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
}