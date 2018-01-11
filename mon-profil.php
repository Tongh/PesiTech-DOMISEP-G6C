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
include 'header_client.php';
?>

<body>
  <div class="profil">
    <form action="mon-profil.php" method="post">
      <p>Première Connexion !</p>
      <p>Veuillez saisir vos coordonnées :</p>
      Ville : <input type="text" name="ville" size="20" />
      <br/>
      Adresse : <input type="text" name="adresse" />
      <br/>
      Complément d'adresse : <input type="text" name="cptadresse" />
      <br/>
      Code Postal : <input type="text" name="codepostal" size="5" />
      <br/>
      <input type="submit" value="Valider" />
    </form>
  </div>

</body>

<?php
include 'footer_client.php';
?>

</html>

<?php
require("db_config.php");
$conn = mysqli_connect($mysql_server_name, $mysql_username, $mysql_password, $mysql_database);
if (!$conn) {
  die('Connet Error (' . mysqli_connect_errno() . ')' . mysqli_connect_error());
}
if (isset($_POST['ville']))
{
  if (isset($_POST['adresse']))
  {
    if (isset($_POST['codepostal']))
    {
      $req='UPDATE utilisateur set ville ='.$_POST['ville'].' and adresse = '.$_POST['adresse'].' and codePostal  = ' . $_POST['codepostal'].'where id utilisateur =';
    }
  }
}

?>
