<?php
class StatusController extends Controller {
  function index() {
    $this -> set('title', 'Le status de Votre périphérique');
    $this -> set('content', 'Bienvenue sur votre EspaceClient!');
    $this -> render();
  }

  function viewCapteur() {
    if (isset($_GET['id_capteur']) && !empty($_GET['id_capteur'])) $_SESSION["id_capteur"] = $_GET['id_capteur'];
    $capteurModel = new CapteurModel;
    $this -> set('nom_piece', $capteurModel -> getPieceName($_SESSION["id_capteur"]));
    $this -> set('nom_capteur', $capteurModel -> getCapteurName($_SESSION["id_capteur"]));
    $this -> set('type_capteur', $capteurModel -> getCapteurType($_SESSION["id_capteur"]));
    $this -> set('title', 'Le status de Votre Capteur');
    $this -> set('content', 'Bienvenue sur votre EspaceClient!');
    $this -> render();
  }


}
