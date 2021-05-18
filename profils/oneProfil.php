<?php 
    $titrePage = "Profil";
    include_once "../header.php";
    include_once "../functions/profils.php";
    include_once "../functions/categories.php";
    if (isset($_GET['id'])) {

        $id = $_GET['id']; 
        $profil = getMemberById($id);
    }
    else {
        $id = $_SESSION['personneConnectee']['idUser'];
        $profil = $_SESSION['personneConnectee'];    
    }

    $nom=$profil['nom'];
    $prenom=$profil['prenom'];
    $promo=$profil['promo'];
    $discord=$profil['discord'];
    $presentation=$profil['presentation'];
    
    $sesProjets = getProjectByMember($id);
    $sesComments = getCommentByMember($id);
    $categories = getCategoriesByMember($id);


?>

<main>
    <div id="profil">
    <?php           
        $myDiv = "<h1>".$profil['prenom']." ".$profil['nom']."</h1><div class='categories' style='display:flex;'>";
        foreach ($categories as $aCat) {
            $myDiv .= "<div style='border:1px solid black; padding:10px;margin:0 10px;'>".$aCat['nomCat']."</div>";
        }
        $myDiv .= "</div><p>Promotion : ".$promo."</p>";
        $myDiv .= "<p>Discord : ".$discord."</p>";
        $myDiv .= "<p>Présentation : ".$presentation."</p>";
        echo $myDiv;
    ?>
    </div>
    <h2>Projets publiés</h2>
    <div id="all">
        <?php
        if (empty($sesProjets)) {
            echo "<p>Pas de projet pour l'instant.</p>";
        }

        foreach ($sesProjets as $unProjet) {
            echo "<div class='oneProject'><h3>".$unProjet['titre']."</h3></div>";
        } 
        ?>
    </div>

    <h2>Commentaires publiés</h2>
    <div id="profil-comments">
    <?php
        if (empty($sesComments)) {
            echo "<p>Pas de commentaires pour l'instant.</p>";
        }

        foreach ($sesComments as $unComment) {
            echo "<div class='oneProject'><h3>".$unComment['message']."</h3></div>";
        } 
        echo "</div>";

        if (!isset($_GET['id'])){
            echo "    <a href=\"updateProfil.php?id=<?php echo $id; ?>\"><button>Modifier le profil</button></a>
            <a href=\"deleteProfil.php?id=<?php echo $id; ?>\"><button>Supprimer le profil</button></a>";
        }
    ?>
    
    <a href="allProfils.php"><button>Tous les profils</button></a>

</main>