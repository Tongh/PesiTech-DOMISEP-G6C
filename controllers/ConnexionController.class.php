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
			$this -> set('title', 'En train de connexion');
			$this -> set('content', 'En train de connexion');
			$this -> render();
		}
	}

	function disconnexion() {
		$_SESSION["User"] = "";
		$_SESSION["LoginMode"] = "OFF";
		$this -> set('title', 'En train de déconnecter');
		$this -> set('content', 'En train de déconneter');
		$this -> render();
	}

}