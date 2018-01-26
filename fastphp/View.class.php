<?php 

class View {
	protected $_variables = array();
	protected $_controller;
	protected $_action;

	function __construct($controller, $action) {
		$this -> _controller = $controller;
		$this -> _action = $action;
	}

	function set($name, $value) {
		$this -> _variables[$name] = $value;
	}

	function render() {
		extract($this -> _variables);
		$defaultHeader = APP_PATH . 'views/header.php';
		$defaultFooter = APP_PATH . 'views/footer.php';
		$controllerHeader = APP_PATH . 'views/' . $this -> _controller . '/header.php';
		$controllerFooter = APP_PATH . 'views/' . $this -> _controller . '/footer.php';

		if (file_exists($controllerHeader)) {
			include ($controllerHeader);
		} else {
			include ($defaultHeader);
		}

		include (APP_PATH . 'views/' . $this -> _controller . '/' . $this -> _action . '.php');

		if (file_exists($controllerFooter)) {
			include ($controllerFooter);
		} else {
			include ($defaultFooter);
		}
	}
}