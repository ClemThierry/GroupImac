<?php 
    $id = $_GET['id'];
    $titrePage = "Supprimer le projet";

    include_once '../functions/projects.php';
    include_once "../header.php"; 

    deleteCommentFromProjet($id);
    deleteProjet($id);

    echo "<main><p>Votre projet a bien été supprimé.</p><a href='allProjects.php'><button>Retour aux projets</button></a></main>";
?>

</body>
</html>