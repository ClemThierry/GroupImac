<?php 

$refUser='';
$message='';

// à revoir : risque de bug si idComment = idProjet 
if (isset($_GET['idComment'])) {
    $idComment = $_GET['idComment'];
    $comment = getCommentById($idComment);

    $refUser=$comment['RefUser'];
    $message=$comment['message'];
}
?>

<fieldset>
    <label for="refUser">N° Etudiant : *</label>
    <input type="number" name="refUser" id='refUser' <?php echo "value='".$refUser."'"; ?> required    
    <?php 
        if (isset($_GET['idComment'])){
            echo "value='".$id."'"; 
            echo "disabled='disabled'";
        }
    ?>>
    <label for="message">Message : *</label>
    <textarea name="message" id='message' required> <?php echo $message; ?></textarea>

    <input type="submit" name='sendComment' id="sendComment">
</fieldset>