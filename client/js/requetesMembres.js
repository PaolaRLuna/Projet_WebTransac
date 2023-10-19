function chargerMembres() {
    document.getElementById('affichercontenuProduits').style.display = "none";
    document.getElementById('contenuProduits').style.display = "none";
    document.getElementById('affichercontenuMembre').style.display = "block";
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

let relisterProduits =() => {
    document.getElementById('affichercontenuProduits').style.display = "block";
    document.getElementById('contenuProduits').style.display = "block";
    document.getElementById('affichercontenuMembre').style.display = "none";
    document.getElementById('contenuMembres').style.display = "none";
}

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
	let rep ='<div class="card card-adminP">';
	rep +='<div class="img-adminP">';// class="col-md-4"
	rep +='<img src="'+lienImage+'" class="img-fluid rounded-start" alt="...">';
	rep +='</div>';

	rep +='<div class="corps-adminP"><h5 class="card-title">'+unMembre.prenom+' '+unMembre.nom+'</h5>';
	rep +='<p class="">'+unMembre.courriel+'</p>';
    rep +='<p class="">'+unMembre.datenaissance+'</p>';
	rep +='<p class=""> Sexe: '+unMembre.sexe+'</p></div>';
    rep +='<div class="form-btnactive-membre">';
    rep +='<div class="form-check form-switch">';
    rep +='<input class="form-check-input boutons-adminP" type="checkbox" role="switch" id="flexSwitchCheckDefault" '+status+'>';
    rep+= '<label class="form-check-label" for="flexSwitchCheckDefault">Active</label></div>'
	rep +='<div class=""><a href="#" class="btn btn-primary boutons-adminM btn-modifier-membre">Modifier</a>';
	rep +='<a href="#" onClick="supprimerMembre(this,unMembre.idP);" class="btn btn-danger">Supprimer</a></div>';     
	rep +='</div></div>';
	return rep;
}

let listerMembres = (listeMembres) => {
    let contenu = `<div class="row row-cols-4">`;
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