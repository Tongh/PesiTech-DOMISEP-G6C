<?php 
	require_once("./DIYMail.php");

	$flag = sendMail("wenxiao0015@icloud.com", "test", "content test");
	if ($flag) {
		echo "succes";
	} else {
		echo "echec";
	}
 ?>