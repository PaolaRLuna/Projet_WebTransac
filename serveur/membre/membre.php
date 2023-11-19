<?php
// Démarrage de la session et vérification de l'accès utilisateur
session_start();
if (!isset($_SESSION['role'])) {
    header('Location: ../../index.php');
    exit();
}
$idMembre = $_SESSION['id'] ?? null;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membre</title>
    <link rel="shortcut icon" href="../../client/images/general/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../../client/utilitaires/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <script src="../../client/utilitaires/jquery-3.6.3.min.js"></script>
    <script src="../../client/utilitaires/bootstrap-5.3.0-alpha1-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../client/css/style.css?v=<?php echo time(); ?>">
    <script src="../../client/js/global.js"></script>
    <script src="../../client/js/vue.js"></script>
    <script src="../../client/js/panier.js"></script>
    <script src="../../client/js/requetesProduits.js"></script>
    <script src="../../client/js/requetesMembres.js"></script>
    <link href="https://fonts.cdnfonts.com/css/bradley-hand-2" rel="stylesheet">
</head>
<body onload="initialisation('<?php echo $_SESSION['role']; ?>'); switchHeader('<?php echo $_SESSION['role']; ?>', '<?php echo $_SESSION['prenom']; ?>', '<?php echo $_SESSION['nom']; ?>', '<?php echo $_SESSION['photo']; ?>'); chargerCategories(); afficherEtModifierMembre('<?php echo $idMembre; ?>');">
    
    <?php require_once(__DIR__.'/../includes/header.php'); ?>

    <main id="pageMembre" class="container mt-5">
        <h1 class="text-center mb-4" style="margin-top: 100px;">Profil du Membre</h1>
        <div class="row">
            <!-- Informations du Membre -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Informations du Membre
                    </div>
                    <div class="card-body">
                        <p class="card-text">Nom: <span id="nomMembre"><?php echo $_SESSION['nom']; ?></span></p>
                        <p class="card-text">Prénom: <span id="prenomMembre"><?php echo $_SESSION['prenom']; ?></span></p>
                        <p class="card-text">Courriel: <?php echo $_SESSION['courriel']; ?></p>
                        <p class="card-text">Sexe: <span id="sexeMembre"><?php echo $_SESSION['sexe']; ?></span></p>
                        <p class="card-text">Date de Naissance: <span id="datenaissanceMembre"><?php echo $_SESSION['datenaissance']; ?></span></p>
                        <!-- Affichage de la photo si elle existe-->
                        <?php if (isset($_SESSION['photo']) && $_SESSION['photo'] != ''): ?>
                            <img src="<?php echo $_SESSION['photo']; ?>" alt="Photo de profil" class="img-thumbnail">
                        <?php endif; ?>
                        <button id="btnModifierProfil" onclick="afficherFormulaireModification();">Modifier Profil</button>
                    </div>
                </div>
            </div>

            <!-- Formulaire de modification du profil -->
            <div class="col-md-6">
                <form id="formModifierProfil" method="POST" style="display:none;" enctype="multipart/form-data">
                    <!-- Champs de modification du profil -->
                    <div class="mb-3" style="max-width: 300px; margin: auto;">
                        <label for="nom" class="form-label" style="font-weight: bold; font-size: larger; color: blue;">Nom:</label>
                        <input type="text" id="nom" name="nom" class="form-control">
                    </div>
                    <div class="mb-3" style="max-width: 300px; margin: auto;">
                        <label for="prenom" class="form-label" style="font-weight: bold; font-size: larger; color: blue;">Prénom:</label>
                        <input type="text" id="prenom" name="prenom" class="form-control">
                    </div>
                    <div style="max-width: 300px; margin: auto;">
                        <label style="font-weight: bold; font-size: larger; color: blue;">Sexe:</label>
                        <div>
                            <!-- Options de sexe -->
                            <input type="radio" id="sexeM" name="sexe" value="M">
                            <label for="sexeM">Masculin</label>
                            <input type="radio" id="sexeF" name="sexe" value="F">
                            <label for="sexeF">Féminin</label>
                            <input type="radio" id="sexeAutre" name="sexe" value="Autre">
                            <label for="sexeAutre">Autre</label>
                        </div>
                    </div>
                    <div style="max-width: 300px; margin: auto;">
                        <label for="datenaissance" style="font-weight: bold; font-size: larger; color: blue;">Date de naissance:</label>
                        <input type="date" id="datenaissance" name="datenaissance" class="form-control">
                    </div>
                    <div style="text-align: center; margin-top: 20px;">
                        <button type="submit" onclick="javascript:mettreAJourMembre('<?php echo $_SESSION['id']; ?>');">Enregistrer les modifications</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <form id="deconnexion" action="../connexion/deconnexion.php"></form>
    <?php require_once('../includes/footer.php'); ?>

    <!-- Modal du panier -->
    <div class="modal" id="idModPanier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body modal-body-panier">
                <div id="contenuPanier"></div>
            </div>
            </div>
        </div>
        </div>
        <!-- Fin du modal du panier -->
        
</body>
</html>
