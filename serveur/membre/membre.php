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
    <link href="https://fonts.cdnfonts.com/css/bradley-hand-2" rel="stylesheet">

<body onload="switchHeader('<?php echo($_SESSION['role']) ?>');">
    <?php
        require_once(__DIR__.'/../includes/header.php');
    ?>

    <main id="pageMembre">
        <h1>Page membre</h1>
    

        <!-- Fin barre navigation -->
        <div class="container">
        </div>
        <form id="formDec" action="../connexion/controleurConnexion.php" method="POST">
            <!-- Bloc de formulaire pour déconnecter l'utilisateur-->
            <!-- Formulaire avec les champs suivants : -->
            <input type="hidden" name="action" value="deconnexion">
        </form> 
    </main>
</body>
</html>