<?php

class Incidente {

	private $id;
	private $nroCliente;
	private $tipo;
	private $fecha;
	private $objetos;
	private $descripcion;

	function __construct($id, $nroCliente, $tipo, $fecha, $objetos, $descripcion) {
		$this->id = $id;
		$this->nroCliente = $nroCliente;
		$this->tipo = $tipo;
		$this->fecha = $fecha;
		$this->objetos = $objetos;
		$this->descripcion = $descripcion;
	}

	/**
	* GETTERS
	*/
	public function getId() {
		return $this->id;
	}

	public function getNroCliente() {
		return $this->nroCliente;
	}

	public function getTipo() {
		return $this->tipo;
	}

	public function getFecha() {
		return $this->fecha;
	}

	public function getObjetos() {
		return $this->objetos;
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
