<?php

// On démarre la session
session_start();
$_SESSION["nbpiece"]=$_POST["nbpiece"];

for ($i=0; $i <$_POST["nbpiece"] ; $i++)
{/* Ici on effectue les requetes pour ajouter les capteurs par défaut pour chaque pièce :
  $temp_par_def=$bdd->prepare('INSERT INTO `capteurs`(`type_capteur`, `nom`, `piece_ID piece`, `piece_logement_utilisateur_id utilisateur`) VALUES (temperature,?,avoirenfnctiondelaméthodepourajoutcapteurdanspiece,pareilpourcetid)'
  $temp_par_def->execute(?,?,?);

  $lum_par_def=$bdd->prepare('INSERT INTO `capteurs`(`type_capteur`, `nom`, `piece_ID piece`, `piece_logement_utilisateur_id utilisateur`) VALUES (luminosite,?,avoirenfnctiondelaméthodepourajoutcapteurdanspiece,pareilpourcetid)'
  $lum_par_def->execute(?,?,?);
*/
}
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
  <table class='pieces'>
   <!-- <caption> Mes pièces   </caption> -->
      <!-- <th>
          + Ajouter une pièce
      </th> -->
      <?php
      $nb_piece=$_POST["nbpiece"];
      for ($i=1; $i <=$nb_piece ; $i++) {

        ?>

        <th> Ma pièce <?php echo $i ?> : </br>
          <form action="ajout_pieces_bdd.php" method="POST" />
           <p>
             <label for="piece"> Veuillez nommer votre pièce (facultatif) :</label><br /><br />
             <input type="text" name="label_piece_<?php echo $i?>" />
         </p>

         <p>
               <label for="piece">Veuillez sélectionner </br>
               le type de pièce : <br /> </label><br />
               <select name="type_piece_<?php echo $i?>" id="type_piece">
                   <option value="cuisine">Cuisine</option>
                   <option value="Salon">Salon</option>
                   <option value="chambre">Chambre </option>
                   <option value="salle">Salle de bain</option>
                   <option value="autre">Autre</option>
               </select>
              <!--<select name="type_capteur" id="capteur">
                   <option value="presence">Capteur de Présence</option>
                   <option value="fumee">Capteur de Fumée</option>
                   <option value="ouverture">Capteur d'Ouverture </option>
                   <option value="camera">Caméra</option>
                   <option value="luminosite">Capteur de Luminosité</option>
                   <option value="fumee">Capteur d'Humidité</option>
                   <option value="ouverture">Capteur de Température </option>
                   <option value="autre">Autre</option>
               </select> -->
             </br><br />
           </p>

           <p>
               <label> Superficie de la pièce :<br /><br /></label>
                 <select name="superficie_<?php echo $i?>" id="capteur">
                      <option value="5"> 5 m² </option>
                      <option value="10">10 m²</option>
                      <option value="15">15 m²</option>
                      <option value="20">20 m² </option>
                      <option value="21">Plus de 20m²</option>
                  </select>
          </th>

    <?php
    }
    echo "<th><input type=\"submit\" value=\"Envoyer\" />
      </p>
     </form>
     </th>";

    ?>
  </table>


     <!-- Pour animer la page et ajouter des blocks quand on ajoute une pièce, il faut utiliser JS -->

  </body>

  <?php
  include 'footer_client.php';
  ?>

</html>
