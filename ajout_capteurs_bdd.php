<?php
// On démarre la session
session_start();

// On crée quelques variables de session dans $_SESSION
$_SESSION['nom'] = 'Max';
$_SESSION["id_utilisateur"] = 1234;



// Connexion bdd
try
{
  $bdd= new PDO('mysql:host=localhost;dbname=mydb;charset=utf8','root','');
}

catch (\Exception $e)
{
  die('Erreur:'.$e->getMessage());
}




//Insertion des données relatives aux pièces fournies par l'utilisateur
$insertion_type_piece=$bdd->prepare('INSERT INTO piece(`Superficie`,`Nom`,`Type de piece`,`logement_utilisateur_id utilisateur`) VALUES (:superficie,:nom,:type_piece,:id_utilisateur)');



try { //On essaie d'insérer les données utilisateur relatives aux pièces dans la table piece
  $insertion_type_piece->execute(array(
    'superficie' => $_POST["superficie"],
    'type_piece'=>$_POST["type_piece"],
    'nom'=>$_SESSION["nom"],
    'id_utilisateur'=>$_SESSION["id_utilisateur"]
                                      ));

  $insertion_type_piece->closeCursor();

  echo "Info enregistrés";
}


catch (\Exception $e)
{   //Sinon, on affiche un message d'erreur
  die('Erreur: '.$e->getMessage());
}




//Insertion des données relatives aux capteurs fournies par l'utilisateur
$insertion_type_piece=$bdd->prepare('INSERT INTO capteurs(`type_capteur`,`nom`,`Actionneur`,`prix`,`unite`,`temps`,`valeur`,`statut`,`piece_ID piece`,`piece_logement_utilisateur_id utilisateur`) VALUES (:type_capteur,:nom,NULL,NULL,NULL,NULL,NULL,NULL,id_piece,id_logement);');
//Requete qui marche dans phpmyadmin: INSERT INTO capteurs(`type_capteur`,`nom`,`Actionneur`,`prix`,`unite`,`temps`,`valeur`,`statut`,`piece_ID piece`,`piece_logement_utilisateur_id utilisateur`) VALUES ('camera','dridi','ok',50,1,250,100,'ok',1,2); NULL: pas possible!



try
{ //On essaie d'insérer les données utilisateur  relatives aux capteurs dans la table capteurs
  $insertion_type_piece->execute(array(
    'superficie' => $_POST["superficie"],
    'type_piece'=>$_POST["type_piece"],
    'nom'=>$_SESSION["nom"],
    'id_utilisateur'=>$_SESSION["id_utilisateur"]
                                      ));

  $insertion_type_piece->closeCursor();

}

catch (\Exception $e)
{ //Sinon, on affiche un message d'erreur
    die('Erreur: '.$e->getMessage());
}





?>
