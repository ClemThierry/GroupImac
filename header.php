<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Group'IMAC | <?php echo $titrePage; ?></title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
    <div class="title">
        <h1>GROUP'</h1>
        <h1>IMAC</h1>
    </div>
    <h2>Trouve ton groupe en toute simplicité !</h2>

    <nav>
        <div class="table">
            <ul>
                <li class="menu-accueil"><a href="../index.php">Accueil</a></li>
                <li class="menu-voir-projet"><a href="../projets/allProjects.php">Voir les projets</a></li>
                <li class="menu-ajout-projet"><a href="../projets/addproject.php">Ajouter un projet</a></li>
                <li class="menu-membres"><a href="../profils/allProfils.php">Tous les membres</a></li>
                <?php if (!empty($_SESSION['personneConnectee'])) {
                        echo "<li><a href=\"../profils/oneProfil.php\">Mon profil</a></li>";
                     }?>
            </ul>
        </div>
    </nav>
    </header>
    <div id="profil-perso">
    <?php if (!empty($_SESSION['personneConnectee'])) {
        echo "<p>Bonjour " . $_SESSION['personneConnectee']['prenom'] . " " . $_SESSION['personneConnectee']['nom'] . "</p><a href=\"../profils/deconnexion.php\">Déconnexion</a>";
    }else{
        echo "<a href=\"../profils/connexion.php\">Se connecter</a>";
    } ?>
    </div>