<?php

class AdminController extends Controller {

  function index() {
    $this -> set('title', 'Bienvenue sur votre page de l\'administrateur');
    $this -> set('content', 'Voici le gestion!');
    $this -> render();
  }

  function gestionClient() {
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
