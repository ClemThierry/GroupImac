<?php
	require_once('./Model/projets.php');
	require_once('./Model/categories.php');
	require_once('./Model/comments.php');

	/* ========== PROJETS ========== */
	
	// récupérer tous les projets
	function getProjets() {
		return json_encode(getAllProjets());
	}

	// récupérer un seul projet avec son id
	function getAProjetByID($id) {
		$projet['projet']=getProjetByID($id);
		$projet['comments']=getCommentsOfProject($id);
		$projet['categories']=getCategoriesByProject($id);
		return json_encode($projet);
	}

	// ajouter un projet
	function addAProjet($form) {
		$projet = json_decode($form, true);
		return json_encode(addProjet($projet['titre'], $projet['presentation'], $projet['deadline'], $projet['cadre'], $projet['idUser']));
	}

	function addCatToProjet($form) {
		$projet = json_decode($form, true);
		$idLastProj = getLastProject($projet['idUser']);
		$cats = $projet['categories'];
		return json_encode(addCategorieToProject($idLastProj, $cats)); 
	}
	

	// modifier un projet 
	function updateAProjet($form, $id) {
		$projet = json_decode($form, true);
		return json_encode(updateProjet($id, $projet['titre'], $projet['presentation'], $projet['deadline'], $projet['cadre']));
	}

	function deleteCatFromProjet($id) {
		return json_encode(deleteCategorieFromProject($id)); 
	}

	// supprimer un projet 
	function deleteAProjet($id) {
		deleteCommentFromProjet($id);
		deleteCategorieFromProject($id);
		return json_encode(deleteProjet($id));
	}
