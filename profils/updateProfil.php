<?php 
    $titrePage = "Modifier le profil";
    include_once "../header.php";
    include_once "../functions/profils.php";

    $id = $_GET["id"];
    $profil = getMemberById($id);

    if (isset($_POST['ajouter'])) {
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $promo=$_POST['promo'];
        $discord=$_POST['discord'];
        $presentation=$_POST['presentation'];

        updateMember($id, $nom, $prenom, $promo, $discord, $presentation);
    }
?>

<main>
    <h1>Modifier le profil</h1>
    <form action="updateProfil.php?id=<?php echo $id; ?>" method="POST">
    <?php 
        include_once "formProfil.php";
        echo "</form>"; 
        
        if (isset($_POST['ajouter'])) { echo "<p>Votre profil a bien été modifié.</p>"; }
        
    ?>
    <a href="oneProfil.php?id=<?php echo $id; ?>"><button>Retour au profil</button></a>
</main>
</body>
</html>