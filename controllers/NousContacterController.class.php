<?php

class NousContacterController extends Controller {
	function index() {
		$this -> set('title', 'Comment Nous Contacter');
    $this -> set('content', 'Vous pouvez nous envoyer des Mail!');
    $this -> render();
	}

	function panne() {
		$this -> set('title', 'Panne envoyer');
    $this -> set('content', 'Vous pouvez nous envoyer des Mail!');
    $this -> render();
	}

	function panneEnvoyer() {
		$categorie = $_POST["categorie"];
		$description = $_POST["description"];
		$email = new G6C_Mail;
		$email -> setTo('dridi.yassine.yd@gmail.com');
		$titleMail = "Panne & Résolution de PESITech";
		$bodyMail =
		"Jour : " . date("Y-m-d H:i:s") . "<br />" .
		"ID Client : " . $_SESSION["UserID"] . "<br />" .
		"Nom : " . $_SESSION["NomUser"] . "<br />" .
		"Prénom : " . $_SESSION["PrenomUser"] . "<br />" .
		"Pseudo : " . $_SESSION["User"] . "<br />" .
		"Catégorie de la demande : " . $categorie . "<br />" .
		"Description de la demande : " . $description . "<br />";
		$email -> setTitle($titleMail);
		$email -> setBody($bodyMail);
		$altbodyMail = "Jour : " . date("Y-m-d H:i:s") . "\n" .
		"ID Client : " . $_SESSION["UserID"] . "\n" .
		"Nom : " . $_SESSION["NomUser"] . "\n" .
		"Prénom : " . $_SESSION["PrenomUser"] . "\n" .
		"Pseudo : " . $_SESSION["User"] . "\n" .
		"Catégorie de la demande : " . $categorie . "\n" .
		"Description de la demande : " . $description . "\n";
		$email -> setAltBody($altbodyMail);
		if ($email -> send()) {
			$this -> set('title', 'Votre Panne a déjà envoyé');
	    $this -> set('content', 'Merci de nous Contacter!');
	    $this -> render();
		} else {
			$this -> set('title', 'Non prévue, Les messages pas encore envoyer, quelques choses ne marchent pas!');
	    $this -> set('content', 'Merci de nous Contacter!');
	    $this -> render();
		}
	}


}
