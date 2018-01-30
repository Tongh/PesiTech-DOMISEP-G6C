<?php
session_start();

// Connexion bdd
include 'connexionbdd.php';
$req_piece=$bdd->prepare('SELECT `id_piece` FROM piece WHERE `logement_utilisateur_id utilisateur`=?;');
$req_piece->execute(array($_SESSION["id_utilisateur"]));

$c=0;
while ($pieceidf=$req_piece->fetch())
{
  $piece_ID[$c]=$pieceidf["id_piece"];
  $c++;
}

if (isset($_POST['piece_supp']) AND ($_POST['piece_supp']=="Supprimer toutes les pièces") AND ($_SESSION["compteur"]!=0))
{
  $suppression_piece=$bdd->prepare('DELETE FROM piece WHERE `logement_utilisateur_id utilisateur`=?');
  $suppression_piece->execute(array($_SESSION["id_utilisateur"]));
  $suppression_piece->closeCursor();



  for ($i=0; $i <$c ; $i++)
   {
     $suppression_capteur=$bdd->prepare('DELETE FROM capteurs WHERE `piece_ID piece`= ? AND `piece_logement_utilisateur_id utilisateur`=?');
  $suppression_capteur->execute(array($piece_ID[$i],$_SESSION["id_utilisateur"]));
  $suppression_capteur->closeCursor();
   }

  header("Location:ajoutpiece.php");
}



for ($i=1; $i <$_SESSION["compteur"]+1 ; $i++) {
$pieceid='piece_'.$_SESSION["pieceid"][$i];

 if (isset($_POST[$pieceid]) AND ($_POST[$pieceid]=="ON"))
{
$suppression_piece=$bdd->prepare('DELETE FROM piece WHERE `logement_utilisateur_id utilisateur`=? AND `id_piece`=?');
$suppression_piece->execute(array($_SESSION["id_utilisateur"],$_SESSION["pieceid"][$i]));
$suppression_piece->closeCursor();

header("Location:ajoutpiece.php?msgpiece=Pièce(s) supprimé(s).");

}

}
?>
