<?php
    session_start();
    require_once('modeleConnexion.php');

    function Ctr_GetAll(){
        $msg = Mdl_GetAll();
        return $msg;
    }


    // Le contrôleur
    $action = $_POST['action'];
    switch($action){
        case 'getAll': 
            echo Ctr_GetAll();
        break;
    } 
?>