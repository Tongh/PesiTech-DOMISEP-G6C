<?php 

class ConnexionModel extends UtilisateurModel {

	function connexion($login, $mdp) {
		if ($result = $this -> select($login)) {
			$mdpBC = $result[0]['utilisateur']['password'];
			if (password_verify($mdp, $mdpBC)) {
				$typeU = $result[0]['utilisateur']['typeUtilisateur'];
				if ($typeU == "admin") {
					//admin
					return 0;
				} else {
					//client
					return 0;
				}
			} else {
				return "Votre mot de passe est incorrect!";
			}
		} return "Votre login n'existe pas!";
		
	}

} 	