<!DOCTYPE htlm>
<html>
<title>
  EZ-Home
</title>
<head>
  <meta charset="utf-8"/>
  <!--dossier css-->
  <link href="css/client.css" rel="stylesheet">
  <link href="css/profil.css" rel="stylesheet">
  <script src="https://use.fontawesome.com/e3c7c95da8.js"></script>
</head>

<!-- Header (tableau + image) -->
<?php
include 'header_client.php';
?>

<body>
  <div id="DIYbody">

    <form action="" />
    <p>
      <label for="piece">Veuillez sélectionner </br>
        la pièce a afficher :<br /> </label><br />
        <select name="pays" id="pays">
          <option value="cuisine">Cuisine</option>
          <option value="salon">Salon</option>
          <option value="chambre">Chambre </option>
          <option value="salle">Salle de bain</option>
          <option value="autre">Autre</option>
        </select>
        <input type="submit" />
      </br>
    </br>
  </br>
</br>
<table>
  <tr id="fline">
    <th><strong>Capteur 1</strong></th>
    <th colspan="3"><strong>Cuisine</strong></th>
  </tr>
  <tr>
    <td>Type</td>
    <td>Donnée actuelle</td>
    <td>Historique </td>
  </tr>
  <tr>
    <td>Température </td>
    <td>21°C</td>
    <td><a href="stats.php"><img src="Image\graph_ex.png" ></a></td>
  </tr>

</tr>
</table>

<!-- <table>
<tr id="fline">
<th><strong>Capteur 2</strong></th>
<th colspan="3"><strong>Cuisine</strong></th>
</tr>
<tr>
<td>Type</td>
<td>Donnée actuelle</td>
<td>Historique </td>
</tr>
<tr>
<td>Luminosité </td>
<td>30%</td>
<td><a href="stats.php"><img src="Image\graph_ex.png" ></a></td>
</tr>
</tr>
</table> -->

<?php
include 'footer_client.php';
?>
</body>


<?php
include 'footer_client.php';
?>

</html>
