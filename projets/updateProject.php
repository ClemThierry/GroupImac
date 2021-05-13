<?php include_once '../functions/projects.php';

$id = $_GET["id"];
$project = getProjetByID($id);


if (isset($_POST['publier'])) {

    $titre = $_POST['titre'];
    $presentation = $_POST['presentation'];
    $deadline = $_POST['deadline'];
    $cadre = $_POST['cadre'];
    $recherche = $_POST['jeRecherche'];
    $membres = $_POST['membres'];

    //appel fonction ajouter le projet à la bdd
    updateProjet($id, $titre, $presentation, $deadline, $cadre);

    echo "<p>Votre projet a bien été modifié.</p> <a href='oneProject.php?id=".$id."'><button>Voir le projet</button></a>";
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Modifier un projet</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Roboto+Slab&display=swap" rel="stylesheet">
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
        <h1>Modifier le projet</h1>
        <a href="oneProject.php?id=<?php echo $id; ?>"><button id="retour">Retour au projet</button></a>

        <form id="formProjet" method="POST" action="updateProject.php?id=<?php echo $id ?>">
        <?php include_once "formProject.php"?>
        </form>    
    </main>
</body>
</html>