
<?php
/*require("db_config.php");

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
        $sql="SELECT typeUtilisateur FROM utilisateur WHERE login = '$login'";
        if ($result = mysqli_query($conn, $sql)) {
          $typeU = mysqli_fetch_array($result, MYSQLI_NUM)[0];
          if ($typeU == "admin") {
            header("Location:administrateur.php");
            //Récupération dans $_SESSION du login quand la connexion se fait
            $_SESSION['login'] = $login;
          } else {

            header("Location:ajoutpiece.php");
            $_SESSION['login'] = $login;
          }
        } else {
          echo mysqli_error($conn);
        }
      } else {
        $Err = "Votre mot de passe incorrect! ";
      }
    } else {
      $Err = "Votre identifiant n'existe pas! ";
    }
  }

}

*/
?>

<div id='DIYbody'>
  <div class='content'>
    <div id="imgcnx">
      <figure>
        <img src="Image/bureau.png" alt="Bureau">
      </figure>

      <div class="cnxn">
        <h1> Accéder à mon espace personnel </h1><br/>

        <form method="post" action="<?php echo "index.php?controller=Connexion&action=attend"  ?>">
          <p>
            <label for="pseudo">Mon identifiant:</label></br></br>
            <input type="text" name="login" id="pseudo"  autofocus/>
          </p>

          <p>
            <label for="mdp">Mon mot de passe:</label></br></br>
            <input type="password" name="mdp" id="mdp"  required /><br><br>
            <span class="error"> <?php if (isset($_GET['Err'])) echo $_GET['Err'] ?></span>
          </p>

          <p>
            <input type="submit" value="Connexion" />
          </p>

        </form>

        <p>
          <a id="co" href="recuperation_mdp.php">Mot de passe oublié ? </br> Identifiant perdu ? </a><br/>
          <a id="co" href="index.php?controller=Inscription">Première connexion!</a>
        </p>
      </div>
    </div>
  </div>
</div>
