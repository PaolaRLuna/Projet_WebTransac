<?php
    // Au début de PHP: Déclarer les types dans les paramétres des fonctions
    declare (strict_types=1);

    //require_once(__DIR__."/serveur/produit/ControleurProduit.php");
    require_once(__DIR__."/../produit/ControleurProduit.php");
    $instanceCtr = ControleurProduit::getControleurProduit();
    echo $instanceCtr->CtrP_Actions();

    // if(isset($_POST['action']) && $_POST['action'] == 'enregistrer') {
    //     $result = ControleurProduit::getControleurProduit()->CtrF_AjouterProduit();
    //     header('Content-Type: application/json');
    //     echo json_encode(['result' => $result]);
    //     exit;
    // }
?>