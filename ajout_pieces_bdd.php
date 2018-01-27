<?php

// On démarre la session
session_start();


?>


<?php
// On crée quelques variables de session dans $_SESSION


$_SESSION["id_logement"]= 3 ;


// Connexion bdd

include 'connexionbdd.php';

//Insertion des données relatives aux pièces fournies par l'utilisateur

$insertion_type_piece=$bdd->prepare('INSERT INTO piece(`Superficie`,`Nom`,`Type de piece`,`logement_utilisateur_id utilisateur`,`label_piece`) VALUES (:superficie,:nom,:type_piece,:id_utilisateur,:label)');


try { //On essaie d'insérer les données utilisateur relatives aux pièces dans la table piece
  for ($i=1; $i <=$_SESSION["nbpiece"] ; $i++) {

    $sup= 'superficie_'.$i;
    $type_piece='type_piece_'.$i;
    $label_piece='label_piece_'.$i;

    $insertion_type_piece->execute(array(
      'superficie' => $_POST[$sup],
      'type_piece'=>$_POST[$type_piece],
      'nom'=>$_SESSION["nom"],
      'id_utilisateur'=>$_SESSION["id_utilisateur"],
      'label'=>$_POST[$label_piece]
                                        ));
    $insertion_type_piece->closeCursor();

                                    }
    header("Location:ajoutpiece.php");
}

catch (\Exception $e)
{   //Sinon, on affiche un message d'erreur
  die('Erreur: '.$e->getMessage());
}
