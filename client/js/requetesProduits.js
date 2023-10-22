let chargerProduits = () => {
    $.ajax({
        type : "POST",
        url  : "routesProduits.php",
        data : {"action":"lister"},
        dataType : "json", 
        success : (reponse) => {
        	montrerVue("lister", reponse);
        },
        fail : (err) => {
            console.log(err);
        }
    })
}

let supprimerProduit = (idP) => {
    $.ajax({
        type : "POST",
        url  : "routesProduits.php",
        data : {"action":"supprimer", "id": idP},
        dataType : "json", 
        success : (reponse) => {
            console.log(reponse);
        	montrerVue("lister", reponse);
        },
        fail : (err) => {
            console.log(err);
        }
    })
}

let chargerCategories = () => {
    $.ajax({
        type : "POST",
        url  : "routesProduits.php",
        data : {"action":"recupererCategories"},
        dataType : "json", 
        success : (reponse) => {
        	montrerVue("chargerCateg", reponse);
        },
        fail : (err) => {
            console.log(err);
        }
    })
}


//Houssam****************************************************

let chargerProduitsParCategorie = (categorie) => {
    $.ajax({
        type: "POST",
        url: "routesProduits.php",
        data: {"action": "rechercher", "categorie": categorie},
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

// affichage du produit a modifier dans le formulaire

let chargerInfosProduit = (idP) => {
    $.ajax({
        type: "POST",
        url: "routesProduits.php",
        data: {'action': "charger_produit", 'idProduit': idP},
        dataType: "json",
        success: function (reponse){
            if (reponse.OK){
                remplirFormulaireModification(reponse.produit);
            } else {
                console.log(reponse.msg);
            }
        },
        error: function (err) {
            console.log(err);
        }
    });
}

// modification du produit afficher dans le formulaire

let modifierProduit = () => {
    let formProduit= new FormData(document.getElementById('formModif'));

    formProduit.append('action', 'modifier_produit');
    formProduit.append('idProduit', $("#idProduit").val());
    formProduit.append('nom', $("#nom").val());
    formProduit.append('categorie', $("#categorie").val());
    formProduit.append('ingredients', $("#ingredients").val());
    formProduit.append('prix', $("#prix").val());
    formProduit.append('quantite', $("#quantite").val());

    if ($("#photo")[0].files[0]){
        formProduit.append('photo', $("#photo")[0].files[0]);
    }
    
    $.ajax({
        type: "POST",
        url: "routesProduits.php",
        data: formProduit,
        dataType: "json",
        contentType: false,
        processData: false,
        success: function (reponse){
            if (reponse.OK) {
                console.log("Produit modifier avec succès.");
            } else {
                console.error("Erreur lors de la modification:", reponse.msg);
            }
        },
        error: function (err) {
            console.error("Erreur AJAX:", err);
        }
    });
}

//********************************************


let montrerVue = (action, donnees) => {
	msgErr = "Problème côté serveur. Essayez plus tard!";
    switch(action){
        case "enregistrer"  :
            if (donnees.OK) {
                modalAjoutProduit();
            } else {
                //afficherMessage(msgErr);
            }
        case "modifier"     :
            // if(donnees.OK){
            //     // getUnProduit(donnees.produitAEditer);
            // }else{
            //     afficherMessage(msgErr); 
            // }
        // case "afficher_produit_a_modifier"     :
        //     if(donnees.OK){
        //         afficherFormulaireModification(donnees.produitAEditer);
        //     }else{
        //         afficherMessage(msgErr); 
        //     }
        case "enlever"      :
            if(donnees.OK){
                afficherMessage(donnees.msg);
            }else{
                console.log(donnees.OK);
                console.log(donnees.msg);
                afficherMessage(msgErr); 
            }
        break;
        case "lister"       :
            if(donnees.OK){
                listerProduits(donnees.listeProduits);
            }else{
                afficherMessage(msgErr); 
            }
		break;
		case "chargerCateg" :
			if(donnees.OK){
				genererCategories(donnees.listeCategories);
			}else{
				afficherMessage(msgErr); 
			}
    }
}

const genererCategories = (liste) => {
    document.getElementById('floatingSelect').innerHTML = "";
    let resultat = ""
    resultat += `<option value="All">Toutes</option>`;
     for (let  i =0; i < liste.length; i++) {
        let unGenre = liste[i];
        resultat += '<option value="'+unGenre.categorie+'">'+unGenre.categorie+'</option>';
     }
     document.getElementById('floatingSelect').innerHTML += resultat;
}

let confirmationSuppression = () => {
    let boutonSupp = document.getElementsByClassName("boutonSupp")[0];
    let idP = boutonSupp.getAttribute('id');
    supprimerProduit(idP);
}


let afficherMessage = (idP) => {
    let msg = 'Êtes-vous sûrs de vouloir supprimer le produit id='+idP+'?';

    let ajoutScript = document.createElement('script');
    ajoutScript.type = 'text/javascript';
    let code = 'montrerToast("'+msg+'");';
    ajoutScript.appendChild(document.createTextNode(code));
    document.body.appendChild(ajoutScript);

    let boutonSupp = document.getElementsByClassName("boutonSupp")[0];
    boutonSupp.setAttribute('id', idP);
}
 
let remplirCard = (unProduit)=> {
	let lienImage = chargerImage(unProduit.photo);
    let prix = miseEnFormePrix(unProduit.prix);
    let idP = unProduit.IdP;

	let rep ='<div class="card card-adminP">';
	rep +='<div class="id-adminP">'+idP+'</div>';
	rep +='<div class="img-adminP"><img src="'+lienImage+'" class="img-fluid rounded-start"></div>';
	rep +='<div class="nom-adminP"><b>'+unProduit.nom+'</b></div>';
	rep +='<div class="ingredient-adminP">'+unProduit.ingredients+'</div>';
	rep +='<div class="categorie-adminP">'+unProduit.categorie+'</div>';
    rep +='<div class="prix-adminP">'+prix+'</div>';
    rep +='<div class="qte-adminP">'+unProduit.quantite+'</div>';
<<<<<<< Updated upstream
	rep +='<div class="boutons-adminP"><a href="#" onClick="chargerInfosProduit('+idP+');" class="btn btn-success btn-modifier-produit">Modifier</a></div>';
	rep +='<div class="boutons-adminP"><a href="#" onClick="supprimerProduit('+idP+');" class="btn btn-danger">Supprimer</a></div>';    
=======
	rep +='<div class="boutons-adminP"><a href="#" class="btn btn-success">Modifier</a></div>';
	rep +='<div class="boutons-adminP"><a href="#" onClick="afficherMessage('+idP+');" class="btn btn-danger">Supprimer</a></div>';     
>>>>>>> Stashed changes
	rep +='</div>';
	return rep;
}

let enteteProduits = ()=> {
	let rep ='<div class="card cardEntete-adminP">';
	rep +='<div class="id-adminP titre">ID</div>';
	rep +='<div class="img-adminP titre">Image</div>';
	rep +='<div class="nom-adminP titre">Nom</div>';
	rep +='<div class="ingredient-adminP titre">Ingrédients</div>';
	rep +='<div class="categorie-adminP titre">Catégorie</div>';
    rep +='<div class="prix-adminP titre">Prix</div>';
    rep +='<div class="qte-adminP titre">Nb unités<br><i>(Inventaire)</i></div>';
	rep +='<div class="boutons-adminP titre">Modifier</div>';
	rep +='<div class="boutons-adminP titre">Supprimer</div>';     
	rep +='</div>';
	return rep;
}

let listerProduits = (listeProduits) => {
    let contenu = enteteProduits();
    contenu += `<div class="row row-cols-4">`;
    for (let unProduit of listeProduits){
            contenu+=remplirCard(unProduit);
    } 
    contenu += `</div>`;
    document.getElementById('contenuProduits').innerHTML = contenu;
}

function chargerImage(image){
	lien = '../../client/images/produits/'+image;
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


function miseEnFormePrix(prix){
    prixStr = prix.toString();
    if (prixStr.length != 0) {
        if (prixStr.indexOf(".") != -1){
            prixTab = prixStr.split(".");
            prixEnt = prixTab[0];
            decimal = prixTab[1];
            if (decimal.length != 2) {
                while (decimal.length != 2) {
                    decimal += '0';
                }
            }
        } else {
            prixEnt =  prixStr;
            decimal = '00';
        }
        return prixEnt+'.'+decimal+"$";
    } else {
        return 'Prix Non Disponible';
    }
}


let relisterProduits =() => {
    document.getElementById('affichercontenuProduits').style.display = "block";
    document.getElementById('contenuProduits').style.display = "block";
    document.getElementById('affichercontenuMembre').style.display = "none";
    document.getElementById('contenuMembres').style.display = "none";
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
        dataType: 'json',
        async: false,
        success: function (reponse) {
            montrerVue("enregistrer", reponse);
        },
        fail: function (err) {
            console.log(err);
        }
    });
}

