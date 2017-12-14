<!DOCTYPE htlm>
<html>
<title>
  EZ-Home
</title>
<head>
  <meta charset="utf-8"/>
  <!--dossier css-->
  <link href="css/interv2.css" rel="stylesheet">
  <link href="css/profil.css" rel="stylesheet">
  <script src="https://use.fontawesome.com/e3c7c95da8.js"></script>
</head>
<!-- Header (tableau + image) -->
<header>
    <a href="espaceclientv2.html"><img src="Image\logo_ez-home-moitie.png" class="logo"></a>
  <!-- Debut tableau -->
  <table class="tableau">
    <tbody class="case">
      <th>
        <a href="mon-profil.php">Mon profil</a>
      </th>
      <th>
        <a href="mon-installation.html">Mon installation</a>
      </th>
      <th>
        <a href="stats.html">Relevés et Statistiques</a>
      </th>
      <!-- <th>
        <a href="catalogue.html">Catalogue</a>
      </th> -->
      <th>
        <a href="panne.html">Panne et Résolution</a>
      </th>
      <th>
        <a href="forum.html">Forum</a>
      </th>
      <th>
        <a href="messagerie.html">Messagerie</a>
      </th>
    </tbody>
  </table>
</header>
<body>
    <div class="profil">
        <form action="mon-profil.php" method="post">
            <p>Veuillez saisir vos coordonnées :</p>
            Ville : <input type="text" name="ville" size="20" />
            <br/>
            Adresse : <input type="text" name="adresse" />
            <br/>
            Complément d'adresse : <input type="text" name="cptadresse" />
            <br/>
            Code Postal : <input type="text" name="codepostal" size="3" />
            <br/>
            <input type="submit" value="Valider" />
       </form>
    </div>

</body>

<footer>
	<div class="block1">
		<h1>AIDE & CONTACT</h1>
		  <div class="miniblock">
			<a href="qsm.html">Qui sommes-nous?</a>
			<a href="sav.html"><br />Le SAV</a>
			<a href="paiement.html"><br />Le paiement</a>
			<a href="secu.html"><br />Sécurité</a>
			<a href="retour.html"><br />Retours & Remboursements</a>
                  </div>

	</div>
	<div class="block2">
		<h1>MENTIONS LÉGALES</h1>
		  <div class="miniblock">
			<a href="cgv.html">Conditions générales de vente</a>
			<a href="cgu.html"><br />Conditions générales d'utilisation</a>
			<a href="pdc.html"><br />Politique de confidentialité</a>
			<a href="mediation.html"><br />Mediation</a>
		 </div>
	</div>
	<div class="block3">
		<h1>RESEAUX SOCIAUX</h1>
		  <div class="miniblock">
			<a href="https://www.facebook.com">Facebook</a>
			<a href="https://www.twitter.com"><br />Twitter</a>
			<a href="https://linkedin.com"><br />Linkedin</a>
		  </div>
	</div>
	<div class="block4">
		<h1>LES MOYENS DE PAIEMENTS</h1>
		<i class="fa fa-credit-card-alt fa-2x" aria-hidden="true"></i>
		<i class="fa fa-cc-mastercard fa-2x" aria-hidden="true"></i>
		<i class="fa fa-paypal fa-2x" aria-hidden="true"></i>
		<i class="fa fa-btc fa-2x" aria-hidden="true"></i>
	</div>
</footer>
</html>

<?php
require("db_config.php");
$conn = mysqli_connect($mysql_server_name, $mysql_username, $mysql_password, $mysql_database);
      if (!$conn) {
        die('Connet Error (' . mysqli_connect_errno() . ')' . mysqli_connect_error());
      }
 if (isset($_POST['ville']))
 {
   if (isset($_POST['adresse']))
   {
       if (isset($_POST['codepostal']))
       {
        $req='UPDATE utilisateur set ville ='.$_POST['ville'].' and adresse = '.$_POST['adresse'].' and codePostal  = ' . $_POST['codepostal'].'where id utilisateur =';
       }
   }
 }

?>
