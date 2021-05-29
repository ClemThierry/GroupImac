<fieldset>
    <legend>Ajouter ...</legend>
    
    <label for="<?php echo $string; ?>-refUser">N° Etudiant : *</label>
    <input type="number" 
    name="<?php echo $string; ?>-refUser" 
    id='<?php echo $string; ?>-refUser' 
    
    <?php 
        if (isset($_SESSION['personneConnectee'])){
            $prof = $_SESSION['personneConnectee'];
            $id = $prof['idUser'];
            echo "value='".$id."'"; 
        }
        if ($string == "updateCom") {echo "disabled";} 
    ?> 
    required>
    
    <label for="<?php echo $string; ?>-message">Message : *</label>
    <textarea name="<?php echo $string; ?>-message" id='<?php echo $string; ?>-message' required></textarea>
</fieldset>