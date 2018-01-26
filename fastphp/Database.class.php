<?php 
require_once "../config/db_config.php";
require_once "Error.class.php";

class Database {
	protected $_mysql_server_name = "localhost";
	protected $_mysql_username = "root";
	protected $_mysql_password = "123456";
	protected $_mysql_database = "Mydb";
	protected $_dbHandle;
	protected $_result;

	function connect() {
		$this -> _dbHandle = @mysqli_connect($this -> _mysql_server_name, $this -> _mysql_username, $this -> _mysql_password, $this -> _mysql_database);
		if (!$this -> _dbHandle) {
			$message = 'Connet Error (' . mysqli_connect_errno() . ')' . mysqli_connect_error();
			$error = new G6C_Error($message);
			$error -> saveLog();
			//die($message);
			return 0;
		} return 1;
	}

	function disconnect() {
		if (@mysqli_close($this -> _dbHandle) != 0) {
			return 1;
		} return 0;
	}

	function query($sql, $singleResult = 0) {
		$this -> _result = mysqli_query($this -> _dbHandle, $sql);
		if (preg_match("/select/i", $sql)) {
			$result = array();
			$table = array();
			$field = array();
			$tempResults = array();
			$numOfFields = mysqli_field_count($this -> _dbHandle);
			for ($i = 0; $i < $numOfFields; ++$i) {
				$finfo = mysqli_fetch_direct($this -> _result, $i);
				array_push($table, $finfo -> table);
				array_push($field, $finfo -> name);
			}
			while ($row = mysqli_fetch_row($this -> _result)) {
				for ($i = 0; $i < $numOfFields; ++$i) { 
					$table[$i] = ucfirst($table[$i]);
					$tempResults[$table[$i]][$field[$i]] = $row[$i];
				}
				if ($single == 1) {
					 mysqli_free_result($this -> _result);
					 return $tempResults;
				}
				array_push($result, $tempResults);
			}
			mysqli_free_result($this -> _result);
			return $result;
		}
	}

	function selectAll() {
		$sql = 'select * from `' . $this -> _table .'`';
		return $this -> query($sql, 1);
	}

	function select($id) {
		$sql = 'select * from `' . $this -> _table . '` where `id` = \'' .mysqli_real_escape_string($this -> _dbHandle, $id) . '\'';
		return $this -> query($sql);
	}

	function delete($id) {
		$sql = 'delete from `' . $this -> _table . '` where `id` = \'' .mysqli_real_escape_string($this -> _dbHandle, $id) . '\'';
		return $this -> query($sql);
	}

	function getNumRows() {
		return mysqli_num_rows($this -> _result);
	}

	function freeResult() {
		mysqli_free_result($this -> _result);
	}

	function getError() {
		return mysqli_error($this -> _dbHandle);
	}

	function getDBHandle() {
		return $this -> _dbHandle;
	}
}

 ?>