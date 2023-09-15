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
                <div class="modal-body modalpad">
                    <!-- Formulaire enregistrer Membre -->
                    <form id="formEnregMembre" class="row">
                        <div class="col-md-6">
                            <label for="nom" class="form-label">Nom :</label>
                            <input type="text" class="form-control is-valid" id="nom" name="nom" required>
                        </div>
                        <div class="col-md-6">
                            <label for="prenom" class="form-label">Prénom :</label>
                            <input type="text" class="form-control is-valid" id="prenom" name="prenom" required>
                        </div>
                        <div class="col-md-12">
                            <label for="email" class="form-label">Courriel :</label>
                            <input type="text" class="form-control is-valid" id="email" name="email" required>
                        </div>
                        <div class="col-md-12">
                            <label for="sexe" class="form-label">Sexe :</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexe" id="S1">
                                <label class="form-check-label" for="S1">
                                    Féminin
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexe" id="S2" checked>
                                <label class="form-check-label" for="S2">
                                    Masculin
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexe" id="S3" checked>
                                <label class="form-check-label" for="S3" style="margin-bottom: 10px;">
                                    Je préfére ne pas répondre
                                </label>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="datenaissance" class="form-label">Date de naissance :</label>
                            <input type="date" class="form-control is-valid" id="datenaissance" name="datenaissance" required>
                        </div>
                        <div class="col-md-12">
                            <label for="password" class="form-label">Mot de passe :</label>
                            <input type="password" class="form-control is-valid" id="password" name="password" minlength="8" maxlength="10" required pattern="^[A-Za-z0-9_\-\$#\.]{6,8}$" >
                        </div>
                        <div class="col-md-12">
                            <label for="confirm_password" class="form-label">Confirmation mot de passe :</label>
                            <input type="password" class="form-control is-valid" id="confirm_password" name="confirm_password" required>
                        </div>
                        <div class="col-12 btn-enreg">
                        <br>
                            <button class="btn btn-primary" type="button" onClick="ajouterMembre();">S'enregistrer</button>
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