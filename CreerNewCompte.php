<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Créer un compte</title>
	<link rel="stylesheet" type="text/css" href="css/headerBodyFooterFixed.css">
	<link  rel="stylesheet" type="text/css" href="css/creercompte.css">
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

		$nom = $prenom = $email = $typeU = $login = $mdp = $mdpC = $tele = "";

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
 	?>
	<?php include("header/headerv2.html"); ?>

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
					<input type="text" id="codeV" name="codeV">
					<span><a tabindex="0" class="btn btn-xs btn-info" role="button" data-toggle="popover" data-trigger="focus" data-content="le code vous avez obtenu quand vous aviez acheté notre produit."><i class="fa fa-question"></i></a></span>
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

	<script type="text/javascript">
		$(function () { $("[data-toggle='popover']").popover(); }); 
	</script>
</body>
</html>
