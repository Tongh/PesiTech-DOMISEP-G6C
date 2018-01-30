<?php

class PieceController extends Controller {
	function index() {
		$model = new PieceModel;
		if (isset($_GET['id_logement']) && !empty($_GET['id_logement'])) $_SESSION["id_logement"] = $_GET['id_logement'];
		if (isset($_GET['moyen']) && $_GET['moyen'] == "client") {
			if ($result = $model -> viewClient()) {
				if (gettype($result) == "string") {
						$this -> set('Err', $result);
				} else {
						$this -> set('result', $result);
				}
			}
		} else {
			if ($result = $model -> viewLogement()) {
				if (gettype($result) == "string") {
						$this -> set('Err', $result);
				} else {
						$this -> set('result', $result);
				}
			}
		}
		$this -> set('title', 'Gestion de pièce');
    $this -> set('content', 'Bienvenue sur votre espace client!');
    $this -> render();
	}

	function addForm() {
		$superficie = $_POST['superficie'];
		$nom = $_POST['nom'];
		$type = $_POST['type'];
		if (isset($_POST['label_piece']) && !empty($_POST['label_piece'])) $label_piece = $_POST['label_piece'];
		$model = new PieceModel;
		//if ($result = (isset($_POST['label_piece']) && !empty($_POST['label_piece'])) ? $model -> add($superficie, $nom, $type, $label_piece) : $model -> add($superficie, $nom, $type )) {
		if ($result = $model -> add($superficie, $nom, $type)) {
			$to = 'Location: index.php?controller=Piece&action=add&Err='.$result;
			header($to);
		} else {
			$this -> set('Err', "Ajouté avec succès!");
			$to = 'Location: index.php?controller=Piece&action=index';
			header($to);
		}
	}

	function add() {
		$this -> set('title', 'Ajouter une Pièce');
		$this -> set('content', 'Bienvenue sur votre espace client!');
		$this -> render();
	}



}
