<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple</title>
    <link rel="stylesheet" href="client/utilitaires/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="client/utilitaires/jquery-3.6.3.min.js"></script>
    <script src="client/utilitaires/bootstrap-5.3.0-alpha1-dist/js/bootstrap.min.js"></script>
    <script src="client/js/global.js"></script>

    <link href="client/css/style.css" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/bradley-hand-2" rel="stylesheet">
</head>
<body>

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
                    <h2 id="entete1">Découvrez nos produits par catégories...</h2>
                    <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                        <div class="count-box py-5">
                        <a href="#"><img class="categorie" src="client/images/general/pate.png"></a>
                        <p>Pâtes fraîches</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                        <div class="count-box py-5">
                        <a href="#"><img class="categorie" src="client/images/general/sauce.png"></a>
                        <p>Sauces</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                        <div class="count-box pb-5 pt-0 pt-lg-5">
                        <a href="#"><img class="categorie" src="client/images/general/fromage.png"></a>
                        <p>Fromages</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                        <div class="count-box pb-5 pt-0 pt-lg-5">
                        <a href="#"><img class="categorie" src="client/images/general/plat.png"></a>
                        <p>Prêts-à-manger</p>
                        </div>
                    </div>

                    <h2>...ou jetez un coup d'oeil à nos produits vedettes!</h2>
                    </div>

                    <div class="cards_produits">
                        <div class="card" style="width: 18rem;">
                            <img src="client/images/general/test.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Gnocchi di patate duri frais</h5>
                                <p class="card-text"><b>Ingrédients :</b> Farine enrichie, fécule de pomme de terre, pommes de terre, sel.</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">5.25$ / (500g)</li>
                            </ul>
                            <div class="card-body">
                                <a href="#" class="card-link">Ajouter au panier</a>
                                <a href="#" class="card-link"><img src="client/images/general/notlike.png" alt="ajouter aux favoris"></a>
                            </div>
                        </div>

                        <div class="card" style="width: 18rem;">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">An item</li>
                                <li class="list-group-item">A second item</li>
                                <li class="list-group-item">A third item</li>
                            </ul>
                            <div class="card-body">
                                <a href="#" class="card-link">Card link</a>
                                <a href="#" class="card-link">Another link</a>
                            </div>
                        </div>
                    </div>
                </div>
                </div>





            </div>
        </section>
    </main>

</body>
</html>