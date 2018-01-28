<?php 

class EspaceClientController extends Controller {
	function index() {
		$this -> set('title', 'Espace Client');
        $this -> set('content', 'Bienvenue sur votre espace client!');
        $this -> render();
	}
}