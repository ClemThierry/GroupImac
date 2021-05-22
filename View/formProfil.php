<?php include_once "../Model/categories.php"; ?>

<fieldset>
    <label for="<?php echo $string; ?>-prenom">Prénom : </label>
    <input type="text" name="<?php echo $string; ?>-prenom" id='<?php echo $string; ?>-prenom' maxlength="30" required>

    <label for="<?php echo $string; ?>-nom">Nom : </label>
    <input type="text" name="<?php echo $string; ?>-nom" id='<?php echo $string; ?>-nom' maxlength="30" required>

    <label for="<?php echo $string; ?>-mdp">Mot de passe : </label>
    <input type="password" name="<?php echo $string; ?>-mdp" id='<?php echo $string; ?>-mdp' maxlength="30" required>

    <label for="<?php echo $string; ?>-idUser">N° étudiant : </label>
    <input type="number" name="<?php echo $string; ?>-idUser" id='<?php echo $string; ?>-idUser' maxlength="10"
    <?php 
        if (isset($_SESSION['personneConnectee'])){
            $prof = $_SESSION['personneConnectee'];
            $id = $prof['idUser'];
            echo "value='".$id."'"; 
        }
    ?> required>

    <label for="<?php echo $string; ?>-promo">Année : </label>
    <select name="<?php echo $string; ?>-promo" id="<?php echo $string; ?>-promo" required>
        <option value="">-- Promotion --</option>
        <option value="IMAC1">-- IMAC1 --</option>
        <option value="IMAC2">-- IMAC2 --</option>
        <option value="IMAC3">-- IMAC3 --</option>
    </select>

    <label for="<?php echo $string; ?>-discord">Mon Discord : </label>
    <input type="text" name="<?php echo $string; ?>-discord" id='<?php echo $string; ?>-discord' maxlength="100" required>

    <label for="<?php echo $string; ?>-presentation">Présentation : </label>
    <textarea name="<?php echo $string; ?>-presentation" id='<?php echo $string; ?>-presentation'></textarea required>

    <fieldset><legend>Mes domaines préférés : </legend>
    <?php 
        $categories = getAllCategories();
        foreach ($categories as $aCat) {
            $html = "<input type='checkbox' name='categorie[]' value='".$aCat['idCat']."' id='".$string.'-'.$aCat['idCat']."'";

            if (!empty($categSelected)) {
                foreach($categSelected as $CatSel) {
                    if ($CatSel['idCat'] == $aCat['idCat']) {
                        $html .= " checked";
                    }
                }
            }

            $html .=">";
            $html .= "<label for='".$aCat['idCat']."'>".$aCat['nomCat']."</label>";
            echo $html;
        }
    ?>
</fieldset>
