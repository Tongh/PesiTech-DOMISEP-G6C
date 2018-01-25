<!-- input=text -->
<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();
?>

<!DOCTYPE htlm>
<html>
<head>
  <meta charset="utf-8"/>
  <!--dossier css-->
  <link href="css/client.css" rel="stylesheet">
  <link href="css/profil.css" rel="stylesheet">
  <title> Administrateur - EZ-home</title>
</head>

<body>

  <!--<?php
  require("db_config.php");

  $Err = "";

  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$login = test_input($_POST["login"]);
$conn = mysqli_connect($mysql_server_name, $mysql_username, $mysql_password, $mysql_database);
if (!$conn) {
die('Connet Error (' . mysqli_connect_errno() . ')' . mysqli_connect_error());
}
//echo "Success..." . mysqli_get_host_info($conn) . "<br>";
mysqli_set_charset($conn, "utf8");
$sql = 'SELECT login FROM utilisateur WHERE typeUtilisateur="client"';
if ($result = mysqli_query($conn, $sql)) {
if ($login == "login") {
header("Location:mon-profil-admin.php");
//Récupération dans $_SESSION du login quand la connexion se fait
$_SESSION['login'] = $login;
} else {
header("Location:mon-profil-admin");
$_SESSION['login'] = $login;
}

} else {
$Err = "Votre mot de passe incorrect! ";
}
} else {
$Err = "Votre identifiant n'existe pas! ";
}
?>

<!-- Header -->
<?php
include 'header_accueil.php';
?>

<?php

// On se connecte à MySQL
$bdd= new PDO('mysql:host=localhost;dbname=mydb;charset=utf8','root','');

// On récupère tout le contenu de la table jeux_video
$reponse = $bdd->query('SELECT id_utilisateur, nom, prenom, login, ville, typeUtilisateur FROM utilisateur WHERE typeUtilisateur="client"');

// On affiche chaque entrée une à une
?>
<div id='DIYbody'>
  <h1> Accéder à un compte utilisateur </h1><br/>
  <label for="id_client">Liste des comptes de type Utilisateur:</label>

  <select name="id_client">
    <?php
    while ($donnees = $reponse->fetch())
    {
      ?>
      <p>
        <option value="<?php $donnees['id_utilisateur']?>"><?php echo $donnees['login'] .' : '.$donnees['nom'].' '.$donnees['prenom'].' - '.$donnees['ville']; ?></option>
      </p>
      <?php
    }
    ?>
  </select>
  <!-- <input type="submit" name="submit" value="Choisir ce client" /> -->

  <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

    <p>
      <label for="login">Veuillez rentrer le login du client:</label>
    </br>
  </br>
  <input type="text" name="login" id="pseudo"  autofocus/>
</p>
<p>
  <input type="submit" value="Accéder au compte" />
</p>

</form>

</div>

</div>
</div>
</div>
<?php include "footer_client.php"; ?>

</body>
</html>
