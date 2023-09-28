<?php
    // session_start();
    // require_once('modeleConnexion.php');

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

           
    require_once("Film.php");
    require_once("DaoFilm.php");




    function CtrF_getAll(){
         return DaoFilm::getDaoFilm()->MdlF_getAll(); 
    }

    function CtrF_Actions(){
        $action=$_POST['action'];
        switch($action){
            case "lister" :
                return $this->CtrF_getAll(); 
        }
       
    }

?>

