<?php

define('DB_NAME', 'Mydb');
define('DB_USER', 'root');
define('DB_PASSWORD', '123456');
define('DB_HOST', 'localhost');


function import($type, $file) {
	include (APP_PATH . 'views/Public/' . $type . '/' . $file);
}
