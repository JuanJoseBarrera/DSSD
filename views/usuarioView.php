<?php
class UsuarioView extends Twig {
	public function show($message=NULL) {
		echo self::getTwig()->render('user.html', array('message' => $message));
	}
}