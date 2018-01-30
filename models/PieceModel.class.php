<?php

class PieceModel extends Model {

	function viewClient() {
		$sql = 'SELECT * FROM `piece` WHERE 	`id_client` = \'' . $_SESSION["UserID"] . '\'';
		if ($result = $this -> query($sql)) {
			return $result;
		} return "Vous n'avez pas encore inscrire vos pièces sur votre compte, vous pouvez maintenant en inscrire une !";
	}

  function viewLogement() {
		$sql = 'SELECT * FROM `piece` WHERE 	`id_logement` = \'' . $_SESSION["id_logement"] . '\'';
		if ($result = $this -> query($sql)) {
			return $result;
		} return "Vous n'avez pas encore inscrire vos pièces sur ce logement, vous pouvez maintenant en inscrire une !";
	}


	function add($superficie, $nom, $type, $label_piece=null) {
			//$sql = (isset($label_piece) && !empty($label_piece)) ? 'INSERT INTO `piece` (`superficie`, `nom`, `type`, `id_logement`, `logement_utilisateur_id utilisateur`, `label_piece`)  VALUES 	(\'' . $superficie . '\', \'' . $nom . '\', \'' . $type . '\', \'' . $id_logement . '\', \'' . $id_login . '\', \'' . $label_piece .'\')' : 'INSERT INTO `piece` (`superficie`, `nom`, `type`, `id_logement`, `logement_utilisateur_id utilisateur`, `label_piece`)  VALUES 	(\'' . $superficie . '\', \'' . $nom . '\', \'' . $type . '\', \'' . $id_logement . '\', \'' . $id_login . '\', \'' . $label_piece .'\')';
			$sql = 'INSERT INTO `piece` (`superficie`, `nom`, `type`, `id_logement`, `id_client`)  VALUES 	(\'' . $superficie . '\', \'' . $nom . '\', \'' . $type . '\', \'' . $_SESSION["id_logement"] . '\', \'' . $_SESSION["UserID"] .'\')';
			return $this -> query($sql);
	}

}
