<?php 
include_once '../functions/projects.php';
include_once '../functions/comments.php';

$id = $_GET["id"];
$project = getProjetByID($id);
$titrePage = $project['titre'];

include_once "../header.php";

if (isset($_POST['sendComment'])) {

    $refUser = $_POST['refUser'];
    $message = $_POST['message'];

    //ajouter commentaire || ATTENTION : test : USER=1 (car pas de user implémenté encore)
    addComment($message, 1, $id);
}
$comments = getCommentsOfProject($id);
?>

<main>
    <a href="allProjects.php"><button id="retour">Retour aux projets</button></a>
    <?php 
        $myDiv = "<h1>".$project['titre']."</h1>";
        $myDiv .= "<p>Publié le : ".$project['datePubli']."</p>";
        $myDiv .= "<p>Présentation : ".$project['presentation']."</p>";
        $myDiv .= "<p>Pour le : ".$project['deadline']."</p>";
        $myDiv .= "<p>Cadre : ".$project['cadre']."</p>";

        echo $myDiv;
    
        echo "<a href='updateProject.php?id=".$id."'><button>Modifier</button></a> "; 

        echo "<a href='deleteProject.php?id=".$id."'><button id='supprimer'>Supprimer</button></a>"; 
    ?>

    <h2>Commentaires</h2>
    <h3>Ajouter un commentaire</h3>
    <form action="oneProject.php?id=<?php echo $id; ?>" method="POST">
        <?php include_once "../comments/formComment.php"; ?>
    </form>

    <?php 
        foreach ($comments as $aComment) {
            $htmlComment = "<div class='comment'>";
            $htmlComment .= "<p>Auteur (ID pour l'instant) : ".$aComment['RefUser']."</p>";
            $htmlComment .= "<p>Date : ".$aComment['dateComment']."</p>";
            $htmlComment .= "<p>Message : ".$aComment['message']."</p>";
            $htmlComment .= "</div><a href='../comments/updateComment.php?idComment=".$aComment['idComment']."'><button>Modifier</button></a><a href='../comments/deleteComment.php?idComment=".$aComment['idComment']."'><button>Supprimer</button></a>";

            echo $htmlComment;
        }
    ?>
</main>
</body>
</html>