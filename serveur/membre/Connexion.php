<?php
    require_once('modeleConnexion.php');

    function Ctr_Connexion(){
        $courriel= $_POST['courrielco'];
        $mdp=$_POST['passwordco'];
        
        $msg = Mdl_Connexion($courriel, $mdp);
        return $msg;
    }
    $msg = Ctr_Connexion();
    echo $msg;
?>
<br/>
<a href="../../index.php">Retour à la page d'accueil</a>