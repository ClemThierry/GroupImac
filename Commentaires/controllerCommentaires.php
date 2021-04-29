<?php
require_once('modelCommentaires.php');

// echo une representation json des commentaires du projet en parametre
function afficherCommentairesDuProjet($projet_id) {
  return json_encode(getCommentsOfProject($projet_id));
}

// retourne false si l'action echoue
function ajouterCommentaire($commentaire) {
  $Commentaire = json_decode($commentaire, true);
  return addComment($Commentaire['message'], $Commentaire['auteur'], $Commentaire['projet']);
}

// retourne false si l'action echoue
function supprimerCommentaire($commentaire_id) {
    return deleteComment($commentaire_id);
}

// retourne false si l'action echoue
function modifierCommentaire($commentaire_id, $message) {
    $Commentaire = json_decode($message, true);
    return modifComment($commentaire_id, $Commentaire['message']);
}
