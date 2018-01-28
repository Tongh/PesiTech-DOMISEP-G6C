<!--<script> window.onload=function() {

	  document.getElementById("DomInfo").style.display="none";

	  //  attach the click event handler to the radio buttons
	  var radios = document.forms[0].elements["typeU"];
	  for (var i = [0]; i < radios.length; i++)
	    radios[i].onclick=radioClicked;
	}

</script>-->


<?php
/*require("db_config.php");

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

$nom = $prenom = $email = $typeU = $login = $mdp = $mdpC = $tele = $typeU = $codeV = "";
$loginErr = $codeVErr = $mdpBC = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$nom = test_input($_POST["nom"]);
	$prenom = test_input($_POST["prenom"]);
	$email = test_input($_POST["email"]);
	$login = test_input($_POST["login"]);
	$mdp = test_input($_POST["mdp"]);
	$mdpC = test_input($_POST["mdpC"]);
	$tele = test_input($_POST["tele"]);
		//$ville = test_input($_POST["ville"]);
		//$adresse = test_input($_POST["adresse"]);
		//$cptadresse = test_input($_POST["cptadresse"]);
		//$codepostal = test_input($_POST["codepostal"]);


	if (empty($_POST["typeU"])) {
		$typeUErr = "Type d'Utilisateur est requis";
	} else {
		$typeU = test_input($_POST["typeU"]);
	}



	$conn = mysqli_connect($mysql_server_name, $mysql_username, $mysql_password, $mysql_database);

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$nom = test_input($_POST["nom"]);
		$prenom = test_input($_POST["prenom"]);
		$email = test_input($_POST["email"]);
		$login = test_input($_POST["login"]);
		$mdp = test_input($_POST["mdp"]);
		$mdpC = test_input($_POST["mdpC"]);
		$tele = test_input($_POST["tele"]);
		$typeU = test_input($_POST["typeU"]);
		$codeV = test_input($_POST["codeV"]);
			//$ville = test_input($_POST["ville"]);
			//$adresse = test_input($_POST["adresse"]);
			//$cptadresse = test_input($_POST["cptadresse"]);
			//$codepostal = test_input($_POST["codepostal"]);

		$mdpBC = password_hash($mdp, PASSWORD_DEFAULT);
		$conn = mysqli_connect($mysql_server_name, $mysql_username, $mysql_password, $mysql_database);

		if (!$conn) {
			die('Connet Error (' . mysqli_connect_errno() . ')' . mysqli_connect_error());
		}
			//echo "Success..." . mysqli_get_host_info($conn) . "<br>";
		mysqli_set_charset($conn, "utf8");
		$sql = "SELECT login FROM utilisateur WHERE login = '$login'";
		if ($result = mysqli_query($conn, $sql)) {
			if (mysqli_num_rows($result) == 1) {
				$loginErr = "Votre login est déjà pris.";
			} else {
				if ($typeU == "admin") {
					$tblname = "codeAdmin";
				} else {
					$tblname = "codeClient";
				}
				$sql = "SELECT code FROM $tblname WHERE code = '$codeV'";
				if ($result = mysqli_query($conn, $sql)) {
					if (mysqli_num_rows($result) == 0) {
						$codeVErr = "Votre Code est incorrect, merci de le vérifier!";
					} else {
						$sql = "SELECT utilise FROM $tblname WHERE code = '$codeV'";
						if ($result = mysqli_query($conn, $sql)) {
							$fetchRes = mysqli_fetch_array($result, MYSQLI_NUM);
							if ($fetchRes[0] == 1) {
								$codeVErr = "Votre Code est déjà utilisé!";
							} else {
									//$sql = "INSERT INTO utilisateur (nom, prenom, login, password, email, telephone, ville, codePostal, adresse, complementAdresse, typeUtilisateur) VALUES ('$nom', '$prenom', '$login', '$mdpBC', '$email', '$tele','$ville','$codepostal', '$adresse', '$cptadresse', '$typeU')";
								$sql = "INSERT INTO utilisateur (nom, prenom, login, password, email, telephone, typeUtilisateur) VALUES ('$nom', '$prenom', '$login', '$mdpBC', '$email', '$tele', '$typeU')";
								if (mysqli_query($conn, $sql)) {
									echo "Success insert to table !<br>";
									$id_User = mysqli_insert_id($conn);
								} else {
									echo mysqli_error($conn);
								}
								$sql = "UPDATE $tblname SET utilise = 1 WHERE code = '$codeV'";
								if (mysqli_query($conn, $sql)) {
									echo "Success update to table utlise!<br>";
								} else {								echo mysqli_error($conn);
								}
								$sql = "UPDATE $tblname SET id_client = '$id_User' WHERE code = '$codeV'";
								if (mysqli_query($conn, $sql)) {
									echo "Success update to table id utlisatuer!";
									if ($tblname == "codeClient") {
										header("Location:finiCreerNewCompte.php");
									} else {
										header("Location:administrateur.php");
									}
								} else {
									echo mysqli_error($conn);
								}
							}
						} else {
							echo mysqli_error($conn);
						}
					}
				}
				else {
					echo mysqli_error($conn);
				}
			}
		} else {
			echo mysqli_error($conn);
		}
	}
}*/
?>


