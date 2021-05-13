function initialisation() {
    
    document.querySelector("input").addEventListener("click", function() {
        news(document.querySelector("select").value);
    });

}

function news(pays) {

    window.scrollTo(0, 0);

    document.querySelector("#back").removeAttribute("class", "off");
    document.querySelector("#ajouter_un_projet").removeAttribute("class", "off");
    document.querySelector("#en_savoir_plus").removeAttribute("class", "off");
    document.querySelector("#se_connecter").removeAttribute("class", "off");

    document.querySelector("#back").addEventListener("click", fermer);
    
}

function fermer() {
    document.querySelector("#back").setAttribute("class", "off");
    document.querySelector("#ajouter_un_projet").setAttribute("class", "off");
    document.querySelector("#en_savoir_plus").setAttribute("class", "off");
    document.querySelector("#se_connecter").setAttribute("class", "off");
}
