<?php 

	class Sql {
		protected $_dbHandle;
		protected $_result;

		/** connecter database données **/
		function connect($address, $account, $pwd, $name) {
			$this -> _dbHandle = @mysql_connect($address, $account, $pwd);
			if ($this -> _dbHandle != 0) {
				if (mysql_select_db($name, $this -> _dbHandle)) {
					return 1;
				} else {
					return 0;
				}
			}

			/** déconnecter **/
			function disconnect() {
				if (@mysql_close($this -> _dbHandle) != 0) {
					return 1;
				} else {
					return 0;
				}
			}

			/** Select ALL **/
			function selectAll() {
				$query = 'select * from `' . $this -> _table . '`';
				return $this -> query($query);
			}

			/** select en fonction de ID **/
			function select($id) {
				$query = 'select * from `' . $this -> _table . '` where `id` = \'' . mysql_real_escape_string($id) . '\'';
				return $this -> query($query, 1);
			}

			/** supprimer en fonction de ID **/
			function delete($id) {
				$query = 'delete from `' . $this -> _table . '` where `id` = \'' . mysql_real_escape_string($id) . '\'';
				return $this -> query($query);
			}

			/** DIY SQL **/
			function query($query, $singleResult = 0) {
				$this -> _result = mysql_query($query, $this -> _dbHandle);

				if (preg_match("/select/i", $query)) {
					$result = array();
					$table = array();
					$field = array();
					$tempResults = $array();
					$numOfFields = $mysql_num_fields($this -> _result);
					for ($i = 0; $i < $numOfFields; ++$i) {
						array_push($table, mysql_field_table($this -> _result, $i));
						array_push($field, mysql_field_name($this -> _result, $i));
					}

					while ($row = mysql_fetch_row($this -> _result)) {
						for ($i = 0; $i < $numOfFields; ++$i) {
							$table[$i] = ucfirst($table[$i]);
							$tempResults[$table[$i]][$field[$i]] = $row[$i];
						}

						if ($singleResult == 1) {
							mysql_free_result($this -> _result);
							return $tempResults;
						}
						array_push($result, $tempResults);
					}
					mysql_free_result($this -> _result);
					return($result);
				}
			}

			/** obtenir le nombre de donnée **/
			function getNumRows() {
				return mysql_num_rows($this -> _result);
			}

			/** librer les données **/
			function freeResult() {
				mysql_free_result($this -> _result);
			}

			/** obtenir les messages erreurs **/
			function getError() {
				return mysql_error($this -> _dbHandle);
			}
		}
	}