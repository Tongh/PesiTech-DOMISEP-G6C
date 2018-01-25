<?php
	require("../db_config.php");

	$conn = mysqli_connect($mysql_server_name, $mysql_username, $mysql_password, $mysql_database);

	if (!$conn) {
		die('Connet Error (' . mysqli_connect_errno() . ')' . mysqli_connect_error());
	}
	echo "Success..." . mysqli_get_host_info($conn) . "<br>";
	mysqli_set_charset($conn, "utf8");

	// Creéer le database, seulement pour la première fois
	/*
	if (mysqli_query($conn, "CREATE DATABASE Mydb") === TRUE) {
		echo "Database created";
	} else {
		echo "Error: creating database: " . mysqli_error();
	}
	*/

	//mysqli_select_db($conn, $mysql_database);

	$sql = "CREATE TABLE Utilisateur (
		IDUtilisateur INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
		Nom VARCHAR(15) NOT NULL,
		Prenom VARCHAR(15) NOT NULL,
		Login VARCHAR(15) NOT NULL,
		Mdp VARCHAR(32) NOT NULL,
		Mail VARCHAR(50) NOT NULL,
		Telephone VARCHAR(20) NOT NULL,
		TypeUtilisateur VARCHAR(15) NOT NULL
	)";

	if (mysqli_query($conn, $sql)) {
		echo "Table Utilisateur successfully created.\n";
	} else {
		echo "Quelque chose a mal fonctionne...<br>";
		echo mysqli_error($conn);
	}

	mysqli_close($conn);
 ?>
