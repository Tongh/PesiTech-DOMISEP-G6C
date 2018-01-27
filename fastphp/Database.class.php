<?php 

class Database {
	protected $_dbHandle;
	protected $_result;

	function connect($mysql_server_name, $mysql_username, $mysql_password, $mysql_database) {
		$this -> _dbHandle = @mysqli_connect($mysql_server_name, $mysql_username, $mysql_password, $mysql_database);
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
		if ($this -> _result = mysqli_query($this -> _dbHandle, $sql)) {
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
						$tempResults[$table[$i]][$field[$i]] = $row[$i];
					}
					if ($singleResult == 1) {
						 return $tempResults;
					}
					array_push($result, $tempResults);
				}
				return $result;
			}
		} else {
			$erreur = new G6C_Error(mysqli_error($this -> _dbHandle));
			$erreur -> saveLog();
			return 0;
		}
		
		
	}

	function selectAll() {
		$sql = 'select * from `' . $this -> _table .'`';
		return $this -> query($sql, 1);
	}

	function select($id) {
		$sql = 'select * from `' . $this -> _table . '` where `id` = \'' . mysqli_real_escape_string($this -> _dbHandle, $id) . '\'';
		return $this -> query($sql, 1);
	}

	function delete($id) {
		$sql = 'delete from `' . $this -> _table . '` where `id` = \'' . mysqli_real_escape_string($this -> _dbHandle, $id) . '\'';
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