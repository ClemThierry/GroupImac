<?php 
    $titrePage = "Modifier le projet";
    include_once "../header.php"; 
    include_once '../functions/projects.php';
    include_once '../functions/categories.php';

    $id = $_GET["id"];
    $project = getProjetByID($id);

    if (isset($_POST['publier'])) {
        $titre = $_POST['titre'];
        $presentation = $_POST['presentation'];
        $deadline = $_POST['deadline'];
        $cadre = $_POST['cadre'];
        $categories = $_POST['categorie'];
        
        updateProjet($id, $titre, $presentation, $deadline, $cadre);
        deleteCategorieFromProject($id);
        foreach($categories as $aCateg) {
            addCategorieToProject($id, $aCateg);
        }
    }
?>
<main>
    <h1>Modifier le projet</h1>
    <a href="oneProject.php?id=<?php echo $id; ?>"><button id="retour">Retour au projet</button></a>

    <form id="formProjet" method="POST" action="updateProject.php?id=<?php echo $id ?>">
    <?php 
        include_once "formProject.php";
        echo "</form>" ;

        if (isset($_POST['publier'])) {
            echo "<p>Votre projet a bien été modifié.</p>";
        } 
    ?>
    </form>    
</main>
</body>
</html>