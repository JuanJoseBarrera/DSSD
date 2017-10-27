<?php
class UsuarioController {

	private static $instance;

	public static function getInstance() {
		if (!isset(self::$instance)) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	private function __construct() {}

	public function getPermisos() {
		Session::init();
		$rol = Session::get('rol');
		return (!strcmp($rol, 'Usuario'));
	}

	public function index($message=NULL) {
		$view = new UsuarioView();
		$view->show();
	}

	public function formIncidente() {
		$view = new FormIncidenteView();
		$view->show();
	}
}