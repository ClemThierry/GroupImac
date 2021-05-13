<?php 
    include_once "../functions/profils.php";

    $id = $_GET['id']; 
    $profil = getMemberById($id);
    $titrePage = $profil['prenom']." ".$profil['nom'];
 
    include_once "../header.php";

    $nom=$profil['nom'];
    $prenom=$profil['prenom'];
    $promo=$profil['promo'];
    $discord=$profil['discord'];
    $presentation=$profil['presentation'];

    // ici : infos profil + annonces + commentaires laissés (+ projets auquel il participe)
?>
<main>
    <div id="profil">
    <?php 
        $myDiv = "<h1>".$prenom." ".$nom."</h1>";
        $myDiv .= "<p>Promotion : ".$promo."</p>";
        $myDiv .= "<p>Discord : ".$discord."</p>";
        $myDiv .= "<p>Présentation : ".$presentation."</p>";
        echo $myDiv;
    ?>
    </div>
    <div id="profil-projects">
        à venir : projets du profil
    </div>
    <div id="profil-comments">
        à venir : commentaires du profil 
    </div>
    <a href="updateProfil.php?id=<?php echo $id; ?>"><button>Modifier le profil</button></a>
    <a href="deleteProfil.php?id=<?php echo $id; ?>"><button>Supprimer le profil</button></a>
    <a href="allProfils.php"><button>Tous les profils</button></a>

</main>