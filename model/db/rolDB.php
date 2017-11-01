<?php

class RolDB extends ModelDB {

	private static $instance;

	public static function getInstance() {
		if (!isset(self::$instance)) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function select($idRol) {
		$mapper = function($row) {
			$rol = new Rol($row['id'], $row['nombre']);
			return $rol;
		};

		$query = "SELECT id, nombre FROM rol WHERE id = ?";
		$answer = $this->queryList($query, [$idRol], $mapper);

		return $answer[0];
	}

	public function getAll() {
		$mapper = function($row) {
			$rol = new Rol($row['id'], $row['nombre']);
			return $rol;
		};

		$query = "SELECT id, nombre FROM rol ";
		$answer = $this->queryList($query, [], $mapper);

		return $answer;
	}
}