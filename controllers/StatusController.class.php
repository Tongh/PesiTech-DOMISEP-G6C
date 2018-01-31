<?php
class StatusController extends Controller {
  function index() {
    $this -> set('title', 'Statut de votre périphérique');
    $this -> set('content', 'Bienvenue sur votre Espace Client!');
    $this -> render();
  }

  function viewCapteur() {
    if (isset($_GET['id_capteur']) && !empty($_GET['id_capteur'])) $_SESSION["id_capteur"] = $_GET['id_capteur'];
    $capteurModel = new CapteurModel;
    //$donnees = new DonneesCapteurModel;
    $this -> set('nom_piece', $capteurModel -> getPieceName($_SESSION["id_capteur"]));
    $this -> set('nom_capteur', $capteurModel -> getCapteurName($_SESSION["id_capteur"]));
    $this -> set('type_capteur', $capteurModel -> getCapteurType($_SESSION["id_capteur"]));
    //$donnees -> getgraph();
    $this -> set('title', 'Statut de votre capteur');
    $this -> set('content', 'Bienvenue sur votre Espace Client!');
    $this -> render();
  }


}
