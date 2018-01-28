<?php

class PieceModel extends Model {

	function view() {
		$login = $_SESSION["User"];
		$sql = 'SELECT id_utilisateur FROM `utilisateur` WHERE login = \'' . $login . '\'';
		if ($result = $this -> query($sql)) {
			$id_login = $result[0]['utilisateur']['id_utilisateur'];
			$sql = 'SELECT * FROM `piece` WHERE 	`utilisateur_id utilisateur` = \'' . $id_login . '\'';
			if ($result = $this -> query($sql)) {
				return $result;
			} return "Vous n'avez pas encore inscrire vos pièces sur votre compte, vous pouvez maintenant en inscrire une !";
		} return "Le site rencontre des problème imprévue!";
	}

	function add($superficie, $nom, $type, $label_piece=null) {
		$login = $_SESSION["User"];
    $id_logement = $_SESSION["id_logement"];
		$sql = 'SELECT id_utilisateur FROM `utilisateur` WHERE login = \'' . $login . '\'';
		if ($result = $this -> query($sql)) {
			$id_login = $result[0]['utilisateur']['id_utilisateur'];
			//$sql = (isset($label_piece) && !empty($label_piece)) ? 'INSERT INTO `piece` (`superficie`, `nom`, `type`, `id_logement`, `logement_utilisateur_id utilisateur`, `label_piece`)  VALUES 	(\'' . $superficie . '\', \'' . $nom . '\', \'' . $type . '\', \'' . $id_logement . '\', \'' . $id_login . '\', \'' . $label_piece .'\')' : 'INSERT INTO `piece` (`superficie`, `nom`, `type`, `id_logement`, `logement_utilisateur_id utilisateur`, `label_piece`)  VALUES 	(\'' . $superficie . '\', \'' . $nom . '\', \'' . $type . '\', \'' . $id_logement . '\', \'' . $id_login . '\', \'' . $label_piece .'\')';
			$sql = 'INSERT INTO `piece` (`superficie`, `nom`, `type`, `id_logement`, `logement_utilisateur_id utilisateur`, `label_piece`)  VALUES 	(\'' . $superficie . '\', \'' . $nom . '\', \'' . $type . '\', \'' . $id_logement . '\', \'' . $id_login .'\')';
			return $this -> query($sql);
		} return "Le site rencontre des problème imprévue!";
	}

}
