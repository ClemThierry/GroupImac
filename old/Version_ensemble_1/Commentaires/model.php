<?php
		
	/* Connexion BDD (version améliorée pour avoir description des erreurs SQL) */ 
function connection() {
  try {
    $cnx = new PDO('pgsql:host=localhost;dbname=groupimac', 'postgres','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    /* 
      nom de la base : groupimac
      pseudo : 'root'
      mot de passe : '' 
    */
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

// retourne la liste des commentaires d'un projet
// sous forme de tableau associatif
function getCommentsOfProject($id) {
  $co = connection();

  $req = $co->prepare('select * from Commentaire inner join Utilisateur on refuser = iduser where refprojet = ? order by idcomment');
  $req->execute(array($id));
  return $req->fetchAll(PDO::FETCH_ASSOC);
}

// ajoute un commentaire, retourne false si la requete echoue
function addComment($message, $author_id, $project_id) {
  $co = connection();

  $req = $co->prepare('insert into Commentaire (refuser, refprojet, message, datecomment) values (?,?,?,now())');
  return $req->execute(array($author_id, $project_id, $message));
}

// supprime un commentaire, retourne false si la requete echoue
function deleteComment($comment_id) {
  $co = connection();
  $req = $co->prepare('delete from Commentaire where idcomment = ?');
  return $req->execute(array($comment_id));
}

// modifie un commentaire, retourne false si la requete echoue
function modifComment($comment_id, $new_message) {
  error_log($comment_id);
  error_log($new_message);
  $co = connection();
  $req = $co->prepare("update Commentaire set message = ? where idcomment = ?");
  return $req->execute(array($new_message, $comment_id));
}
