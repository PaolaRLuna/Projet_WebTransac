<?php
    declare (strict_types=1);
    // require_once(__DIR__."/../ressources/bd/Connexion.php");
    require_once('serveur/bd/connexion.inc.php');
    require_once("Produit.php");

    //$reponse=array();
    //$connexion = Connexion::getConnexion();
    // global $connexion;
    $requette="SELECT * FROM produits";

    try{
        $bdd = new PDO('mysql:host=localhost;dbname=bdboutique', 'root', '');
        //$stmt = $connexion->prepare($requette);
        $reponse = $bdd->query($requette);
        // $reponse['OK'] = true;
        // $reponse['msg'] = "";
        // $reponse['listeProduits'] = array();
        //$reponse =  $stmt->get_result();
        //echo json_encode($reponse);
        while($ligne = $reponse->fetch()){
            listerProduits($ligne);
            //echo $ligne['nom']."\n";
            //$reponse['listeProduits'][] = $ligne;
        }
    }catch (Exception $e){ 
        // $reponse['OK'] = false;
        // $reponse['msg'] = "Problème pour obtenir les données des films";
    }finally {
      //unset($connexion);
      //echo json_encode($reponse);
    }

	function listerProduits($produit){
        $card = '
        <div class="card" style="width: 18rem;">
            <a href="#"><img src="client/images/produits/cheddar.jpg" class="card-img-top"></a>
            
            <div class="card-body">
                <a href="#"><h5 class="card-title">'.$produit['nom'].'</h5></a>
            </div>
            <div class="card-body">
                <p><b>Catégorie: </b>'.$produit['categorie'].'</p>
            </div>

            <ul class="list-group list-group-flush">
                <li class="list-group-item">'.$produit['prix'].'$ / ('.$produit['quantite'].'g)</li>
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

        echo $card;
    }

    //fonction pour image
    //fonction pour nomenclature des prix
?>


