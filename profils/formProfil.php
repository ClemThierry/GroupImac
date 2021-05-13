<?php 

$idUser='';
$nom='';
$prenom='';
$promo='';
$discord='';
$presentation='';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $profil = getMemberById($id);

    $nom=$profil['nom'];
    $prenom=$profil['prenom'];
    $promo=$profil['promo'];
    $discord=$profil['discord'];
    $presentation=$profil['presentation'];
}

?>

<fieldset>
    <label for="add-prenom">Prénom : </label>
    <input type="text" name="prenom" id='add-prenom' maxlength="30" value="<?php echo $prenom; ?>">

    <label for="add-nom">Nom : </label>
    <input type="text" name="nom" id='add-nom' maxlength="30" value="<?php echo $nom; ?>">

    <label for="add-nom">N° étudiant : </label>
    <input type="number" name="idUser" id='idUser' maxlength="10"
    <?php 
        if (isset($_GET['id'])){
            echo "value='".$id."'"; 
            echo "disabled='disabled'";
        }
    ?>>

    <!-- à automatiser -->
    <label for="promo">Année : </label>
    <select name="promo" id="promo">
        <option value="">-- Promotion --</option>
        <option value="IMAC1">IMAC1</option>
        <option value="IMAC2">IMAC2</option>
        <option value="IMAC3">IMAC3</option>
    </select>

    <label for="add-discord">Mon Discord : </label>
    <input type="text" name="discord" id='add-discord' maxlength="100" value="<?php echo $discord; ?>">

    <label for="add-presentation">Présentation : </label>
    <textarea name="presentation" id='add-presentation'><?php echo $presentation; ?></textarea>

    <input type="submit" name="ajouter" id="ajouter">
</fieldset>