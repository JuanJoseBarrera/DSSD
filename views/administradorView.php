<?php
class AdministradorView extends Twig {
	public function show($message=NULL) {
		echo self::getTwig()->render('administrador.html', array('message' => $message));
	}
}