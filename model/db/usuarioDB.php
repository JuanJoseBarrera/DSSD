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
			$usuario = new Usuario($row['id'], $row['username'], $row['password'] , $row['nombre'], $row['apellido'], $row['fecha_alta'], $row['idRol']);
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

	public function getAll() {
		$mapper = function($row) {
			$rol = new Rol($row['idRol'], $row['nombreRol']);
			$usuario = new Usuario($row['id'], $row['username'], $row['password'], $row['nombre'], $row['apellido'], $row['fecha_alta'], $rol);
			return $usuario;
		};

		$query = "SELECT u.*, r.nombre AS nombreRol FROM usuario u JOIN rol r ON (u.idRol = r.id)";
		$usuarios = $this->queryList($query, [], $mapper);

		return $usuarios;
	}
}