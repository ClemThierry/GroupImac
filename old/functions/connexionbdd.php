<?php

	/* ============ CONNEXION BDD ============ */ 

	function connection() {
		try {
			$cnx = new PDO('mysql:host=localhost;dbname=groupimac', 'root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
			// nom de la base : groupimac | pseudo : 'root' | mot de passe : '' 
		} 
		catch (PDOException $e) {
			echo 'Échec de la connexion : ' . $e->getMessage();
			exit;
		}
		if(!$cnx) {
			die('Connection failed');
		}
		return $cnx;
	}

    