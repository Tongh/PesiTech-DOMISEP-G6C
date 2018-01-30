<?php

class CapteurModel extends Model {

	function viewClient() {
		$sql = 'SELECT * FROM `capteur` WHERE 	`id_client` = \'' . $_SESSION["UserID"] . '\'';
		if ($result = $this -> query($sql)) {
			return $result;
		} return "Vous n'avez pas encore enregistré vos capteurs sur ce compte, vous pouvez maintenant en enregistrer un !";
	}

  function viewPiece() {
		$sql = 'SELECT * FROM `capteur` WHERE 	`piece_ID` = \'' . $_SESSION["id_piece"] . '\'';
		if ($result = $this -> query($sql)) {
			return $result;
		} return "Vous n'avez pas encore enregistré vos capteurs dans cete pièce, vous pouvez maintenant en enregistrer une !";
	}


	function add($type_capteur, $nom) {
			//$sql = (isset($label_piece) && !empty($label_piece)) ? 'INSERT INTO `piece` (`superficie`, `nom`, `type`, `id_logement`, `logement_utilisateur_id utilisateur`, `label_piece`)  VALUES 	(\'' . $superficie . '\', \'' . $nom . '\', \'' . $type . '\', \'' . $id_logement . '\', \'' . $id_login . '\', \'' . $label_piece .'\')' : 'INSERT INTO `piece` (`superficie`, `nom`, `type`, `id_logement`, `logement_utilisateur_id utilisateur`, `label_piece`)  VALUES 	(\'' . $superficie . '\', \'' . $nom . '\', \'' . $type . '\', \'' . $id_logement . '\', \'' . $id_login . '\', \'' . $label_piece .'\')';
			$sql = 'INSERT INTO `capteur` (`type_capteur`, `nom`, `piece_ID`, `utilisateur_id`)  VALUES 	(\'' . $type_capteur . '\', \'' . $nom . '\', \'' . $_SESSION["id_piece"] . '\', \'' . $_SESSION["UserID"] .'\')';
			return $this -> query($sql);
	}

	function getPieceID($id_capteur) {
		$sql = 'SELECT `piece_ID` FROM `capteur` WHERE 	`id_capteur` = \'' . $id_capteur . '\'';
		if ($result = $this -> query($sql)) {
			return $result[0]["capteur"]["piece_ID"];
		} return 0;
	}

	function getPieceName($id_capteur) {
		$id_piece = $this -> getPieceID($id_capteur);
		$sql = 'SELECT `nom` FROM `piece` WHERE 	`id_piece` = \'' . $id_piece . '\'';
		if ($result = $this -> query($sql)) {
			return $result[0]["piece"]["nom"];
		} return 0;
	}

	function getCapteurName($id_capteur) {
		$sql = 'SELECT `nom` FROM `capteur` WHERE 	`id_capteur` = \'' . $id_capteur . '\'';
		if ($result = $this -> query($sql)) {
			return $result[0]["capteur"]["nom"];
		} return 0;
	}

	function getCapteurType($id_capteur) {
		$sql = 'SELECT `type_capteur` FROM `capteur` WHERE 	`id_capteur` = \'' . $id_capteur . '\'';
		if ($result = $this -> query($sql)) {
			return $result[0]["capteur"]["type_capteur"];
		} return 0;
	}
}
