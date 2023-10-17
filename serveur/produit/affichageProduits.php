<?php
    declare (strict_types=1);
    require_once(__DIR__.'/../ressources/bd/connexion.inc.php');
    require_once(__DIR__.'/../ressources/bd/modele.inc.php');

    $requete="SELECT * FROM produits";

    try{
        $instanceModele= modeleDonnees::getInstanceModele();
        $stmt = $instanceModele->executer($requete,[]);
        if ($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
            while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
                listerProduits($ligne);
            }
        }
    }catch (Exception $e){ 
        echo 'ERREUR: '.$e;
    }finally {
      //unset($connexion);
      //echo json_encode($reponse);
    }

	function listerProduits($produit){
        $lienImage = chargerImage($produit->photo);
        $prix = miseEnFormePrix($produit->prix, $produit->quantite);
        $card = '
        <div class="card" style="width: 18rem;">
            <a href="#"><img src="'.$lienImage.'" class="card-img-top"></a>
            
            <div class="card-body">
                <a href="#"><h5 class="card-title">'.$produit->nom.'</h5></a>
            </div>
            <div class="card-body">
                <p><b>Catégorie: </b>'.$produit->categorie.'</p>
            </div>

            <ul class="list-group list-group-flush">
                <li class="list-group-item">'.$prix.'</li>
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
    
    function chargerImage($image){
        $lien = 'client/images/produits/'.$image;
        $lienND = 'client/images/produits/visuel-non-disponible.jpg';
        if ($image != ""){
            if (file_exists($lien)){
                return $lien;
            }else {
                return $lienND;
            }
        } else {
            return $lienND;
        }
    }

    function miseEnFormePrix($prix, $qte){
        $prixStr = strval($prix);
        $qteStr = strval($qte);
        if (strlen($prixStr) != 0 && strlen($qteStr) != 0) {
            if (strpos($prixStr, '.')){
                $prixTab = explode(".", $prixStr);
                $prixEnt = $prixTab[0];
                $decimal = $prixTab[1];
                if (strlen($decimal) != 2) {
                    while (strlen($decimal) != 2) {
                        $decimal .= '0';
                    }
                }
            } else {
                $prixEnt =  $prixStr;
                $decimal = '00';
            }
            return $prixEnt.'.'.$decimal."$ / (".$qteStr."g)";
        } else {
            return 'Prix Non Disponible';
        }
    }
?>


