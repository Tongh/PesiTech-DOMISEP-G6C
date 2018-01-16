<?php
	class Model extends Sql {
		protected $_model;
		protected $_table;

		function __construct() {

			// connecter SQL
			$this -> connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

			// transformer Model+Model comme le nom de Model

			// obtenir le type de l'objet
			$this -> _model = get_class($this);
			$this -> _model = rtrim($this -> _model, 'Model');

			// le nom de table et le nom de class identique
			$this -> _table = strtolower($this -> _model);
		}

		function __destruct() {
			
		}
	}