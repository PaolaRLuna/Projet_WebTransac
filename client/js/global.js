
function initialisation() { // des fonctions propres au panier et aux favoris
    switchLike();
    qtePlus();
    qteMoins();
}

// bouton pour ajouter/enlever aux favoris
function switchLike() {
    let listeFavoris = document.getElementsByClassName("etat-like");
    for (let i=0; i<listeFavoris.length; i++) {
        listeFavoris[i].addEventListener("click", () => {
            if (listeFavoris[i].src.match(/^.*notlike.png$/)) {
                listeFavoris[i].setAttribute("src", 'client/images/general/like.png');
                // éventuellement lier au membre
            } else {
                listeFavoris[i].setAttribute("src", 'client/images/general/notlike.png');
            }
        })
    }
}

// quantité à ajouter au panie, bouton + ou - pour le nombre d'articles souhaités
function qtePlus() {
    let listePlus = document.getElementsByClassName("plus");
    for (let i=0; i<listePlus.length; i++) {
        listePlus[i].addEventListener("click", () => {
            let parentNode = listePlus[i].parentNode;
            let nodeQte = parentNode.previousElementSibling.firstChild;
            let qte = parseInt(nodeQte.innerHTML);
            let nouvQte = qte + 1;
            nodeQte.setHTML(nouvQte);
        })
    }
}

function qteMoins() {
    let listeMoins = document.getElementsByClassName("moins");
    for (let i=0; i<listeMoins.length; i++) {
        listeMoins[i].addEventListener("click", () => {
            let parentNode = listeMoins[i].parentNode;
            let nodeQte = parentNode.nextElementSibling.firstChild;
            let qte = parseInt(nodeQte.innerHTML);
            let nouvQte = qte - 1;
            if (nouvQte < 1) {
                alert("Attention, la quantité doit être minimalement de 1 unité")
            } else {
                nodeQte.setHTML(nouvQte);
            }
        })
    }
}

// afficher carte de localisation
const montrerCarte= () => {
    document.getElementById('carteForm').innerHTML = modalCarte();

    const carte = new bootstrap.Modal('#montrerCarte', {
   });
   carte.show();
}


const modalCarte = () => {
    return `<div class="modal fade modal-lg" id="montrerCarte" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    
                        <div class="modal-header">
                            <h1 id="titre-carte">Plan de localisation</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11179.379231841116!2d-73.62031518344403!3d45.533328468249444!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc9196d14bf06b7%3A0x6a6f8db96da6f3f0!2sPetite%20Italie%2C%20Montr%C3%A9al%2C%20QC!5e0!3m2!1sfr!2sca!4v1695139534811!5m2!1sfr!2sca" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                       </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>`;
}

// changer le header du site selon la connexion
const switchHeader= (role) => {
    if (role === "M") {
        let switch1 = document.getElementById('optionHeader1'); 
        let switch2 = document.getElementById('optionHeader2'); 
        switch1.setAttribute("href","#");
        switch1.innerHTML = "Profil";
        switch2.setAttribute("href","javascript:document.getElementById('formDec').submit();");
        switch2.innerHTML = "Déconnexion";
    } else if (role === "A") {
        let switch1 = document.getElementById('optionHeader1'); 
        let switch2 = document.getElementById('optionHeader2'); 
        switch1.setAttribute("href","#");
        switch1.innerHTML = "Gérer";
        switch2.setAttribute("href","javascript:document.getElementById('formDec').submit();");
        switch2.innerHTML = "Déconnexion";
    }

}

// Validation mot de passe pendant l'enregistrement
let validerFormEnreg = () => {
    let etat = true;
    const regExpPass = new RegExp('^[A-Za-z0-9_\$#\-]{8,10}$');
    const mdp = document.getElementById('password').value;
    const mdpc = document.getElementById('cpassword').value;
    if(mdp !== mdpc){
        etat = false;
        document.getElementById('msgPass').innerHTML = "Mots de passe ne sont pas égaux !";
        setInterval(() => {
            document.getElementById('msgPass').innerHTML = "";
        },3000);
    } else {//OK, égaux
        if(!regExpPass.test(mdp)){
              etat = false;
             document.getElementById('msgPass').innerHTML = "Mot de passe non conforme";
        }
    }
    return etat;
}

