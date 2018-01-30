<?php

class UtilisateurModel extends Model {
	function select($login) {
		$sql = "SELECT * FROM utilisateur WHERE login = '$login'";
		if ($result = $this -> query($sql)) {
			return $result;
		} return 0;
	}
}
