<?php 

class AcheterController extends Controller {
	function index() {
		$this -> set('title', 'Notre Produit');
        $this -> set('content', 'Nous avons beaucoup de produits!');
        $this -> render();
	}
}