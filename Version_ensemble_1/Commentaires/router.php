<?php
require_once('controller.php');


// on utilise PATH_INFO pour ne recuperer le chemin qu'a partir de router.php
// par exemple:
//
// pour la requete: /a/b/c/router.php/d/e/f?g=h
// $_SERVER['PATH_INFO'] = '/d/e/f'
//
// c'est pratique dans le cas de notre architecture pour mettre a plat toutes
// les routes (vu qu'on a chacun un router.php different)
//
// on commence forcement par l'indice 1 car l'indice 0 est vide (le chemin
// contient toujours un '/' initial)
$chemin = explode('/', $_SERVER['REQUEST_URL']);
$method = $_SERVER['REQUEST_METHOD'];

switch($chemin[4]) {
case 'commentaires' :
  if (!isset($chemin[4])) {
    switch($method) {
    case 'GET':
      $parametres = array();
      parse_str($_SERVER['QUERY_STRING'], $parametres);
      if (isset($parametres['projet'])) {
        echo afficherCommentairesDuProjet($parametres['projet']);
      } else {
        http_response_code('400');
      }
      break;

    case 'POST':
      $commentaire = file_get_contents('php://input');
      echo ajouterCommentaire($commentaire);
      break;

    default:
      http_response_code('405');
      header('Allow: GET,POST');
    }
  } else {
    $com_id = $chemin[5];
    switch ($method) {
    case 'DELETE':
      if (!supprimerCommentaire($com_id)) {
        http_response_code();
      }
      break;
    case 'PATCH':
      $contenu = file_get_contents('php://input');
      if (!modifierCommentaire($com_id, $contenu)) {
        http_response_code('500');
      }
      break;
    default:
      http_response_code('405');
      header('Allow: DELETE,PATCH');
    }
  }
  break;
default: 
  http_response_code('404');
  break;
}

?>
