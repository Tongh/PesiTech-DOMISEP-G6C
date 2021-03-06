<?php
class StatusController extends Controller {
  function index() {
    $model = new StatusModel;
    if ($result = $model -> getIDCapteur()) {
      if ($result == "Vous n'avez pas encore enregistré vos capteurs sur ce compte, vous pouvez maintenant en enregistrer un !") {
          $this -> set('Err', $result);
      } else {
        $this -> set('nom_piece', $model -> getPieceName($result));
        $this -> set('nom_capteur', $model -> getCapteurName($result));
        $this -> set('type_capteur', $model -> getCapteurType($result));
        $this -> set('title', 'Statut de vos requêtes');
        $this -> set('content', 'Bienvenue sur votre Espace Client!');
      }
    }
    $this -> set('title', 'Statut de vos requêtes');
    $this -> set('content', 'Bienvenue sur votre Espace Client!');
    $this -> render();
  }

  function viewCapteur() {
    if (isset($_GET['id_capteur']) && !empty($_GET['id_capteur'])) $_SESSION["id_capteur"] = $_GET['id_capteur'];
    $capteurModel = new CapteurModel;
    $this -> set('nom_piece', $capteurModel -> getPieceName($_SESSION["id_capteur"]));
    $this -> set('nom_capteur', $capteurModel -> getCapteurName($_SESSION["id_capteur"]));
    $this -> set('type_capteur', $capteurModel -> getCapteurType($_SESSION["id_capteur"]));
    $this -> set('title', 'Statut de votre périphérique');
    $this -> set('content', 'Bienvenue sur votre Espace Client!');
    $this -> render();
  }

  function requeteEnvoie() {
    $this -> set("trame", 1);
    $this -> set("objet", $_POST["objet"]);
    $this -> set("req", $_POST["requeteType"]);
    //echo "<script> alert('{$_POST["capteurType"]}') </script>";
    $this -> set("type_c", $_POST["capteurType"]);
    $this -> set("actionneur", $_POST["actionneur"]);
    $this -> set("valeur", $_POST["valeur"]);


    $this -> set('title', 'Statut de requête envoyé');
    $this -> set('content', 'Envoyé avec succès!');
    $this -> render();
  }



}
