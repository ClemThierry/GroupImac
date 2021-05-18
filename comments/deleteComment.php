<?php 
    $titrePage = "Supprimer le commentaire";
    include_once "../header.php"; 
    include_once "../functions/comments.php";

    $idComment = $_GET['idComment'];
    $comment = getCommentById($idComment);
    $idProjet = $comment['RefProjet'];

    deleteComment($idComment);

?>
<main>
    <h1>Suppression du commentaire</h1>    
    <p>Votre commentaire a bien été supprimé.</p>
    <a href="../projets/oneProject.php?id=<?php echo $idProjet; ?>"><button>Retour au projet</button></a>
</main>

</body>