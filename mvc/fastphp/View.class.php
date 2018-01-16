<?php
/**
 * Base clase de View
 */
	class View {
		protected $variables = array();
		protected $_controller;
		protected $_action;

		function __construct($controller, $action) {
			$this -> _controller = $controller;
			$this -> _action = $action;
		}

		/** set value **/

		function set($name, $value) {
			$this -> variables[$name] = $value;
		}

		/** affichage **/

		function render() {
			extract($this -> variables);
			$defaultHeader = APP_PATH . 'application/views/header.php';
			$defaultFooter = APP_PATH . 'application/veiws/footer.php';
			$controllerHeader = APP_PATH . 'application/views/' . $this -> _controller . '/header.php';
			$controllerFooter = APP_PATH . 'application/views/' . $this -> _controller . '/footer.php';

			// header pour la page
			if (file_exists($controllerHeader)) {
				include ($controllerHeader);
			} else {
				include ($defaultHeader);
			}

			// body pour la page
			include (APP_PATH . 'application/views/' . $this -> _controller . '/' . $this -> _action . '.php');

			// footer pour la page
			if (file_exists($controllerFooter)) {
				include ($controllerFooter);
			} else {
				include ($defaultFooter);
			}
		}
	}