<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/header-clientv2.css"> <!-- renvoi au fichier css header_accueil -->
</head>

<header class="header_accueil">

	<!-- logo qui renvoi à la page d'accueil client -->
	<a href="ajoutpiece.php"><img src="Image/logo_ez-home-moitie.png" alt="Logo" id="logo"></a>
	<!--bouton deconnexion renvoi à la page d'accueil -->
	<a href="connexion.php" class='deconnecterboutton'><img src="Image/Logout80x80.png" alt="Se Deconnecter" id="imgdecn"/></a>

	<nav id="menu"> <!--menu navigationel -->
		<ul>
			<li id="instal">
				<a href="ajoutpiece.php">Mon installation</a>
			</li>

			<li id="stat">
				<a href="stats.php">Relevés et Statistiques</a>
			</li>

			<li id="panne">
				<a href="panne.php">Panne et Résolution</a>
			</li>

			<li id="profil">
				<a href="mon-profil.php">Mon profil</a>
			</li>
		</ul>
	</nav>
</header>
</html>
