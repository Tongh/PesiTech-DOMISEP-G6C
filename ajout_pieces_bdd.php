<?php

// On démarre la session
session_start();


?>

<! DOCTYPE html>
<html>
<title>
  EZ-Home
</title>
<head>
  <meta charset="utf-8"/>
  <!--dossier css-->
  <link href="css/interv2.css" rel="stylesheet">
  <link href="css/profil.css" rel="stylesheet">
  <script src="https://use.fontawesome.com/e3c7c95da8.js"></script>
</head>

<!-- Header (tableau + image) -->
<?php
    include 'header_client.php';
?>

<body>

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
    echo "</br> Vos pièces ont bien été enregistrés"."</br>
    <form method='' action='ajoutpiece.php'>
    <input type='submit' value='Retourner vers mon installation'/></form> ";
}

catch (\Exception $e)
{   //Sinon, on affiche un message d'erreur
  die('Erreur: '.$e->getMessage());
}








?>

</body>

<?php
include 'footer_client.php';
?>

</html>
