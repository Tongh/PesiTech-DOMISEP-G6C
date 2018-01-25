<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();
  $login = $_SESSION['login'];
    // echo $login;

//Use limit 1 to save exec time
// $sql = "SELECT id_utilisateur FROM Utilisateur WHERE login='$login' limit 1";

?>

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
  <script type="text/javascript" src="checkNewCompte.js"></script>

</head>

<!-- Header + php -->
<?php
include 'header_client.php';
?>



<body>
  <?php
  require("db_config.php");


  // Create connection
  $conn = mysqli_connect($mysql_server_name, $mysql_username, $mysql_password, $mysql_database);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);}

    $sql = "SELECT * FROM Utilisateur WHERE login= '$login'";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        // echo "id: " . $row["id_utilisateur"]. " - Name: " . $row["prenom"]. " " . $row["nom"]. "<br>";
        ?>
        <div class="profil">
          <section>
            <fieldset>
              <legend> <strong>  Configuration du compte : <?php echo $_SESSION['login']; ?>  </strong> </legend>
              <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" onsubmit="return validerForm()">
                <br>
                <p><strong>Informations Personnels</strong></p>
                Nom   : <input type="text" id="nom" value= <?php echo $row["nom"]; ?> name="nom" onchange="checkNom()">
                <span id="NomErr" class="error"></span><span id="NomNP" class="NP"></span>
                <br><br>
                Prénom: <input type="text" id="prenom" name="prenom" value= <?php echo $row["prenom"]; ?> onchange="checkPrenom()">
                <span id="PrenomErr" class="error"></span><span id="PrenomNP" class="NP"></span>
                <br><br>
                Pseudo : <input type="text" id="pseudo" value=" <?php echo $row["login"]; ?>" name="login" onchange="checkPseudo()">
                <span id="PseudoErr" class="error"></span><span id="PseudoNP" class="NP"></span>
                <br><br>
                Mot de passe : <input type="password" id="mdp" placeholder=" ********" name="mdp" onchange="checkmdp()">
                <span id="mdpErr" class="error"></span><span id="mdpNP" class="NP"></span>
                <br><br>
                Confirmation mot de passe : <input type="password" id="mdpC" placeholder=" ********" name="mdpC" onchange="checkmdpC()">
                <span id="mdpCErr" class="error"></span><span id="mdpCNP" class="NP"></span>
                <br><br>
                E-mail: <input type="text" id="mail" value= <?php echo $row["email"]; ?> name="email" onchange="checkMail()">
                <span id="mailErr" class="error"></span><span id="mailNP" class="NP"></span>
                <br><br>
                Téléphone: <input type="text" id="tele" value= <?php echo $row["telephone"]; ?> name="tele" onchange="checkTele()">
                <span id="teleErr" class="error"></span><span id="teleNP" class="NP"></span>
                <br><br><br>
                <p><strong>Informations sur l'Habitation</strong></p>
                Habitation: <input type="radio" name="typeH" value="maison" onclick="checkTypeM()"> Maison
                <input type="radio" name="typeH" value="appart" onclick="checkTypeA()"> Appartement
                <span id="habitErr" class="error"></span><span id="habitNP" class="NP"></span>
                <br><br>
                Ville : <input type="text" id="ville" value= <?php echo $row["ville"]; ?> name="ville" size="20" onchange="checkVille()"/>
                <span id="villeErr" class="error"></span><span id="villeNP" class="NP"></span>
                <br><br>
                  Adresse : <input type="text" id="adresse" value= <?php echo $row["adresse"]; ?> name="adresse" onchange="checkAdresse()" />
                <span id="adresseErr" class="error"></span><span id="adresseNP" class="NP"></span>
                <br><br>
                Complément d'adresse : <input type="text" id="cptadresse" value= <?php echo $row["complementAdresse"]; ?> name="cptadresse" onchange="checkCptadresse()" />
                <span id="cptadresseErr" class="error"></span><span id="cptadresseNP" class="NP"></span>
                <br><br>
                Code Postal : <input type="text" id="codepostal" value= <?php echo $row["codePostal"]; ?> name="codepostal" size="5" onchange="checkCodepostal()"/>
                <span id="cpErr" class="error"></span><span id="cpNP" class="NP"></span>
                <br><br><br>
                <input type="submit" name="submit" value="Valider les modifications">

              </form>
            </fieldset>
          </section>
        </div>

        <?php
      }
    }
      $conn->close();

      ?>
    </body>

    

</html>
