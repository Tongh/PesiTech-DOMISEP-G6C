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
		if (isset($_GET['controller']) && !empty($_GET['controller'])) {
			$controllerName = $_GET['controller'];
			$controller = $controllerName . 'Controller';
		} else {
			$controllerName = 'Index';
			$controller = $controllerName . 'Controller';
		}

		if (isset($_GET['action']) && !empty($_GET['action'])) {
			$action = $_GET['action'];
		} else {
        	$action = 'index';
		}

		if (isset($_GET['others']) && !empty($_GET['others'])) {
			$queryString = $_GET['others'];
		} else {
        	$queryString = array();
		}

		$action = empty($action) ? 'index' : $action;
		$queryString = empty($queryString) ? array() : $queryString;

		$dispatch = new $controller($controllerName, $action);

		if (!class_exists($controller)) {
			exit($controller . " n'existe pas");
		}
		if (!method_exists($controller, $action)) {
			exit($controller . "/" . $action . " n'existe pas");
		}
		call_user_func_array(array($dispatch, $action), $queryString);
		
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
		$value = is_array($value) ? array_map('trim', $value) : trim($value);
		$value = is_array($value) ? array_map('stripslashes', $value) : stripslashes($value);
		$value = is_array($value) ? array_map('htmlspecialchars', $value) : htmlspecialchars($value);
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
