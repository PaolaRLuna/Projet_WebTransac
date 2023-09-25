<?php
    if(isset($_COOKIE["PHPSESSID"])){
        unset($_COOKIE["PHPSESSID"]);
    }
    session_start();
    $msg="";
    if(isset($_GET['msg'])){
        $msg = $_GET['msg'];
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pâte-à-Pouf</title>
    <link rel="shortcut icon" href="client/images/general/logo.png" type="image/x-icon">

    <link rel="stylesheet" href="client/utilitaires/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <script src="client/utilitaires/jquery-3.6.3.min.js"></script>
    <script src="client/utilitaires/bootstrap-5.3.0-alpha1-dist/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="client/css/style.css?v=<?php echo time(); ?>">
    <script src="client/js/global.js"></script>
    <script src="client/js/vue.js"></script>

    <link href="https://fonts.cdnfonts.com/css/bradley-hand-2" rel="stylesheet">

<body onload="initialisation();">

    <?php
        require_once('serveur/includes/header.php');
    ?>

    <section id="hero">
        <div class="hero-container" data-aos="fade-up">
            <h1>Bienvenue chez Pâte-à-Pouf</h1>
            <h2>Nous vous offrons des produits frais et des repas prêts à manger préparés avec amour!</h2>
        </div>
    </section>

    <main id="main">
        <section class="about">
            <div class="container">

                <div class="row justify-content-end">

                    <div class="col-lg-11">
                        <div class="row justify-content-end">
                        <h2 id="entete1" class="enVedette">Découvrez nos produits par catégories...</h2>
                        
                        <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                            <div class="count-box py-5">
                            <a href="#"><img class="categorie-img" src="client/images/general/pate.png"></a>
                            <p class="categorie">Pâtes fraîches</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                            <div class="count-box py-5">
                            <a href="#"><img class="categorie-img" src="client/images/general/sauce.png"></a>
                            <p class="categorie">Sauces</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                            <div class="count-box pb-5 pt-0 pt-lg-5">
                            <a href="#"><img class="categorie-img" src="client/images/general/fromage.png"></a>
                            <p class="categorie">Fromages</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                            <div class="count-box pb-5 pt-0 pt-lg-5">
                            <a href="#"><img class="categorie-img" src="client/images/general/plat.png"></a>
                            <p class="categorie">Prêts-à-manger</p>
                            </div>
                        </div>

                        <hr class="enVedette">
                        <h2 class="enVedette" id="entete2">...ou jetez un coup d'oeil à nos produits vedettes de la semaine!</h2>
                        
                        </div>

                        <div class="cards_produits">
                            <?php
                                $produits = glob('client/images/produits/*.jpg');
                               
                                foreach ($produits as $produit) {
                                    $chemin = 'client/images/produits/';
                                    $src = $chemin.basename($produit);
                                    echo '<div class="card" style="width: 18rem;">
                                        <a href="#"><img src='.$src.' class="card-img-top"></a>
                                        
                                        <div class="card-body">
                                            <a href="#"><h5 class="card-title">Gnocchi di patate duri frais</h5></a>
                                            <p class="card-text"><b>Ingrédients :</b> Farine enrichie, fécule de pomme de terre, pommes de terre, sel.</p>
                                        </div>
                            
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">5.25$ / (500g)</li>
                                        </ul>
                                        <nav class = "qte">
                                            <ul class="pagination">
                                                <li class="page-item"><a class="page-link moins">-</a></li>
                                                <li class="page-item"><a contenteditable="true" class="page-link">1</a></li>
                                                <li class="page-item"><a class="page-link plus">+</a></li>
                                            </ul>
                                        </nav>
                            
                                        <div class="card-body">
                                            <a href="#" class="card-link">Ajouter au panier</a>
                                            <p class="card-fav"><img class="etat-like" src="client/images/general/notlike.png" alt="ajouter aux favoris"></p>
                                        </div>
                                        </div>';
                                }
                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>

    <?php
        require_once('serveur/includes/footer.php');
    ?>
    <?php
        require_once('serveur/includes/toast.php');
    ?>
    <div id="idForms" class="container">

</body>
</html>