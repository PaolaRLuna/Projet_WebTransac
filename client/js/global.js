
function initialisation() {
    switchLike();
    qtePlus();
    qteMoins();
}


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