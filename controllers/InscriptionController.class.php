<?php

class InscriptionController extends Controller {
	function index() {
		$this -> set('title', 'Page d\'inscription');
    $this -> set('content', 'Insérez votre information!');
    $this -> render();
	}

	function attend() {
		$nom = $_POST["nom"];
		$prenom = $_POST["prenom"];
		$email = $_POST["email"];
		$login = $_POST["login"];
		$mdp = $_POST["mdp"];
		$mdpC = $_POST["mdpC"];
		$tele = $_POST["tele"];
		$typeU = $_POST["typeU"];
		$codeV = $_POST["codeV"];
		//$ville = test_input($_POST["ville"]);
		//$adresse = test_input($_POST["adresse"]);
		//$cptadresse = test_input($_POST["cptadresse"]);
		//$codepostal = test_input($_POST["codepostal"]);
		$mdpBC = password_hash($mdp, PASSWORD_DEFAULT);
		$model = new InscriptionModel;
		if ($Err = $model -> add($nom, $prenom, $login, $mdpBC, $email, $tele, $typeU, $codeV)) {
			$to = 'Location: index.php?controller=Inscription&Err='.$Err;
			header($to);
		} else {
			$this -> set('title', 'Connexion en cours');
			$this -> set('content', 'Inscription en cours!');
			$this -> render();
		}
	}

	function fin() {
		$this -> set('title', 'Inscription réussie');
    $this -> set('content', 'Noter ces informations importantes!');
    $this -> render();
	}

	function finAdmin() {
		$this -> set('title', 'Inscription réussie');
		$this -> set('content', 'Noter ces informations importantes!');
		$this -> render();
	}


}
