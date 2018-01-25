<?php
session_start();

// Connexion bdd
include 'connexionbdd.php';
?>
<html>
<title>
  EZ-Home
</title>
<head>
  <meta charset="utf-8"/>
  <!--dossier css-->
  <link href="css/interv2.css" rel="stylesheet">

  <script src="https://use.fontawesome.com/e3c7c95da8.js"></script>
  <script src="ajout_capteurs.js"></script>
</head>

<!-- Header (tableau + image) -->
<?php
    include 'header_client.php';
?>

<body>
<?php
if (isset($_POST['piece_supp']) AND ($_POST['piece_supp']=="ON") AND ($_SESSION["compteur"]!=0))
{
  $suppression_piece=$bdd->prepare('DELETE FROM piece WHERE `logement_utilisateur_id utilisateur`=?');
  $suppression_piece->execute(array($_SESSION["id_utilisateur"]));
  $suppression_piece->closeCursor();
  echo "<h4>Vos pièces ont été supprimés.</h4>";
}



for ($i=1; $i <$_SESSION["compteur"]+1 ; $i++) {
$pieceid='piece_'.$_SESSION["pieceid"][$i];

 if (isset($_POST[$pieceid]) AND ($_POST[$pieceid]=="ON"))
{
$suppression_piece=$bdd->prepare('DELETE FROM piece WHERE `logement_utilisateur_id utilisateur`=? AND `id_piece`=?');
$suppression_piece->execute(array($_SESSION["id_utilisateur"],$_SESSION["pieceid"][$i]));
$suppression_piece->closeCursor();
echo "<h4>Votre pièce à été supprimé.</h4>";
}

}
