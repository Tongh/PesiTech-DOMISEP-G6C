<?php

defined('ROOT') or define('ROOT', __DIR__.'/');
defined('APP_PATH') or define('APP_PATH', dirname($_SERVER['SCRIPT_FILENAME']) . "/");
defined('APP_DEBUG') or define('APP_DEBUG', false);
defined('CONFIG_PATH') or define('CONFIG_PATH', APP_PATH . 'config/');
//defined('RUNTIME_PATH') or define('RUNTIME_PATH', APP_PATH . 'runtime/');

const EXT = '.class.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require CONFIG_PATH . 'PHPMailer/vendor/phpmailer/phpmailer/src/Exception.php';
require CONFIG_PATH . 'PHPMailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require CONFIG_PATH . 'PHPMailer/vendor/phpmailer/phpmailer/src/SMTP.php';
require CONFIG_PATH . 'PHPMailer/vendor/autoload.php';
require CONFIG_PATH . 'jpgraph/src/jpgraph.php';
require CONFIG_PATH . 'jpgraph/src/jpgraph_line.php';
require CONFIG_PATH . 'config.php';

require ROOT . 'Core.php';

$fast = new Fast;
$fast -> run();
