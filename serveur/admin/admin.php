<?php
    session_start();
    if(!isset($_SESSION['role'])){
         header('Location: ../../index.php');
         exit();
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    
    <link rel="shortcut icon" href="../../client/images/general/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../../client/utilitaires/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <script src="../../client/utilitaires/jquery-3.6.3.min.js"></script>
    <script src="../../client/utilitaires/bootstrap-5.3.0-alpha1-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../client/css/style.css?v=<?php echo time(); ?>">
    <script src="../../client/js/global.js"></script>
    <script src="../../client/js/requetesProduits.js"></script>
    <script src="../../client/js/requetesMembres.js"></script>
    <script src="../../client/js/vue.js"></script>
    <link href="https://fonts.cdnfonts.com/css/bradley-hand-2" rel="stylesheet">
</head>
<body onload="chargerProduits(); chargerCategories();">
    <header id="header">
        <div class="logo">
            <a href="index.php"><img src="../../client/images/general/logo.png" alt="Pâte-à-Pouf" id="logo"></a>
            <h1 class="text-light">Pâte-à-Pouf<span id="identifiantAdmin">/Page Administrateur</span></h1>
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="active" href="javascript:relisterProduits();">Gestion des produits</a></li>
                <li><a class="active" href="javascript:chargerMembres();">Gestion des membres</a></li>
                <li><a class="getstarted" href="#">Déconnexion</a></li>
            </ul>
        </nav>
    </header>

    <main id="pageAdmin">
        <div class="menu-admin" id="affichercontenuProduits">
            <h2 class="texteEnteteAdmin">Liste des produits</h2>
            <div class="options-admin">
                <a class="texteEnteteAdmin" href="#"><u>+ Ajouter un produit</u></a>
                <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" onchange='rechercheCategorie();'></select>
                    <label for="floatingSelect">Catégories</label>
                </div>
                <div class="recherche">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2" id="rechercheMotCle">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2" onClick='rechercheMotCle();'>Rechercher</button>
                    </div>
                </div>
            </div>

            
        </div>
        <div class="menu-admin-membre" id="affichercontenuMembre" style="display:none;">
            <h2 class="texteEnteteAdmin" >Liste des Membres</h2>
                <div class="recherche">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2" id="rechercheMotCleMembre">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2" onClick='rechercheMotCleMembre();'>Rechercher Membre</button>
                    </div>
                </div>
                
        </div>

        <div id="contenuProduits"></div>
        <div id="contenuMembres"></div>
    </main>

    
</body>
</html>