<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?></title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="config/css/headerBodyFooterFixed.css"/> 
	<link rel="stylesheet" type="text/css" href="config/css/swiper.min.css">
	<link rel="stylesheet" type="text/css" href="config/css/inter.css"/>
	<link rel="stylesheet" type="text/css" href="config/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="config/bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="config/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css">
	<script type="text/javascript" src="config/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="config/js/swiper.min.js"></script>
	<script type="text/javascript" src="config/js/checkNewCompte.js"></script>
	<script type="text/javascript" src="config/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</head>
<body>
	<header class="DIYheader">
		<a href="index.php?controller=Index"><img src="Image/logo_ez-home-moitie.png" alt="Logo" id="logo"></a>
		<?php 
		if (isset($_SESSION["LoginMode"]) && $_SESSION["LoginMode"] == "OFF") {
			echo "<a href=\"index.php?controller=Connexion\" class='connecterboutton'><img src=\"Image/profil.png\" alt=\"Se Connecter\" id=\"imgcn\"/></a>";
		} else {
			echo "<a href=\"index.php?controller=Connexion&action=disconnexion\" class='deconnecterboutton'><img src=\"Image/Logout80x80.png\" alt=\"Se Deconnecter\" id=\"imgdecn\"/></a>";
		}	 
		 ?>
		<nav id="barre"> 
			<ul>
				<li id="qsn">
					<?php if (isset($_SESSION["LoginMode"]) && $_SESSION["LoginMode"] == "OFF") {
						echo "<a href=\"index.php?controller=QuiSommesNous\"> Qui sommes-nous ? </a>";
					} else {
						echo "<a href=\"ajoutpiece.php\">Mon installation</a>";
					} ?>	
				</li>

				<li id="services">
					<?php if (isset($_SESSION["LoginMode"]) && $_SESSION["LoginMode"] == "OFF") {
						echo "<a href=\"index.php?controller=NosServices\"> Nos services </a>";
					} else {
						echo "<a href=\"stats.php\">Relevés et Statistiques</a>";
					} ?>
				</li>

				<li id="acheter">
					<?php if (isset($_SESSION["LoginMode"]) && $_SESSION["LoginMode"] == "OFF") {
						echo "<a href=\"index.php?controller=Acheter\"> Acheter </a>";
					} else {
						echo "<a href=\"panne.php\">Panne et Résolution</a>";
					} ?>
					
				</li>

				<li id="contact">
					<?php if (isset($_SESSION["LoginMode"]) && $_SESSION["LoginMode"] == "OFF") {
						echo "<a href=\"index.php?controller=NousContacter\"> Nous contacter </a>";
					} else {
						echo "<a href=\"mon-profil.php\">Mon profil</a>";
					} ?>
					
				</li>


			</ul>
		</nav>

	</header>

