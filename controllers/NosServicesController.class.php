<?php  

class NosServicesController extends Controller {
	function index() {
		$this -> set('title', 'Nos Services');
        $this -> set('content', 'Nous vous fournissons beaucoup de service!');
        $this -> render();
	}
}