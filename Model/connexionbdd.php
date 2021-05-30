<?php

	/* ============ CONNEXION BDD ============ */ 

	function connection() {
		try {
			$cnx = new PDO('mysql:host=mysql-groupimac.alwaysdata.net;dbname=groupimac_1', 'groupimac','MotDePasse', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
			//$cnx = new PDO('mysql:host=localhost;dbname=groupimac', 'root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
			// nom de la base : cvoegele_db | pseudo : 'cvoegele' | mot de passe : 'imac2023' 
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

    