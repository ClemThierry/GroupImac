<!-- Voir et gérer son propre profil : afficher, modifier, supprimer -->

<?php 
    session_start();
    $titrePage = "Mon profil";
    include_once "./header.php"; 

    if (isset($_SESSION['personneConnectee'])){
        $prof = $_SESSION['personneConnectee'];
        $id = $prof['idUser'];
    }

?>
<main>
    <h1>Gérer mon profil</h1>
    <button id="seeMyProfil" onclick="openProfil('<?php echo $id; ?>')">Voir mon profil</button>

    <div id="oneProfil" class="popup">
        <div id="viewProfil" class="popup-content">
            <span class="close" onclick="hideDiv('oneProfil')">&times;</span>
            <div id="prez">
                <h2 id='prenomNom'></h2>
                <p>Promotion : <span id="promo"></span></p>
                <p>N° étudiant : <span id="numero"></span></p>
                <p>Disord : <span id="discord"></span></p>
                <p>Présentation : <span id="presentation"></span></p>
                <div id="viewCateg"></div>
                <button id="upMyProfil" onclick="openUpdateProfil('<?php echo $id; ?>')">Modifier mon profil</button>
                <button id="delMyProfil" onclick="deleteProfil('<?php echo $id; ?>')">Supprimer mon profil</button>
            </div>

            <form id="updateProfil">
                <?php $string = "updateProfil"; include 'formProfil.php'; ?>
                <button id="modifierProfil" onclick="updateProfil('<?php echo $id; ?>')">Modifier le profil</button>
            </form>
        </div>
    </div>
</main>

<script src="../js/main.js"></script>
<script src="../js/appProjet.js"></script>
<script src="../js/appProfil.js"></script>
</body>
</html>