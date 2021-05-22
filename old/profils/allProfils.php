<?php
$titrePage = "Membres enregistrés";
include_once "../header.php";
include_once '../functions/includes.php';

$members = getAllMembers();
$test = 0;
?>

<main>
    <h1>Membres enregistrés</h1>
    <div id="all">
        <?php
        foreach ($members as $profil) {
            echo "<div class='oneProject'><h3>" . $profil["prenom"] . " " . $profil["nom"] . "</h3><p>Promo : " . $profil["promo"] . "</p><a href='oneProfil.php?id=".$profil["idUser"] . "'>Voir le profil</a></div>";
        }
        ?>
    </div>
</main>
</body>

</html>