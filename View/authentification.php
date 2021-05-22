<?php
    include_once '../Model/profils.php';
    if(isset($_POST['connex']) && !empty($_POST['id']) && !empty($_POST['mdp'])) {
        if (getMemberByIdAndMdp($_POST['id'], $_POST['mdp']) != false) {
            session_start();
            $_SESSION['personneConnectee'] = getMemberById($_POST['id']);
        }
    }
Header('Location:./index.php');  
?>