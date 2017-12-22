<!DOCTYPE htlm>
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
    include 'header_client.html';
?>

<body>
  <table class='pieces'>
   <caption> Mes pièces   </caption>
   <form action="ajoutpiece.php">
      <th>
        <input type="submit" value="+ Ajouter une pièce" /> 
      </th>
    </form>
  </table>

     <!-- Pour animer la page et ajouter des blocks quand on ajoute une pièce, il faut utiliser JS -->

  </body>

  <?php
  include 'footer_client.php';
  ?>

</html>
