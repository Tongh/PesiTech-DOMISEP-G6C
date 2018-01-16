<?php

	class ItemController extends Controller {

		// fonction pour la page d'accueil 
		function index() {
			$item = new ItemModel;
			$this -> set('title', 'TOUS');
			$this -> set('todo', $item -> query('select * from item'));
		}

		// ajouter
		function add() {
			$value = $_POST['value'];
			$item = new ItemModel;
			$this -> set('title', 'Ajouter avec sussès!');
			$this -> set('todo', $item -> add($value));
		}

		// afficher 
		function view($id = null, $name = null) {
			$item = new ItemModel;
			$this -> set('title', 'en train de voir' . $name);
			$this -> set('todo', $item -> select($id));
		}

		// update
		function update() {
			$id = $_POST['id'];
			$value = $_POST['value'];
			$item = new ItemModel;
			$this -> set ('title', 'Update avec sussès!');
			$this -> set('todo', $item -> update($id, $value));
		}

		// delete
		function delete($id = null) {
			$itme = new ItemModel;
			$this -> set('title', 'Supprimer avec sussès!');
			$this -> set('todo', $item -> delete($id));
		}
	}