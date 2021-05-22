
/* --------------------------------------------- */ 
/* ---------------- LES PROJETS ---------------- */ 
/* --------------------------------------------- */ 


/* -------------- REQUETES & JSON -------------- */

document.ready( () => {
	hideDiv('oneProjet');
	hideDiv('addProjet');
	hideDiv('viewProjet');
	hideDiv('updateProjet');

	// tous les projets 
	fetch("../router.php/projets", {  method: 'GET'})
		.then( response => response.json() )
		.then( data => {
			displayProjet(data);
		})
		.catch(error => { console.log(error) });
});

function voirProjet(id) {
	showDiv("oneProjet");
	showDiv("viewProjet");
	hideDiv('updateProjet');
	hideDiv('addProjet');
	hideDiv('upComment');

	// get un seul projet 
	fetch("../router.php/projet/" + id, { method: 'GET'})
		.then(response => response.json())
		.then (data =>{
			displayOneProjet(data);
		})
		.catch(error => { console.log(error) });
}

// récupère le projet à modifier
function recupProjetToUpdate(id) {
	hideDiv("viewProjet");
	showDiv("updateProjet");

	fetch("../router.php/projet/" + id, { method: 'GET'})
	.then(response => response.json())
	.then (data =>{
		displayProjetToUpdate(data);
	})
	.catch(error => { console.log(error) });
}

document.getElementById('publish').onclick = event => {
	event.preventDefault();
	form = recupForm("input");
	// post du projet 
	fetch('../router.php/projets', { method: 'POST', body: JSON.stringify(form)})    
	.then(response => response.json())
    .then (data =>{
		displayProjet(data);
	})
	.catch(error => { console.log(error) });
	hideDiv("addProjet");
}

function modifProjet(id) {
	event.preventDefault();
    form = recupForm("update");

	// update du projet 
	fetch('../router.php/projet/' + id, { method: 'UPDATE', body: JSON.stringify(form)})    
	.then(response => response.json())
    .then (data =>{
			displayProjet(data);
	})
	.catch(error => { console.log(error) });
	hideDiv("updateProjet");
	hideDiv('oneProjet');  
}

function removeProjet(id) {
	fetch("../router.php/projet/" + id, { method: 'DELETE'})
	.then(response => response.json())
	.then (data =>{
		displayProjet(data);
	})
	.catch(error => { console.log(error) });
	hideDiv('oneProjet');
}

/* ----------------- AFFICHAGE ----------------- */

// tous les projets
function displayProjet(projets) {
	const list = document.getElementById('allProjets');
	let content = "";
	projets.forEach(function (projet) {
		content += "<div class='oneProject' onclick='voirProjet(\""+ projet.idProjet +"\")'>";
		content += "<h2>"+ projet.titre + "</h2>";
		content += "</div>";
	});
	list.innerHTML = content;
}

// un seul projet 
function displayOneProjet(projet) {
	let proj = projet.projet;
	let comments = projet.comments;
	let categ = projet.categories;

	document.getElementById('titre').innerHTML = proj.titre;
	document.getElementById('datePubli').innerHTML = proj.datePubli;
	document.getElementById('desc').innerHTML = proj.presentation;
	document.getElementById('deadline').innerHTML = proj.deadline;
	document.getElementById('cadre').innerHTML = proj.cadre;
	document.getElementById("buttons").innerHTML = "<button id='upProjet'  onclick='recupProjetToUpdate(\""+ proj.idProjet +"\")'>Modifier le projet</button><button id='delProjet' onclick='removeProjet(\""+ proj.idProjet +"\")'>Supprimer le projet</button>";
	document.getElementById('publishComment').setAttribute("onclick", "ajoutComment("+proj.idProjet+")");
	
	displayProjetComments(comments, proj.idProjet);
	displayProjetCat(categ);
}

