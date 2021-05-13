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
</head>

<body>
    <h1>Ajouter un projet</h1>
    <a href="allProjects.php"><button id="retour">Retour aux projets</button></a>
    <form id="formProjet" method="POST" action="addproject.php">
    <?php include_once "formProject.php"?>
    </form>    
</body>
</html>