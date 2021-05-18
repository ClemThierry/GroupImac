<?php
    $titrePage = "Supprimer le profil";
    include_once "../header.php";
    
    include_once "../functions/profils.php";
    include_once "../functions/projects.php";
    include_once "../functions/categories.php";
    $id = $_SESSION['personneConnectee']['idUser'];

    $profil = getMemberById($id);
    $projets = getProjectByMember($id); 

    foreach($projets as $projet) {
        deleteCommentFromProjet($projet['idProjet']);
        deleteCategorieFromProject($projet['idProjet']);
    }

    deleteCommentByMember($id);
    deleteCategorieFromMember($id);
    deleteProjectByMember($id); 
    deleteMember($id);

?>
<main>
    <h1>Suppression du profil</h1>
    <p>Votre profil a bien été supprimé.</p>
    <a href="./deconnexion.php"><button>Retour à l'accueil</button></a>
</main>
</body>
</html>