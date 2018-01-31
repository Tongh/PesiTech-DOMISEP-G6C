<?php

class LogementModel extends Model {

	function view() {
		$sql = 'SELECT * FROM `logement` WHERE 	`utilisateur_id utilisateur` = \'' . $_SESSION["UserID"] . '\'';
		if ($result = $this -> query($sql)) {
			return $result;
		} return "Vous n'avez pas encore enregistré votre logement ainsi que vos pièces et vos capteurs, vous pouvez dès maintenant en enregistrer un !";
	}

	function add($address) {
		$sql = 'INSERT INTO `logement` (`address`, `utilisateur_id utilisateur`)  VALUES 	(\'' . $address . '\', \'' . $_SESSION["UserID"] . '\')';
		return $this -> query($sql);
	}

	function remove($id_logement) {
		$sql = 'DELETE FROM `logement` WHERE `id_logement` = ' . $id_logement;
		return $this -> query($sql);
	}

	function addressChange($id_logement, $address) {
		$sql = "UPDATE `logement` SET `address` = '" . $address . "' WHERE `id_logement` = '"  . $id_logement . "'";
		return $this -> query($sql);
	}

}
