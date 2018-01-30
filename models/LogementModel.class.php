<?php

class LogementModel extends Model {

	function view() {
		$sql = 'SELECT * FROM `logement` WHERE 	`utilisateur_id utilisateur` = \'' . $_SESSION["UserID"] . '\'';
		if ($result = $this -> query($sql)) {
			return $result;
		} return "Vous n'avez pas encore inscrire votre Logement tant que vos pièces et vos capteurs, vous pouvez maintenant en inscrire une !";
	}

	function add($address) {
		$sql = 'INSERT INTO `logement` (`address`, `utilisateur_id utilisateur`)  VALUES 	(\'' . $address . '\', \'' . $_SESSION["UserID"] . '\')';
		return $this -> query($sql);
	}

}