function displayProjetComments(comments, idProjet) {
	const list = document.getElementById('viewComments');
	let content = "";
	comments.forEach(function (comment) {
		content += "<div class='oneComment'>";
		content += "<p>Par "+ comment.idUser + ", le " + comment.dateComment + "</p>"; // pour l'instant : remplacer par le nom du user ensuite
		content += "<p>"+ comment.message + "</p>";
		content += "<button id='modifComment' onclick='recupComToUpdate(\""+ comment.idComment +", "+ idProjet +"\")'>Modifier</button>";
		content += "<button id='delComment' onclick='delComment(\""+ comment.idComment +"\")'>Supprimer</button>";
		content += "</div>";
	});
	list.innerHTML = content;
}

function displayProjetCat(categories) {
	const list = document.getElementById('viewCateg');
	let content = "<p>Catégorie(s) : | ";
	categories.forEach(function (categ) {
		content += categ.nomCat+" | ";
	});
	content += "</p>";
	list.innerHTML = content;
}

// données projet à modifier 
function displayProjetToUpdate(projet) {
	console.log(projet);
	let proj = projet.projet;
	let categ = projet.categories;

	document.getElementById('update-titre').value = proj.titre;
	document.getElementById('update-presentation').value = proj.presentation;	
	document.getElementById('update-deadline').value = proj.deadline;	
	document.getElementById('update-cadre').value = proj.cadre;	
	document.getElementById('update-idUser').value = proj.RefAuteurProjet;
	document.getElementById('modifier').setAttribute("onclick", "modifProjet("+proj.idProjet+")");

	categ.forEach(function (cat) {
		document.getElementById('update-'+cat[0]).checked = true;
	});
}

function recupForm(string) {
    const form = {};
	form.titre = document.getElementById(string + '-titre').value;
	form.presentation = document.getElementById(string + '-presentation').value;
	form.deadline = document.getElementById(string + '-deadline').value;
	form.cadre = document.getElementById(string + '-cadre').value;
	form.idUser = document.getElementById(string + '-idUser').value;
	form.categories = {};
	let cont = 0;
	for (let i = 1; i <= 8; i++) {
		if (document.getElementById(string+'-'+i).checked === true) {
			form.categories[cont] = document.getElementById(string+'-'+i).value;
			cont++;
		}
	}
	return form;
}



/* --------------------------------------------- */ 
/* -------------- LES COMMENTAIRES ------------- */ 
/* --------------------------------------------- */ 


/* -------------- REQUETES & JSON -------------- */

function ajoutComment(idProjet) {
	event.preventDefault();
	form = recupCom("inputCom", idProjet);

	// post du commentaire 
	fetch('../router.php/comments', { method: 'POST', body: JSON.stringify(form)})    
	.then(response => response.json())
    .then (data =>{
		displayProjetComments(data);
	})
	.catch(error => { console.log(error) });
}

function delComment(id) {
	event.preventDefault();
	fetch("../router.php/comment/" + id, { method: 'DELETE'})
	.then(response => response.json())
	.then (data =>{
		displayProjetComments(data);
	})
	.catch(error => { console.log(error) });
}

// récupère le projet à modifier
function recupComToUpdate(id) {
	showDiv('upComment');

	fetch("../router.php/comment/" + id, { method: 'GET'})
	.then(response => response.json())
	.then (data =>{
		displayComToUpdate(data);
	})
	.catch(error => { console.log(error) });
}

function modifComment(id, idProj) {
	event.preventDefault();
    form = recupCom("updateCom", idProj);

	// update du projet 
	fetch('../router.php/comment/' + id, { method: 'UPDATE', body: JSON.stringify(form)})    
	.then(response => response.json())
    .then (data =>{
			displayProjetComments(data);
	})
	.catch(error => { console.log(error) });

	hideDiv("updateProjet");
	showDiv("viewProjet");

}

/* ------------- RECUP & AFFICHAGE ------------- */

function recupCom(string, idProjet) {
    const form = {};
	form.refUser = document.getElementById(string + '-refUser').value;
	form.message = document.getElementById(string + '-message').value;
	form.refProjet = idProjet;
	return form;
}

function displayComToUpdate(comment) {
	document.getElementById('updateCom-refUser').value = comment.RefUser;
	document.getElementById('updateCom-message').value = comment.message;
	document.getElementById('publishModifComment').setAttribute("onclick", "modifComment('"+comment.idComment+"','"+comment.RefProjet+"')");
}