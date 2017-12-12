<?php
	/*
	* Ce fichier est utilisé par tous les autre fichiers qui ont besoin de connecter à SQL
	* Si vous voulez l'utiliser, vous pouvez utiliser ce code:
	* 		require("db_config.php");
	* Après vous pouvez connecter le SQL comme: 
	* $conn=mysql_connect($mysql_server_name,
	*					   $mysql_username,
	*					   $mysql_password) or die("error connecting") ; //connecter serveur
	* mysql_query("set names 'utf8'"); //le codage, je vous conseille d'utiliser 'UTF-8'
	* mysql_select_db($mysql_database); // Ouvrir le SQL ( cette ligne est obligatoire !)
	* $sql ="select * from news "; // faire ce que vous voulez faire en SQL
	* $result = mysql_query($sql,$conn); // avoir le résultat de $sql
	*/
	$mysql_server_name = "localhost"; 	// Changer à votre nom de serveur
	$mysql_username = "root"; 			// Changer à votre nom de utilisateur
	$mysql_password = "123456";			// Changer à votre mot de pass
	$mysql_database = "Mydb";			// Changer à votre nom de database données
 ?>