<?php
    require_once('../env/env.inc.php');
    // Avec le API mysqli
    $connexion = new mysqli(SERVEUR,USAGER,MDP,BD);
    if($connexion->connect_errno) {
        echo "Problème de connexion au serveur de bd";
        exit();
    }
    // Avec le API PDO
?>