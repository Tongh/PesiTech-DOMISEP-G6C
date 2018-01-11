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
      <th>
      <?php
          echo " Ma pièce 1";
      ?>
      <form action="" />
         <p>
             <label for="piece">Veuillez sélectionner </br>
             le type de pièce et le capteur associé:<br /> </label><br />
             <select name="pays" id="pays">
                 <option value="cuisine">Cuisine</option>
                 <option value="Salon">Salon</option>
                 <option value="chambre">Chambre </option>
                 <option value="salle">Salle de bain</option>
                 <option value="autre">Autre</option>
             </select>
             <select name="capteur" id="capteur">
                 <option value="presence">Capteur de Présence</option>
                 <option value="fumee">Capteur de Fumée</option>
                 <option value="ouverture">Capteur d'Ouverture </option>
                 <option value="camera">Caméra</option>
                 <option value="luminosite">Capteur de Luminosité</option>
                 <option value="fumee">Capteur d'Humidité'</option>
                 <option value="ouverture">Capteur de Température </option>
                 <option value="autre">Autre</option>
             </select>
             <input type="submit" />
         </p>
              </form>
              </th>
  </table>


     <!-- Pour animer la page et ajouter des blocks quand on ajoute une pièce, il faut utiliser JS -->

  </body>

  <?php
  include 'footer_client.php';
  ?>

</html>
