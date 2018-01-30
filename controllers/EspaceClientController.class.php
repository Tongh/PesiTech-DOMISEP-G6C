<?php

class EspaceClientController extends Controller {
	function index() {
		$model = new EspaceClientModel;
		if ($result = $model -> getUserInfo()) {
			if (gettype($result) == "string") {
					$this -> set('Err', $result);
			} else {
					$this -> set('result', $result);
			}
		}
		$this -> set('title', 'Mon Profil');
    $this -> set('content', 'Bienvenue ' . $result[0]["utilisateur"]["prenom"]. " " . $result[0]["utilisateur"]["nom"]);
    $this -> render();
	}

	function changerMdp() {
		$this -> set('title', 'Votre nouveau mot de passe a bien enregisté!');
		$this -> set('content', 'Bienvenue sur votre espace client!');
		$this -> render();
	}

	function installations() {
		$this -> set('title', 'Vos installations : ');
		$this -> set('content', 'Bienvenue sur votre espace client!');
		$this -> render();
	}
}
