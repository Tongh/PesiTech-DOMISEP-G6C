<?php 
require_once __DIR__ . "/../fastphp/Error.class.php";
require_once __DIR__ . "/../fastphp/Model.class.php";

class CodeClientModel extends Model {
	function add($value) {
		$sql = 'insert into `' . $this -> _table .'` (`code`) values (\'' . mysqli_real_escape_string($this -> _dbHandle, $value) . '\')';
		return $this -> query($sql);
	}


}

 ?>