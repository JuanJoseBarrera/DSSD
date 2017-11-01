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

	public function formUsuario($message=NULL) {
		$roles = RolDB::getInstance()->getAll();
		$view = new UserFormView();
		$view->show($roles, $message=NULL);
	}

	public function usuariosList($message=NULL) {
		$usuarios = UsuarioDB::getInstance()->getAll();
		$view = new UserListView();
		$view->show($usuarios, $message);
	}

	public function saveUser() {
		if (($_POST['nombre']!="") && ($_POST['apellido']!="") && ($_POST['username']!="") && ($_POST['nroCliente']!="") && ($_POST['password']!="") && ($_POST['repeatPassword']!="") && ($_POST['rol']!="")) {
			$password = htmlentities($_POST['password']);
			$repeatPassword = htmlentities($_POST['repeatPassword']);
			$username = htmlentities($_POST['username']);
			$usuario_db = UsuarioDB::getInstance();
			$user = $usuario_db->existUser($username);
			if ($user > 0) {
				$this->formUsuario('Ya existe un usuario con ese nombre');
			} elseif ($password != $repeatPassword) {
				$this->formUsuario("Las contraseñas deben ser iguales");
			} else {
				$usuario = new Usuario('id', $username, $password, htmlentities($_POST['nombre']), htmlentities($_POST['apellido']), htmlentities($_POST['nroCliente']), 'fecha', $_POST['rol']);
				$usuario_db->save($usuario);
				$this->usuariosList("El usuario fué creado correctamente");
			}
		} else {
			$this->formUsuario("Completar todos los campos");
		}
	}

	public function deleteUser() {
		$userId = $_GET['userId'];
		$usuario_db = UsuarioDB::getInstance();
		$usuario_db->delete($userId);
		$this->usuariosList("El usuario fué eliminado con exito");
	}
}