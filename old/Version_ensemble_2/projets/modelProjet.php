<?php
		
	/* Connexion BDD (version améliorée pour avoir description des erreurs SQL) */ 
	function connection() {
		try {
			$cnx = new PDO('mysql:host=mysql-groupimac.alwaysdata.net;dbname=groupimac_projet', 'groupimac','MotDePasse', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
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

	/* Récupérer tous les projets */ 
	function getAll() {
		$cnx = connection();
		$result = $cnx->query("select * from Projet");
		return $result->fetchall();
	}

	/* Récupérer un seul projet par son ID (unique) */ 
	function getProjetByID($id) {
		$cnx = connection();
		$rqt = $cnx->prepare('SELECT * FROM Projet WHERE idProjet = ?');
		$rqt->execute(array($id));
		return $rqt->fetch();
	}

	/* Ajouter un projet */ 
	function addProjet($titre, $presentation, $deadline, $cadre, $idAuteur) {
		$cnx = connection();
		$rqt = $cnx->prepare('insert into Projet(titre, presentation, deadline, datePubli, cadre, nbreMax, RefAuteurProjet) values(?,?,?,?,?,?,?)');
		$rqt->execute(array($titre, $presentation, $deadline, recupDate(getdate()), $cadre, 0, $idAuteur));

		// A FAIRE : AJOUTER TOUS LES INPUT QUI MANQUENT (titre et presentation suffisent pour tester) 

		return getAll();
	}

	/* Supprimer un projet */ 
	function deleteProjet($id) {
		$cnx = connection();
		$rqt = $cnx->prepare('delete from Projet where idProjet=?');
		$rqt->execute(array($id));
		return getAll();
	}	

	/* Modifier un projet */ 
	function updateProjet($id, $titre, $presentation, $deadline, $cadre) {
		$cnx = connection();
		$rqt = $cnx->prepare("UPDATE Projet SET titre=?, presentation=?, deadline=?, datePubli=?, cadre=? WHERE idProjet=?");
		$rqt->execute(array($titre, $presentation, $deadline, recupDate(getdate()), $cadre, $id));
		return getAll();
	}

	/* Récupérer la date du post */ 
	function recupDate($date) {
		$stringDate =$date['year'].'-'.$date['mon'].'-'.$date['mday'];
		return $stringDate;
	}