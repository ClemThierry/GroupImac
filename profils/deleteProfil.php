<?php
include_once "../functions/profils.php";
include_once "../functions/projects.php";
include_once "../header.php";
$id = $_SESSION['personneConnectee']['idUser'];

$projets = getProjectByMember($id);
foreach ($projets as $projet) {
    deleteCommentFromProjet($projet['idProjet']);
}
deleteCommentByMember($id);
deleteProjectByMember($id);
deleteMember($id);

$titrePage = "Supprimer le profil";
?>
<main>
    <h1>Suppression du profil</h1>
    <p>Votre profil a bien été supprimé.</p>
    <a href="../deconnexion.php"><button>Retour à l'accueil</button></a>
</main>
</body>

</html>