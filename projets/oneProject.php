<?php 
include_once '../functions/projects.php';
include_once '../functions/comments.php';

$id = $_GET["id"];
$project = getProjetByID($id);

if (isset($_POST['sendComment'])) {

    $refUser = $_POST['refUser'];
    $message = $_POST['message'];

    //ajouter commentaire || ATTENTION : test : USER=1 (car pas de user implémenté encore)
    addComment($message, 1, $id);
}
$comments = getCommentsOfProject($id);

?>

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
                    $htmlComment .= "</div><a href='../comments/updateComment.php?id=".$aComment['idComment']."'><button>Modifier</button></a><a href='../comments/deleteComment.php?id=".$aComment['idComment']."'><button>Supprimer</button></a>";

                    echo $htmlComment;
                }
            ?>
        </main>
    </body>
</html>