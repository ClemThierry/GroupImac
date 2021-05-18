<?php 
$titrePage = "Voir le projet";
include_once "../header.php";
include_once '../functions/projects.php';
include_once '../functions/comments.php';
include_once '../functions/profils.php';
include_once '../functions/categories.php';

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

<<<<<<< HEAD
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $project['titre']; ?></title>
        <link rel="stylesheet" href="../style.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Roboto+Slab&display=swap" rel="stylesheet">
        <style>
            a {
                text-decoration:none;
                color: #000;
            }
        </style>
    </head>
    
    <body>
        <header>
            <div class="title">
                <h1>GROUP'</h1>
                <h1>IMAC</h1>
            </div>
            <h2>Trouve ton groupe en toute simplicité !</h2>
            
            <nav>
                <ul>
                    <li class="menu-accueil"><a href="../index.html">Accueil</a></li>
                    <li class="menu-voir-projet"><a href="allProjects.php">Voir les projets</a></li>
                    <li class="menu-ajout-projet"><a href="addproject.php">Ajouter un projet</a></li>
                    <li class="menu-profil"><a href="../connexion.php">Se connecter</a></li>
                </ul>
            </nav>
        </header>
=======
    <h2>Commentaires</h2>
    <h3>Ajouter un commentaire</h3>
    <form action="oneProject.php?id=<?php echo $id; ?>" method="POST">
        <?php include_once "../comments/formComment.php"; ?>
    </form>

    <?php 
    
if (isset($_POST['sendComment'])) {
>>>>>>> main

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