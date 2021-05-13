<?php 
    $titrePage = "Membres enregistrés";
    include_once "../header.php";
    include_once "../functions/profils.php";

    $members = getAllMembers();
?>

<main>
    <h1>Membres enregistrés</h1>
    <div id="all">
        <?php 
            foreach ($members as $profil) {
                $myDiv = "<a href='oneProfil.php?id=".$profil["idUser"]."'><div class='oneProject'><h3>".$profil["prenom"]." ".$profil["nom"]."</h3>";
                $myDiv.= "<p>Promo : ".$profil["promo"]."</p></div>";
                echo $myDiv;
            }            
        ?>
    </div>
</main>
</body>
</html>