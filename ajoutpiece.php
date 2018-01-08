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
   <caption> Mes pièces   </caption>
      <th>
          + Ajouter une pièce
      </th>
      <th>
      <?php
          echo " Ma pièce 1";
      ?>
      <form action="" />
         <p>
             <label for="piece">Veuillez sélectionner </br>
             le type de pièce à ajouter:<br /> </label><br />
             <select name="pays" id="pays">
                 <option value="cuisine">Cuisine</option>
                 <option value="Salon">Salon</option>
                 <option value="chambre">Chambre </option>
                 <option value="salle">Salle de bain</option>
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
