function validerNewCompte() {
	var check = checkNom() && checkPrenom() && checkPseudo() && checkmdp() && checkmdpC() && checkMail() && checkTele() && checkCodeV() && checkTypeU() ; //&& checkVille() && checkAdresse() && checkCptadresse() && checkCodepostal()
	return check;
}

window.onload=function() {

  document.getElementById("DomInfo").style.display="none";

  //  attach the click event handler to the radio buttons
  var radios = document.forms[0].elements["typeU"];
  for (var i = [0]; i < radios.length; i++)
    radios[i].onclick=radioClicked;
}
//
// function showHideDomInfo() {
// 	if(document.getElementById('typeAdmin').checked = true;)
// 	doc.getElementById('DomInfo').style.display="none";
// } else {
// 	document.getElementById('DomInfo').style.display="block";
// }

function radioClicked() {
   if (this.value == "client") {
    document.getElementById("DomInfo").style.display="block";
   } else {
    document.getElementById("DomInfo").style.display="none";
   }
}

function checkNom() {
	var check = false;
	var nom = document.getElementById("nom").value;
	var regle = /^[a-z A-Z_-]*$/;
	var vide = nom.replace(/\s+/g, "");
	if (vide.length == 0) {
		document.getElementById("NomErr").innerHTML = " × Nom est requis";
		document.getElementById("NomNP").innerHTML = "";
		check = false;
	} else if (nom != "" && !regle.test(nom)) {
		document.getElementById("NomErr").innerHTML = " × Les caractères autorisés: les lettres, l'espace, -' et '_'!";
		document.getElementById("NomNP").innerHTML = "";
		check = false;
	} else {
		document.getElementById("NomErr").innerHTML = "";
		document.getElementById("NomNP").innerHTML = " √ ";
		check = true;
	}
	return check;
}

function checkPrenom() {
	var check = false;
	var prenom = document.getElementById("prenom").value;
	var regle = /^[a-z A-Z_-]*$/;
	var vide = prenom.replace(/\s+/g, "");
	if (vide.length == 0) {
		document.getElementById("PrenomErr").innerHTML = " × Prénom est requis";
		document.getElementById("PrenomNP").innerHTML = "";
		check = false;
	} else if (prenom != "" && !regle.test(prenom)) {
		document.getElementById("PrenomErr").innerHTML = " × Les caractères autorisés: les lettres, l'espace, -' et '_'!";
		document.getElementById("PrenomNP").innerHTML = "";
		check = false;
	} else {
		document.getElementById("PrenomErr").innerHTML = "";
		document.getElementById("PrenomNP").innerHTML = " √ ";
		check = true;
	}
	return check;
}

function checkPseudo() {
	var check = false;
	var pseudo = document.getElementById("pseudo").value;
	var regle = /^[a-zA-Z_-]*$/;
	var vide = pseudo.replace(/\s+/g, "");
	if (vide.length == 0) {
		document.getElementById("PseudoErr").innerHTML = " × Pseudo est requis";
		document.getElementById("PseudoNP").innerHTML = "";
		check = false;
	} else if (pseudo.length >= 12) {
		document.getElementById("PseudoErr").innerHTML = " × Il ne faut pas dépasser 11 caractères!";
		document.getElementById("PseudoNP").innerHTML = "";
		check = false;
	} else if (pseudo != "" && !regle.test(pseudo)) {
		document.getElementById("PseudoErr").innerHTML = " × Les caractères autorisés: les lettres, -' et '_'!";
		document.getElementById("PseudoNP").innerHTML = "";
		check = false;
	} else {
		document.getElementById("PseudoErr").innerHTML = "";
		document.getElementById("PseudoNP").innerHTML = " √ ";
		check = true;
	}
	return check;
}

