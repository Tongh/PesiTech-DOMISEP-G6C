<?php 

class ConnexionController extends Controller {
	function index() {
		$this -> set('title', 'Page de Connexion');
        $this -> set('content', 'Insérez votre information!');
        $this -> render();
	}

	function connexion() {

	}
}