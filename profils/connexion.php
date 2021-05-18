<?php 
    $titrePage = "Connexion";
    include_once "../header.php";
    include_once "../functions/profils.php";
?>
<main>
    <h1>Connexion</h1>
    <form action="authentification.php" method="post">
        <label for="id">Identifiant :</label>
        <input type="text" name="id"><br>
        <label for="mdp">Mot de passe :</label>
        <input type="password" name="mdp"><br>
        <button type="submit" name="envoyer">Connexion</button>
    </form>

    <p>Pas encore de compte ? <a href="inscription.php">S'inscrire</a></p>
    <a href="../index.php"><button>Retour à l'accueil</button></a> 
</main>
</body>
</html>