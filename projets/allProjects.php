<?php 
    $titrePage = "Tous les projets";

    include_once '../functions/projects.php';
    include_once "../header.php"; 

    $allProjects = getAllProjets();

?>

<main>
    <h1>Tous les projets</h1>
    <a href="addProject.php"><button>Ajouter un projet</button></a>
    <div id="all">
        <?php 
            foreach ($allProjects as $aProject) {
                $myDiv = "<a href='oneProject.php?id=".$aProject["idProjet"]."'><div class='oneProject' id=".$aProject["idProjet"]."><h3>".$aProject["titre"]."</h3>";
                $myDiv.= "<p>".$aProject["presentation"]."</p>";
                $myDiv.= "<p>Publié le : ".$aProject["datePubli"]."</p></div></a>";
                echo $myDiv;
            }            
        ?>
    </div>
</main>
</body>
</html>