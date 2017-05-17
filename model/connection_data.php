<?php

// CONFIG
require_once(__DIR__.'/../config/database.php');



// get PDO database connection instance
function getConnectionData() {

	try {

		$bdd = new PDO('mysql:host='.BDD_HOST.';port='.BDD_PORT.';dbname='.BDD_DATABASE.';charset=utf8',
					   BDD_LOGIN,
					   BDD_PASSWORD,
					   [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

	}
	catch (PDOException $e) {

		die('Erreur : ' . $e->getMessage());
		
	}

	return $bdd;
}

?>