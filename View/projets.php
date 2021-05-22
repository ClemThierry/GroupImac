<!-- Ouverture de la session + header -->
<?php 
    session_start();
    $titrePage = "Projets";
    include_once "./header.php"; 
?>

<main>
    <h1> Voir les projets </h1>
    <button id="newProjet" onclick="showDiv('addProjet')">Ajouter un projet</button>

    <div id="allProjets" class="all">
    </div>


    <div id="addProjet" class="popup">
       <form id="add" class="popup-content">
            <span class="close" onclick="hideDiv('addProjet')">&times;</span>
            <?php $string = "input"; include "formProjet.php"; ?>
            <button id="publish">Publier le projet</button>
        </form>
    </div>

    <!-- Pop-up qui s'ouvre par dessus le reste des projets -->
    <div id="oneProjet" class="popup">
        <div id="viewProjet" class="popup-content">
            <span class="close" onclick="hideDiv('oneProjet')">&times;</span>
            <h2 id='titre'></h2>
            <p>Publié le : <span id="datePubli"></span></p>
            <p>Description : <span id="desc"></span></p>
            <p>Pour le : <span id="deadline"></span></p>
            <p>Cadre : <span id="cadre"></span></p>
            <div id="viewCateg"></div>
            <div id="buttons"></div>

            <div id="comments">
                <h3>Commentaires</h3>
                <form id="addComment">
                    <?php $string = "inputCom"; include "formComment.php"; ?>
                    <button type="submit" id="publishComment">Publier</button>
                </form>
                <div id="viewComments"></div>

                <form id="upComment">
                    <?php $string = "updateCom"; include "formComment.php"; ?>
                    <button type="submit" id="publishModifComment">Modifier</button>
                </form>
            </div>
        </div>

        <form id="updateProjet" class="popup-content">
            <span class="close" onclick="hideDiv('oneProjet')">&times;</span>
            <?php $string = "update"; include "formProjet.php"; ?>
            <button id="modifier">Modifier le projet</button>
        </form>
    </div>

</main>

<script src="../js/main.js"></script>
<script src="../js/appProjet.js"></script>
<script src="../js/appProfil.js"></script>
</body>
</html>