<?php 
    include_once "../functions/comments.php";

    $idComment = $_GET['id'];
    $comment = getCommentById($idComment);
    $idProjet = $comment['RefProjet'];

    deleteComment($idComment);

?>
<p>Votre commentaire a bien été supprimé.</p>
<a href="../projets/oneProject.php?id=<?php echo $idProjet; ?>"><button>Retour au projet</button></a>