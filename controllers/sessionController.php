<?php
class Session {

	public static function init() {
		if (!isset($_SESSION)) {
			session_start();
		}
	}

	public static function set ($key, $value) {
		$_SESSION[$key] = $value;
	}

	public static function get($key) {
		if (isset($_SESSION[$key])) {
			return $_SESSION[$key];
		}
	}

	public static function destroy() {
		$_SESSION = array();
		session_destroy();
	}

	public static function validateToken($form_token) {
		if (!isset($_SESSION['session_token'])) {
			return false;
		} else {
			return ($_SESSION['session_token'] == $form_token);
		}
	}
}