function checkmdp() {
	var check = false;
	var mdp = document.getElementById("mdp").value;
	var regle = /^[\S]*$/;
	if (mdp.length == 0) {
		document.getElementById("mdpErr").innerHTML = " × Mot de passe est requis";
		document.getElementById("mdpNP").innerHTML = "";
		check = false;
	} else if (mdp.length <= 12) {
		document.getElementById("mdpErr").innerHTML = " × Il ne faut pas moins de 12 caractères!";
		document.getElementById("mdpNP").innerHTML = "";
		check = false;
	} else if (mdp.length >= 33) {
		document.getElementById("mdpErr").innerHTML = " × Il ne faut pas dépasser 32 caractères!";
		document.getElementById("mdpNP").innerHTML = "";
		check = false;
	} else if (mdp != "" && !regle.test(mdp)) {
		document.getElementById("mdpErr").innerHTML = " × L'espace n'est pas autorisé!";
		document.getElementById("mdpNP").innerHTML = "";
		check = false;
	} else {
		document.getElementById("mdpErr").innerHTML = "";
		document.getElementById("mdpNP").innerHTML = " √ ";
		check = true;
	}
	return check;
}

function checkmdpC() {
	var check = false;
	var mdp = document.getElementById("mdp").value;
	var mdpC = document.getElementById("mdpC").value;
	if (mdp != mdpC) {
		document.getElementById("mdpCErr").innerHTML = " × Les deux mots de passe ne sont pas le même!";
		document.getElementById("mdpCNP").innerHTML = "";
		check = false;
	} else {
		document.getElementById("mdpCErr").innerHTML = "";
		document.getElementById("mdpCNP").innerHTML = " √ ";
		check = true;
	}
	return check;
}

function checkMail() {
	var check = false;
	var mail = document.getElementById("mail").value;
	var regle = /^([0-9A-Za-z\-_\.]+)@([0-9a-z]+\.[a-z]{2,3}(\.[a-z]{2})?)$/;
	if (mail != "" && !regle.test(mail)) {
		document.getElementById("mailErr").innerHTML = " × Le format de votre Email est invalide!";
		document.getElementById("mailNP").innerHTML = "";
		check = false;
	} else {
		document.getElementById("mailErr").innerHTML = "";
		document.getElementById("mailNP").innerHTML = " √ ";
		check = true;
	}
	return check;
}

function checkTele() {
	var check = false;
	var tele = document.getElementById("tele").value;
	var regle = /^(0[1-68])(?:[ _.-]?(\d{2})){4}$/;
	if (tele != "" && !regle.test(tele)) {
		document.getElementById("teleErr").innerHTML = " × Le format de votre numéro téléphone est invalide!";
		document.getElementById("teleNP").innerHTML = "";
		check = false;
	} else {
		document.getElementById("teleErr").innerHTML = "";
		document.getElementById("teleNP").innerHTML = " √ ";
		check = true;
	}
	return check;
}

function checkCodeV() {
	var check = false;
	var codeV = document.getElementById("codeV").value;
	var radioList = document.getElementsByName("typeU");
	var radiocheck = 0;
	for (i=0; i<radioList.length; i++) {
		if (radioList[i].checked) {
			radiocheck = radioList[i].value;
		}
	}
	var regle = /^([0-9A-Z]{8})$/;
	if (codeV != "" && !regle.test(codeV) || codeV == "") {
		document.getElementById("codeVErr").innerHTML = " × Le format de Code de DOMISEP est incorrect!";
		document.getElementById("codeVNP").innerHTML = "";
		check = false;
	} else if (radiocheck == 0) {
		document.getElementById("codeVErr").innerHTML = " × Il faut choisir votre type de Compte!";
		document.getElementById("codeVNP").innerHTML = "";
		check = false;
	} else {
		document.getElementById("codeVErr").innerHTML = "";
		document.getElementById("codeVNP").innerHTML = " √ ";
		check = true;
	}
	return check;
}

