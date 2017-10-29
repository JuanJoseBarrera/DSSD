<?php
class AdministradorController {

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
		return (!strcmp($rol, 'Administrador'));
	}

	public function index($message=NULL) {
		$view = new AdministradorView();
		$view->show();
	}

	public function formUsuario() {
		$view = new UserFormView();
		$view->show();
	}

	public function usuariosList() {
		$usuarios = UsuarioDB::getInstance()->getAll();
		$view = new UserListView();
		$view->show($usuarios);
	}
}