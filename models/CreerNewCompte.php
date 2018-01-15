<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Créer un compte</title>
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<script type="text/javascript" src="checkNewCompte.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap-theme.min.css">
	<script type="text/javascript" src="jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	<style type="text/css">
	.error {
		color: #FF0000;
	}
	.NP {
		color: #00FF66;
	}
	section {
		width: 50%;
		border: 1px solid black;
		margin-top: 10px;
		margin-left: auto;
		margin-right: auto;
		padding-left: 10px;
	}
</style>
</head>
<body>
	<?php include("header_accueil.php"); ?>
	<?php
	require("db_config.php");

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
										header("Location:finiCreerNewCompte.php");
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
	}
	?>




	<div class="DIYBody">


		<section>
			<fieldset>
				<legend> <strong>  Pour vous inscrire, renseignez les coordonnées suivantes:  </strong> </legend>
				<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" onsubmit="return validerForm()">
					Nom   : <input type="text" id="nom" placeholder="Potter" name="nom" onchange="checkNom()">
					<span id="NomErr" class="error"></span><span id="NomNP" class="NP"></span>
					<br><br>
					Prénom: <input type="text" id="prenom" name="prenom" placeholder="Harry" onchange="checkPrenom()">
					<span id="PrenomErr" class="error"></span><span id="PrenomNP" class="NP"></span>
					<br><br>
					Pseudo : <input type="text" id="pseudo" placeholder="magicJack" name="login" onchange="checkPseudo()">
					<span id="PseudoErr" class="error"></span><span id="PseudoNP" class="NP"></span>
					<span class="error"><?php echo $loginErr;?></span>
					<br><br>
					Mot de passe : <input type="password" id="mdp" name="mdp" onchange="checkmdp()">
					<span id="mdpErr" class="error"></span><span id="mdpNP" class="NP"></span>
					<br><br>
					Confirmation mot de passe : <input type="password" id="mdpC" name="mdpC" onchange="checkmdpC()">
					<span id="mdpCErr" class="error"></span><span id="mdpCNP" class="NP"></span>
					<br><br>
					E-mail: <input type="text" id="mail" placeholder="xxxxxxxxx@gmail.com" name="email" onchange="checkMail()">
					<span id="mailErr" class="error"></span><span id="mailNP" class="NP"></span>
					<br><br>
					Téléphone: <input type="text" id="tele" placeholder="06 00 00 00 00" name="tele" onchange="checkTele()">
					<span id="teleErr" class="error"></span><span id="teleNP" class="NP"></span>
					<br><br>
					Type: <input type="radio" name="typeU" value="client" onclick="checkTypeU()"> Client
					<input type="radio" name="typeU" value="admin" onclick="checkTypeU()"> Administrateur
					<input type="text" id="codeV" placeholder="XXXXXXXX" name="codeV" onchange="checkCodeV()">
					<span><a tabindex="0" class="btn btn-xs btn-info" role="button" data-toggle="popover" data-trigger="focus" data-content="le code que vous avez obtenu quand vous aviez acheté notre produit."><i class="fa fa-question"></i></a></span>
					<span id="codeVErr" class="error"></span><span id="codeVNP" class="NP"></span>
					<span class="error"><?php echo $codeVErr;?></span>
					<br><br>
					<input type="submit" name="submit" value="Envoyer">

				</form>
			</fieldset>
		</div>

		<div id="boutonretour">
			<form action="connexion.php">
				<input type="submit" value="Retournez vers mon espace client">
			</form>
		</div>
	</section>

	<script type="text/javascript">
		$(function () { $("[data-toggle='popover']").popover(); });
	</script>
	<?php include "footer_client.php"; ?>
</body>
</html>
