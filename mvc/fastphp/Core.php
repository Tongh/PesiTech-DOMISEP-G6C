<?php 
/** 
 * Core FastPHP
 */
class Fast {

	// Commencer à fonctionner l'application
	function run() {
		spl_autoload_register(array($this, 'loadClass'));
		$this -> setReporting();
		$this -> removeMagicQuotes();
		$this -> unregisterGlobals();
		$this -> callHook();
	}

	// moyen de demander principale, diviser la demande URL
	function callHook() {

		if (!empty($_GET['url'])) {
			$url = $_GET['url'];
			$urlArray = explode("/", $url);

			// obtenir le nom de Controller
			$controllerName = ucfirst(empty($urlArray[0]) ? 'Index' : $urlArray[0]);
			$controller = $controllerName .'Controller';

			// obtenir l'action
			array_shift($urlArray);
			$action = empty($urlArray[0]) ? 'index' : $urlArray[0];

			// obtenir les options URL
			array_shift($urlArray);
			$queryString = empty(urlArray) ? array() : $urlArray;
		}

		// Quand les donnés sont vide
		$action = empty($action) ? 'index' : $action;
		$queryString = empty($queryString) ? array() : $queryString;

		// new Controller
		$int = new $controller($controllerName, $action);

		// si controller et l'action existent, utiliser et envoyer URL
		if ((int)method_exists($controller, $action)) {
			call_user_func_array(array($int, $action), $queryString);
		} else {
			exit($controller . "Controller n'existe pas");
		}
	}

	// tester l'environnemnt de développement
	function setReporting() {
		if (APP_DEBUG == true) {
			error_reporting(E_ALL);
			ini_set('display_errors', 'On');
		} else {
			error_reporting(E_ALL);
			ini_set('display_errors', 'Off');
			ini_set('log_errors', 'On');
			ini_set('error_log', RUNTIME_PATH. 'logs/error.log');
		}
	}

	// supprimer les caractères dangereux
	function stripSlashesDeep($value) {
		$value = is_array($value) ? array_map('stripSlashesDeep', $value) : stripslashes($value);
		return $value;
	}

	// Trouver et supprimer 
	function removeMagicQuotes() {
		if ( get_magic_quotes_gpc() ) {
			$_GET = stripSlashesDeep($_GET);
			$_POST = stripSlashesDeep($_POST);
			$_COOKIE = stripSlashesDeep($_COOKIE);
			$_SESSION = stripSlashesDeep($_SESSION);
		}
	}

	// Trouver et supprimer les registres globales
	function unregisterGlobals() {
		if (ini_get('register_globals')) {
			$array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
			foreach ($array as $value) {
				foreach ($GLOBALS[$value] as $key => $var) {
					if ($var === $GLOBALS[$key]) {
						unset($GLOBALS[$key]);
					}
				}
			}
		}
	}

	// Auto load Controller et Module
	static function loadClass($class) {
		$frameworks = ROOT . $class . EXT;
		$controllers = APP_PATH . 'application/controllers/' . $class . EXT;
		$models = APP_PATH . 'application/models/' . $class . EXT;

		if (file_exists($frameworks)) {
			// load core
			include $frameworks;
		} elseif (file_exists($controllers)) {
			// load Controller
			include $controllers;
		} elseif (file_exists($models)) {
			// load model
			include $models;
		} else {
			/* ERROR MESSEGE */
		}
	}
	
}