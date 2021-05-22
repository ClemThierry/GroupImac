<!-- Se connecter / s'inscrire  -->

    <div id="voirConnexion" class="popup-content">
    <span class="close" onclick="hideDiv('signup')">&times;</span>
    <h2>Se connecter</h2>
        <form id="seConnecter" action="authentification.php" method="post">
            <label for="id">N° étudiant :</label>
            <input type="number" name="id"><br>
            <label for="mdp">Mot de passe :</label>
            <input type="password" name="mdp"><br>
            <button type="submit" name="connex">Connexion</button>
        </form>

        Pas encore de compte ? 
        <button onclick="showDiv('voirInscription');hideDiv('voirConnexion')">S'inscrire</button>
    </div>

    <div id="voirInscription" class="popup-content" style="display:none;">
        <span class="close" onclick="hideDiv('signup')">&times;</span>
        <h2>S'inscrire</h2>
        <form id="sInscrire">
            <?php $string = "add"; include_once "formProfil.php"; ?>
            <button type="submit" id="inscription">S'inscrire</button>
        </form>
        Déjà inscrit ? <button onclick="hideDiv('voirInscription');showDiv('voirConnexion')">Se connecter</button>
    </div>