<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8" />
  <link href="css/inter.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/headerBodyFooterFixed.css"/>
  <title> EZ-home - Connexion</title>
</head>

<body>

  <!--<?php
    require("db_config.php");

    $Err = "";
    $login = $mdp = $mdpBC = "";

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $login = test_input($_POST["login"]);
      $mdp = test_input($_POST["mdp"]);
      $conn = mysqli_connect($mysql_server_name, $mysql_username, $mysql_password, $mysql_database);
      if (!$conn) {
        die('Connet Error (' . mysqli_connect_errno() . ')' . mysqli_connect_error());
      }
      //echo "Success..." . mysqli_get_host_info($conn) . "<br>";
      mysqli_set_charset($conn, "utf8");
      $sql = "SELECT password FROM utilisateur WHERE login = '$login'";
      if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) == 1) {
          $mdpBC = mysqli_fetch_array($result, MYSQLI_NUM)[0];
          if (password_verify($mdp, $mdpBC)) {
          $typeU="SELECT typeUtilisateur FROM Utilisateur WHERE login = '$login'";
            if ($typeU == "client") {
              header("Location:finiCreerNewCompte.php");
            } else {
              header("Location:administrateur.php");
            }

          } else {
            $Err = "Votre mot de passe incorrect! ";
          }
        } else {
          $Err = "Votre identifiant n'existe pas! ";
        }
      }

    }


   ?>-->

   <!-- Header -->
 	<?php
 	include 'header_accueil.php';
 	?>

  <div id='DIYbody'>
    <div class='content'>
      <div id="imgcnx">
        <figure>
          <img src="Image/bureau.png" alt="Bureau">
        </figure>



        <div class="cnxn">
          <h1> Accéder à mon espace personnel </h1><br/>

          <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

          <p>
       			  <label for="pseudo">Mon identifiant:</label>
              </br>
              </br>
              <input type="text" name="login" id="pseudo"  autofocus/>
       			</p>

       			<p>
       			  <label for="mdp">Mon mot de passe:</label>
              </br>
              </br>
              <input type="password" name="mdp" id="mdp"  required />
              <br><br>
              <span class="error"> <?php echo $Err;?></span>
            </p>

            <p>
              <input type="submit" value="Connexion" />
            </p>

  </form>

  <p>
    <a id="co" href="">Mot de passe oublié ? </a>
    <br/>
    <a id="co" href="">J'ai perdu mon identifiant</a>
    <br/>
    <a id="co" href="CreerNewCompte.php">Première connexion!</a>
  </p>

</div>

</div>
</div>
</div>
<?php include "footer_client.php"; ?>



  </body>
  </html>
