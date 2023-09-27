<?php
    require_once('../bd/connexion.inc.php');
    global $connexion;
    Mdl_GetAll();

    function Mdl_GetAll(){
        // global $connexion;
        // $msg = "";
        try{
            // Tester si le courriel existe déjà
            $requete = "SELECT * FROM produits";
            $stmt = $connexion->prepare($requete);
            $stmt->execute();
            $reponse =   $stmt->get_result();
            listerProduits($reponse);
        }catch(Exception $e) {
            $msg = 'Erreur : '.$e->getMessage();
        }finally{
            // return $reponse;
        }
    }


	function listerProduits($produits){
			header ("Content-Type: text/xml");
			$rep="<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
			$rep.="<reponse>\n";
				$rep.="<listeProduits>";
					while($ligne=$produits->fetch(PDO::FETCH_OBJ)){
                        $rep.='<div class="card" style="width: 18rem;">
                        <a href="#"><img src="client/images/produits/cheddar" class="card-img-top"></a>
                        
                        <div class="card-body">
                            <a href="#"><h5 class="card-title">'.$ligne->nom.'</h5></a>
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
				$rep.="</listeProduits>\n";
			$rep.="</reponse>\n";
			echo $rep;
	}


?>