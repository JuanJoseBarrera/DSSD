<?php
class IncidentesListView extends Twig {
	public function show($incidentes, $message=NULL) {
		echo self::getTwig()->render('incidentesList.html', array('incidentes' => $incidentes, 'message' => $message));
	}
}