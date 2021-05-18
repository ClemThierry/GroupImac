<?php 
$titrePage = "Voir le projet";
include_once "../header.php";
include_once '../functions/includes.php';

$id = $_GET["id"];
$project = getProjetByID($id);
$titrePage = $project['titre'];
$categories = getCategoriesByProject($id);


?>

<main>
    <a href="allProjects.php"><button id="retour">Retour aux projets</button></a>
    <?php
        $myDiv = "<h1>".$project['titre']."</h1><div class='categories' style='display:flex;'>";
        foreach ($categories as $aCat) {
            $myDiv .= "<div style='border:1px solid black; padding:10px;margin:0 10px;'>".$aCat['nomCat']."</div>";
        }        
        $myDiv .= "</div><p>Publié le : ".$project['datePubli']."</p>";
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
    
if (isset($_POST['sendComment'])) {

    $refUser = $_POST['refUser'];
    $message = $_POST['message'];

    $idUserExists = false; 
    $users = getAllMembers();

    foreach($users as $unUser) {
        if ($unUser['idUser'] == $refUser) {
            $idUserExists = true;
            break;
        }
    }
    if ($idUserExists) {
        addComment($message, $refUser, $id);
    }
    else {
        echo "<p>Veuillez entrer un ID utilisateur existant.</p>";
    }
}

$comments = getCommentsOfProject($id);

        foreach ($comments as $aComment) {
            $author = getMemberByComment($aComment['idComment']);

            $htmlComment = "<div class='comment'>";
            $htmlComment .= "<p>".$author['prenom']." ".$author['nom']."</p>";
            $htmlComment .= "<p>Date : ".$aComment['dateComment']."</p>";
            $htmlComment .= "<p>Message : ".$aComment['message']."</p>";
            $htmlComment .= "</div><a href='../comments/updateComment.php?idComment=".$aComment['idComment']."'><button>Modifier</button></a><a href='../comments/deleteComment.php?idComment=".$aComment['idComment']."'><button>Supprimer</button></a>";

            echo $htmlComment;
        }
    ?>
</main>
</body>
</html>