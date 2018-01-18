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
$_SESSION['nom'] = 'réussite';
$_SESSION["id_utilisateur"] = 123456;
$_SESSION["id_piece"] = 1;
$_SESSION["id_logement"]= 1 ;


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
    <form method='' action='mon-installation.php'>
    <input type='submit' value='Retourner vers mon installation'/></form> ";
}

catch (\Exception $e)
{   //Sinon, on affiche un message d'erreur
  die('Erreur: '.$e->getMessage());
}







//Insertion des données relatives aux capteurs fournies par l'utilisateur
$insertion_type_piece=$bdd->prepare('INSERT INTO capteurs(`type_capteur`,`nom`,`piece_ID piece`,`piece_logement_utilisateur_id utilisateur`) VALUES (:type_piece,:nom,:id_piece,:id_logement);');
//Requete qui marche dans phpmyadmin: INSERT INTO capteurs(`type_capteur`,`nom`,`piece_ID piece`,`piece_logement_utilisateur_id utilisateur`) VALUES ('camera','dridi',1,2);


try
{ //On essaie d'insérer les données utilisateur  relatives aux capteurs dans la table capteurs

  for ($i=1; $i <=$_SESSION["nbpiece"] ; $i++) {

    $type_capteur='type_capteur_'.$i;

    $insertion_type_piece->execute(array(
      'type_capteur'=>$_POST[$type_capteur],
      'nom'=>$_SESSION["nom"],
      'id_piece'=>$_SESSION["id_piece"],
      'id_logement'=>$_SESSION["id_piece"]
                                        ));

}

  $insertion_type_piece->closeCursor();

 }

catch (\Exception $e)
{ //Sinon, on affiche un message d'erreur
    die('Erreur: '.$e->getMessage());
}





?>

</body>

<?php
include 'footer_client.php';
?>

</html>
