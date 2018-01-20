<?php

//On démarre la session
session_start();

  $login = $_SESSION['login'];
// Connexion bdd

try
{
  $bdd= new PDO('mysql:host=localhost;dbname=mydb;charset=utf8','root','');
}

catch (\Exception $e)
{
  die('Erreur:'.$e->getMessage());
}


//Recupération de l'id de l'utilisateur dans une variable $_SESSION
$req_id_utilisateur=$bdd->prepare('SELECT `id_utilisateur`FROM utilisateur WHERE login=?;');
$req_id_utilisateur->execute(array($login));
$id_utilisateur=$req_id_utilisateur->fetch();
$_SESSION["id_utilisateur"]=$id_utilisateur[0];


$req_id_utilisateur->closeCursor();

// On compte le nombre de pieces deja ajouté par l'utilisateur
$req_nb_pieces=$bdd->prepare('SELECT COUNT(*)  FROM piece WHERE `logement_utilisateur_id utilisateur`=? GROUP BY `logement_utilisateur_id utilisateur`;');
$req_nb_pieces->execute(array( $id_utilisateur[0]));

$nbpiece_utilisateur=$req_nb_pieces->fetch();

$req_nb_pieces->closeCursor();

$req_piece=$bdd->prepare('SELECT `label_piece`,`Type de piece` AS type_piece FROM piece WHERE `logement_utilisateur_id utilisateur`=?;');
/*$req_piece->execute(array($_SESSION['id_logement']));*/
$req_piece->execute(array($id_utilisateur[0]));
// On recupére les infos sur les pieces deja enregistrés par l'utilisateur


 ?>



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
  <table id='tab_pieces'>

<?php

if (isset($nbpiece_utilisateur) AND ($nbpiece_utilisateur==0) )
{ echo
  "<table class='pieces'>
   <caption> Mes pièces   </caption>
      <th>
        <form method='POST' action='gestion_pieces.php'>
          <label>  Nombre de pièce à ajouter:  </label>   </br>
           <input type='text' name='nbpiece'/>
          <input type='submit' value='Envoyer' />
        </form>
      </th>
  </table>";
}


else {

  while ($piece=$req_piece->fetch())
  { ?>


    <th>
      <form><input type="submit" value="X" id="bouton_suppression" /> </form>
      <p> Ma pièce : <?php echo $piece['label_piece']?>  </p>

      <p><i> <?php echo $piece['type_piece']?> </i> </br><p/>


      <p>

        <div class="icone">
          <div class="sectionIcone">
            Eclairage : <i class="fa fa-lightbulb-o fa-2x fa-fw" aria-hidden="true"></i>
          </div>
          <?php include "bouton.php" ?>
      </p>


      <p>
          <div class="sectionIcone">
            Volets : <i class="fa fa-columns fa-2x fa-fw" aria-hidden="true"></i>
          </div>
          <?php include "bouton.php" ?>
      </p>

      <p>
          <div class="sectionIcone">
          Température : <i class="fa fa-thermometer-three-quarters fa-2x fa-fw" aria-hidden="true"></i>
          </div>
          <?php include "bouton.php" ?>
      </div>
      </p>


      <p>
      <form action="ajoutpiece.php" method="POST" />
      <label> Ajouter un nouveau capteur: </label> </br>
      <input type="submit" value="Ajouter"/>


      <!--<label for="piece">Veuillez sélectionner </br>
      le type de capteur à ajouter : <br /> </label><br />

      <p>
            <select name="type_capteur" id="capteur">
                <option value="presence">Capteur de Présence</option>
                <option value="fumee">Capteur de Fumée</option>
                <option value="ouverture">Capteur d'Ouverture </option>
                <option value="camera">Caméra</option>
                <option value="luminosite">Capteur de Luminosité</option>
                <option value="fumee">Capteur d'Humidité</option>
                <option value="ouverture">Capteur de Température </option>
                <option value="autre">Autre</option>
            </select>

          </br><br />-->

        </p>

      </th>
<?php  } ?>
      <th>
         <form method="POST" action="mon-installation.php">
           <label> Ajouter une nouvelle pièce </label>
         </br>
           <input type="submit" value="Ajouter"/>
         </form>
       </th>

<?php
}


?>

</table>





  </body>

  <?php
  include 'footer_client.php';
  ?>

</html>
