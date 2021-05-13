<?php 
    include_once "../functions/profils.php";

    $id = $_GET['id'];
    $profil = getMemberById($id);

    deleteMember($id);

    $titrePage = "Supprimer le profil";
    include_once "../header.php";
?>
<main>
    <h1>Suppression du profil</h1>
    <p>Votre profil a bien été supprimé.</p>
    <a href="../index.php"><button>Retour à l'accueil</button></a> 
</main>
</body>
</html>