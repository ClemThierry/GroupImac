Document.prototype.ready = callback => {
	if(callback && typeof callback === 'function') {
		document.addEventListener("DOMContentLoaded", () =>  {
			if(document.readyState === "interactive" || document.readyState === "complete") {
				return callback();
			}
		});
	}
};


/* --------------------------------------------- */ 
/* ------------- FONCTIONS ANNEXES ------------- */ 
/* --------------------------------------------- */ 

// afficher une div 
function showDiv(id) {document.getElementById(id).style.display = 'block';}
function hideDiv(id) {document.getElementById(id).style.display = 'none';}
