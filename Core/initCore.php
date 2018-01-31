<?php

defined('ROOT') or define('ROOT', __DIR__.'/');
defined('APP_PATH') or define('APP_PATH', dirname($_SERVER['SCRIPT_FILENAME']) . "/");
defined('APP_DEBUG') or define('APP_DEBUG', false);
defined('CONFIG_PATH') or define('CONFIG_PATH', APP_PATH . 'config/');
define('APP_URL', 'http://localhost:8080/PesiTech-DOMISEP-G6C/');
//defined('RUNTIME_PATH') or define('RUNTIME_PATH', APP_PATH . 'runtime/');

const EXT = '.class.php';

require CONFIG_PATH . 'config.php';

require ROOT . 'Core.php';

$fast = new Fast;
$fast -> run();
