<?php
    require_once(__DIR__.'/../env/env.inc.php');
    // Avec le API mysqli
    $connexion = new mysqli(SERVEUR,USAGER,MDP,BD);
    if($connexion->connect_errno) {
        echo "Problème de connexion au serveur de bd";
        exit();
    }
    // Avec le API PDO
?>