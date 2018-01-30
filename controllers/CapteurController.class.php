<?php

class CapteurController extends Controller {
	function index() {
		$this -> set('title', 'Gesion des Capteurs');
    $this -> set('content', 'Bienvenue sur votre espace client!');
    $this -> render();
	}

  function add() {
    $this -> set('title', 'Ajouter un capteur');
    $this -> set('content', 'Bienvenue sur votre espace client!');
    $this -> render();
  }




}
