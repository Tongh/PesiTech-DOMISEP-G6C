<?php 
require_once "Error.class.php";
require_once "Database.class.php";

class Model extends Database {
	protected $_model;
	protected $_table;

	function __construct() {
		$this -> connect();

		$this -> _model = get_class($this);
		$this -> _model = rtrim($this -> _model, 'Model');

		$this -> _table = lcfirst($this -> _model);
	}

	function __destruct() {
	}

	function getModel() {
		return $this -> _model;
	}

	function getTable() {
		return $this -> _table;
	}
}


 ?>