<?php

class Tipo {

	private  $id;
	private  $nombre;

	function __construct() {}

	/**
	* GETTERS
	*/

	public function getId() {
		return $this->id;
	}

	public function getNombre() {
		return $this->nombre;
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
}