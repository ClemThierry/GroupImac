<?php 

$idUser='';
$nom='';
$prenom='';
$mdp='';
$promo='';
$discord='';
$presentation='';
$categSelected='';

if (isset($_SESSION['personneConnectee'])) {
    $profil = $_SESSION['personneConnectee'];
    $id = $profil['idUser'];

    $nom=$profil['nom'];
    $prenom=$profil['prenom'];
    $mdp=$profil['mdp'];
    $promo=$profil['promo'];
    $discord=$profil['discord'];
    $presentation=$profil['presentation'];
    $categSelected=getCategoriesByMember($id);
}

?>

<fieldset>
    <label for="add-prenom">Prénom : </label>
    <input type="text" name="prenom" id='add-prenom' maxlength="30" value="<?php echo $prenom; ?>" required>

    <label for="add-nom">Nom : </label>
    <input type="text" name="nom" id='add-nom' maxlength="30" value="<?php echo $nom; ?>" required>

    <label for="add-mdp">Mot de passe : </label>
    <input type="password" name="mdp" id='add-mdp' maxlength="30" value="<?php echo $mdp; ?>" required>

    <label for="add-nom">N° étudiant : </label>
    <input type="number" name="idUser" id='idUser' maxlength="10"
    <?php 
        if (isset($_SESSION['personneConnectee'])){
            echo "value='".$id."'"; 
            echo "disabled='disabled'";
        }
    ?> required>

    <label for="promo">Année : </label>
    <select name="promo" id="promo" required>
        <option value="">-- Promotion --</option>
        <?php 
            for($i=1; $i<=3;$i++) {
                $imac = "IMAC".$i;
                $html = "<option value='".$imac."'";
                if ($imac == $promo) {
                    $html .= " selected";
                }
                $html .= ">IMAC".$i."</option>";
                echo $html;
            }
        ?>
    </select>

    <label for="add-discord">Mon Discord : </label>
    <input type="text" name="discord" id='add-discord' maxlength="100" value="<?php echo $discord; ?>" required>

    <label for="add-presentation">Présentation : </label>
    <textarea name="presentation" id='add-presentation'><?php echo $presentation; ?></textarea required>

    <fieldset><legend>Mes domaines préférés : </legend>
    <?php 
        $categories = getAllCategories();
        foreach ($categories as $aCat) {
            $html = "<input type='checkbox' name='categorie[]' value='".$aCat['idCat']."' id='".$aCat['idCat']."'";

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


    <input type="submit" name="ajouter" id="ajouter">
</fieldset>