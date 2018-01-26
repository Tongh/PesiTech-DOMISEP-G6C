<?php 
require_once __DIR__ . "/../CodeClientModel.class.php";

$codes = "HFIT7EJ6";
$modelE = new CodeClientModel();
$modelE -> add($codes);
echo "hello";

 ?>