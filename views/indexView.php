<?php
class IndexView extends Twig {
	public function show($type=NULL, $message=NULL) {
		if ($type=='error') {
			echo self::getTwig()->render('index.html', array('error' => $message));
		} else {
			echo self::getTwig()->render('index.html', array('message' => $message));
		}
	}
}