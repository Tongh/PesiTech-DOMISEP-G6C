<?php 

class PieceController extends Controller {
	function index() {
		$this -> set('title', 'Gesion de Piece');
        $this -> set('content', 'Bienvenue sur votre espace client!');
        $this -> render();
	}
}