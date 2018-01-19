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
		<div class="partieInfo">
				<fieldset>
					<legend> <strong>  Votre demande à bien été prise en compte.  </strong> </legend>
					<?php
						echo "Vous recevrez sous peu un mail vous permettant de mettre à jour vos informations personnelles
						</br></br>
						Si vous ne trouvez pas l'email, 
						 Vérifiez que l'email de confirmation n'a pas été classé dans le dossier Courrier indésirable ou Spam de votre messagerie.
						</br>
						</br>  Si vous ne trouvez toujours pas l'email, demandez-nous de vous le renvoyer.";
					 ?>
					<br/>
					</br>

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
