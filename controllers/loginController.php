<?php
class LoginController {
	private static $instance;

	public static function getInstance() {
		if (!isset(self::$instance)) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	private function __construct() {}

	public function getPermisos() {
		return true;
	}

	public function validar() {
		if ($_POST['username']=="") {
			throw new Exception('Ingrese un usuario');
		}
		if ($_POST['password']=="") {
			throw new Exception('Ingrese una clave');
		}

		$user = htmlentities($_POST['username']);
		$pass = htmlentities($_POST['password']);
		$user_db = new UsuarioDB();
		$new_user = $user_db->select($user, $pass);

		if (($new_user->getUsername() == $user) && ($new_user->getPassword() == $pass)) {
			$rol = $new_user->getRol()->getNombre();
			$controller = $rol.'Controller';
			Session::init();
			Session::set('usuario', $new_user->getUsername());
			Session::set('apellido', $new_user->getApellido());
			Session::set('nombre', $new_user->getNombre());
			Session::set('rol', $rol);
			$new_controller = $controller::getInstance()->index("");
		} else {
			$this->mensaje('Usuario o password invalido');
		}
	}

	public function login($message=NULL) {
		$view = new LoginView();
		$view->show();
	}

	public function logout() {
		Session::init();
		Session::destroy();
		IndexController::getInstance()->index();
	}

	public function mensaje($msj) {
		IndexController::getInstance()->index($msj);
	}
}