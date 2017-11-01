<?php

class Usuario {

	private $id;
	private $username;
	private $password;
	private $nombre;
	private $apellido;
	private $nroCliente;
	private $fechaAlta;
	private $rol;

	function __construct($id, $username, $password, $nombre, $apellido, $nroCliente, $fechaAlta, $rol) {
		$this->id = $id;
		$this->username = $username;
		$this->password = $password;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->nroCliente = $nroCliente;
		$this->fechaAlta = $fechaAlta;
		$this->rol = $rol;
	}

	/**
	* GETTERS
	*/

	public function getId() {
		return $this->id;
	}
	
	public function getUsername() {
		return $this->username;
	}

	public function getPassword() {
		return $this->password;
	}

	public function getNombre() {
		return $this->nombre;
	}

	public function getApellido() {
		return $this->apellido;
	}

	public function getNroCliente() {
		return $this->nroCliente;
	}

	public function getFechaAlta() {
		return $this->fechaAlta;
	}

	public function getRol() {
		return $this->rol;
	}

	/**
	* SETTERS
	*/

	public function setId($id) {
		$this->id = $id;
	}

	public function setUsername($username) {
		$this->username = $username;
	}

	public function setPassword($password) {
		$this->password = $password;
	}

	public function setNombre($nombre) {
		$this->nombre = $nombre;
	}

	public function setApellido($apellido) {
		$this->apellido = $apellido;
	}

	public function setNroCliente($nroCliente) {
		$this->nroCliente = $nroCliente;
	}

	public function setFechaAlta($fechaAlta) {
		$this->fechaAlta = $fechaAlta;
	}

	public function setRol($rol) {
		$this->rol = $rol;
	}
}