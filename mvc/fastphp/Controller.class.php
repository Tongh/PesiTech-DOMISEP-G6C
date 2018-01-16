<?php 

/**
 * base class de Controller
 */
	class Controller {

		protected $_controller;
		protected $_action;
		protected $_view;

		// init function, init type
		function __construct($controller, $action) {
			$this -> _controller = $controller;
			$this -> _ation = $action;
			$this -> _view = new View($controller, $action);
		}

		function set($name, $value) {
			$this -> _view -> set($name, $value);
		}

		function __destruct() {
			$this -> _view -> render();
		}
	}