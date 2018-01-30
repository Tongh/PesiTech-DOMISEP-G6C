<?php

class CapteurModel extends Model {

	function viewClient() {
		$login = $_SESSION["User"];
		$sql = 'SELECT id_utilisateur FROM `utilisateur` WHERE login = \'' . $login . '\'';
		if ($result = $this -> query($sql)) {
			$id_login = $result[0]['utilisateur']['id_utilisateur'];
			$sql = 'SELECT * FROM `piece` WHERE 	`id_client` = \'' . $id_login . '\'';
			if ($result = $this -> query($sql)) {
				return $result;
			} return "Vous n'avez pas encore inscrire vos capteurs sur votre compte, vous pouvez maintenant en inscrire une !";
		} return "Le site rencontre des problème imprévue!";
	}

  function viewPiece() {
		$sql = 'SELECT * FROM `capteur` WHERE 	`piece_ID` = \'' . $_SESSION["id_piece"] . '\'';
		if ($result = $this -> query($sql)) {
			return $result;
		} return "Vous n'avez pas encore inscrire vos capteurs sur cette pièce, vous pouvez maintenant en inscrire une !";
	}


	function add($type_capteur, $nom) {
		$login = $_SESSION["User"];
		$sql = 'SELECT id_utilisateur FROM `utilisateur` WHERE login = \'' . $login . '\'';
		if ($result = $this -> query($sql)) {
			$id_login = $result[0]['utilisateur']['id_utilisateur'];
			//$sql = (isset($label_piece) && !empty($label_piece)) ? 'INSERT INTO `piece` (`superficie`, `nom`, `type`, `id_logement`, `logement_utilisateur_id utilisateur`, `label_piece`)  VALUES 	(\'' . $superficie . '\', \'' . $nom . '\', \'' . $type . '\', \'' . $id_logement . '\', \'' . $id_login . '\', \'' . $label_piece .'\')' : 'INSERT INTO `piece` (`superficie`, `nom`, `type`, `id_logement`, `logement_utilisateur_id utilisateur`, `label_piece`)  VALUES 	(\'' . $superficie . '\', \'' . $nom . '\', \'' . $type . '\', \'' . $id_logement . '\', \'' . $id_login . '\', \'' . $label_piece .'\')';
			$sql = 'INSERT INTO `capteur` (`type_capteur`, `nom`, `piece_ID`, `utilisateur_id`)  VALUES 	(\'' . $type_capteur . '\', \'' . $nom . '\', \'' . $_SESSION["id_piece"] . '\', \'' . $id_login .'\')';
			return $this -> query($sql);
		} return "Le site rencontre des problème imprévue!";
	}

}
