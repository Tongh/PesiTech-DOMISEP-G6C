<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Page de créer nouveau compte</title>
	<link rel="stylesheet" type="text/css" href="css/headerBodyFooterFixed.css">
</head>
<body>
	<?php 
		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$nomErr = $prenomErr = $genderErr = $emailErr = $loginErr = $mdpErr = $mdpCErr = "";
		$nom = $prenom = $email = $gender = $login = $mdp = $mdpC = "";
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
					$prenomErr = "Autorisé seulement les lettres, l'espace, les chiffres, '-' et '_'!";
				} else {
					$allValider++;
				}
			}

			if (empty($_POST["mdp"])) {
				$mdpErr = "Mot de passe est requis";
			} else {
				$login = test_input($_POST["login"]);	
				if (!preg_match("/^[-_a-zA-Z0-9 ]*$/", $login)) {
					$prenomErr = "Autorisé: a-zA-Z0-9-_";
				} else {
					$allValider++;
				}
			}

			if (empty($_POST["mdpC"])) {
				$loginErr = "Vous devez confirmer votre mot de passe!";
				$login = test_input($_POST["login"]);	
				if (!preg_match("/^[-_a-zA-Z0-9 ]*$/", $login)) {
					$prenomErr = "Autorisé seulement les lettres, l'espace, les chiffres, '-' et '_'!";
				} else {
					$allValider++;
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

			if (empty($_POST["gender"])) {
				$genderErr = "Gender est requis";
			} else {
				$gender = test_input($_POST["gender"]);	
				$allValider++;
				}

			if ($allValider == 5) {
				header("Location:finiCreerNewCompte.php");
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
			Mot de passe : <input type="text" name="mdp" value="<?php echo $mdp;?>">
			<span class="error"> *<?php echo $mdpErr;?></span>
			<br><br>
			Comfirmation mot de passe : <input type="text" name="mdpC" value="<?php echo $mdpC;?>">
			<span class="error"> *<?php echo $mdpCErr;?></span>
			<br><br>
			E-mail: <input type="text" name="email" value="<?php echo $email;?>">
			<span class="error"> *<?php echo $emailErr;?></span>
			<br><br>
			Gender: <input type="radio" name="gender" <?php if (isset($gender) && $gender=="femme") echo "checked";?> value="femme"> Femme 
					<input type="radio" name="gender" <?php if (isset($gender) && $gender=="homme") echo "checked";?> value="homme"> Homme
					<span class="error"> *<?php echo $genderErr;?></span>
			<br><br>
			<input type="submit" name="submit" value="Envoyer">
		</form>
	</div>
</body>
</html>
