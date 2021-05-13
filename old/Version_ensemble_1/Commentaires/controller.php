<?php
require_once('model.php');

// echo une representation json des commentaires du projet en parametre
function afficherCommentairesDuProjet($projet_id) {
  $coms = getCommentsOfProject($projet_id);

  $format = function ($cols) {
    return array(
      'id' => $cols['idcomment'],
      'message' => $cols['message'],
      'auteur' => array(
        'id' => $cols['refuser'],
        'nom' => $cols['nom'],
        'prenom' => $cols['prenom'],
      ),
    );
  };

  $coms_formate = array_map($format, $coms);
  return json_encode($coms_formate);
}

// retourne false si l'action echoue
function ajouterCommentaire($commentaire) {
  $data = json_decode($commentaire, true);
  return addComment($data['message'], $data['auteur'], $data['projet']);
}

// retourne false si l'action echoue
function supprimerCommentaire($commentaire_id) {
  return deleteComment($commentaire_id);
}

// retourne false si l'action echoue
function modifierCommentaire($commentaire_id, $contenu) {
  $contenu = json_decode($contenu, true);
  return modifComment($commentaire_id, $contenu['message']);
}
