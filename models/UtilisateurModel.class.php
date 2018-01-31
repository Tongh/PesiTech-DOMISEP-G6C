<?php

class UtilisateurModel extends Model {
	function select($login) {
		$sql = "SELECT * FROM utilisateur WHERE login = '$login'";
		if ($result = $this -> query($sql)) {
			return $result;
		} return 0;
	}

	function getLogin($id_login) {
		$sql = "SELECT `login` FROM `utilisateur` WHERE `id_utilisateur` = '$id_login'";
		if ($result = $this -> query($sql, 1)) {
			return $result;
		} return 0;
	}
}
