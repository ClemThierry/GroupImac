<?php 

include_once '../functions/projects.php';

$id = $_GET['id'];

deleteProjet($id);

echo "Votre projet a bien été supprimé. <a href='allProjects.php'><button>Retour aux projets</button></a>";
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Supprimer Projet</title>
        <link rel="stylesheet" href="../style.css">
    </head>

    <body>
        <header>
            <div class="title">
                <h1>GROUP'</h1>
                <h1>IMAC</h1>
            </div>
            <h2>Trouve ton groupe en toute simplicité !</h2>
            
            <nav>
                <div class="table">
                    <ul>
                        <li class="menu-accueil"><a href="index.html">Accueil</a></li>
                        <li class="menu-voir-projet"><a href="projets/allProjects.php">Voir les projets</a></li>
                        <li class="menu-ajout-projet"><a href="projets/addproject.php">Ajouter un projet</a></li>
                        <li class="menu-profil"><a href="connexion.php">Se connecter</a></li>
                    </ul>
                </div>
            </nav>
        </header>
    </body>
</html>