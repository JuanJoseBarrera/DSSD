<?php
class IndexController {

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

	public function index($type=NULL, $message=NULL) {
		$view = new IndexView();
		$view->show($type, $message);
	}
}