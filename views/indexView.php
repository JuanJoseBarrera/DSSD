<?php
class IndexView extends Twig {
	public function show($message=NULL) {
		echo self::getTwig()->render('index.html', array('message' => $message));
	}
}