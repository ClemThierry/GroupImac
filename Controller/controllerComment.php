<?php
	require_once('./Model/comments.php');

	/* ========== COMMENTS ========== */
	
	// récupérer tous les projets
	function getAllComments($idProjet) {
		return json_encode(getCommentsOfProject($idProjet));
	}

	// récupérer un seul projet avec son id
	function getACommentById($idComment) {
		return json_encode(getCommentByID($idComment));
	}

	// ajouter un commentaire
	function addAComment($form) {
		$comment = json_decode($form, true);
		return json_encode(addComment($comment['message'], $comment['refUser'], $comment['refProjet']));
	}

	// supprimer un commentaire 
	function deleteAComment($id) {
		$proj = getCommentByID($id);
		return json_encode(deleteComment($id, $proj['RefProjet']));
	}

	// modifier un commentaire 
	function updateAComment($form, $id) {
		$comment = json_decode($form, true);
		return json_encode(updateComment($id,$comment['message'], $comment['refProjet']));
	}