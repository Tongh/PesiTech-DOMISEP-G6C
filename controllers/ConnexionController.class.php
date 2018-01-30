<?php

class ConnexionController extends Controller {
	function index() {
		$this -> set('title', 'Page de Connexion');
        $this -> set('content', 'Insérez votre information!');
        $this -> render();
	}

	function attend() {
		$login = $_POST['login'];
		$mdp = $_POST['mdp'];
		$model = new ConnexionModel;
		if ($Err = $model -> connexion($login, $mdp)) {
			$to = 'Location: index.php?controller=Connexion&Err='.$Err;
			header($to);
		} else{
			$this -> set('title', 'Connexion en cours');
			$this -> set('content', 'Connexion en cours');
			$this -> render();
		}
	}

	function disconnexion() {
		$_SESSION["User"] = "";
		$_SESSION["LoginMode"] = "OFF";
		$this -> set('title', 'Déconnexion en cours');
		$this -> set('content', 'Déconnexion en cours');
		$this -> render();
	}

}
