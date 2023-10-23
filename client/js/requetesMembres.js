function chargerMembres() {
    document.getElementById('affichercontenuProduits').style.display = "none";
    document.getElementById('contenuProduits').style.display = "none";
    document.getElementsByClassName('eHr')[0].style.display = "none";
    document.getElementById('affichercontenuMembre').style.display = "block";
    document.getElementById('contenuMembres').style.display = "block";
    $.ajax({
        type : "POST",
        url  : "routesMembres.php",
        data : {action:"lister"},
        dataType : "json", //text pour voir si bien formé même chose pour xml
        success : (listeMembres) => {//alert(JSON.stringify(listeFilms['listeFilms']));
            //listeMembres = reponse;
            console.log(listeMembres);
        	montrerVueMembre("listerMembres", listeMembres);
        },
        fail : (err) => {
            //Décider du message
        }
    })
}

$(document).on('change', '#flexSwitchCheckDefault', function (e) {
    let idmembre=document.getElementById('idMembre').innerHTML;
    let formMembre = new FormData();
    formMembre.append('action', 'modifierstatut');
    formMembre.append('idm', idmembre);
    $.ajax({
        type : "POST",
        url  : "routesMembres.php",
        data : formMembre,
        dataType : "json", //text pour voir si bien formé même chose pour xml
        async: true,
        contentType : false, 
		processData : false,
        success : (reponse) => {//alert(JSON.stringify(listeFilms['listeFilms']));
            //listeMembres = reponse;
            console.log(reponse);
        	//montrerVueMembre("listerMembres", listeMembres);
        },
        fail : (err) => {
            //Décider du message
        }
    })
});


//afficher 
let montrerVueMembre = (action, donnees) => {
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
        case "listerMembres"       :
            if(donnees.OK){
                listerMembres(donnees.listeMembres);
            }else{
                afficherMessage(msgErr); 
            }
		break;
    }
}


//Vue admin pour CRUD Membres*****

let remplirCardM = (unMembre)=> {
	lienImage = chargerImageM(unMembre.photo,unMembre.sexe);
    let status = assignStatus(unMembre.statut);
	let rep ='<div class="card card-adminM">';
    rep +='<div class="id-adminM"><p class="" id="idMembre">'+unMembre.idm+'</p></div>';
	rep +='<div class="img-adminP"><img src="'+lienImage+'" class="img-fluid rounded-start"></div>';
	rep +='<div class="nom-adminM"><h5 class="card-title">'+unMembre.prenom+' '+unMembre.nom+'</h5></div>';
	rep +='<div class="courriel-adminM">'+unMembre.courriel+'</div>';
    rep +='<div class="daten-adminM">'+unMembre.datenaissance+'</div>';
	rep +='<div class="sexe-adminM">'+unMembre.sexe+'</div>';
    rep +='<div class="statut-adminM"><div class="form-btnactive-membre">';
    rep +='<div class="form-check form-switch">';
    rep +='<input class="form-check-input boutons-adminP" type="checkbox" role="switch" id="flexSwitchCheckDefault" '+status+'>';
    rep+= '</div><label class="form-check-label" for="flexSwitchCheckDefault">Active</label></div>'
	rep +='</div></div>';
	return rep;
}

let enteteMembres = ()=> {
	let rep ='<div class="card cardEntete-adminM">';
    rep +='<div class="id-adminM titre">ID</div>';
	rep +='<div class="img-adminP titre">Photo</div>';
	rep +='<div class="nom-adminM titre">Nom</div>';
	rep +='<div class="courriel-adminM titre">Courriel</div>';
	rep +='<div class="daten-adminM titre titreM">Date de naissance</div>';
    rep +='<div class="sexe-adminM titre titreM">Sexe</div>';
	rep +='<div class="boutons-adminP titre titreM">Statut</div>';
	rep +='</div>';
	return rep;
}

let listerMembres = (listeMembres) => {
    let contenu = enteteMembres();
    contenu += `<div class="row row-cols-4 container-membres">`;
    for (let unMembre of listeMembres){
            contenu+=remplirCardM(unMembre);
    } 
    contenu += `</div>`;
    document.getElementById('contenuMembres').innerHTML = contenu;
}

function chargerImageM(image,sexe){
	lien ='../membre/photos/'+image;
    lienF ='../membre/photos/avatar-membre-f.png';
    lienM ='../membre/photos/avatar-membre-m.png';
    //console.log(lien);
    if (image != ""){
        return lien;
    }else {
        if(sexe == "F") return lienF;
        return lienM; 
    } 
	
}

function assignStatus(statut){
    if (statut == 'A') {
        return "checked";}
    else if(statut == 'I'){
        return "";
    }
}