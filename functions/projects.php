<?php
include_once "connexion.php";

	/* ============ PROJETS ============ */ 

	/* Récupérer tous les projets */ 
	function getAllProjets() {
		$cnx = connection();
		$result = $cnx->query("select * from Projet");
		return $result->fetchall();
	}

	/* Récupérer un seul projet par son ID (unique) */ 
	function getProjetByID($id) {
		$cnx = connection();
		$rqt = $cnx->prepare('SELECT * FROM projet WHERE idProjet = ?');
		$rqt->execute(array($id));
		return $rqt->fetch();
	}

	/* Ajouter un projet */ 
	function addProjet($titre, $presentation, $deadline, $cadre) {
		$cnx = connection();
		$rqt = $cnx->prepare('insert into Projet(titre, presentation, deadline, datePubli, cadre,nbreMax) values(?,?,?,?,?,?)');
		$rqt->execute(array($titre, $presentation, $deadline, recupDate(getdate()), $cadre,1));

		// A FAIRE : AJOUTER TOUS LES INPUT QUI MANQUENT (titre et presentation suffisent pour tester) 

		return getAllProjets();
	}

	/* Supprimer un projet */ 
	function deleteProjet($id) {
		$cnx = connection();
		$rqt = $cnx->prepare('delete from Projet where idProjet=?');
		$rqt->execute(array($id));
		return getAllProjets();
	}	

	/* Modifier un projet */ 
	function updateProjet($id, $titre, $presentation, $deadline, $cadre) {
		$cnx = connection();
		$rqt = $cnx->prepare("UPDATE Projet SET titre=?, presentation=?, deadline=?, datePubli=?, cadre=? WHERE idProjet=?");
		$rqt->execute(array($titre, $presentation, $deadline, recupDate(getdate()), $cadre, $id));
		return getAllProjets();
	}

	/* Récupérer la date du post */ 
	function recupDate($date) {
		$stringDate =$date['year'].'-'.$date['mon'].'-'.$date['mday'];
		return $stringDate;
	}