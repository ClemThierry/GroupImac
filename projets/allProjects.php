<?php include_once '../functions/projects.php';

$allProjects = getAllProjets();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Tous les projets</title>
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
    </body>
</html>