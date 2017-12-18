function valider_requis(field, alerttxt) {
	with (field) {
		if (value == null || value == "") {
			alert(alerttxt);
			return false;
		} else {
			return true;
		}
	}
}

function valider_email(field, alerttxt) {
	with (field) {
		apos = value.indexOf("@")
		dotpos = value.lastIndexOf(".")
		if (apos<1 || dotpos-apos<2) {
			alert(alerttxt);
			return false;
		} else {
			return true;
		}
	}
}

function valider_form(thisForm) {
	with (thisForm) {
		if (valider_requis(email, "Email est requis")==false) {
			email.focus(); 
			return false;
		} elseif (valider_email(email, "Le format de l'address Invalide!") == false) {
			email.focus();
			return false;
		}
	}
}
