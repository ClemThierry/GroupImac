<?php 

$titre='';
$presentation='';
$deadline='';
$cadre='';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $projet = getProjetByID($id);

    $titre=$projet['titre'];
    $presentation=$projet['presentation'];
    $deadline=$projet['deadline'];
    $cadre=$projet['cadre'];
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
        <option value="scolaire">scolaire</option>
        <option value="personnel">personnel</option>
        <option value="professionnel">professionnel</option>
    </select>

    
    <!-- Attention : cette partie n'a pas encore été implémentée -->
    <label for="jeRecherche">Je recherche *</label>
    <textarea name="jeRecherche" id='jeRecherche' required>Types de compétences et/ou points forts, séparés par des points-virgules (ex : montage; caméra; etc.) </textarea>

    <label for="input-membres">Membres du groupe *</label>
    <textarea name="membres" id='membres' required>Membres actuels du groupe, séparés par des points-virgules (ex : Prénom Nom; Prénom Nom;...) </textarea>
    <!-- Attention : jusqu'ici, cette partie n'a pas encore été implémentée -->   

    <input type="submit" name='publier' id="publier">
</fieldset>