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

		$nomErr = $prenomErr = $genderErr = $emailErr = "";
		$nom = $prenom = $email = $gender = "";
		$allValider = 0;

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST["nom"])) {
				$nomErr = "Nom est requis";
			} else {
				$nom = test_input($_POST["nom"]);
				if (!preg_match("/^[-a-zA-Z ]*$/", $nom)) {
					$nomErr = "Autorisé seulement les lettres et l'espace!";
				} else {
					$allValider++;
				}
			}

			if (empty($_POST["prenom"])) {
				$prenomErr = "Préom est requis";
			} else {
				$prenom = test_input($_POST["prenom"]);	
				if (!preg_match("/^[-a-zA-Z ]*$/", $prenom)) {
					$prenomErr = "Autorisé seulement les lettres et l'espace!";
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

			if ($allValider == 4) {
				header("Location:http://www.google.fr");
			}
		}

 	?>
	<div class="partieInfo">
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
			Nom   : <input type="text" name="nom" value="<?php echo $nom;?>"> 
			<span class="error"> *<?php echo $nomErr;?></span><br><br>
			Prénom: <input type="text" name="prenom" value="<?php echo $prenom;?>">
			<span class="error"> *<?php echo $prenomErr;?></span><br><br>
			E-mail: <input type="text" name="email" value="<?php echo $email;?>">
			<span class="error"> *<?php echo $emailErr;?></span><br><br>
			Gender: <input type="radio" name="gender" <?php if (isset($gender) && $gender=="femme") echo "checked";?> value="femme"> Femme 
					<input type="radio" name="gender" <?php if (isset($gender) && $gender=="homme") echo "checked";?> value="homme"> Homme
					<span class="error"> *<?php echo $genderErr;?></span><br><br>
			<input type="submit" name="submit" value="Envoyer">
		</form>
	</div>
</body>
</html>