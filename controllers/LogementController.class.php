<?php

class LogementController extends Controller {
	function index() {
		$model = new LogementModel;
		if ($result = $model -> view()) {
			if (gettype($result) == "string") {
					$model -> set($Err, $result);
			} else {
					$model -> set($result, $result);
			}
		}
		$this -> set('title', 'Gesion de Logement');
    $this -> set('content', 'Bienvenue sur votre espace client!');
    $this -> render();
	}
}
