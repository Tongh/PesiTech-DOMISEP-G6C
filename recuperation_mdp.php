<?php

try
{
  $bdd=new PDO('mysql:host=localhost;dbname=mydb;charset=utf8','root','');
}
 catch (\Exception $e)
 {
  die('Erreur: '.$e->getMessage());
}

?>

<html>
<head>
	<meta charset="utf-8">
	<title>Mot de passe oublié !</title>
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<script type="text/javascript" src="checkNewCompte.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap-theme.min.css">
	<script type="text/javascript" src="jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	<style type="text/css">
	.error {
		color: #FF0000;
	}
	.NP {
		color: #00FF66;
	}
	section {
		width: 50%;
		border: 1px solid black;
		margin-top: 10px;
		margin-left: auto;
		margin-right: auto;
		padding-left: 10px;
	}
</style>
</head>
<body>
	<?php include("header_accueil.php"); ?>

  <div class="DIYBody">


    <section>
      <fieldset>
        <legend> <strong>  Pour modifier votre mot de passe, renseignez les coordonnées suivantes:  </strong> </legend>
        <form method="post" action="recuperation_mdp_mail.php" >

          Votre pseudo :<input type="text" id="pseudo" placeholder="magicJack" name="login" >
          E-mail: <input type="text" id="mail" placeholder="xxxxxxxxx@gmail.com" name="email" >


          <input type="submit" name="submit" value="Envoyer">

        </form>




          <legend> <strong>  Pour récupérer votre pseudo, renseignez les coordonnées suivantes:  </strong> </legend>
          <form method="post" action="recuperation_mdp_mail.php" >

            E-mail: <input type="text" id="mail" placeholder="xxxxxxxxx@gmail.com" name="email" >


            <input type="submit" name="submit" value="Envoyer">

          </form>
        </fieldset>

    </div>

    <div id="boutonretour">
      <form action="connexion.php">
        <input type="submit" value="Retournez vers mon espace client">
      </form>
    </div>
  </section>


  <?php include "footer_client.php"; ?>
  </body>
  </html>
