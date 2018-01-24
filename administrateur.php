//input=text
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


   ?>-->

   <!-- Header -->
 	<?php
 	include 'header_accueil.php';
 	?>

  <div id='DIYbody'>



        <div class="cnxn">
          <h1> Accéder à un compte utilisateur </h1><br/>

          <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

          <p>
       			  <label for="login">Login de l'utilisateur:</label>
              </br>
              </br>
              <input type="text" name="login" id="pseudo"  autofocus/>
       			</p>
            <p>
              <input type="submit" value="Connexion" />
            </p>

  </form>

</div>

</div>
</div>
</div>
<?php include "footer_client.php"; ?>

  </body>
  </html>
