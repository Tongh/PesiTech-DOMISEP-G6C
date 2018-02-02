<?php

class AdminController extends Controller {

  function index() {
    if (isset($_GET['id_client']) && !empty($_GET['id_client'])) {
      $model = new AdminModel;
  		if ($result = $model -> getUserByID($_GET['id_client'])) {
  			if (gettype($result) == "string") {
  					$this -> set('Err', $result);
  			} else {
  					$this -> set('result', $result);
  			}
  		}
      $this -> set('title', 'Bienvenue sur votre page de l\'administrateur');
      $this -> set('content', 'Les informations de  ' . $result[0]["utilisateur"]["prenom"]. " " . $result[0]["utilisateur"]["nom"]);
      $this -> render();
    } else {
      $model = new AdminModel;
  		if ($result = $model -> getUserInfo()) {
  			if (gettype($result) == "string") {
  					$this -> set('Err', $result);
  			} else {
  					$this -> set('result', $result);
  			}
  		}
      $this -> set('title', 'Bienvenue sur votre page de l\'administrateur');
      $this -> set('content', 'Bienvenue ' . $result[0]["utilisateur"]["prenom"]. " " . $result[0]["utilisateur"]["nom"]);
      $this -> render();
    }

  }

  function gestionClient() {
    $model = new AdminModel;
    if ($result = $model -> getClientInfo()) {
			if (gettype($result) == "string") {
					$this -> set('Err', $result);
			} else {
					$this -> set('result', $result);
			}
		}
    $this -> set('title', 'Gestion des clients');
    $this -> set('content', 'Voici le gestion!');
    $this -> render();
  }

  function historiques() {
    $this -> set('title', 'Historiques des achats');
    $this -> set('content', 'Voici le gestion!');
    $this -> render();
  }

  function contacterClient() {
    $this -> set('title', 'Contacter mon client');
    $this -> set('content', 'Voici le gestion!');
    $this -> render();
  }

}
