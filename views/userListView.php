<?php
class UserListView extends Twig {
	public function show($usuarios, $message=NULL) {
		echo self::getTwig()->render('usuariosList.html', array('usuarios' => $usuarios, 'message' => $message));
	}
}