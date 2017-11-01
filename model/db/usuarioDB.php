<?php

class UsuarioDB extends ModelDB {

	private static $instance;

	public static function getInstance() {
		if (!isset(self::$instance)) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function existUser($username) {
		$mapper= function($row) {
			return $row['cant'];
		};
		$query = "SELECT COUNT(*) AS cant FROM usuario u WHERE u.username = ?";
		$answer = $this->queryList($query, [$username], $mapper);
		return $answer[0];
	}

	public function select($user, $pass) {
		$mapper = function($row) {
			$usuario = new Usuario($row['id'], $row['username'], $row['password'] , $row['nombre'], $row['apellido'], $row['nroCliente'], $row['fecha_alta'], $row['idRol']);
			return $usuario;
		};

		$query = "SELECT * FROM usuario WHERE username = ? AND password = ?";
		$answer = $this->queryList($query, [$user,$pass], $mapper);

		if (!empty($answer)) {
			$rol_db = RolDB::getInstance();
			$rol = $rol_db->select($answer[0]->getRol());
			$answer[0]->setRol($rol);
			$usuario = $answer[0];
			return $usuario;
		} else {
			return $usuario = new Usuario('id', 'username', 'password' , 'nombre', 'apellido', 'nroCliente', 'fecha_alta', 'idRol');
		}
	}

	public function getAll() {
		$mapper = function($row) {
			$rol = new Rol($row['idRol'], $row['nombreRol']);
			$usuario = new Usuario($row['id'], $row['username'], $row['password'], $row['nombre'], $row['apellido'], $row['fecha_alta'], $rol);
			return $usuario;
		};

		$query = "SELECT u.*, r.nombre AS nombreRol FROM usuario u JOIN rol r ON (u.idRol = r.id) WHERE u.eliminado = 0";
		$usuarios = $this->queryList($query, [], $mapper);

		return $usuarios;
	}

	public function save($user) {
		$connection = $this->getConnection();
		$connection->beginTransaction();
		try {
			$query = "INSERT INTO usuario (nombre, apellido, username, nroCliente, password, idRol) VALUES (?, ?, ?, ?, ?, ?)";
			$stmt = $connection->prepare($query);
			$params= array($user->getNombre(), $user->getApellido(), $user->getNroCliente(), $user->getUsername(), $user->getPassword(), $user->getRol());
			$stmt->execute($params);
			$connection->commit();
		} catch (PDOException $e) {
			$connection->rollBack();
		}
		return;
	}

	public function delete($idUser) {
		$connection = $this->getConnection();
		$query = "UPDATE usuario SET eliminado = 1 WHERE id = :idUser";
		$stmt = $connection->prepare($query);
		$stmt->bindParam(':idUser', $idUser, PDO::PARAM_INT, 11);
		return $stmt->execute();
	}
}