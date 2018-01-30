<?php

class NousContacterController extends Controller {
	function index() {
		$this -> set('title', 'Comment Nous Contacter');
    $this -> set('content', 'Vous pouvez nous envoyer des Mail!');
    $this -> render();
	}

	function panne() {
		$this -> set('title', 'Panne envoyer');
    $this -> set('content', 'Vous pouvez nous envoyer des Mail!');
    $this -> render();
	}

	function panneEnvoyer() {
		$this -> set('title', 'Votre Panne a déjà envoyé');
    $this -> set('content', 'Merci de nous Contacter!');
    $this -> render();
	}


}
