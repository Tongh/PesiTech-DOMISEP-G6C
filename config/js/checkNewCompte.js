function validerNewCompte() {
	var check = checkNom() && checkPrenom() && checkPseudo() && checkmdp() && checkmdpC() && checkMail() && checkTele() && checkCodeV() && checkTypeU() ; //&& checkVille() && checkAdresse() && checkCptadresse() && checkCodepostal()
	return check;
}

function checkNom() {
	var check = false;
	var nom = document.getElementById("nom").value;
	var regle = /^[a-z A-Z_-]*$/;
	var vide = nom.replace(/\s+/g, "");
	if (vide.length == 0) {
		document.getElementById("nomErr").innerHTML = "Nom est requis!";
		setCheckErr("nom");
		check = false;
	} else if (nom != "" && !regle.test(nom)) {
		setCheckErr("nom");
		document.getElementById("nomErr").innerHTML = "Les caractères autorisés: les lettres, l'espace, -' et '_'!";
		check = false;
	} else {
		setCheckTrue("nom");
		document.getElementById("nomErr").innerHTML = "";
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
		document.getElementById("prenomErr").innerHTML = "Prénom est requis!";
		setCheckErr("prenom");
		check = false;
	} else if (prenom != "" && !regle.test(prenom)) {
		$("#prenomTest").attr("class", "form-group form-group-sm has-success has-feedback");
		document.getElementById("prenomErr").innerHTML = "Les caractères autorisés: les lettres, l'espace, -' et '_'!";
		setCheckErr("prenom");
		check = false;
	} else {
		document.getElementById("prenomErr").innerHTML = "";
		setCheckTrue("prenom");
		check = true;
	}
	return check;
}

function checkPseudo() {
	var check = false;
	var pseudo = document.getElementById("login").value;
	var regle = /^[a-zA-Z_-]*$/;
	var vide = pseudo.replace(/\s+/g, "");
	if (vide.length == 0) {
		document.getElementById("loginErr").innerHTML = "Pseudo est requis!";
		setCheckErr("login");
		check = false;
	} else if (pseudo.length >= 12) {
		document.getElementById("loginErr").innerHTML = "Il ne faut pas dépasser 11 caractères!";
		setCheckErr("login");
		check = false;
	} else if (pseudo != "" && !regle.test(pseudo)) {
		document.getElementById("loginErr").innerHTML = "Les caractères autorisés: les lettres, -' et '_'!";
		setCheckErr("login");
		check = false;
	} else {
		document.getElementById("loginErr").innerHTML = "";
		setCheckTrue("login");
		check = true;
	}
	return check;
}

function checkmdp() {
	var check = false;
	var mdp = document.getElementById("mdpID").value;
	var regle = /^[\S]*$/;
	if (mdp.length == 0) {
		document.getElementById("mdpErr").innerHTML = "Mot de passe est requis!";
		setCheckErr("mdp");
		check = false;
	} else if (mdp.length <= 12) {
		document.getElementById("mdpErr").innerHTML = "Il ne faut pas moins de 12 caractères!";
		setCheckErr("mdp");
		check = false;
	} else if (mdp.length >= 33) {
		document.getElementById("mdpErr").innerHTML = "Il ne faut pas dépasser 32 caractères!";
		setCheckErr("mdp");
		check = false;
	} else if (mdp != "" && !regle.test(mdp)) {
		document.getElementById("mdpErr").innerHTML = "L'espace n'est pas autorisé!";
		setCheckErr("mdp");
		check = false;
	} else {
		document.getElementById("mdpErr").innerHTML = "";
		setCheckTrue("mdp");
		check = true;
	}
	return check;
}

function checkmdpC() {
	var check = false;
	var mdp = document.getElementById("mdpID").value;
	var mdpC = document.getElementById("mdpC").value;
	if (mdp != mdpC) {
		document.getElementById("mdpCErr").innerHTML = "Les deux mots de passe ne sont pas le même!";
		setCheckErr("mdpC");
		check = false;
	} else {
		document.getElementById("mdpCErr").innerHTML = "";
		setCheckTrue("mdpC");
		check = true;
	}
	return check;
}

