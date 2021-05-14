<?php 
    include_once "connexion.php";

    // retourne la liste des commentaires d'un projet
    // sous forme de tableau associatif
    function getCommentsOfProject($id) {
        $co = connection();
    
        $req = $co->prepare('select * from Commentaire inner join Utilisateur on refuser = iduser where refprojet = ? order by idcomment');
        $req->execute(array($id));
        return $req->fetchAll();
    }

	function getCommentById($id) {
		$cnx = connection();
		$rqt = $cnx->prepare('SELECT * FROM commentaire WHERE idComment = ?');
		$rqt->execute(array($id));
		return $rqt->fetch();
	}  

    function getMemberByComment($idComment) {
		$cnx = connection();
		$rqt = $cnx->prepare('SELECT * FROM utilisateur, commentaire WHERE utilisateur.idUser = commentaire.RefUser AND commentaire.idComment = ?');
		$rqt->execute(array($idComment));
		return $rqt->fetch();
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
    function updateComment($comment_id, $new_message) {
        error_log($comment_id);
        error_log($new_message);
        $co = connection();
        $req = $co->prepare("update Commentaire set message = ? where idcomment = ?");
        return $req->execute(array($new_message, $comment_id));
    }