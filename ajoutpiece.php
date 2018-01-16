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
        <form method="POST" action="gestion_capteurs.php">
          <label>  Nombre de pièce à ajouter:  </label>   </br>
           <input type="text" name="nbpiece"/>
          <input type="submit" value="Envoyer" />
        </form>
      </th>



  </table>


     <!-- Pour animer la page et ajouter des blocks quand on ajoute une pièce, il faut utiliser JS -->

  </body>

  <?php
  include 'footer_client.php';
  ?>

</html>
