<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Page de créer nouveau compte</title>
	<link rel="stylesheet" type="text/css" href="css/headerBodyFooterFixed.css">
	<style type="text/css">
		.error {
  			color: red;
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
				$loginErr = "Login est requis";
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
				$teleErr = "E-mail est requis";
			} else {
				$tele = test_input($_POST["tele"]);
				if (!preg_match("/([0-9]+)/", $tele)) {
					$teleErr = "Le format de tele est invalide";
				}
				 else {
					$allValider++;
				}
			}	

			if (empty($_POST["typeU"])) {
				$typeUErr = "Type de Utilisateur est requis";
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
						$loginErr = "Votre login est déjà existé.";
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

	<div class="partieInfo">
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
			Nom   : <input type="text" name="nom" value="<?php echo $nom;?>"> 
			<span class="error"> *<?php echo $nomErr;?></span>
			<br><br>
			Prénom: <input type="text" name="prenom" value="<?php echo $prenom;?>">
			<span class="error"> *<?php echo $prenomErr;?></span>
			<br><br>
			Login : <input type="text" name="login" value="<?php echo $login;?>">
			<span class="error"> *<?php echo $loginErr;?></span>
			<br><br>
			Mot de passe : <input type="password" name="mdp" value="<?php echo $mdp;?>">
			<span class="error"> *<?php echo $mdpErr;?></span>
			<br><br>
			Comfirmation mot de passe : <input type="password" name="mdpC" value="<?php echo $mdpC;?>">
			<span class="error"> *<?php echo $mdpCErr;?></span>
			<br><br>
			E-mail: <input type="text" name="email" value="<?php echo $email;?>">
			<span class="error"> *<?php echo $emailErr;?></span>
			<br><br>
			Téléphone: <input type="text" name="tele" value="<?php echo $tele;?>">
			<span class="error"> *<?php echo $teleErr;?></span>
			<br><br>
			Type: <input type="radio" name="typeU" <?php if (isset($typeU) && $typeU=="client") echo "checked";?> value="client"> Client
					<input type="radio" name="typeU" <?php if (isset($typeU) && $typeU=="admin") echo "checked";?> value="admin"> Administrateur
					<span class="error"> *<?php echo $typeUErr;?></span>
			<br><br>
			<input type="submit" name="submit" value="Envoyer">
		</form>
	</div>
</body>
</html>
