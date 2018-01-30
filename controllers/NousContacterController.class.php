<?php

class NousContacterController extends Controller {
	function index() {
		$this -> set('title', 'Comment nous contacter');
    $this -> set('content', 'Vous pouvez nous envoyer des mail!');
    $this -> render();
	}

	function panne() {
		$this -> set('title', 'Panne envoyer');
    $this -> set('content', 'Vous pouvez nous envoyer des mail!');
    $this -> render();
	}

	function panneEnvoyer() {
		$this -> set('title', 'Envoyé avec succès!');
    $this -> set('content', 'Merci de nous envoyer un mail!');
    $this -> render();
		$this -> sendMail();
	}

	function sendMail() {
		$categorie = $_POST["categorie"];
		$description = $_POST["description"];
		$email = new G6C_Mail;
		$email -> setTo('dridi.yassine.yd@gmail.com');
		$titleMail = "Panne & Résolution de PESITech";
		$bodyMail =
		"Date : " . date("Y-m-d H:i:s") . "<br />" .
		"ID Client : " . $_SESSION["UserID"] . "<br />" .
		"Nom : " . $_SESSION["NomUser"] . "<br />" .
		"Prénom : " . $_SESSION["PrenomUser"] . "<br />" .
		"Pseudo : " . $_SESSION["User"] . "<br />" .
		"Catégorie de la demande : " . $categorie . "<br />" .
		"Description de la demande : " . $description . "<br />";
		$altbodyMail = "Date : " . date("Y-m-d H:i:s") . "\n" .
		"ID Client : " . $_SESSION["UserID"] . "\n" .
		"Nom : " . $_SESSION["NomUser"] . "\n" .
		"Prénom : " . $_SESSION["PrenomUser"] . "\n" .
		"Pseudo : " . $_SESSION["User"] . "\n" .
		"Catégorie de la demande : " . $categorie . "\n" .
		"Description de la demande : " . $description . "\n";
		$email -> setTitle($titleMail);
		$email -> setBody($bodyMail);
		$email -> setAltBody($altbodyMail);
		$email -> send();
	}


}
