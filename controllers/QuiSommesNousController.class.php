<?php

class QuiSommesNousController extends Controller {
	function index() {
		$this -> set('title', 'Qui sommes nous?');
        $this -> set('content', 'Nous sommes le groupe 6 C!');
        $this -> render();
	}
}
