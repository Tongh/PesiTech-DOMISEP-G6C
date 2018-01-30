<div id='DIYbody'>
	<div id="attend">
		<br><br><br><br><br><br><br><br><br><br><br><br>
		<?php
		echo "Au revoir! ";
		$_SESSION["UserID"] = null;
		$_SESSION["User"] = null;
		$_SESSION["LoginMode"] = "OFF";
		$_SESSION["AdminMode"] = "OFF";
		$_SESSION["NomUser"] = null;
		$_SESSION["PrenomUser"] = null;
		header("refresh:1; url=index.php?controller=Connexion")
		?>
		<br><i class="fa fa-spinner fa-spin fa-5x"></i><br>
		<p>Merci de patienter quelques instants ...</p>
	</div>

</div>
