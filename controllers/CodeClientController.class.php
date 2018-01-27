<?php  

class CodeClientController extends Controller {
	function index() {
		$this -> set('title', 'La liste des codes Pesitech clientèles');
        $this -> set('content', 'Bienvenue sur le site de Pesitech');
        $this -> render();
	}
}