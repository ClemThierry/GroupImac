<?php 

$titre='';
$presentation='';
$deadline='';
$cadre='';
$idUser='';
$categSelected='';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $projet = getProjetByID($id);

    $titre=$projet['titre'];
    $presentation=$projet['presentation'];
    $deadline=$projet['deadline'];
    $cadre=$projet['cadre'];
    $idUser=$projet['RefAuteurProjet'];
    $categSelected=getCategoriesByProject($id);
}

?>

<fieldset>
    <legend>Ton projet</legend>

    <label for="titre">Titre du projet : *</label>
    <input type="text" name="titre" id='titre' <?php echo "value='".$titre."'"; ?> required>

    <label for="presentation">Présentation : *</label>
    <textarea name="presentation" id='presentation' required> <?php echo $presentation; ?></textarea>

    <label for="deadline">Deadline : *</label>
    <input type="date" id="deadline" name="deadline" <?php echo "value='".$deadline."'"; ?> required>

    <label for="cadre">Cadre : *</label>
    <select id="cadre" name= "cadre" required>
        <option value="">-- choisir un cadre --</option>
        <option value="scolaire" <?php if ($cadre == "scolaire") {echo " selected";} ?>>scolaire</option>
        <option value="personnel"<?php if ($cadre == "personnel") {echo " selected";} ?>>personnel</option>
        <option value="professionnel"<?php if ($cadre == "professionnel") {echo " selected";} ?>>professionnel</option>
    </select>

    <label for="add-nom">N° étudiant : *</label>
    <input type="number" name="idUser" id='idUser' maxlength="10"
    <?php 
        if (isset($_GET['id'])){
            echo "value='".$idUser."'"; 
            echo "disabled='disabled'";
        }
    ?> required>

    <fieldset><legend>Catégorie(s) : </legend>
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
    <input type="submit" name='publier' id="publier">
</fieldset>