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

	public function incidentesList() {
		Session::init();
		$id = Session::get('id');
		$incidenteDB = IncidenteDB::getInstance();
		$incidentes = $incidenteDB->selectByUserId($id);
		$view = new IncidentesListView();
		$view->show($incidentes);
	}

	public function saveIncident() {
		if (($_POST['nroCliente']!="") &&  ($_POST['descripcion']!="") && ($_POST['objeto']!="")) {
			$nroCliente = htmlentities($_POST['nroCliente']);
			$descripcion = htmlentities($_POST['descripcion']);
			$objetos = $_POST['objeto'];
			$incidente_db = IncidenteDB::getInstance();
			$incidente = new Incidente('id', $nroCliente, 'tipo', 'fecha', 'objetos', $descripcion);
			$incidente_db->save($incidente, $objetos);
			$this->incidentesList("El usuario fué creado correctamente");
		} else {
			$this->formIncidente("Completar todos los campos");
		}
	}
}