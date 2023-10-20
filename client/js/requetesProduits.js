let chargerProduits = () => {
    $.ajax({
        type: "POST",
        url: "routesProduits.php",
        data: { "action": "lister" },
        dataType: "json",
        success: (reponse) => {
            montrerVue("lister", reponse);
        },
        fail: (err) => {
            console.log(err);
        }
    })
}

let chargerCategories = () => {
    $.ajax({
        type: "POST",
        url: "routesProduits.php",
        data: { "action": "recupererCategories" },
        dataType: "json",
        success: (reponse) => {
            montrerVue("chargerCateg", reponse);
        },
        fail: (err) => {
            console.log(err);
        }
    })
}


//Houssam****************************************************

let chargerProduitsParCategorie = (categorie) => {
    $.ajax({
        type: "POST",
        url: "routesProduits.php",
        data: { "action": "rechercher", "categorie": categorie },
        dataType: "json",
        success: (reponse) => {
            montrerVue("lister", reponse);
        },
        fail: (err) => {
            console.log(err);
        }
    });
}


// Recherche par nom ou ingrédients
let rechercheParMotCle = () => {
    let motCle = $("#rechercheMotCle").val();
    $.ajax({
        type: "POST",
        url: "routesProduits.php",
        data: { "action": "rechercherParMotCle", "motCle": motCle },
        dataType: "json",
        success: (reponse) => {
            montrerVue("lister", reponse);
        },
        fail: (err) => {
            console.log(err);
        }
    });
}


let rechercheCategorie = () => {
    let selectedCategorie = $("#floatingSelect").val();
    $.ajax({
        type: "POST",
        url: "routesProduits.php",
        data: {
            "action": "rechercherParCategorie",
            "categorie": selectedCategorie  // Nouvelle propriété pour la catégorie
        },
        dataType: "json",
        success: (reponse) => {
            montrerVue("lister", reponse);
        },
        fail: (err) => {
            console.log(err);
        }
    });
}

// enlever categorie et focus mot cle

let effectuerRecherche = () => {
    let motCle = $("#rechercheMotCle").val();

    if (motCle !== "") {
        rechercheParMotCle();
    }
}


//********************************************

//implémenter la fonction affichermessage*****
let montrerVue = (action, donnees) => {
    msgErr = "Problème côté serveur. Essayez plus tard!";
    switch (action) {
        case "enregistrer":
            if (donnees.OK) {
                modalAjoutProduit();
            } else {
                afficherMessage(msgErr);
            }
        case "modifier":
        case "enlever":
            if (donnees.OK) {
                afficherMessage(donnees.msg);
            } else {
                console.log(donnees.OK);
                console.log(donnees.msg);
                afficherMessage(msgErr);
            }
            break;
        case "lister":
            if (donnees.OK) {
                listerProduits(donnees.listeProduits);
            } else {
                afficherMessage(msgErr);
            }
            break;
        case "chargerCateg":
            if (donnees.OK) {
                genererCategories(donnees.listeCategories);
            } else {
                afficherMessage(msgErr);
            }
    }
}

const genererCategories = (liste) => {
    document.getElementById('floatingSelect').innerHTML = "";
    let resultat = ""
    resultat += `<option value="All">Toutes</option>`;
    for (let i = 0; i < liste.length; i++) {
        let unGenre = liste[i];
        resultat += '<option value="' + unGenre.categorie + '">' + unGenre.categorie + '</option>';
    }
    document.getElementById('floatingSelect').innerHTML += resultat;
}


let remplirCard = (unProduit) => {
    lienImage = chargerImage(unProduit.photo);
    let rep = '<div class="card card-adminP">';
    rep += '<div class="img-adminP">';// class="col-md-4"
    rep += '<img src="' + lienImage + '" class="img-fluid rounded-start" alt="...">';
    rep += '</div>';

    rep += '<div class="corps-adminP"><h5 class="card-title">' + unProduit.IdP + ' ' + unProduit.nom + '</h5>';
    rep += '<p class="">' + unProduit.ingredients + '</p></div>';
    //rep +='<p class="card-text"><small class="text-body-secondary">'+unProduit.categorie+'</small></p></div>';
    rep += '<div class="boutons-adminP"><a href="#" class="btn btn-primary">Modifier</a>';
    rep += '<a href="#" onClick="supprimerProduit(this,unProduit.idP);" class="btn btn-danger">Supprimer</a></div>';

    rep += '</div>';
    return rep;
}

let listerProduits = (listeProduits) => {
    let contenu = `<div class="row row-cols-4">`;
    for (let unProduit of listeProduits) {
        contenu += remplirCard(unProduit);
    }
    contenu += `</div>`;
    document.getElementById('contenuProduits').innerHTML = contenu;
}

function chargerImage(image) {
    lien = '../../client/images/produits/' + image;
    lienND = 'client/images/produits/visuel-non-disponible.jpg';
    return lien;
    // if (image != ""){
    // 	if (lien.exists()){
    // 		return lien;
    // 	}else {
    // 		return lienND;
    // 	}
    // } else {
    // 	return lienND;
    // }
}

const requeteEnregistrer = () => {
    let formProduit = new FormData(document.getElementById('formAjoutProduit'));
    let categorie = document.getElementById('categorie').options[document.getElementById('categorie').selectedIndex].value;
    formProduit.append('categorie', categorie);
    formProduit.append('action', 'enregistrer');
    $.ajax({
        type: 'POST',
        url: 'routesProduits.php',
        data: formProduit,
        contentType: false,
        processData: false,
        dataType: 'text',
        async: false,
        success: function (reponse) {
            console.log(reponse);
            montrerVue("enregistrer", reponse);
        },
        fail: function (err) {
            console.log(err);
        }
    });
}
