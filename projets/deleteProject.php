<?php 

include_once '../functions/projects.php';

$id = $_GET['id'];

deleteProjet($id);

echo "Votre projet a bien été supprimé. <a href='allProjects.php'><button>Retour aux projets</button></a>";
?>