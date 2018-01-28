<?php 

class LogementController extends Controller {
	function index() {
		$this -> set('title', 'Gesion de Logement');
        $this -> set('content', 'Bienvenue sur votre espace client!');
        $this -> render();
	}
}