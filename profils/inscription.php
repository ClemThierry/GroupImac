<?php 
    $titrePage = "S'inscrire";
    include_once "../header.php"; 
    include_once "../functions/profils.php"; 
?>
<main>
    <h1>S'inscrire</h1>
    <form action="inscription.php" method="POST">
    <?php 
        include_once "formProfil.php";
        echo "</form>";

        if (isset($_POST['ajouter'])) {

            $idUser = $_POST['idUser'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $promo = $_POST['promo'];
            $discord = $_POST['discord'];
            $presentation = $_POST['presentation'];

            //appel fonction ajouter le projet à la bdd
            addMember($idUser, $nom, $prenom, $promo, $discord, $presentation);

            echo "<p>Votre profil a bien été créé.</p>";
            echo "<a href='oneProfil.php?id=".$idUser."'><button>Voir mon profil</button></a>";
        }
    ?>

    <p>Vous êtes déjà inscrit ? <a href="connexion.php">Se connecter</a></p>
    <a href="../index.php"><button>Retour à l'accueil</button></a> 
</main>
</body>
</html>