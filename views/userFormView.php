<?php
class UserFormView extends Twig {
	public function show($roles, $message=NULL) {
		echo self::getTwig()->render('formUser.html', array('roles' => $roles, 'message' => $message));
	}
}