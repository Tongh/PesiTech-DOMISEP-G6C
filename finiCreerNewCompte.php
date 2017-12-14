<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Créer un compte</title>
	<link rel="stylesheet" type="text/css" href="css/headerBodyFooterFixed.css">
	<link  rel="stylesheet" type="text/css" href="css/creercompte.css">
	<style type="text/css">
		.error {
  			color: red;
		}
	</style>
</head>

<header>
	  <a href="espaceclientv2.html"><img src="Image\logo_ez-home-moitie.png" class="logo"> </a>
	</header>

<div class="partieInfo">
		<fieldset>
			<legend> <strong>  Votre inscription a bien été prise en compte.  </strong> </legend>
			<?php 
				echo "Vous recevrez sous peu une demande de confirmation de votre compte par mail 
				</br></br>
				Si vous ne trouvez pas l'email, </br> 
				 Vérifiez que l'email de confirmation n'a pas été classé dans le dossier Courrier indésirable ou Spam de votre messagerie.
				</br>
				</br>  Si vous ne trouvez toujours pas l'email, demandez-nous de vous le renvoyer.";
			 ?>
			<br/>
			</br> 
			<div id="boutonretour_milieu">
			<form action="connexion.php">
						<input type="submit" value="Retournez vers mon espace client"> 
			</form>
			</div>
		</fieldset>
</div>
