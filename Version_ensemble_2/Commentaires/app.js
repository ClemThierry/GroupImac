/* ============== NE PAS TOUCHER ============== */ 

Document.prototype.ready = callback => {
  if(callback && typeof callback === 'function') {
    document.addEventListener("DOMContentLoaded", () =>  {
      if(document.readyState === "interactive" || document.readyState === "complete") {
        return callback();
      }
    });
  }
};

/* ============== AFFICHER TOUS LES PROJETS ============== */ 

// global
let projet_id = 4;

// Ce qu'on voit au lancement de la page projet  
document.ready(() => {

  // trouve sur stackoverflow issue 901115
  const urlParams = new URLSearchParams(window.location.search);
  projet_id = urlParams.get("projet");

  fetch(`/projets/router.php/projet/${projet_id}`)
  .then((rep) => rep.json())
  .then((projet) => {
    let content =
    `
    <h1>Projet: ${projet.titre}</h1><br>
    <h3>Description:</h3>
    <p>${projet.presentation}</p>
    `;

    document.getElementById("projet").innerHTML = content;

    displayComments(projet_id);
  })
  .catch((e) => {
    document.getElementById("projet").innertHTML = `Error while loading project: ${e}`;
  });
});

function openCommentEdit(e) {
  let par = e.parentNode;
  let content = par.querySelector("p").innerHTML;
  let div = par.querySelector(".commentedit");
  div.querySelector("textarea").innerHTML = content;
  div.style.display = "block";
}

function submitChanges(e, id) {
  let par = e.parentNode;
  let content = par.querySelector("textarea").value;
  
  fetch(`/commentaires/router.php/commentaires/${id}`, { method: "PATCH", body: JSON.stringify({ message: content }) })
  .then((r) => {
    if (r.status < 400) {
      par.style.display = "none";
      displayComments();
    } else {
      throw Error("Response is not OK");
    }
  })
  .catch((e) => alert("Couldn't modify message"));
}

function cancelChanges(e) {
  e.parentNode.style.display = "none";
}

function removeComment(id) {
  fetch(`/commentaires/router.php/commentaires/${id}`, { method: 'DELETE' })
  .then((r) => {
    document.getElementById("commentaires").innerHTML = "";
    displayComments();
  });
}

function displayComments() {
  fetch(`/commentaires/router.php/commentaires?projet=${projet_id}`)
  .then((rep) => rep.json())
  .then((coms) => {
    let content = coms.reduce((acc, com) =>
      acc
      + `<div class="comment">
        <h3>${com.auteur.nom} ${com.auteur.prenom}</h3>
        <p>${com.message}</p>
        <button type="button" onclick="openCommentEdit(this)">Modifier</button>
        <button type="button" onclick="removeComment(${com.id})">Supprimer</button>
        <div class="commentedit" style="display:none">
          <textarea></textarea>
          <button type="button" onclick="submitChanges(this, ${com.id})">Envoyer</button>
          <button type="button" onclick="cancelChanges(this)">Annuler</button>
        </div>
      </div>`
    , "<h1>Commentaires</h1>");

    document.getElementById("commentaires").innerHTML = content;
  })
  .catch((e) => {
    document.getElementById("commentaires").innerHTML = `Error while loading comments: ${e}`;
  });
}

function sendNewComment(e) {
  let par = e.parentNode;
  let auteur  = par.querySelector("#leuser").value;
  let content = par.querySelector("textarea").value;
  let payload = {
    message: content,
    auteur: auteur,
    projet: projet_id
  };
  fetch(`/commentaires/router.php/commentaires`, { method: "POST", body: JSON.stringify(payload) })
  .then((r) => {
    if (r.status < 400) {
      par.querySelector("textarea").value = "";
      displayComments();
    } else {
      throw Error("Response is not ok");
    }
  })
  .catch((e) => alert("aie"));
}
