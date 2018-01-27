<?php 

class InscriptionController extends Controller {
	function index() {
		$this -> set('title', 'Page de l\'Inscription');
        $this -> set('content', 'Insérez votre information!');
        $this -> render();
	}

}