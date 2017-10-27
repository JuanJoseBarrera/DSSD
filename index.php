<?php

/** CONTROLLERS **/
require_once './controllers/indexController.php';
require_once './controllers/loginController.php';
require_once './controllers/sessionController.php';
require_once './controllers/usuarioController.php';

/** MODELO CLASES **/
require_once './model/clases/cliente.php';
require_once './model/clases/incidente.php';
require_once './model/clases/objeto.php';
require_once './model/clases/rol.php';
require_once './model/clases/tipo.php';
require_once './model/clases/usuario.php';

/** MODELO CONSULTAS **/
require_once './model/db/modelDB.php';
require_once './model/db/rolDB.php';
require_once './model/db/usuarioDB.php';

/** VISTAS **/
require_once './views/twig.php';
require_once './views/indexView.php';
require_once './views/loginView.php';

try {
	if(!isset($_GET['class'])) {
		IndexController::getInstance()->index();
	} elseif (!isset($_GET['action'])) {
		IndexController::getInstance()->index();
	} else {
		$class=$_GET['class'];
		$action=$_GET['action'];
		if(!class_exists($class)) {
			throw new Exception("No existe la clase");
		}
		if(!method_exists($class,$action)) {
			Session::init();
			$rol = Session::get('rol');
			$message = "No existe ese metodo en la clase";
			if ($rol) {
				$controller = $class::getInstance()->index($message);
			} else {
				IndexController::getInstance()->index($message);
			}
		}
		$controller = $class::getInstance();
		if (!$controller->getPermisos()) {
			Session::init();
			$rol = Session::get('rol');
			$class = $rol.'Controller';
			$message = "El usuario no tiene permisos";
			if ($rol) {
				$controller = $class::getInstance()->index($message);
			} else {
				IndexController::getInstance()->index($message);
			}
		} else {
			$controller::getInstance()->$action();
		}
	}
} catch (Exception $e) {
	IndexController::getInstance()->index($e->getMessage());
}