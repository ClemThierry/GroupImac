<?php 
$titrePage = "Ajouter un projet";
include_once "../header.php"; 
include_once '../functions/projects.php';
include_once '../functions/profils.php';
include_once '../functions/categories.php';

?>

<main>
    <h1>Ajouter un projet</h1>
    <a href="allProjects.php"><button id="retour">Retour aux projets</button></a>
    <form id="formProjet" method="POST" action="addproject.php">
    <?php 
        include_once "formProject.php";
        echo "</form>";
        if (isset($_POST['publier'])) {

            $titre = $_POST['titre'];
            $presentation = $_POST['presentation'];
            $deadline = $_POST['deadline'];
            $cadre = $_POST['cadre'];
            $idUser = $_POST['idUser'];
            $categories = $_POST['categorie'];

            $idUserExists = false; 
            $users = getAllMembers();

            foreach($users as $unUser) {
                if ($unUser['idUser'] == $idUser) {
                    $idUserExists = true;
                    break;
                }
            }
            if ($idUserExists) {
                //appel fonction ajouter le projet à la bdd
                addProjet($titre, $presentation, $deadline, $cadre, $idUser);
                $idProjectposted = getLastProject($idUser);

                foreach($categories as $aCateg) {
                    addCategorieToProject($idProjectposted, $aCateg);
                }

                echo "<p>Votre projet a bien été ajouté.</p><a href='oneproject.php?id=".$idProjectposted."'><button>Voir le projet</button></a>";

            }
            else {
                echo "<p>Veuillez entrer un ID utilisateur existant.</p>";
            }
        }
    ?>            
</main>  
</body>
</html>