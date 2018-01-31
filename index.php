<?php
session_start();
$sessionID = session_id();
$file = fopen("./log/runtime.txt", "w");
fwrite($file, $sessionID);
fclose($file);
define('APP_PATH', __DIR__.'/');
define('APP_DEBUG', true);
require './Core/initCore.php';
