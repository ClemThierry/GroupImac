<?php include_once "../Model/categories.php"; ?>

<fieldset>
    <legend>Ton projet</legend>
    <label for="<?php echo $string; ?>-titre">Titre du projet : *</label>
    <input type="text" name="<?php echo $string; ?>-titre" id='<?php echo $string; ?>-titre' required>

    <label for="<?php echo $string; ?>-presentation">Présentation : *</label>
    <textarea name="<?php echo $string; ?>-presentation" id='<?php echo $string; ?>-presentation' required></textarea>

    <label for="<?php echo $string; ?>-deadline">Deadline : *</label>
    <input type="date" id="<?php echo $string; ?>-deadline" name="<?php echo $string; ?>-deadline" required>

    <label for="<?php echo $string; ?>-cadre">Cadre : *</label>
    <select id="<?php echo $string; ?>-cadre" name= "<?php echo $string; ?>-cadre" required>
        <option value="">-- choisir un cadre --</option>
        <option value="scolaire">scolaire</option>
        <option value="personnel">personnel</option>
        <option value="professionnel">professionnel</option>
    </select>

    <label for="<?php echo $string; ?>-idUser">N° étudiant : *</label>
    <input type="number" name="<?php echo $string; ?>-idUser" id='<?php echo $string; ?>-idUser' maxlength="10" 
    <?php 
        if (isset($_SESSION['personneConnectee'])){
            $prof = $_SESSION['personneConnectee'];
            $id = $prof['idUser'];
            echo "value='".$id."'"; 
        }
        if ($string=="update") {echo "disabled";}         
    ?> required>

        <fieldset>
            <legend>Catégorie(s) : </legend>
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
</fieldset>