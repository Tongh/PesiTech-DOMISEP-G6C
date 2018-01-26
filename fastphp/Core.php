<?php

class Fast {
	function run() {
		spl_autoload_register(array($this, 'loadClass'));
		$this -> setReporting();
		$this -> removeMagicQuotes();
		$this -> unregisterGlobals();
		$this -> callHook();
	}

	function callHook() {
		if (!empty($_GET['url'])) {
			$url = $_GET['url'];
			$urlArray = explode("/", $url);

			$controllerName = ucfirst(empty($urlArray[0]) ? 'Index' : $urlArray[0]);
			$controller = $controllerName . 'Controller';
			
			array_shift($urlArray);
			$action = empty($urlArray[0]) ? 'index' : $urlArray[0];

			array_shift($urlArray);
			$queryString = empty($urlArray[0]) ? array() : $urlArray;
		}

		$action = empty($action) ? 'index' : $action;
		$queryString = empty($queryString) ? array() : $queryString;

		$int = new Controller($controllerName, $action);

		if ((int)method_exists($controller, $action)) {
			call_user_func_array(array($int, $action), $queryString);
		} else {
			exit($controller . "Controller n'existe pas");
		}
	}

	function setReporting() {
		if (APP_DEBUG == true) {
			error_reporting(E_ALL);
			ini_set('display_errors', 'On');
		} else {
			error_reporting(E_ALL);
			ini_set('display_errors', 'Off');
			ini_set('log_errors', 'On');
			ini_set('error_log', RUNTIME_PATH . 'log/error.log');
		}
	}

	function stripSlashesDeep($value) {
		$value = is_array($value) ? array_map('stripSlashesDeep', $value) : stripslashes($value);
		return $value;
	}

	function removeMagicQuotes() {
		if (get_magic_quotes_gpc()) {
			$_GET = stripSlashesDeep($_GET);
			$_POST = stripSlashesDeep($_POST);
			$_COOKIE = stripSlashesDeep($_COOKIE);
			$_SESSION = stripSlashesDeep($_SESSION);
		}
	}

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

	static function loadClass($class) {
		$frameworks = ROOT . $class . EXT;
		$controllers = APP_PATH . 'controllers/' . $class . EXT;
		$models = APP_PATH . 'models/' . $class . EXT;

		if (file_exists($frameworks)) {
			include $frameworks;
		} elseif (file_exists($controllers)) {
			include $controllers;
		} elseif (file_exists($models)) {
			include $models;
		} else {
			/* Error */
		}
	}
}