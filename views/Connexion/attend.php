<div id='DIYbody'>
	<div id="attend">
		<br><br><br><br><br><br><br><br><br><br><br><br>
		<?php
		echo "Bienvenue " . $_SESSION["User"];
		if (isset($_SESSION["AdminMode"]) && $_SESSION["AdminMode"] == "OFF") {
			header("refresh:1; url=index.php?controller=EspaceClient");
		} elseif (isset($_SESSION["AdminMode"]) && $_SESSION["AdminMode"] == "ON") {
			header("refresh:1; url=index.php?controller=Admin");
		} else {
			header("refresh:1; url=index.php?controller=index");
		}

		?>
		<br><i class="fa fa-spinner fa-spin fa-5x"></i><br>
		<p>Merci de patienter quelques instants ...</p>
	</div>

</div>
