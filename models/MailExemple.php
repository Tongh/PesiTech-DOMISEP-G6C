<!DOCTYPE html>
<html>
<head>
	<title>Send mail</title>
</head>
<body>
	<h1>Send mail!</h1>
<?php 
	require "Mail.class.php";
	$email = new G6C_Mail();
	$email -> easyRemplir();
	$email -> send();
 ?>
</body>
</html>