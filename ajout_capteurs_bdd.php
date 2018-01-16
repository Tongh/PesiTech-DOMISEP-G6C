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
$nb_piece=$_POST["nbpiece"];
/*
$_SESSION["actionneur"];
$_SESSION["prix"];
$_SESSION["unite"];
$_SESSION["temps"];
$_SESSION["valeur"];
$_SESSION["statut"];
$_SESSION["id_piece"];
$_SESSION["id_piece"];
*/

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
  for ($i=1; $i <=$nb_piece ; $i++) {

    $sup= 'superficie_'.$i;
    $type_piece='type_piece_'.$i;

    $insertion_type_piece->execute(array(
      'superficie' => $_POST[$sup],
      'type_piece'=>$_POST[$type_piece],
      'nom'=>$_SESSION["nom"],
      'id_utilisateur'=>$_SESSION["id_utilisateur"]
                                        ));
    $insertion_type_piece->closeCursor();
    echo "</br> Vos pièces et capteurs ont bien été enregistrés";
                                    }
}

catch (\Exception $e)
{   //Sinon, on affiche un message d'erreur
  die('Erreur: '.$e->getMessage());
}

//Insertion des données relatives aux capteurs fournies par l'utilisateur
$insertion_type_piece=$bdd->prepare('INSERT INTO capteurs(`type_capteur`,`nom`,`Actionneur`,`prix`,`unite`,`temps`,`valeur`,`statut`,`piece_ID piece`,`piece_logement_utilisateur_id utilisateur`) VALUES (:type_piece,:nom,`NULL`,`NULL`,`NULL`,`NULL`,`NULL`,`NULL`,:id_piece,:id_logement);');
//Requete qui marche dans phpmyadmin: INSERT INTO capteurs(`type_capteur`,`nom`,`Actionneur`,`prix`,`unite`,`temps`,`valeur`,`statut`,`piece_ID piece`,`piece_logement_utilisateur_id utilisateur`) VALUES ('camera','dridi','ok',50,1,250,100,'ok',1,2); NULL: pas possible!

try
{ //On essaie d'insérer les données utilisateur  relatives aux capteurs dans la table capteurs
  $insertion_type_piece->execute(array(
    'type_piece'=>$_POST["type_piece"],
    'nom'=>$_SESSION["nom"],
    'id_piece'=>$_SESSION["id_piece"],
    'id_logement'=>$_SESSION["id_piece"]

    /*
    $insertion_type_piece->execute(array(
      'type_capteur'=>$_POST["type_capteur"],
      'nom'=>$_SESSION["nom"],
      'actionneur' => $_POST["actionneur"],
      'prix' => $_POST["prix"],
      'unite' => $_POST["unite"],
      'temps' => $_POST["temps"],
      'valeur' => $_POST["valeur"],
      'statut' => $_POST["statut"],
      'id_piece'=>$_SESSION["id_piece"],
      'id_logement'=>$_SESSION["id_piece"]
                                        ));
    */


  ));
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
