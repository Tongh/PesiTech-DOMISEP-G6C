<?php

class IndexController extends Controller {
	function index() {
		$this -> set('title', 'Accueil');
        $this -> set('content', '欢迎开发FastPHP!');
        $this -> render();
	}
}