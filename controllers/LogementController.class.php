<?php

class LogementController extends Controller {
	function index() {
		$model = new LogementModel;
		if ($result = $model -> view()) {
			if (gettype($result) == "string") {
					$this -> set('Err', $result);
			} else {
					$this -> set('result', $result);
			}
		}
		$this -> set('title', 'Gestion de Logement');
    $this -> set('content', 'Bienvenue sur votre espace client!');
    $this -> render();
	}

	function addForm() {
		$address = $_POST['address'];
		$model = new LogementModel;
		if ($result = $model -> add($address)) {
			$to = 'Location: index.php?controller=Logement&action=add&Err='.$result;
			header($to);
		} else {
			$this -> set('Err', "Ajouté avec succès!");
			$to = 'Location: index.php?controller=Logement&action=index';
			header($to);
		}
	}

	function addressForm() {
		$address = $_POST['address'];
		$id_logement = $_POST['id_logement'];
		$model = new LogementModel;
		$model -> addressChange($id_logement, $address);
		$this -> set('title', "Votre modifications a été enregistré!");
		$to = 'Location: index.php?controller=Logement&action=index&Err='.$result;
		header($to);
	}

	function supprimerForm() {
		$id_logement = $_POST['id_logement'];
		$model = new LogementModel;
		$model -> remove($id_logement);
		$this -> set('title', "Supprimer avec succès!");
		$to = 'Location: index.php?controller=Logement&action=index&Err='.$result;
		header($to);
	}

	function add() {
		$this -> set('title', 'Ajouter un Logement');
		$this -> set('content', 'Bienvenue sur votre espace client!');
		$this -> render();
	}

}
