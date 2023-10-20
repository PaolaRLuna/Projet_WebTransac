let chargerProduits = () => {
    $.ajax({
        type : "POST",
        url  : "routesProduits.php",
        data : {"action":"lister"},
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
			console.log(reponse);
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


//********************************************

//implémenter la fonction affichermessage*****
let montrerVue = (action, donnees) => {
	msgErr = "Problème côté serveur. Essayez plus tard!";
    switch(action){
        case "enregistrer"  :
        case "modifier"     :
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
				console.log(donnees.listeCategories);
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

 
let remplirCard = (unProduit)=> {
	let lienImage = chargerImage(unProduit.photo);
    let prix = miseEnFormePrix(unProduit.prix);
    let idP = unProduit.IdP;
    console.log(idP);
	let rep ='<div class="card card-adminP">';
	rep +='<div class="id-adminP">'+idP+'</div>';
	rep +='<div class="img-adminP"><img src="'+lienImage+'" class="img-fluid rounded-start"></div>';
	rep +='<div class="nom-adminP"><b>'+unProduit.nom+'</b></div>';
	rep +='<div class="ingredient-adminP">'+unProduit.ingredients+'</div>';
	rep +='<div class="categorie-adminP">'+unProduit.categorie+'</div>';
    rep +='<div class="prix-adminP">'+prix+'</div>';
    rep +='<div class="qte-adminP">'+unProduit.quantite+'</div>';
	rep +='<div class="boutons-adminP"><a href="#" class="btn btn-success">Modifier</a></div>';
	rep +='<div class="boutons-adminP"><a href="#" onClick="supprimerProduit('+idP+');" class="btn btn-danger">Supprimer</a></div>';     
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



// let requeteEnregistrer = () => {
// 	let formFilm = new FormData(document.getElementById('formEnreg'));
// 	formFilm.append('action','enregistrer');
// 	$.ajax({
// 		type : 'POST',
// 		url : 'routes.php',
// 		data : formFilm, //$('#formEnreg').serialize()
// 		//async : false,
// 		//cache : false,
// 		contentType : false,
// 		processData : false,
//         dataType : 'xml', //text pour le voir en format de string
// 		success : function (xmlMessage){//alert(reponse);
// 					montrerVue("enregistrer", xmlMessage);
// 		},
// 		fail : function (err){
		   
// 		}
// 	});
// }

