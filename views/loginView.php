<?php
class LoginView extends Twig {
	public function show($message=NULL) {
		echo self::getTwig()->render('login.html', array('message' => $message));
	}
}