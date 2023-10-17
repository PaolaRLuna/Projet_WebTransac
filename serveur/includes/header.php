<?php
$path =basename(getcwd());
$cheminlike = "";
$cheminlogo = "";
$cheminpanier = "";
//echo '<script type="text/javascript">alert('.$path.');</script>';
if($path == "admin"){
    $cheminlogo = "../../client/images/general/logo.png";
    $cheminpanier = "../../client/images/general/panier.png";
    $cheminlike= "../../client/images/general/like.png";
} else {
    $cheminlogo = "client/images/general/logo.png";
    $cheminpanier = "client/images/general/panier.png";
    $cheminlike= "client/images/general/like.png";
}
?>
<header id="header">
        <div class="logo">
            <a href="index.php"><img src="<?php echo $cheminlogo?>" alt="Pâte-à-Pouf" id="logo"></a>
            <h1 class="text-light"><a href="index.php">Pâte-à-Pouf</a></h1>
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="active" href="index.php">Accueil</a></li>
                <li class="dropdown"><a href="#"><span>À propos</span> <i class="bi bi-chevron-down"></i></a>

                <li class="dropdown"><a href="#"><span>Produits</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                    <li><a href="#">Pâtes fraîches</a></li>
                    <li><a href="#">Sauces</a></li>
                    <li><a href="#">Fromages</a></li>
                    <li><a href="#">Prêts-à-manger</a></li>
                </ul>
                </li>

                <li class="dropdown"><a href="#"><span>Services</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                    <li><a href="#">Livraison</a></li>
                    <li><a href="#">Traiteur</a></li>
                    <li><a href="#">Ateliers</a></li>
                </ul>
                </li>
                
                <li><a href="contact.php">Contactez-nous</a></li>
                <li><a class="getstarted" id="optionHeader1" href="javascript:montrerFormConnexion();">Se connecter</a></li>
                <li><a class="getstarted" id="optionHeader2" href="javascript:montrerFormEnregMembre();">S'inscrire</a></li>
            </ul>
        </nav>
        
        <div class="panier">
            <a href="panier.php"><img src="<?php echo $cheminpanier ?>" alt="voir le panier" id="panier"></a>
        </div>
        <div class="favoris">
            <a href="favoris.php"><img src="<?php echo $cheminlike ?>" alt="voir les favoris" id="favoris"></a>
        </div>
</header>
