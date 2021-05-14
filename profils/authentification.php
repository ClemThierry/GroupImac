<?php
include_once "../functions/profils.php";
if(isset($_POST['envoyer']) && !empty($_POST['id']) && !empty($_POST['nom'])){
    if (getMemberByIdAndMdp($_POST['id'],$_POST['nom']) != false) {
        session_start();
        $_SESSION['personneConnectee']=getMemberById($_POST['id']);
        Header('Location:../index.php');  
    }
}else{
    Header('Location:connexion.php'); 
}
?>