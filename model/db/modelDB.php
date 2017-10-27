<?php

define("USERNAME", "root");
define("PASSWORD", "");
define("HOST", "localhost");
define("DB", "dssd");


abstract class ModelDB {

	protected $db;
	protected $table;

	/*
	public function __construct() {
		try {
			$this->db = new PDO("mysql:host=" . HOST . ";dbname=grupo33", USERNAME, PASSWORD);
		} catch (PDOException $e) {
			$message =  "<pre>¡Error intentando conectar a la BD!: " . $e->getMessage() . "</pre>";
			die($message);
		}
	}

	public function findAll() {
		$query = $this->db->prepare("SELECT * FROM $this->table Where activo=1");
		$query->execute();
		$resu=$query->fetchAll();
		return $resu;
	}

	public function find_id($id){
		$query = $this->db->prepare("SELECT * FROM $this->table WHERE id = :id");
		$query->bindValue(":id", $id);
		$query->execute();

		if($query->rowCount() == 0) {
			return null;
		} else {
			return $query->fetch(PDO::FETCH_OBJ);
		}
	}
	*/

	protected function getConnection() {
		$u=USERNAME;
		$p=PASSWORD;
		$db=DB;
		$host=HOST;
		$connection = new PDO("mysql:dbname=$db;host=$host", $u, $p);
		$db=$connection;
		return $connection;
	}

	protected function queryList($sql, $args, $mapper) {
		$connection = $this->getConnection();
		$stmt = $connection->prepare($sql);
		$stmt->execute($args);
		$list = [];
		while($element = $stmt->fetch()){
			$list[] = $mapper($element);
		}
		return $list;
	}
}
