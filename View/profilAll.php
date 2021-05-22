<!-- Voir tous les profils enregistrés dans la base de données + pouvoir les voir en individuel  -->
<!-- Attention : pas d'action possible dessus (enregistré ou non) -->

<?php 
    session_start();
    $titrePage = "Membres";
    include_once "./header.php"; 
?>


<main>
    <h1> Voir les profils </h1>

    <div id="allProfils" class="all">
    </div>

    <!-- Pop-up qui s'ouvre par dessus le reste des projets -->
    <div id="oneProfil" class="popup">
        <div id="viewProfil" class="popup-content">
            <span class="close" onclick="hideDiv('oneProfil')">&times;</span>
            <h2 id='prenomNom'></h2>
            <p>Promotion : <span id="promo"></span></p>
            <p>N° étudiant : <span id="numero"></span></p>
            <p>Disord : <span id="discord"></span></p>
            <p>Présentation : <span id="presentation"></span></p>
        </div>
    </div>
</main>

<script src="../js/main.js"></script>
<script src="../js/allProfils.js"></script>
<script src="../js/appProfil.js"></script>
</body>
</html>