<?php

class CapteurModel extends Model {

	function viewClient() {
		$sql = 'SELECT * FROM `piece` WHERE 	`id_client` = \'' . $_SESSION["UserID"] . '\'';
		if ($result = $this -> query($sql)) {
			return $result;
		} return "Vous n'avez pas encore inscrire vos capteurs sur votre compte, vous pouvez maintenant en inscrire une !";
	}

  function viewPiece() {
		$sql = 'SELECT * FROM `capteur` WHERE 	`piece_ID` = \'' . $_SESSION["id_piece"] . '\'';
		if ($result = $this -> query($sql)) {
			return $result;
		} return "Vous n'avez pas encore inscrire vos capteurs sur cette pièce, vous pouvez maintenant en inscrire une !";
	}


	function add($type_capteur, $nom) {
			//$sql = (isset($label_piece) && !empty($label_piece)) ? 'INSERT INTO `piece` (`superficie`, `nom`, `type`, `id_logement`, `logement_utilisateur_id utilisateur`, `label_piece`)  VALUES 	(\'' . $superficie . '\', \'' . $nom . '\', \'' . $type . '\', \'' . $id_logement . '\', \'' . $id_login . '\', \'' . $label_piece .'\')' : 'INSERT INTO `piece` (`superficie`, `nom`, `type`, `id_logement`, `logement_utilisateur_id utilisateur`, `label_piece`)  VALUES 	(\'' . $superficie . '\', \'' . $nom . '\', \'' . $type . '\', \'' . $id_logement . '\', \'' . $id_login . '\', \'' . $label_piece .'\')';
			$sql = 'INSERT INTO `capteur` (`type_capteur`, `nom`, `piece_ID`, `utilisateur_id`)  VALUES 	(\'' . $type_capteur . '\', \'' . $nom . '\', \'' . $_SESSION["id_piece"] . '\', \'' . $_SESSION["UserID"] .'\')';
			return $this -> query($sql);
	}

}
