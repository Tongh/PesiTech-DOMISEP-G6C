<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<script type="text/javascript" src="test.js"></script>
	<style type="text/css">
		.error {
			color: #FF0000;
		}
		.NP {
			color: #00FF66;
		}
	</style>
</head>
<body>
	<div class="partieInfo">
		<fieldset>
			<legend> <strong>  Pour vous inscrire, renseignez les coordonnées suivantes:  </strong> </legend>

		<form method="post" action="" onsubmit="return validerForm()">
			Nom   : <input type="text" id="nom" name="nom" onchange="checkNom()">
			<span id="NomErr" class="error"></span><span id="NomNP" class="NP"></span>
			<br><br>
			Prénom: <input type="text" id="prenom" name="prenom" onchange="checkPrenom()">
			<span id="PrenomErr" class="error"></span><span id="PrenomNP" class="NP"></span>
			<br><br>
			Pseudo : <input type="text" id="pseudo" name="login" onchange="checkPseudo()">
			<span id="PseudoErr" class="error"></span><span id="PseudoNP" class="NP"></span>
			<br><br>
			Mot de passe : <input type="password" id="mdp" name="mdp" onchange="checkmdp()">
			<span id="mdpErr" class="error"></span><span id="mdpNP" class="NP"></span>
			<br><br>
			Confirmation mot de passe : <input type="password" id="mdpC" name="mdpC" onchange="checkmdpC()">
			<span id="mdpCErr" class="error"></span><span id="mdpCNP" class="NP"></span>
			<br><br>
			E-mail: <input type="text" id="mail" name="email" onchange="checkMail()">
			<span id="mailErr" class="error"></span><span id="mailNP" class="NP"></span>
			<br><br>
			Téléphone: <input type="text" id="tele" name="tele" onchange="checkTele()">
			<span id="teleErr" class="error"></span><span id="teleNP" class="NP"></span>
			<br><br>
			Type: <input type="radio" id="typeU" name="typeU" value="client"> Client
					<input type="radio" name="typeU" value="admin"> Administrateur
			<br><br>
			<input type="submit" name="submit" value="Envoyer">
		</fieldset>
		</form>
</body>
</html>