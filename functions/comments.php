<?php 
    include_once "connexionbdd.php";

    // retourne la liste des commentaires d'un projet
    // sous forme de tableau associatif
    function getCommentsOfProject($id) {
        $co = connection();
        $req = $co->prepare('SELECT * FROM Commentaire INNER JOIN utilisateur ON refuser = iduser WHERE refprojet = ? ORDER BY idComment');
        $req->execute(array($id));
        return $req->fetchAll();
    }

    // récupère un commentaire avec son id 
	function getCommentById($id) {
		$cnx = connection();
		$rqt = $cnx->prepare('SELECT * FROM commentaire WHERE idComment = ?');
		$rqt->execute(array($id));
		return $rqt->fetch();
	}  

    // récupère tous les commentaires d'un utilisateur
    function getMemberByComment($idComment) {
		$cnx = connection();
		$rqt = $cnx->prepare('SELECT * FROM utilisateur INNER JOIN commentaire ON idUser = RefUser WHERE idComment = ?');
		$rqt->execute(array($idComment));
		return $rqt->fetch();
    }

    // ajoute un commentaire, retourne false si la requete echoue
    function addComment($message, $author_id, $project_id) {
        $co = connection();
        $req = $co->prepare('insert into commentaire (refuser, refprojet, message, datecomment) values (?,?,?,now())');
        return $req->execute(array($author_id, $project_id, $message));
    }
    
    // supprime un commentaire, retourne false si la requete echoue
    function deleteComment($comment_id) {
        $co = connection();
        $req = $co->prepare('delete from commentaire where idComment = ?');
        return $req->execute(array($comment_id));
    }

    // modifie un commentaire, retourne false si la requete echoue
    function updateComment($comment_id, $new_message) {
        error_log($comment_id);
        error_log($new_message);
        $co = connection();
        $req = $co->prepare("update commentaire set message = ? where idComment = ?");
        return $req->execute(array($new_message, $comment_id));
    }