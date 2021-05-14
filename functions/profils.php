<?php 

include_once "connexion.php";

function getAllMembers() {
    $cnx = connection();
    $result = $cnx->query('select * from utilisateur');
    return $result->fetchall();
}

function getMemberById($id) {
    $cnx = connection();
    $rqt = $cnx->prepare('SELECT * FROM utilisateur WHERE idUser=?');
    $rqt->execute(array($id));
    return $rqt->fetch();
}

function getMemberOfProjet($idProjet){
    $cnx = connection();
    $rqt = $cnx->prepare('SELECT * FROM utilisateur INNER JOIN participe ON utilisateur.idUser = participe.RefUser INNER JOIN projet ON projet.idProjet = participe.RefProjet WHERE projet.idProjet = ?');
    $rqt->execute(array($idProjet));
    return $rqt->fetch();
}

function getProjectByMember($idMember){
    $cnx = connection();
    $rqt = $cnx->prepare('SELECT * FROM projet WHERE projet.refAuteurProjet = ?');
    $rqt->execute(array($idMember));
    return $rqt->fetchAll();
}

function getCommentByMember($idMember){
    $cnx = connection();
    $rqt = $cnx->prepare('SELECT * FROM commentaire WHERE refUser = ?');
    $rqt->execute(array($idMember));
    return $rqt->fetchAll();
}

function addMember($numEtud, $nom, $prenom, $promo, $discord, $presentation) {
    $cnx = connection();
    $rqt = $cnx->prepare('INSERT into utilisateur(idUser, nom,prenom,promo,discord,presentation) values(?,?,?,?,?,?)');
    $rqt->execute(array($numEtud, $nom, $prenom, $promo, $discord, $presentation));
    return getAllMembers();
}

function deleteMember($id){
    $cnx = connection();
    $rqt = $cnx->prepare('DELETE FROM utilisateur WHERE idUser=?');
    $rqt->execute(array($id));
    return getAllMembers();
}

function deleteProjectByMember($idMember){
    $cnx = connection();
    $rqt = $cnx->prepare('DELETE FROM projet WHERE RefAuteurProjet=?');
    $rqt->execute(array($idMember));
    return getAllMembers();
}

function deleteCommentByMember($idMember){
    $cnx = connection();
    $rqt = $cnx->prepare('DELETE FROM commentaire WHERE RefUser=?');
    $rqt->execute(array($idMember));
    return getAllMembers();
}

function updateMember($id, $nom, $prenom, $promo, $discord, $presentation){
    $cnx = connection();
    $rqt = $cnx->prepare("UPDATE utilisateur SET nom=?, prenom=?, promo=?, discord=?, presentation=? WHERE idUser=?");
    $rqt->execute(array($nom, $prenom, $promo, $discord, $presentation, $id));
    return getMemberByID($id);
}
?>