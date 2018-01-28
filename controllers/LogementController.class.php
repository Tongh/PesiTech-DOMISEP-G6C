<?php

class LogementController extends Controller {
	function index() {
		$model = new LogementModel;
		if ($result = $model -> view()) {
			if (gettype($result) == "string") {
					$this -> set('Err', $result);
			} else {
					$this -> set('result', $result);
			}
		}
		$this -> set('title', 'Gesion de Logement');
    $this -> set('content', 'Bienvenue sur votre espace client!');
    $this -> render();
	}

	function add() {
		$this -> set('title', 'Ajouter un Logement');
    $this -> set('content', 'Bienvenue sur votre espace client!');
    $this -> render();
	}

}
