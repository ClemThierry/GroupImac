<?php include_once '../functions/comments.php';

$id = $_GET["id"];
$comment = getCommentById($id);
$idProjet = $comment['RefProjet'];

if (isset($_POST['sendComment'])) {
    $message = $_POST['message'];
    updateComment($id, $message);
    echo "Votre commentaire a été modifié.";
}

?>

<html>
<head>
    <title>Modifier le commentaire</title>
</head>
<body>
    <a href="../projets/oneProject.php?id=<?php echo $idProjet; ?>"><button>Retour au projet</button></a>
    <h3>Modifier le commentaire</h3>
    <form action="updateComment.php?id=<?php echo $id; ?>" method="POST">
        <?php include_once "../comments/formComment.php"; ?>
    </form>
</body></html>