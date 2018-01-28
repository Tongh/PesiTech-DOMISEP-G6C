<?php 

class UtilisateurModel extends Model {
	function select($login) {
		$sql = "SELECT id_utilisateur,login,password,typeUtilisateur FROM utilisateur WHERE login = '$login'";
		if ($result = $this -> query($sql)) {
			return $result;
		} return 0;
	}
}