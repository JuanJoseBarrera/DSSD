<?php

class Incidente {

	private $id;
	private $nroCliente;
	private $tipo;
	private $fecha;
	private $objetos;
	private $descripcion;

	function __construct() {}

	/**
	* GETTERS
	*/
	public function getId() {
		return $THIS->id;
	}

	public function getNroCliente() {
		return $THIS->nroCliente;
	}

	public function getTipo() {
		return $THIS->tipo;
	}

	public function getFecha() {
		return $THIS->fecha;
	}

	public function getObjetos() {
		return $THIS->objetos;
	}

	public function getDescripcion() {
		return $THIS->descripcion;
	}

	/**
	* SETTERS
	*/

	public function setId($id) {
		$this->id = $id;
	}

	public function setNroCliente($nroCliente) {
		$this->nroCliente = $nroCliente;
	}

	public function setTipo($tipo) {
		$this->tipo = $tipo;
	}

	public function setFecha($fecha) {
		$this->fecha = $fecha;
	}

	public function setObjetos($objetos) {
		$this->objetos = $objetos;
	}

	public function setDescripcion($descripcion) {
		$this->descripcion = $descripcion;
	}

}
