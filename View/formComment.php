<fieldset>
    <legend>Ajouter ...</legend>
    
    <label for="<?php echo $string; ?>-refUser">N° Etudiant : *</label>
    <input type="number" 
    name="<?php echo $string; ?>-refUser" 
    id='<?php echo $string; ?>-refUser' required 
    <?php if ($string == "updateCom") {echo "disabled";} ?>>
    
    <label for="<?php echo $string; ?>-message">Message : *</label>
    <textarea name="<?php echo $string; ?>-message" id='<?php echo $string; ?>-message' required></textarea>
</fieldset>