function checkTypeU() {
	var check = false;
	var codeV = document.getElementById("codeV").value;
	var regle = /^([0-9A-Z]{8})$/;
	if (codeV != "" && !regle.test(codeV) || codeV == "") {
		document.getElementById("codeVErr").innerHTML = " × Il faut saisir le Code de DOMISEP!";
		document.getElementById("codeVNP").innerHTML = "";
		check = false;
	} else {
		document.getElementById("codeVErr").innerHTML = "";
		document.getElementById("codeVNP").innerHTML = " √ ";
		check = true;
	}
	return check;
}

function checkVille() {
	var check = false;
	var ville = document.getElementById("ville").value;
	var regle = /^[a-z A-Z_-]*$/;
	var vide = ville.replace(/\s+/g, "");
	if (vide.length == 0) {
		document.getElementById("villeErr").innerHTML = " × Ville est requis";
		document.getElementById("villeNP").innerHTML = "";
		check = false;
	} else if (ville != "" && !regle.test(ville)) {
		document.getElementById("villeErr").innerHTML = " × Les caractères autorisés: les lettres, l'espace, -' et '_'!";
		document.getElementById("villeNP").innerHTML = "";
		check = false;
	} else {
		document.getElementById("villeErr").innerHTML = "";
		document.getElementById("villeNP").innerHTML = " √ ";
		check = true;
	}
	return check;
}

function checkAdresse() {
	var check = false;
	var adresse = document.getElementById("adresse").value;
	var regle = /^[0-9 a-z A-Z_-]*$/;
	var vide = adresse.replace(/\s+/g, "");
	if (vide.length == 0) {
		document.getElementById("adresseErr").innerHTML = " × Adresse est requis";
		document.getElementById("adresseNP").innerHTML = "";
		check = false;
	} else if (adresse != "" && !regle.test(adresse)) {
		document.getElementById("adresseErr").innerHTML = " × Les caractères autorisés: les lettres, les chiffres, l'espace, -' et '_'!";
		document.getElementById("adresseNP").innerHTML = "";
		check = false;
	} else {
		document.getElementById("adresseErr").innerHTML = "";
		document.getElementById("adresseNP").innerHTML = " √ ";
		check = true;
	}
	return check;
}

function checkCptadresse() {
	var check = false;
	var cptadresse = document.getElementById("cptadresse").value;
	var regle = /^[0-9 a-z A-Z_-]*$/;
	var vide = cptadresse.replace(/\s+/g, "");
	if (vide.length == 0) {
		document.getElementById("cptadresseErr").innerHTML = " × cptadresse est requis";
		document.getElementById("cptadresseNP").innerHTML = "";
		check = false;
	} else if (cptadresse != "" && !regle.test(cptadresse)) {
		document.getElementById("cptadresseErr").innerHTML = " × Les caractères autorisés: les lettres, les chiffres, l'espace, -' et '_'!";
		document.getElementById("cptadresseNP").innerHTML = "";
		check = false;
	} else {
		document.getElementById("cptadresseErr").innerHTML = "";
		document.getElementById("cptadresseNP").innerHTML = " √ ";
		check = true;
	}
	return check;
}

function checkCodepostal() {
	var check = false;
	var codepostal = document.getElementById("codepostal").value;
	var regle = /^([0-9]{5}|[a-zA-Z][a-zA-Z ]{0,49})$/;
	if (codepostal != "" && !regle.test(codepostal)) {
		document.getElementById("codepostalErr").innerHTML = " × Le format de votre code Postal est invalide!";
		document.getElementById("codepostalNP").innerHTML = "";
		check = false;
	} else {
		document.getElementById("codepostalErr").innerHTML = "";
		document.getElementById("codepostalNP").innerHTML = " √ ";
		check = true;
	}
	return check;
}

function getLogementId() {
	var str = document.getElementById("fat-btn").value;
	return str.match(/\d+/g);
}

$(function() {
    $(".buttonLent").click(function(){
        $(this).button('loading').delay(1000).queue(function() {
					var str = this.value;
					setTimeout(function(){window.location.href=str},100);

        	// $(this).dequeue();
        });
    });

		$(".buttonVite").click(function(){
				var str = this.value;
				window.location.href=str;
    });
});
