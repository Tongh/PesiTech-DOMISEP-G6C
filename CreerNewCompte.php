<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Créer un compte</title>
	<link rel="stylesheet" type="text/css" href="css/headerBodyFooterFixed.css">
	<link  rel="stylesheet" type="text/css" href="css/creercompte.css">
	<script type="text/javascript" src="checkNewCompte.js"></script>
	<style type="text/css">
		.error {
  			color: #FF0000;
		}
		.NP {
			color: #00FF66;
		}
	</style>
</head>
<body>
	<?php
		require("db_config.php");

		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$nomErr = $prenomErr = $typeUErr = $emailErr = $loginErr = $mdpErr = $mdpCErr = $teleErr = "";
		$nom = $prenom = $email = $typeU = $login = $mdp = $mdpC = $tele = "";
		$allValider = 0;

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST["nom"])) {
				$nomErr = "Nom est requis";
			} else {
				$nom = test_input($_POST["nom"]);
				if (!preg_match("/^[-a-zA-Z ]*$/", $nom)) {
					$nomErr = "Autorisé seulement les lettres, l'espace et '-'!";
				} else {
					$allValider++;
				}
			}

			if (empty($_POST["prenom"])) {
				$prenomErr = "Préom est requis";
			} else {
				$prenom = test_input($_POST["prenom"]);
				if (!preg_match("/^[-a-zA-Z ]*$/", $prenom)) {
					$prenomErr = "Autorisé seulement les lettres, l'espace et '-'!";
				} else {
					$allValider++;
				}
			}

			if (empty($_POST["login"])) {
				$loginErr = "Pseudo est requis";
			} else {
				$login = test_input($_POST["login"]);
				if (!preg_match("/^[-_a-zA-Z0-9 ]*$/", $login)) {
					$loginErr = "Autorisé seulement les lettres, l'espace, les chiffres, '-' et '_'!";
				} else {
					$allValider++;
				}
			}

			if (empty($_POST["mdp"])) {
				$mdpErr = "Mot de passe est requis";
			} else {
				$mdp = test_input($_POST["mdp"]);
				if (!preg_match("/^[-_a-zA-Z0-9 ]*$/", $mdp)) {
					$mdpErr = "Autorisé: a-zA-Z0-9-_";
				} else {
					$allValider++;
				}
			}

			if (empty($_POST["mdpC"])) {
				$mdpCErr = "Vous devez confirmer votre mot de passe!";
			} else {
				$mdpC = test_input($_POST["mdpC"]);
				if (!preg_match("/^[-_a-zA-Z0-9 ]*$/", $mdpC)) {
					$mdpCErr = "Autorisé: a-zA-Z0-9-_ ";
				} else {
					if ($mdp == $mdpC) {
						$allValider++;
					} else {
						$mdpCErr = "Les deux mots de passe ne sont pas le même!";
					}
				}
			}

			if (empty($_POST["email"])) {
				$emailErr = "E-mail est requis";
			} else {
				$email = test_input($_POST["email"]);
				if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
					$emailErr = "Le format de courriel est invalide";
				}
				 else {
					$allValider++;
				}
			}

			if (empty($_POST["tele"])) {
				$teleErr = "E-mail valide requis";
			} else {
				$tele = test_input($_POST["tele"]);
				if (!preg_match("/([0-9]+)/", $tele)) {
					$teleErr = "Le format de téléphone est invalide";
				}
				 else {
					$allValider++;
				}
			}

			if (empty($_POST["typeU"])) {
				$typeUErr = "Type d'Utilisateur est requis";
			} else {
				$typeU = test_input($_POST["typeU"]);
				$allValider++;
			}


			if ($allValider == 8) {
				$mdpMD5 = md5($mdp);
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
						$sql = "INSERT INTO utilisateur (nom, prenom, login, password, email, telephone, typeUtilisateur) VALUES ('$nom', '$prenom', '$login', '$mdpMD5', '$email', '$tele', '$typeU')";
						if (mysqli_query($conn, $sql)) {
							echo "Success insert to table !";
							header("Location:finiCreerNewCompte.php");
						} else {
							echo "something wrong <br>";
							echo mysqli_error($conn);
						}
					}
				} else {
					echo "someting wrong comparer login <br>";
					echo mysqli_error($conn);
				}

			}
		}
 	?>
	<header>
	  <a href="espaceclientv2.html"><img src="Image\logo_ez-home-moitie.png" class="logo"> </a>
	</header>

	<div class="partieInfo">
		<fieldset>
			<legend> <strong>  Pour vous inscrire, renseignez les coordonnées suivantes:  </strong> </legend>

		<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" onsubmit="return validerForm()">
			Nom   : <input type="text" id="nom" name="nom" onchange="checkNom()">
			<span id="NomErr" class="error"></span><span id="NomNP" class="NP"></span>
			<br><br>
			Prénom: <input type="text" id="prenom" name="prenom" onchange="checkPrenom()">
			<span id="PrenomErr" class="error"></span><span id="PrenomNP" class="NP"></span>
			<br><br>
			Pseudo : <input type="text" id="pseudo" name="login" onchange="checkPseudo()">
			<span id="PseudoErr" class="error"></span><span id="PseudoNP" class="NP"></span>
			<br><br>
			Mot de passe : <input type="password" id="mdp" name="mdp" onchange="checkmdp()">
			<span id="mdpErr" class="error"></span><span id="mdpNP" class="NP"></span>
			<br><br>
			Confirmation mot de passe : <input type="password" id="mdpC" name="mdpC" onchange="checkmdpC()">
			<span id="mdpCErr" class="error"></span><span id="mdpCNP" class="NP"></span>
			<br><br>
			E-mail: <input type="text" id="mail" name="email" onchange="checkMail()">
			<span id="mailErr" class="error"></span><span id="mailNP" class="NP"></span>
			<br><br>
			Téléphone: <input type="text" id="tele" name="tele" onchange="checkTele()">
			<span id="teleErr" class="error"></span><span id="teleNP" class="NP"></span>
			<br><br>
			Type: <input type="radio" id="typeU" name="typeU" value="client"> Client
					<input type="radio" name="typeU" value="admin"> Administrateur
			<br><br>
			<input type="submit" name="submit" value="Envoyer">
		</fieldset>
		</form>
	</div>

	<div id="boutonretour">
		<form action="connexion.php">
			<input type="submit" value="Retournez vers mon espace client">
		</form>
	</div>

</body>
</html>
