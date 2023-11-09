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
    <link href="https://fonts.cdnfonts.com/css/bradley-hand-2" rel="stylesheet">

<body onload="initialisation('<?php echo($_SESSION['role']) ?>'); switchHeader('<?php echo($_SESSION['role']) ?>', '<?php echo ($_SESSION['prenom'])  ?>', '<?php echo ($_SESSION['nom'])  ?>', '<?php echo ($_SESSION['photo'])  ?>');">
    <?php
        require_once(__DIR__.'/../includes/header.php');
    ?>

    <main id="pageMembre">
        <h1>Page membre en construction</h1>
    

        <!-- Fin barre navigation -->
        <div class="container_produits">
            <?php
                require_once('../produit/affichageProduits.php');
            ?>
        </div>


    </main>
    <form id="deconnexion" action="../connexion/deconnexion.php"></form>

</body>
</html>