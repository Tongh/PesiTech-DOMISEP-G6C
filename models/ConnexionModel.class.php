<?php

class ConnexionModel extends UtilisateurModel {

	function connexion($login, $mdp) {
		if ($result = $this -> select($login)) {
			$mdpBC = $result[0]['utilisateur']['password'];
			if (password_verify($mdp, $mdpBC)) {
				$typeU = $result[0]['utilisateur']['typeUtilisateur'];
				$_SESSION["UserID"] = $result[0]['utilisateur']['id_utilisateur'];
				$_SESSION["User"] = $login;
				$_SESSION["LoginMode"] = "ON";
				$_SESSION["EMAIL"] = $result[0]['utilisateur']['email'];
				$_SESSION["Telephone"] = $result[0]['utilisateur']['telephone'];
				$_SESSION["NomUser"] = $result[0]['utilisateur']['nom'];
				$_SESSION["PrenomUser"] = $result[0]['utilisateur']['prenom'];
				if ($typeU == "admin") {
					$_SESSION["AdminMode"] = "ON";
					return 0;
				} else {
					$_SESSION["AdminMode"] = "OFF";
					return 0;
				}
			} else {
				return "Votre mot de passe est incorrect!";
			}
		} return "Votre login n'existe pas!";

	}

}
