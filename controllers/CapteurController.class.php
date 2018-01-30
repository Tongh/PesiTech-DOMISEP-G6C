<?php

class CapteurController extends Controller {
	function index() {
    $model = new CapteurModel;
    if (isset($_GET['id_piece']) && !empty($_GET['id_piece'])) $_SESSION["id_piece"] = $_GET['id_piece'];
    if (isset($_GET['moyen']) && $_GET['moyen'] == "client") {
      if ($result = $model -> viewClient()) {
        if (gettype($result) == "string") {
            $this -> set('Err', $result);
        } else {
            $this -> set('result', $result);
        }
      }
    } else {
      if ($result = $model -> viewPiece()) {
        if (gettype($result) == "string") {
            $this -> set('Err', $result);
        } else {
            $this -> set('result', $result);
        }
      }
    }
		$this -> set('title', 'Gestion des Capteurs');
    $this -> set('content', 'Bienvenue sur votre espace client!');
    $this -> render();
	}

  function add() {
    $this -> set('title', 'Ajouter un capteur');
    $this -> set('content', 'Bienvenue sur votre espace client!');
    $this -> render();
  }

  function addForm() {
    $type_capteur = $_POST['type_capteur'];
    $nom = $_POST['nom'];
    $model = new CapteurModel;
    //if ($result = (isset($_POST['label_piece']) && !empty($_POST['label_piece'])) ? $model -> add($superficie, $nom, $type, $label_piece) : $model -> add($superficie, $nom, $type )) {
    if ($result = $model -> add($type_capteur, $nom)) {
      $to = 'Location: index.php?controller=Capteur&action=add&Err='.$result;
      header($to);
    } else {
      $this -> set('Err', "Ajouté avec succès!");
      $to = 'Location: index.php?controller=Capteur&action=index';
      header($to);
    }
  }



}
