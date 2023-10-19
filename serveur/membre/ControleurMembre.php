<?php
       
    require_once("DaoGestionMembre.php");

 class ControleurMembre { 
    static private $instanceCtr = null;
    
    private $reponse;

    private function __construct(){

    }

     // Retourne le singleton du modèle, controleur pour gerer films
	static function  getControleurMembre():ControleurMembre{
		if(self::$instanceCtr == null){
			self::$instanceCtr = new ControleurMembre();  
		}
		return self::$instanceCtr;
	}

    function CtrM_getAll(){
         return DaoGestionMembre::getDaoMembre()->MdlM_getAll(); 
    }

    function CtrM_Actions(){ // il est appelé a partir de routes.php
        $action=$_POST['action'];
        switch($action){
            case "fiche" :
                //fiche(); 
            break;
            case "modifier" :
                //modifier(); 
            break;
            case "enlever" :
                //enlever(); 
            break;
            case "lister" :
                return $this->CtrM_getAll(); 
        }
        // Retour de la réponse au client
       
    }
}
?>