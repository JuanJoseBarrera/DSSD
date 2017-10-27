<?php

class UsuarioDB extends ModelDB {

	private static $instance;

	public static function getInstance() {
		if (!isset(self::$instance)) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function select($user, $pass) {
		$mapper = function($row) {
			$usuario = new Usuario('id', $row['username'], $row['password'] , $row['nombre'], $row['apellido'], $row['fecha_alta'], $row['idRol']);
			return $usuario;
		};

		$query = "SELECT * FROM usuario WHERE username = ? AND password = ?";
		$answer = $this->queryList($query, [$user,$pass], $mapper);

		$rol_db = RolDB::getInstance();
		$rol = $rol_db->select($answer[0]->getRol());
		$answer[0]->setRol($rol);
		$usuario = $answer[0];

		return $usuario;
	}
}