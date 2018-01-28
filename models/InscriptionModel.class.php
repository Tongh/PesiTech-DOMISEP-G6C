<?php 

class InscriptionModel extends UtilisateurModel {

	function add($nom, $prenom, $login, $mdpBC, $email, $tele, $typeU, $codeV) {
		$sql = 'SELECT * FROM `utilisateur` WHERE login = \'' . $login . '\'';
		if ($result = $this -> query($sql)) {
			return "Votre login est déjà pris.";
		} else {
			if ($typeU == "admin") {
				$tblname = "codeAdmin";
			} else {
				$tblname = "codeClient";
			} 
			$sql = "SELECT code FROM $tblname WHERE code = '$codeV'";
			if (!$result = $this -> query($sql)) {
				return "Votre Code est incorrect, merci de le vérifier!";
			} else {
				$sql = "SELECT utilise FROM $tblname WHERE code = '$codeV'";
				if ($result = $this -> query($sql)) {
					if ($result[0][$tblname]['utilise'] == 1) {
						return "Votre Code est déjà utilisé!";
					} else {
						$sql = "INSERT INTO `utilisateur` (`nom`, `prenom`, `login`, `password`, `email`, `telephone`, `typeUtilisateur`) VALUES ('$nom', '$prenom', '$login', '$mdpBC', '$email', '$tele', '$typeU')";
						if ($this -> query($sql)) {
							return "Insert into utlisateur échec!";
						} else {
							$id_User = mysqli_insert_id($this -> _dbHandle);
							$sql = "UPDATE $tblname SET utilise = 1 , id_client = $id_User WHERE code = '$codeV'";
							if ($this -> query($sql)) {
								return "Update tableau codeV échec!";
							} 
							if ($typeU == "admin") {
								$_SESSION["AdminMode"] = "ON";
							} else {
								$_SESSION["AdminMode"] = "OFF";
							}
							$_SESSION["User"] = $login;
							$_SESSION["LoginMode"] = "ON";
							return 0;
						}
					}
				} return "Obtenir Utilise ou pas échec!";
			}
		} return "Obtenir les CodeV échec!";
	}
} 	