<div class="DIYBody">


	<section>
		<fieldset>
			<legend> <strong>  Pour vous inscrire, renseignez les informations suivantes:  </strong> </legend>
			<form method="post" action="<?php echo "index.php?controller=Inscription&action=attend"  ?>" onsubmit="return validerNewCompte()">
				Nom   : <input type="text" id="nom" placeholder=" Potter" name="nom" onchange="checkNom()">
				<span id="NomErr" class="error"></span><span id="NomNP" class="NP"></span>
				<br><br>
				Prénom: <input type="text" id="prenom" name="prenom" placeholder=" Harry" onchange="checkPrenom()">
				<span id="PrenomErr" class="error"></span><span id="PrenomNP" class="NP"></span>
				<br><br>
				Pseudo : <input type="text" id="pseudo" placeholder=" magicJack" name="login" onchange="checkPseudo()">
				<span id="PseudoErr" class="error"></span><span id="PseudoNP" class="NP"></span>
				<br><br>
				Mot de passe : <input type="password" id="mdp" name="mdp" onchange="checkmdp()">
				<span id="mdpErr" class="error"></span><span id="mdpNP" class="NP"></span>
				<br><br>
				Confirmation mot de passe : <input type="password" id="mdpC" name="mdpC" onchange="checkmdpC()">
				<span id="mdpCErr" class="error"></span><span id="mdpCNP" class="NP"></span>
				<br><br>
				E-mail: <input type="text" id="mail" placeholder=" xxxxxxxxx@gmail.com" name="email" onchange="checkMail()">
				<span id="mailErr" class="error"></span><span id="mailNP" class="NP"></span>
				<br><br>
				Téléphone: <input type="text" id="tele" placeholder=" 06 00 00 00 00" name="tele" onchange="checkTele()">
				<span id="teleErr" class="error"></span><span id="teleNP" class="NP"></span>
				<br><br>

				Type: <input type="radio" id ="typeClient" name="typeU" value="client"  onclick="checkTypeU()"> Client
				<input type="radio" id ="typeAdmin" name="typeU" value="admin"  onclick="checkTypeU(); showHideDomInfo();"> Administrateur
				<input type="text" id="codeV" placeholder="XXXXXXXX" name="codeV" onchange="checkCodeV()">
				<span><a tabindex="0" class="btn btn-xs btn-info" role="button" data-toggle="popover" data-trigger="focus" data-content="le code qui vous a été envoyé par mail lors de votre souscription à nos service. si vous ne le retouvez pas, contacter l'assistance."><i class="fa fa-question" id="faid"></i></a></span>
				<span id="codeVErr" class="error"></span><span id="codeVNP" class="NP"></span>
				<br><br><br>
				<span class="error"><?php if (isset($_GET['Err'])) echo $_GET['Err'];?></span><br><br><br>
				<button type="submit" class="btn btn-primary">Inscrire</button>

			</fieldset>
					<!--<fieldset id="DomInfo">
					<legend> <strong>  Pour finir, veillez entrer les informations de votre domicile:  </strong> </legend>
					Habitation: <input type="radio" name="typeH" value="maison" onclick="checkTypeM()"> Maison
					<input type="radio" name="typeH" value="appart" onclick="checkTypeA()"> Appartement
					<span id="habitErr" class="error"></span><span id="habitNP" class="NP"></span>
					<br><br>
					Ville : <input type="text" id="ville" placeholder=" Langres" name="ville" size="20" onchange="checkVille()"/>
					<span id="villeErr" class="error"></span><span id="villeNP" class="NP"></span>
					<br><br>
					Adresse : <input type="text" id="adresse" placeholder=" 21 Rue Saint-Antoine" name="adresse" onchange="checkAdresse()" />
					<span id="adresseErr" class="error"></span><span id="adresseNP" class="NP"></span>
					<br><br>
					Complément d'adresse : <input type="text" id="cptadresse" placeholder=" Batiment B" name="cptadresse" onchange="checkCptadresse()" />
					<span id="cptadresseErr" class="error"></span><span id="cptadresseNP" class="NP"></span>
					<br><br>
					Code Postal : <input type="text" id="codepostal" placeholder=" 75004" name="codepostal" size="5" onchange="checkCodepostal()"/>
					<span id="codepostalErr" class="error"></span><span id="codepostalNP" class="NP"></span>
					<br><br>

					<br><br>
					<input type="submit" name="submit" value="Envoyer">
				</form>
			</fieldset>-->
		</div>

		<div id="boutonretour">
			<a href="index.php?controller=Connexion&action=index" class="btn btn-primary btn-lg" role="button">Retournez vers la page de connexion</a>
		</div>
	</section>

	<script type="text/javascript">
		$(function () { $("[data-toggle='popover']").popover(); });
	</script>
</div>
