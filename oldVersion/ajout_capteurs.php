<?php

// On démarre la session
session_start();

try
{
  $bdd= new PDO('mysql:host=localhost;dbname=mydb;charset=utf8','root','');
}

catch (\Exception $e)
{
  die('Erreur:'.$e->getMessage());
}
?>


<?php
//Insertion des données relatives aux capteurs fournies par l'utilisateur
$insertion_type_piece=$bdd->prepare('INSERT INTO capteurs(`type_capteur`,`nom`,`piece_ID piece`,`piece_logement_utilisateur_id utilisateur`) VALUES (:type_capteur,:nom,:id_piece,:id_logement);');
//Requete qui marche dans phpmyadmin: INSERT INTO capteurs(`type_capteur`,`nom`,`piece_ID piece`,`piece_logement_utilisateur_id utilisateur`) VALUES ('camera','dridi',1,2);


try
{ //On essaie d'insérer les données utilisateur  relatives aux capteurs dans la table capteurs

for ($i=0; $i <$_SESSION["compteur1"] ; $i++) {
  # code...
}

    $insertion_type_piece->execute(array(
      'type_capteur'=>$_POST["type_capteur"],
      'nom'=>$_SESSION["nom"],
      'id_piece'=>$_POST["id_piece"],
      'id_logement'=>$_SESSION["id_utilisateur"]
                                        ));



  $insertion_type_piece->closeCursor();
  header("Location:ajoutpiece.php");

 }

catch (\Exception $e)
{ //Sinon, on affiche un message d'erreur
    die('Erreur: '.$e->getMessage());
}
