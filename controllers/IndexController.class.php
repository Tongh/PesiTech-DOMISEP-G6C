<?php

class IndexController extends Controller {
	function index() {
		$this -> set('title', 'Accueil');
        $this -> set('content', 'Bienvenue sur le site de Pesitech');
        $this -> render();
	}
}