function checkMail() {
	var check = false;
	var mail = document.getElementById("mail").value;
	var regle = /^([0-9A-Za-z\-_\.]+)@([0-9a-z]+\.[a-z]{2,3}(\.[a-z]{2})?)$/;
	if (mail != "" && !regle.test(mail)) {
		document.getElementById("mailErr").innerHTML = "Le format de votre Email est invalide!";
		setCheckErr("mail");
		check = false;
	} else {
		document.getElementById("mailErr").innerHTML = "";
		setCheckTrue("mail");
		check = true;
	}
	return check;
}

function checkTele() {
	var check = false;
	var tele = document.getElementById("tele").value;
	var regle = /^(0[1-68])(?:[ _.-]?(\d{2})){4}$/;
	if (tele != "" && !regle.test(tele)) {
		document.getElementById("teleErr").innerHTML = "Le format de votre numéro téléphone est invalide!";
		setCheckErr("tele");
		check = false;
	} else {
		document.getElementById("teleErr").innerHTML = "";
		setCheckTrue("tele");
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
		$("#codeVTest").attr("class", "form-group form-group-sm has-error has-feedback");
		document.getElementById("codeVErr").innerHTML = "Le format de Code de DOMISEP est incorrect!";
		check = false;
	} else if (radiocheck == 0) {
		$("#codeVTest").attr("class", "form-group form-group-sm has-error has-feedback");
		document.getElementById("codeVErr").innerHTML = "Il faut choisir votre type de Compte!";
		check = false;
	} else {
		$("#codeVTest").attr("class", "form-group form-group-sm has-success has-feedback");
		document.getElementById("codeVErr").innerHTML = "";
		check = true;
	}
	return check;
}

function checkTypeU() {
	var check = false;
	var codeV = document.getElementById("codeV").value;
	var typeU = $("input[name='typeU']:checked").val();
	var regle = /^([0-9A-Z]{8})$/;
	if (codeV != "" && !regle.test(codeV) || codeV == "") {
		document.getElementById("codeVErr").innerHTML = "Il faut saisir le Code de DOMISEP!";
		check = false;
	} else {
		document.getElementById("codeVErr").innerHTML = "";
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

function setCheckTrue(checkvalue) {
	var id = "#" + checkvalue + "Test";
	var Err = checkvalue + "TestErr";
	var Ok = checkvalue + "TestNP";
	$(id).attr("class", "form-group form-group-sm has-success has-feedback");
	document.getElementById(Err).style.display = "none";
	document.getElementById(Ok).style.display = "inline";
}

function setCheckErr(checkvalue) {
	var id = "#" + checkvalue + "Test";
	var Err = checkvalue + "TestErr";
	var Ok = checkvalue + "TestNP";
	$(id).attr("class", "form-group form-group-sm has-error has-feedback");
	document.getElementById(Err).style.display = "inline";
	document.getElementById(Ok).style.display = "none";
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

		$(function () { $("[data-toggle='popover']").popover(); });
});

function showCode(str) {
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null) {
	 alert ("Browser does not support HTTP Request");
	 return;
	}
	alert("run");
	var url="getCode.php";
	url=url+"?q="+str;
	url=url+"&sid="+Math.random();
	xmlHttp.onreadystatechange=stateChanged;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}

function stateChanged()  {
	if (xmlHttp.readyState==4 && xmlHttp.status==200) {
	 document.getElementById("tableCode").innerHTML=xmlHttp.responseText;
	}
}

function GetXmlHttpObject(){
	var xmlHttp=null;
	try {
	 // Firefox, Opera 8.0+, Safari
	 xmlHttp=new XMLHttpRequest();
	}
	catch (e) {
	 //Internet Explorer
	 try {
	  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
	 }
	 catch (e) {
	  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
	 }
	} return xmlHttp;
}
