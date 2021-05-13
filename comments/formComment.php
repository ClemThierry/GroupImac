<?php 

$refUser='';
$message='';

// à revoir : risque de bug si idComment = idProjet 
if (getCommentById($id)) {
    $id = $_GET['id'];
    $comment = getCommentById($id);

    $refUser=$comment['RefUser'];
    $message=$comment['message'];

}


?>

<fieldset>
    <label for="refUser">Utilisateur : *</label>
    <input type="text" name="refUser" id='refUser' <?php echo "value='".$refUser."'"; ?> required>

    <label for="message">Message : *</label>
    <textarea name="message" id='message' required> <?php echo $message; ?></textarea>

    <input type="submit" name='sendComment' id="sendComment">
</fieldset>