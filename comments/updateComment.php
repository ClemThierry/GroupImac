<?php 
    include_once '../functions/comments.php';

    $id = $_GET["idComment"];
    $comment = getCommentById($id);
    $idProjet = $comment['RefProjet'];

    $titrePage = "Modifier le commentaire";
    include_once "../header.php";
?>

<main>
    <a href="../projets/oneProject.php?id=<?php echo $idProjet; ?>"><button>Retour au projet</button></a>
    <h3>Modifier le commentaire</h3>
    <form action="updateComment.php?idComment=<?php echo $id; ?>" method="POST">
    <?php 
        include_once "formComment.php";
        echo "</form>";

        if (isset($_POST['sendComment'])) {
            $message = $_POST['message'];
            updateComment($id, $message);
            echo "Votre commentaire a été modifié.";
        }
    ?>
</main>
</body></html>