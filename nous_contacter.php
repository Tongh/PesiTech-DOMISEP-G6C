<!DOCTYPE html>
<html>
<head>
	<title> EZ-Home - Nous Contacter </title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="css/inter.css"/>
	<link rel="stylesheet" type="text/css" href="css/headerBodyFooterFixed.css"/>
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

		$ameliorer = $nom = $prenom = $email = $categorie = $ameliorer2 = $message = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$ameliorer = "Question: " . test_input($_POST["ameliorer"]) . "\n";
			$nom = "Nom: " . test_input($_POST["nom"]) . "\n";
			$prenom = "Prénom" . test_input($_POST["prenom"]) . "\n";
			$email = "Email" . test_input($_POST["email"]) . "\n";
			$categorie = "Catégorie" . test_input($_POST["categorie"]) . "\n";
			$ameliorer2 = "Détail" . test_input($_POST["ameliorer2"]) . "\n";


		}
	 ?>
		<header class="DIYheader">
			<a href="site-accueil.html"><img src="Image/logo_ez-home-moitie.png" alt="Logo" id="logo"></a>
			<a href="connexion.php" class='connecterboutton'> <img src="Image/profil.png" alt="Se Connecter" id="imgcn"/></a>


			 <nav id="barre">
		        <ul>
		        	<div id="barre">
		            	<li class="qsn">
		              		<a href="qui_sommes_nous.html"> Qui sommes-nous? </a>
		            	</li>

		            	<li class="ns">
		              		<a href="nos_services.html"> Nos services </a>
		            	</li>

		            	<li class="ach">
		              		<a href="acheter.html"> Acheter </a>
		            	</li>
		          	</div>
		        </ul>
		    </nav>
		</header>

<div id="DIYbody">
<div id="page_contact">
	<div id="info_contact">
						<p>
							<h3> Nos informations de contact</h3>
							Vous pouvez nous contacter:
							<ul>
								<li> par mail à l'adresse: contact@domisep.fr </li>
								<li> par courrier à l'adresse: 75011, Paris </li>
								<li> au travers de notre service après-vente & assistance au: +331-47-54-87-88-21</li></ul>
							</ul>
						</p>

						<br/>

						<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
						   <p>
						       <label for="ameliorer"> <span class="txtq"> <strong>Vous avez une question ?</strong></span></label><br />
						       <textarea name="ameliorer" id="ameliorer"></textarea>
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
		       <input type="email" name="email" id="email" />


		   </fieldset>

		   <fieldset>
		       <legend>Votre demande</legend> <!-- Titre du fieldset -->

		       <p>
		           Précisez le type d'assistance que vous désirez :
		           <br/>
		           <input type="radio" name="categorie" value="infos" id="infos" /> <label for="infos">
		            <span class="txtq"> Informations sur nos services  <span class="txtq"> </label>
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

<footer class="DIYfooter">
	<nav>
		<div id="barre">
			<ul>
				<li class='adminfooter'>
					<a href="connexion.php"> Interface administrateur </a>
				</li>
				<li class='nouscontacterfooter'>
					<a href="nous_contacter.php"> Nous contacter </a>
				</li>
				<li class='DOMISEPfooter'>
					<a href="domisep.html"> DOMISEP </a>
				</li>
			</ul>
		</div>
		<div>
			<p>
				Developed by PESITech ©
			</p>
			<div>
			</nav>

		</footer>



</body>
</html>