<?php

class Cliente {

	private $id;
	private $nombre;
	private $apellido;
	private $documento;
	private $direccion;
	private $fecha_nacimiento;
	private $incidentes;

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

	public function getApellido() {
		return $this->apellido;
	}
	
	public function getDocumento() {
		return $this->documento;
	}
	
	public function getDireccion() {
		return $this->direccion;
	}
	
	public function getFecha_nacimiento() {
		return $this->fecha_nacimiento;
	}
	
	public function getIncidentes() {
		return $this->incidentes;
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

	public function setApellido($apellido) {
		$this->apellido = $apellido;
	}

	public function setDocumento($documento) {
		$this->documento = $documento;
	}

	public function setDireccion($direccion) {
		$this->direccion = $direccion;
	}

	public function setFecha_nacimiento($fecha_nacimiento) {
		$this->fecha_nacimiento = $fecha_nacimiento;
	}

	public function setIncidentes($incidentes) {
		$this->incidentes = $incidentes;
	}
}
