<?php 

class ConnexionController extends Controller {
	function index() {
		$this -> set('title', 'Page de Connexion');
        $this -> set('content', 'Insérez votre information!');
        $this -> render();
	}

	function connexion() {
		$login = $_POST['login'];
		$mdp = $_POST['mdp'];
		$sql = "SELECT id_utilisateur,login,password,typeUtilisateur FROM utilisateur WHERE login = '$login'";
		$model = new UtilisateurModel;
		if ($result = $model -> query($sql)) {
			if ($model -> getNumRows() == 1) {
				$mdpBC = $result['utilisateur']['password'];
				if (password_verify($mdp, $mdpBC)) {
					$typeU = $result['utilisateur']['typeUtilisateur'];
					if (typeU == "admin") {
						//admin
					} else {
						//client
					}
				}
			}
		}

		$this -> set('title', '');
		$this -> set('content', '');
		$this -> render();
	}
}