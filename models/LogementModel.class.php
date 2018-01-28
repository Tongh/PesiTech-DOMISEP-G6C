<?php 

class LogementModel extends Model {

	function view() {
		$login = $_SESSION["User"];
		$sql = 'SELECT id_utilisateur FROM `utilisateur` WHERE login = \'' . $login . '\'';
		if ($result = $this -> query($sql)) {
			$id_login = $result[0]['utilisateur']['id_utilisateur'];
			$sql = 'SELECT * FROM `logement` WHERE id_utilisateur = \'' . $id_login . '\'';
			if ($result = $this -> query($sql)) {
				return "Vous n'avez pas encore inscrire votre Logement tant que vos pièces et vos capteurs, vous pouvez maintenant en inscrire une !";
			} else {
				return $result;
			}
		} return "Le site rencontre des problème imprévue!";
	}

} 	