
document.ready( () => {
	fetch("../router.php/profil/" + id, {  method: 'GET'})
		.then( response => response.json() )
		.then( data => {
			displayProfils(data);
		})
		.catch(error => { console.log(error) });
});
