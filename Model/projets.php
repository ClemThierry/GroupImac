<?php
include_once "connexionbdd.php";

	/* ============ PROJETS ============ */ 

	/* Récupérer tous les projets */ 
	function getAllProjets() {
		$cnx = connection();
		$result = $cnx->query("SELECT * FROM projet");
		return $result->fetchall();
	}

	function getLastProject($idUser) {
		$cnx = connection();
		$rqt = $cnx->prepare('SELECT MAX(idProjet) AS LastID FROM projet WHERE RefAuteurProjet=?');
		$rqt->execute(array($idUser));
		return $rqt->fetch()[0];
	}

	/* Récupérer un seul projet par son ID (unique) */ 
	function getProjetByID($id) {
		$cnx = connection();
		$rqt = $cnx->prepare('SELECT * FROM projet WHERE idProjet = ?');
		$rqt->execute(array($id));
		return $rqt->fetch();
	}

	/* Ajouter un projet */ 
	function addProjet($titre, $presentation, $deadline, $cadre, $idUser) {
		$cnx = connection();
		$rqt = $cnx->prepare('INSERT INTO projet(titre, presentation, deadline, datePubli, cadre,RefAuteurProjet) VALUES (?,?,?,?,?,?)');
		$rqt->execute(array($titre, $presentation, $deadline, recupDate(getdate()), $cadre, $idUser));
		return getAllProjets();
	}

	/* Supprimer un projet */
	function deleteProjet($id) {
		$cnx = connection();
		$rqt = $cnx->prepare('DELETE FROM projet WHERE idProjet = ?');
		$rqt->execute(array($id));
		return getAllProjets();
	}
    
	/* Supprimer les commentaires liés au projet */ 
    function deleteCommentFromProjet($project_id) {
        $co = connection();
        $req = $co->prepare('DELETE FROM commentaire WHERE refProjet = ?');
        return $req->execute(array($project_id));
    }


	/* Modifier un projet */ 
	function updateProjet($id, $titre, $presentation, $deadline, $cadre) {
		$cnx = connection();
		$rqt = $cnx->prepare("UPDATE projet SET titre=?, presentation=?, deadline=?, datePubli=?, cadre=? WHERE idProjet=?");
		$rqt->execute(array($titre, $presentation, $deadline, recupDate(getdate()), $cadre, $id));
		return getAllProjets();
	}

	/* Récupérer la date du post */ 
	function recupDate($date) {
		$stringDate =$date['year'].'-'.$date['mon'].'-'.$date['mday'];
		return $stringDate;
	}