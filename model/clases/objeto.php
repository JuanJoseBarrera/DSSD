<?php

class Objeto {

	private $id;
	private $nombre;
	private $descripcion;

	function __construct($id, $nombre, $descripcion) {
		$this->id = $id;
		$this->nombre = $nombre;
		$this->descripcion = $descripcion;
	}

	/**
	* GETTERS
	*/

	public function getId() {
		return $this->id;
	}

	public function getNombre() {
		return $this->nombre;
	}

	public function getDescripcion() {
		return $this->descripcion;
	}

	/**
	* SETTERS
	*/

	public function setId($id) {
		$this->id = $id;
	}

	public function setNombre($nombre) {
		$this->nombre = $nombre;
	}

	public function setDescripcion($descripcion) {
		$this->descripcion = $descripcion;
	}
}
