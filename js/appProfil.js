/* ====== AJOUTER UN PROFIL ====== */

document.getElementById('inscription').onclick = event => {
	event.preventDefault();
	form = recupProfil("add");

	// post du projet 
	fetch('../router.php/profils', { method: 'POST', body: JSON.stringify(form)})    
	.then(response => response.json())
    .then (data =>{
		//displayProjet(data);
        console.log('profil ajouté');
	})
	.catch(error => { console.log(error) });
}

// récup données du profil depuis un formulaire
function recupProfil(string) {
    const form = {};
	form.prenom = document.getElementById(string + '-prenom').value;
	form.nom = document.getElementById(string + '-nom').value;
	form.mdp = document.getElementById(string + '-mdp').value;
	form.promo = document.getElementById(string + '-promo').value;
	form.idUser = document.getElementById(string + '-idUser').value;
	form.discord = document.getElementById(string + '-discord').value;
	form.presentation = document.getElementById(string + '-presentation').value;
	form.categories = {};
	let cont = 0;
	for (let i = 1; i <= 8; i++) {
		if (document.getElementById(string+'-'+i).checked === true) {
			form.categories[cont] = document.getElementById(string+'-'+i).value;
			cont++;
		}
	}
	console.log(form.categories);
	return form;
}

/* ====== AFFICHER TOUS LES PROFILS ====== */

// lancer requête de récupération des profils + appel affichage 
document.ready( () => {
	hideDiv("viewProfil");
	hideDiv("oneProfil");
	// tous les profils 
	fetch("../router.php/profils", {  method: 'GET'})
		.then( response => response.json() )
		.then( data => {
			displayProfils(data);
		})
		.catch(error => { console.log(error) });
});

// fonction affichage des profils 
function displayProfils(profils) {
	const list = document.getElementById('allProfils');
	let content = "";
	profils.forEach(function (profil) {
		content += "<div class='oneProject' onclick='openProfil(\""+ profil.idUser +"\")'>";
		content += "<h2>"+ profil.prenom + " "+profil.prenom+"</h2>";
		content += "</div>";
	});
	list.innerHTML = content;
}

/* ====== AFFICHER UN PROFIL ====== */

// avoir un seul profil 
function openProfil(id) {
	showDiv("oneProfil");
	showDiv("viewProfil");
	
	if (document.getElementById("prez")) {
		showDiv("prez");
    	hideDiv('updateProfil');
	}

	// get un seul projet 
	fetch("../router.php/profil/" + id, { method: 'GET'})
		.then(response => response.json())
		.then (data =>{
			displayOneProfil(data);
			console.log(data);
		})
		.catch(error => { console.log(error) });
}

// fonction d'affichage d'un seul profil 
function displayOneProfil(profil) {
	let prof = profil['member'];
	let categ = profil['categories'];
	document.getElementById('prenomNom').innerHTML = prof.prenom + " " + prof.nom;
	document.getElementById('promo').innerHTML = prof.promo;
	document.getElementById('numero').innerHTML = prof.idUser;
	document.getElementById('discord').innerHTML = prof.discord;
	document.getElementById('presentation').innerHTML = prof.presentation;
	displayProfilCat(categ, prof.idUser);
}

function displayProfilCat(categories) {
	const list = document.getElementById('viewCateg');
	let content = "<p>Catégories : | ";
	categories.forEach(function (categ) {
		content += categ.nomCat+" | ";
	});
	content += "</p>";
	list.innerHTML = content;
}

/* ====== SUPPRIMER UN PROFIL ====== */

function deleteProfil(id) {
	event.preventDefault();
	fetch("../router.php/profil/" + id, { method: 'DELETE'})
	.then(response => response.json())
	.catch(error => { console.log(error) });
    document.location.href="./index.php";
}

/* ====== MODIFIER UN PROFIL ====== */

// ouvrir profil à modifier
function openUpdateProfil(id) {
    showDiv('updateProfil');
	hideDiv("prez");

	fetch("../router.php/profil/" + id, { method: 'GET'})
	.then(response => response.json())
	.then (data =>{
		displayProfilToUpdate(data);
		console.log(data);
	})
	.catch(error => { console.log(error) });
}

// affichage des infos du profil à modifier 
function displayProfilToUpdate(profil) {
	let prof = profil['member'];
	let categ = profil['categories'];

	document.getElementById('updateProfil-nom').value = prof.nom;
	document.getElementById('updateProfil-prenom').value = prof.prenom;
	document.getElementById('updateProfil-promo').value = prof.promo;
	document.getElementById('updateProfil-mdp').value = prof.mdp;
	document.getElementById('updateProfil-idUser').value = prof.idUser;
	document.getElementById('updateProfil-discord').value = prof.discord;
	document.getElementById('updateProfil-presentation').value = prof.presentation;

	categ.forEach(function (cat) {
		document.getElementById('updateProfil-'+cat[0]).checked = true;
	});
}

// envoyer les modifications du profil 
function updateProfil(id) {
	form = recupProfil("updateProfil");

	fetch("../router.php/profil/" + id, { method: 'UPDATE', body: JSON.stringify(form)})
	.then(response => response.json())
	.catch(error => { console.log(error) });

	hideDiv("updateProfil");
	showDiv("prez");
}
