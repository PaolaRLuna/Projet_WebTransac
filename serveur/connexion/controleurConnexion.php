<?php
    session_start();
    require_once('modeleConnexion.php');

    function Ctr_Connexion(){
        $courriel= $_POST['courrielco'];
        $mdp=$_POST['passwordco'];
        
        $msg = Mdl_Connexion($courriel, $mdp);
        return $msg;
    }

    function Ctr_DeConnexion(){
        unset($_SESSION);
        session_destroy();
        header('Location: ../../index.php');
        exit();
    }

    // Le contrôleur
    $action = $_POST['action'];
    switch($action){
        case 'connexion': 
            echo Ctr_Connexion();
        break;
        case "deconnexion":
            Ctr_DeConnexion();
        break;
    } 
?>
<br/>
<a href="../../index.php">Retour à la page d'accueil</a>