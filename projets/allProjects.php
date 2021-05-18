<?php 
    $titrePage = "Tous les projets";
    include_once "../header.php"; 

    include_once '../functions/projects.php';

    $allProjects = getAllProjets();

?>

<<<<<<< HEAD
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tous les projets</title>
        <link rel="stylesheet" href="../style.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Roboto+Slab&display=swap" rel="stylesheet">
        <style>
            #all {
                display:flex;
                flex-flow:row wrap;
                width:100%;
            }
            .oneProject {
                border: 1px solid black;
                width:300px;
                margin:10px;
                padding:10px;
            }
            a {
                text-decoration:none;
                color: #000;
            }
        </style>
    </head>
    
    <body>
        <header>
            <div class="title">
                <h1>GROUP'</h1>
                <h1>IMAC</h1>
            </div>
            <h2>Trouve ton groupe en toute simplicité !</h2>
            
            <nav>
                <ul>
                    <li class="menu-accueil"><a href="../index.html">Accueil</a></li>
                    <li class="menu-voir-projet"><a href="allProjects.php">Voir les projets</a></li>
                    <li class="menu-ajout-projet"><a href="addproject.php">Ajouter un projet</a></li>
                    <li class="menu-profil"><a href="../connexion.php">Se connecter</a></li>
                </ul>
            </nav>
        </header>
        
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
=======
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
>>>>>>> main
</html>