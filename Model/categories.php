<?php 
include_once "connexionbdd.php";

function getAllCategories() {
    $cnx = connection();
    $result = $cnx->query("SELECT * FROM categorie");
    return $result->fetchall();
}

/* ====== Catégories & projet ====== */ 

function getCategoriesByProject($idProject) {
    $cnx = connection();
    $rqt = $cnx->prepare('SELECT * FROM categorie JOIN projet_cat ON projet_cat.refCat = categorie.idCat AND projet_cat.refProjet = ?');
    $rqt->execute(array($idProject));
    return $rqt->fetchAll();
}

function addCategorieToProject($idProject, $idCat) {
    $cnx = connection();
    $rqt = $cnx->prepare('INSERT INTO projet_cat (RefProjet, RefCat) VALUES (?,?)');
    foreach ($idCat as $value) {
        $rqt->execute(array($idProject, $value));
    }    
    return getAllCategories();
}

function deleteCategorieFromProject($idProject) {
    $co = connection();
    $req = $co->prepare('DELETE c FROM projet p INNER JOIN projet_cat c ON (c.refProjet = p.idProjet) WHERE p.idProjet=?');
    return $req->execute(array($idProject));
}

/* ====== Catégories & utilisateur ====== */ 

function getCategoriesByMember($idMember) {
    $cnx = connection();
    $rqt = $cnx->prepare('SELECT * FROM categorie JOIN user_cat ON user_cat.refCat = categorie.idCat AND user_cat.refUser = ?');
    $rqt->execute(array($idMember));
    return $rqt->fetchAll();
}

function addCategorieToMember($idMember, $idCat) {
    $cnx = connection();
    $rqt = $cnx->prepare('INSERT INTO user_cat (RefUser, RefCat) VALUES (?,?)');
    foreach ($idCat as $value) {
        $rqt->execute(array($idMember, $value));
    }
    return getAllCategories();
}

function deleteCategorieFromMember($idMember) {
    $co = connection();
    $req = $co->prepare('DELETE c FROM utilisateur u INNER JOIN user_cat c ON (c.refUser = u.idUser) WHERE u.idUser=?');
    return $req->execute(array($idMember));
}