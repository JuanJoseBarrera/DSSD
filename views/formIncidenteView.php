<?php
class FormIncidenteView extends Twig {
	public function show($message=NULL) {
		echo self::getTwig()->render('formIncidente.html', array('message' => $message));
	}
}