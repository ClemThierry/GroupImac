<?php		
  include_once "./Model/profils.php";
  include_once "./Model/comments.php";
  include_once "./Model/projets.php";

	/* ========== PROFILS ========== */

// récupérer tous les profils 
function getProfils() {
  return json_encode(getAllMembers());
}

// récupérer un seul projet avec son id
function getAProfilByID($id) {
    $profil['member'] = getMemberById($id);
    $profil['categories'] = getCategoriesByMember($id);
    return json_encode($profil);
}

// ajouter un profil
function addAProfil($form) {
    $profil = json_decode($form, true);
    return json_encode(addMember($profil['idUser'], $profil['nom'], $profil['prenom'], $profil['mdp'], $profil['promo'], $profil['discord'], $profil['presentation'])); 
}

// ajouter catégorie au profil 
function addCatToProfil($form) {
    $profil = json_decode($form, true);
    $cats = $profil['categories'];
    return json_encode(addCategorieToMember($profil['idUser'], $cats)); 
}

// modifier un profil 
function updateAProfil($form, $id) {
    $profil = json_decode($form, true);
    return json_encode(updateMember($id, $profil['nom'], $profil['prenom'], $profil['mdp'], $profil['promo'], $profil['discord'], $profil['presentation']));
}


function deleteCatFromProfil($id) {
    return json_encode(deleteCategorieFromMember($id)); 
}

function deleteAProfil($id) {
    $profil = getMemberById($id);
    $projets = getProjectByMember($id); 

    foreach($projets as $projet) {
        deleteCommentFromProjet($projet['idProjet']);
        deleteCategorieFromProject($projet['idProjet']);
    }

    deleteCommentByMember($id);
    deleteCategorieFromMember($id);
    deleteProjectByMember($id); 
    return json_encode(deleteMember($id));
}
?>