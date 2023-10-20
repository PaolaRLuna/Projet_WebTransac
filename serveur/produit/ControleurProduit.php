<?php
       
    require_once("Produit.php");
    require_once("DaoProduit.php");

 class ControleurProduit { 
    static private $instanceCtr = null;
    
    private $reponse;

    private function __construct(){

    }

     // Retourne le singleton du modèle 
	static function  getControleurProduit():ControleurProduit{
		if(self::$instanceCtr == null){
			self::$instanceCtr = new ControleurProduit();  
		}
		return self::$instanceCtr;
	}

	function CtrF_Enregistrer(){
        // $produit = new Produit(0,$_POST['titre'], (int)$_POST['duree'], $_POST['res'],"Pochette");
       //  return DaoProduit::getDaoProduit()->MdlF_Enregistrer($produit); 
    }

    function CtrP_getAll(){
        return DaoProduit::getDaoProduit()->MdlP_getAll(); 
    }

    function CtrP_getCategories(){
        return DaoProduit::getDaoProduit()->MdlP_getCategorie(); 
    }


    function CtrP_supprimer(){
        $idP = $_POST['id'];
        return DaoProduit::getDaoProduit()->MdlP_supprimer($idP);  
    }


    
    //Houssam****************************************************


    function CtrP_listerParCategorie() {
        $categorie = $_POST['categorie'];
        return DaoProduit::getDaoProduit()->MdlP_getByCategory($categorie);
    }
    

    function CtrP_rechercherParMotCle(){
        $params = ["motCle" => $_POST['motCle']];
        return DaoProduit::getDaoProduit()-> rechercherParMotCle($params);
    }

    

    function CtrP_Actions(){
        $action=$_POST['action'];
        switch($action){
            case "enregistrer" :
                return  $this->CtrF_Enregistrer();
                break;
            case "modifier" :
                //modifier(); 
                break;
            case "supprimer" :
                return $this->CtrP_supprimer(); 
                break;
            case "lister" :
                return $this->CtrP_getAll(); 
                break;
            case "recupererCategories" :
                return $this->CtrP_getCategories(); 
                break;
            case "rechercherParMotCle":
                return $this->CtrP_rechercherParMotCle();
                break;
            case "rechercherParCategorie":
                return $this->CtrP_listerParCategorie();
                break;
        }
        // Retour de la réponse au client
       
    }
}
?>