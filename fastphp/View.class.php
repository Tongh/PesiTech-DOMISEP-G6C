<?php 

class View {
	protected $_variables = array();
	protected $_controller;
	protected $_action;

	function __construct($controller, $action) {
		$this -> _controller = $controller;
		$this -> action = $action;
	}

	function set($name, $value) {
		$this -> _variables[$name] = $value;
	}

	function render() {
		
	}
}