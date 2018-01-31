<div id='DIYbody'>
	<div id="attend">
		<br><br><br><br><br><br><br><br><br><br><br><br><br><i class="fa fa-spinner fa-spin fa-5x"
		<?php
		if (isset($_SESSION["AdminMode"]) && $_SESSION["AdminMode"] == "OFF") {
			header("refresh:1; url=index.php?controller=Inscription&action=fin");
		} elseif (isset($_SESSION["AdminMode"]) && $_SESSION["AdminMode"] == "ON") {
			header("refresh:1; url=index.php?controller=Inscription&action=finAdmin"); 
		} else {
			header("refresh:1; url=index.php?controller=index");
		}
		?>></i><br>
		<p>Merci de patienter quelques instants ...</p>
	</div>

</div>
