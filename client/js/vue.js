const modalEnregMembres = () => {
    return `
    <!-- Modal enregistrer Membre -->
    <div class="modal fade" id="modalEnregMembre" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Enregistrement d'un membre</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modal-body-bg">
                    <!-- Formulaire enregistrer Membre -->
                    <form id="formEnregMembre" action="serveur/membre/enregistrerMembre.php" method="POST" enctype="multipart/form-data" class="row g-3" onSubmit="return validerFormEnreg();">
                        <div class="col-md-6">
                            <label for="nom" class="form-label">Nom :</label>
                            <input type="text" class="form-control is-valid" id="nom" name="nom" required>
                        </div>
                        <div class="col-md-6">
                            <label for="prenom" class="form-label">Prénom :</label>
                            <input type="text" class="form-control is-valid" id="prenom" name="prenom" required>
                        </div>
                        <div class="col-md-12">
                            <label for="courriel" class="form-label">Courriel :</label>
                            <input type="email" class="form-control is-valid" id="courriel" name="courriel" required>
                        </div>
                        <div class="col-md-12">
                            <label for="sexe" class="form-label">Sexe :</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexe" id="S1" value="F">
                                <label class="form-check-label" for="S1">
                                    Féminin
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexe" id="S2" value="M" checked>
                                <label class="form-check-label" for="S2">
                                    Masculin
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexe" id="S3" value="A">
                                <label class="form-check-label" for="S3" style="margin-bottom: 10px;">
                                    Je préfére ne pas répondre
                                </label>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="daten" class="form-label">Date de naissance :</label>
                            <input type="date" class="form-control is-valid" id="daten" name="daten" required>
                        </div>
                        <div class="col-md-12">
                            <label for="password" class="form-label">Mot de passe :</label>
                            <input type="password" class="form-control is-valid" id="password" name="password" minlength="8" maxlength="10" required pattern="^[A-Za-z0-9_\$#\-]{8,10}$" >
                        </div>
                        <div class="col-md-12">
                            <label for="cpassword" class="form-label">Confirmation mot de passe :</label>
                            <input type="password" class="form-control is-valid" id="cpassword" name="cpassword" required pattern="^[A-Za-z0-9_\$#\-]{8,10}$">
                        </div>
                        <div class="col-md-12">
                            <label for="photo" class="form-label">Photo</label>
                            <input type="file" class="form-control is-valid" id="photo" name="photo[]">
                        </div>
                        <div class="col-12 btn-enreg">
                        <br>
                            <button class="btn btn-primary" type="submit">S'enregistrer</button>
                            <button class="btn btn-danger" type="reset">Vider</button>
                            <span id="msge"></span>
                        </div>
                    </form>
                    <!-- Fin du formulaire enregistrer Membre -->
    `
}

const montrerFormEnregMembre = () => {
    document.getElementById('idForms').innerHTML = modalEnregMembres(); 
    const modalEnregMembre = new bootstrap.Modal('#modalEnregMembre', {
    
      })
      modalEnregMembre.show(); 
}

//Modal Connexion 

const modalConnexionUtilisateurs = () => {
    return `
    <!-- Modal connexion membre ou admin -->
    <div class="modal fade" id="modalConnexion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-5" id="ModalConnexionLabel">Connexion</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modal-body-bg">
                    <!-- Formulaire connexion -->
                    <form class="row g-3" id="formConnexion" action="serveur/connexion/controleurConnexion.php" method="POST">
                            <div class="col-md-6">
                                <label for="courriel" class="form-label">Courriel :</label>
                                <input type="email" class="form-control" id="courrielco" name="courrielco" value="" required>
                            </div>
                            <div class="col-md-6">
                                <label for="pass" class="form-label">Mot Passe :</label>
                                <input type="password" class="form-control" pattern="[A-Za-z0-9_\$#\-]{6,10}$" id="passwordco" name="passwordco" required>
                            </div>
                            <input type="hidden" name="action" value="connexion">
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Connexion</button>
                                <span id="msge"></span>
                            </div>
                        </form>
                    <!-- Fin du formulaire connexion membre ou admin -->
    `
}

const montrerFormConnexion = () => {
    document.getElementById('idForms').innerHTML = modalConnexionUtilisateurs(); 
    const modalConnexion = new bootstrap.Modal('#modalConnexion', {    
      })
      modalConnexion.show(); 
}

//Afficher message dans Toast

let montrerToast = (msg) =>{
	if(msg.length > 0){
		let textToast = document.getElementById("textToast");
		var toastElList = [].slice.call(document.querySelectorAll('.toast'))
		var toastList = toastElList.map(function (toastEl) {
			return new bootstrap.Toast(toastEl)
		})
		textToast.innerHTML = msg;
		toastList[0].show();
	}
}

