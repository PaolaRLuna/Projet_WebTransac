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

<body onload="initialisation('<?php echo($_SESSION['role']) ?>'); switchHeader('<?php echo($_SESSION['role']) ?>', '<?php echo ($_SESSION['prenom'])  ?>', '<?php echo ($_SESSION['nom'])  ?>', '<?php echo ($_SESSION['photo'])  ?>'); chargerCategories();">
    <?php
        require_once(__DIR__.'/../includes/header.php');
    ?>

    <main id="pageMembre">
        <div id="entete-membre">
            <h2>Découvrez nos délicieux produits!</h2>
            <div class="options-membre">
                <div class="form-floating">
                    <select class="form-select liste-deroulante" id="floatingSelect" aria-label="Floating label select example" onchange='rechercheCategorieMembre();'></select>
                    <label for="floatingSelect">Catégories</label>
                </div>
                <div class="recherche">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2" id="rechercheMotCle">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2" onClick='rechercheParMotCle();'>Rechercher</button>
                    </div>
                </div>
            </div>
        </div>
    

        <!-- Fin barre navigation -->
        <div class="container_produits-membre">
            <?php
                require_once('../produit/affichageProduits.php');
            ?>
        </div>


    </main>
    <form id="deconnexion" action="../connexion/deconnexion.php"></form>

</body>
</html>