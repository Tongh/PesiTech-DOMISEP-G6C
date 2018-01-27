<?php 

class Model extends Database {
	protected $_model;
	protected $_table;

	function __construct() {
		$this -> connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

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