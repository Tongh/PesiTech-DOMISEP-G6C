<!DOCTYPE html>
<html>
<head>
	<title> EZ-Home - Nous Contacter </title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="css/inter.css"/>
	<link rel="stylesheet" type="text/css" href="css/headerBodyFooterFixed.css"/>
	<script type="text/javascript">
		function mail_sent() {
			alert("Votre Conseil a bien evoyé à PESITech!!")
		}
	</script>
</head>

<body>
	<!--<?php
	if (mail("wenxiao0015@icloud.com", "test", "hihihi")) {
		echo "mail sent";
	}
	require("db_config.php");

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$ameliorer = $nom = $prenom = $email = $categorie = $ameliorer2 = $message = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$ameliorer = "Question: " . test_input($_POST["ameliorer"]) . "\n";
		$nom = "Nom: " . test_input($_POST["nom"]) . "\n";
		$prenom = "Prénom" . test_input($_POST["prenom"]) . "\n";
		$email = "Email" . test_input($_POST["email"]) . "\n";
		$categorie = "Catégorie" . test_input($_POST["categorie"]) . "\n";
		$ameliorer2 = "Détail" . test_input($_POST["ameliorer2"]) . "\n";

		$to = "wenxiao0015@icloud.com";
		$subject = "Les Conseil des clients (PESITech)";
		$message = "Merci de ne pas répondre ce message. \n" . $nom . $prenom . $email . $ameliorer . $email . $categorie . $ameliorer2;
		$from = "PESITech@DOMISEP.g6c";

		if (mail($to, $sub, $message, "From: $from")) {
			echo "mail sent!";
		}
	}
	?>-->
	<!-- Header -->
	<?php
	include 'header_accueil.php';
	?>

	<div id="DIYbody">
		<div id="page_contact">
			<div id="info_contact">
				<p>
					<h3> Nos informations de contact</h3>
					Vous pouvez nous contacter:
					<ul>
						<li> par mail à l'adresse: contact@domisep.fr </li>
						<li> par courrier à l'adresse: 75011, Paris </li>
						<li> au travers de notre service après-vente & assistance au: +331·47·54·87·88</li></ul>
					</ul>·
				</p>

				<br/>

				<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
					<p>
						<label for="ameliorer"> <span class="txtq"> <strong>Vous avez une question ?</strong></span></label><br />
						<textarea name="ameliorer" id="ameliorer"></textarea>
					</br>
					<label><span class="txtq"> Renseignez votre email: <span class="txtq"> </label> <input type="email" name="email_client" required />
						<!-- <input type="submit" value="Envoyer" /> -->
					</p>
					<input type ="submit" value="Envoyer">

				</form>



			</div>

			<figure id="form_assist">
				<form method="post" action="assistance.php">
					<label> <span class="txtq"> <strong> Pour une assistance personalisée, veuillez remplir le formulaire ci-dessous : </strong></span></strong> </label>


					<fieldset>
						<legend>Vos coordonnées</legend> <!-- Titre du fieldset -->

						<label for="nom"><span class="txtq">Quel est votre nom ?</span></label>
						<input type="text" name="nom" id="nom" />
						<br/>

						<label for="prenom"> <span class="txtq">Quel est votre prénom ? </span></label>
						<input type="text" name="prenom" id="prenom" />
						<br/>
						<label for="email"><span class="txtq">Quel est votre pseudo ?</span></label>
						<input type="text" name="email" id="email" />


					</fieldset>

					<fieldset>
						<legend>Votre demande</legend> <!-- Titre du fieldset -->

						<p>
							Précisez le type d'assistance que vous désirez :
							<br/>
							<input type="radio" name="categorie" value="infos" id="infos" /> <label for="infos">
								<span class="txtq"> Informations sur nos services  </span> </label>
								<br/>
								<input type="radio" name="categorie" value="technique" id="technique" /> <label for="technique">  <span class="txtq"> Assistance technique </span></label>
								<br/>
								<input type="radio" name="categorie" value="depannage" id="depannage" /> <label for="depannage">  <span class="txtq">Dépannage </span></label>
								<br/>
								<input type="radio" name="categorie" value="autre" id="autre" /> <label for="autre"> <span class="txtq">Autre... </span></label>
							</p>

							<p>
								<label for="ameliorer"> <span class="txtq"> Détaillez ici votre problème en quelques lignes </span></label><br />
								<textarea name="ameliorer2" id="ameliorer"></textarea>
							</p>
							<input type ="submit" value="Envoyer">
						</fieldset>


					</form>
				</figure>
			</div>

		</div>



		<?php include "footer_client.php"; ?>



	</body>
	</html>
