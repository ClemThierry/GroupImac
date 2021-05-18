<?php 
    $id = $_GET['id'];
    $titrePage = "Supprimer le projet";
    include_once "../header.php"; 

    include_once '../functions/includes.php';

    deleteCommentFromProjet($id);
    deleteCategorieFromProject($id);
    deleteProjet($id);

    echo "<main><p>Votre projet a bien été supprimé.</p><a href='allProjects.php'><button>Retour aux projets</button></a></main>";
?>

</body>
</html>