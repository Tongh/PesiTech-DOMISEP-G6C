<!DOCTYPE html>
<html>
<head>
	<title>sdfsdfqsdfsdfqsdfqsdfqsdfqsfqsdfqsdfqsdfsqdf</title>
</head>
<body>
	<h1>save log</h1>
	<?php 
	require "Error.class.php";
	function customError($errno, $errstr) {
		$message = "Error: [$errno] $errstr";
		$error = new G6C_Error($message);
		$error -> saveLog();
	}
	set_error_handler("customError");

	echo $test;
	echo "hello";
	?>
</body>
</html>