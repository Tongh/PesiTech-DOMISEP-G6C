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
	<script type="text/javascript">
		$('.dropdown-toggle').dropdown();
		aler("run");
	</script>
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
					} elseif (isset($_SESSION["AdminMode"]) && $_SESSION["AdminMode"] == "OFF") {
						echo "<a href=\"index.php?controller=Logement\">Mon installation</a>";
						/*echo "<div class=\"dropdown\">";
						echo "<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">";
						echo "Dropdown trigger";
						echo "<b class=\"caret\"></b>";
						echo "</a>";
						echo "<ul class=\"dropdown-menu\" role=\"menu\" aria-labelledby=\"dLabel\">";
						echo "<li><a href=\"index.php?controller=Logement\">Mes Logement</a></li>";
						echo "<li><a href=\"index.php?controller=Piece\">Mes Pièces</a></li>";
						echo "</ul>";
						echo "</div>";*/
					} else {
						echo "<a href=\"index.php?controller=Admin&action=gestionClient\">Mes clients</a>";
					}
					?>
				</li>

				<li id="services">
					<?php if (isset($_SESSION["LoginMode"]) && $_SESSION["LoginMode"] == "OFF") {
						echo "<a href=\"index.php?controller=NosServices\"> Nos services </a>";
					} elseif (isset($_SESSION["AdminMode"]) && $_SESSION["AdminMode"] == "OFF") {
						echo "<a href=\"index.php?controller=Status\">Relevés et Statistiques</a>";
					} else {
						echo "<a href=\"index.php?controller=Admin&action=historiques\">Historiques des achats</a>";
					}
					?>
				</li>

				<li id="acheter">
					<?php if (isset($_SESSION["LoginMode"]) && $_SESSION["LoginMode"] == "OFF") {
						echo "<a href=\"index.php?controller=Acheter\"> Acheter </a>";
					} elseif (isset($_SESSION["AdminMode"]) && $_SESSION["AdminMode"] == "OFF") {
						echo "<a href=\"index.php?controller=NousContacter&action=panne\">Panne et Résolution</a>";
					} else {
						echo "<a href=\"index.php?controller=Admin&action=contacterClient\">Contacter mes clients</a>";
					}
					?>

				</li>

				<li id="contact">
					<?php if (isset($_SESSION["LoginMode"]) && $_SESSION["LoginMode"] == "OFF") {
						echo "<a href=\"index.php?controller=NousContacter\"> Nous contacter </a>";
					} elseif (isset($_SESSION["AdminMode"]) && $_SESSION["AdminMode"] == "OFF") {
						echo "<a href=\"index.php?controller=EspaceClient\">Mon profil</a>";
					} else {
						echo "<a href=\"index.php?controller=Admin\">Mon profil</a>";
					}
					?>

				</li>


			</ul>
		</nav>

	</header>
