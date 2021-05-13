<?php include_once '../functions/projects.php';

if (isset($_POST['publier'])) {

    $titre = $_POST['titre'];
    $presentation = $_POST['presentation'];
    $deadline = $_POST['deadline'];
    $cadre = $_POST['cadre'];
    $recherche = $_POST['jeRecherche'];
    $membres = $_POST['membres'];

    //appel fonction ajouter le projet à la bdd
    addProjet($titre, $presentation, $deadline, $cadre);

    echo "<p>Votre projet a bien été ajouté.</p>";
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Ajouter un projet</title>
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
                        <li class="menu-accueil"><a href="../index.html">Accueil</a></li>
                        <li class="menu-voir-projet"><a href="allProjects.php">Voir les projets</a></li>
                        <li class="menu-ajout-projet"><a href="addproject.php">Ajouter un projet</a></li>
                        <li class="menu-profil"><a href="../connexion.php">Se connecter</a></li>
                    </ul>
                </div>
            </nav>
        </header>

        <main>
            <h1>Ajouter un projet</h1>
            <a href="allProjects.php"><button id="retour">Retour aux projets</button></a>
            <form id="formProjet" method="POST" action="addproject.php">
            <?php include_once "formProject.php"?>
            </form>  
        </main>  
    </body>
</html>