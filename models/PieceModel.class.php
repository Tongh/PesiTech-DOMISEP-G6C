<?php

class PieceModel extends Model {

	function viewClient() {
		$login = $_SESSION["User"];
		$sql = 'SELECT id_utilisateur FROM `utilisateur` WHERE login = \'' . $login . '\'';
		if ($result = $this -> query($sql)) {
			$id_login = $result[0]['utilisateur']['id_utilisateur'];
			$sql = 'SELECT * FROM `piece` WHERE 	`id_client` = \'' . $id_login . '\'';
			if ($result = $this -> query($sql)) {
				return $result;
			} return "Vous n'avez pas encore inscrire vos pièces sur votre compte, vous pouvez maintenant en inscrire une !";
		} return "Le site rencontre des problème imprévue!";
	}

  function viewLogement() {
		$sql = 'SELECT * FROM `piece` WHERE 	`id_logement` = \'' . $_SESSION["id_logement"] . '\'';
		if ($result = $this -> query($sql)) {
			return $result;
		} return "Vous n'avez pas encore inscrire vos pièces sur ce logement, vous pouvez maintenant en inscrire une !";
	}


	function add($superficie, $nom, $type, $label_piece=null) {
		$login = $_SESSION["User"];
		$sql = 'SELECT id_utilisateur FROM `utilisateur` WHERE login = \'' . $login . '\'';
		if ($result = $this -> query($sql)) {
			$id_login = $result[0]['utilisateur']['id_utilisateur'];
			//$sql = (isset($label_piece) && !empty($label_piece)) ? 'INSERT INTO `piece` (`superficie`, `nom`, `type`, `id_logement`, `logement_utilisateur_id utilisateur`, `label_piece`)  VALUES 	(\'' . $superficie . '\', \'' . $nom . '\', \'' . $type . '\', \'' . $id_logement . '\', \'' . $id_login . '\', \'' . $label_piece .'\')' : 'INSERT INTO `piece` (`superficie`, `nom`, `type`, `id_logement`, `logement_utilisateur_id utilisateur`, `label_piece`)  VALUES 	(\'' . $superficie . '\', \'' . $nom . '\', \'' . $type . '\', \'' . $id_logement . '\', \'' . $id_login . '\', \'' . $label_piece .'\')';
			$sql = 'INSERT INTO `piece` (`superficie`, `nom`, `type`, `id_logement`, `id_client`)  VALUES 	(\'' . $superficie . '\', \'' . $nom . '\', \'' . $type . '\', \'' . $_SESSION["id_logement"] . '\', \'' . $id_login .'\')';
			return $this -> query($sql);
		} return "Le site rencontre des problème imprévue!";
	}

}
