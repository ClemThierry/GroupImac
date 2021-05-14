<?php 
    $titrePage = "Modifier le profil";
    include_once "../header.php";
    include_once "../functions/profils.php";
    include_once "../functions/categories.php";

    $id = $_SESSION['personneConnectee']['idUser'];
    $profil = getMemberById($id);

    if (isset($_POST['ajouter'])) {
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $promo=$_POST['promo'];
        $discord=$_POST['discord'];
        $presentation=$_POST['presentation'];
        $categories = $_POST['categorie'];

        updateMember($id, $nom, $prenom, $promo, $discord, $presentation);
        deleteCategorieFromMember($id);
        foreach($categories as $aCateg) {
            addCategorieToMember($id, $aCateg);
        }
    }
?>

<main>
    <h1>Modifier le profil</h1>
    <form action="updateProfil.php" method="POST">
    <?php 
        include_once "formProfil.php";
        echo "</form>"; 
        
        if (isset($_POST['ajouter'])) { echo "<p>Votre profil a bien été modifié.</p>"; }
        
    ?>
    <a href="oneProfil.php"><button>Retour au profil</button></a>
</main>
</body>
</html>