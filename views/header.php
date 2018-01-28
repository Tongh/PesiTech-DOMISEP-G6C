<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?></title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="config/css/headerBodyFooterFixed.css"/> <!-- renvoi au fichier css header_accueil -->
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
		<a href="index.php?controller=Index"><img src="Image/logo_ez-home-moitie.png" alt="Logo" id="logo"></a> <!-- logo qui renvoi à la page d'accueil -->
		<a href="index.php?controller=Connexion" class='connecterboutton'><img src="Image/profil.png" alt="Se Connecter" id="imgcn"/></a> <!--bouton connexion renvoi à la page de connexion -->

		<nav id="barre"> <!--menu navigationel -->
			<ul>
				<li id="qsn">
					<a href="index.php?controller=QuiSommesNous"> Qui sommes-nous ? </a>
				</li>

				<li id="services">
					<a href="index.php?controller=NosServices"> Nos services </a>
				</li>

				<li id="acheter">
					<a href="index.php?controller=Acheter"> Acheter </a>
				</li>

				<li id="contact">
					<a href="index.php?controller=NousContacter"> Nous contacter </a>
				</li>


			</ul>
		</nav>

	</header>

