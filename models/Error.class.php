<?php 

class G6C_Error{
	protected $_message;
	protected $_mark;
	protected $_file;

	function __construct($message) {
		$this -> _mark = date("Y-m-d H:i:s");
		$this -> _file = "../log/log-" . date("Y-m-d");
		$this -> _message = $this -> _mark . " " . $message . "\n";
	}

	function saveLog() {
		file_put_contents($this -> _file, $this -> _message, FILE_APPEND);
	}

	function getError() {
		return $this -> _message;
	}

	function getMark() {
		return $this -> _mark;
	}

	function getFileName() {
		return $this -> _file;
	}
}
?>