<?php 

class NousContacterController extends Controller {
	function index() {
		$this -> set('title', 'Comment Nous Contacter');
        $this -> set('content', 'Vous pouvez nous envoyer des Mail!');
        $this -> render();
	}
}