<html>
<title>
  EZ-Home
</title>
<head>
  <meta charset="utf-8"/>
  <!--dossier css-->
  <link href="css/interv2.css" rel="stylesheet">
  <!-- <link href="css/profil.css" rel="stylesheet"> -->
  <!-- <script src="https://use.fontawesome.com/e3c7c95da8.js"></script> -->
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
          <form action="ajout_capteurs_bdd.php" method="POST" />
           <p>
               <label for="piece">Veuillez sélectionner </br>
               le type de pièce et le capteur associé:<br /> </label><br />
               <select name="type_piece" id="type_piece">
                   <option value="cuisine">Cuisine</option>
                   <option value="Salon">Salon</option>
                   <option value="chambre">Chambre </option>
                   <option value="salle">Salle de bain</option>
                   <option value="autre">Autre</option>
               </select>
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
             </br>
               <label> Superficie de la pièce : <input type="text" name="superficie"/>
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
