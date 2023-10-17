let chargerFilmsAJAX = () => {
    $.ajax({
        type : "POST",
        url  : "routes.php",
        data : {"action":"lister"},
        dataType : "xml", //text pour voir si bien formé même chose pour xml
        success : (xmlFilms) => {//alert(xmlFilms);
			//(xmlFilms) est le point d'entrée du dom donc à partir d'ici on peut faire listefilms.getelementbyTagName(XML)
            // xmlFilms = reponse;
        	montrerVue("lister", xmlFilms);
        },
        fail : (err) => {
            //Décider du message
        }
    })
}

let requeteEnregistrer = () => {
	let formFilm = new FormData(document.getElementById('formEnreg'));
	formFilm.append('action','enregistrer');
	$.ajax({
		type : 'POST',
		url : 'routes.php',
		data : formFilm, //$('#formEnreg').serialize()
		//async : false,
		//cache : false,
		contentType : false,
		processData : false,
        dataType : 'xml', //text pour le voir en format de string
		success : function (xmlMessage){//alert(reponse);
					montrerVue("enregistrer", xmlMessage);
		},
		fail : function (err){
		   
		}
	});
}
// Consulter pour upload de fichiers
// https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API/Using_Fetch

const posterFormAvecFETCH = async ( url, formData ) => {
	const optionsFetch = {
		method: "POST",
		body: formData
	}
	const reponse = await fetch(url, optionsFetch);
	if (!reponse.ok) {
		const messageErreur = await reponse.text();
		throw new Error(messageErreur);
	}
	return reponse.json();
}

const chargerFilmsFETCH = async () => {
	const url = "routes.php";
	const formData = new FormData();
	formData.append('action','lister');
	listeFilms = await posterFormAvecFETCH( url, formData);
	alert(listeFilms.msg);
	//montrerVue("lister", listeFilms);
}
