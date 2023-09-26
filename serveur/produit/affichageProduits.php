<?php
    require_once('../bd/connexion.inc.php');
    global $connexion;
    // $produits = glob('client/images/produits/*.jpg');
              
    try{
        $requete = "SELECT * FROM produits";
        $stmt = $connexion->prepare($requete);
        $stmt->execute();
        $reponse =  $stmt->get_result();
    }catch(Exception $e) {
    }

    // foreach ($produits as $produit) {
    while($ligne=$reponse->fetch(PDO::FETCH_OBJ)){
        echo '<p>'.$ligne->nom.'</p>'
    }
    
?>