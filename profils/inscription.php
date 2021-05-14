<?php 
    $titrePage = "S'inscrire";
    include_once "../header.php"; 
    include_once "../functions/profils.php";
    include_once '../functions/categories.php';
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
            $categories = $_POST['categorie'];

            $idUserExists = false; 
            $AllUsers = getAllMembers();
        
            foreach($AllUsers as $unUser) {
                if ($unUser['idUser'] == $idUser) {
                    $idUserExists = true;
                    break;
                }
            }
            if ($idUserExists) {
                echo "<p>Cet ID utilisateur existe déjà.</p>";
            }
            else {
                //appel fonction ajouter le projet à la bdd
                addMember($idUser, $nom, $prenom, $promo, $discord, $presentation);

                foreach($categories as $aCateg) {
                    addCategorieToMember($idUser, $aCateg);
                }
                echo "<p>Votre profil a bien été créé.</p>";
                echo "<a href='oneProfil.php?id=".$idUser."'><button>Voir mon profil</button></a>";   
            }        
        }
    ?>

    <p>Vous êtes déjà inscrit ? <a href="connexion.php">Se connecter</a></p>
    <a href="../index.php"><button>Retour à l'accueil</button></a> 
</main>
</body>
</html>