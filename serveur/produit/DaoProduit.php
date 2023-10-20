<?php
// Au début de PHP: Déclarer les types dans les paramétres des fonctions
declare (strict_types=1);

require_once(__DIR__."/../ressources/bd/modele.inc.php");
require_once("Produit.php");

class DaoProduit {
    static private $modelProduit = null;    
    private $reponse=array();

    private function __construct(){
        
    }
    
// Retourne le singleton du modèle 
	static function  getDaoProduit():DaoProduit {
		if(self::$modelProduit == null){
			self::$modelProduit = new DaoProduit();  
		}
		return self::$modelProduit;
	}
	
    function Mdl_AjoutProduit($produit) {
        $nom = $produit->getNom();
        $categorie = $produit->getCateg();
        $ingredient = $produit->getIngredients();
        $prix = $produit->getPrix();
        $quantite = $produit->getQte();
        $photo = $produit->getPhoto();
        $msg = "";
    
        try{
            $requete = "SELECT * FROM produits WHERE nom=?";
            $instanceModele = modeleDonnees::getInstanceModele();
            $stmt = $instanceModele->executer($requete, [$nom]);
    
            if ($stmt->fetch(PDO::FETCH_OBJ)) {
                $msg = "Ce produit est déjà utilisé !!!";
            }else{
                $requete = "INSERT INTO produits VALUES (0,?,?,?,?,?,?)";
                $instanceModele->executer($requete, [$nom, $categorie, $ingredient, $prix, $quantite, $photo]);
    
                $msg = "Produit " .$nom. " bien enregistré.";
            }
        } catch (Exception $e) {
            $msg = 'Erreur: ' .$e->getMessage();
        } finally {
            return $msg;
        }
    }

    function uploadPhoto() {
        $targetRepertoire = "../../client/images/produits/";
        $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
    
        $nomFichier = $_FILES['photo']['name'];
        $fileType = strtolower(pathinfo($nomFichier, PATHINFO_EXTENSION));
    
        if (!in_array($fileType, $allowedTypes)) {
            return "Erreur 1";
        }
    
        $nomFichierUnique = uniqid() .'.'. $fileType;
    
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetRepertoire . $nomFichierUnique)) {
            return $nomFichierUnique;
        } else {
            return "Erreur 2";
        }
    }
	
    function MdlP_getAll():string {
        $requete="SELECT * FROM produits";
        
        try{
            $instanceModele= modeleDonnees::getInstanceModele();
            $stmt = $instanceModele->executer($requete,[]);
            $this->reponse['OK'] = true;
            $this->reponse['msg'] = "Opération réussie";
            $this->reponse['listeProduits'] = array();
            while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
                $this->reponse['listeProduits'][] = $ligne;
            }
        }catch (Exception $e){ 
            $this->reponse['OK'] = false;
            $this->reponse['msg'] = "Problème pour obtenir les données des produits";
        }finally {
          return json_encode($this->reponse);
        }
    }

    function MdlP_supprimer($idP):string {
        $requete="DELETE FROM produits where idP=?";
        $msg="";
        try{
            $instanceModele= modeleDonnees::getInstanceModele();
            $stmt = $instanceModele->executer($requete,[$idP]);
            $produitsAJ = self::$modelProduit->MdlP_getAll();
            $this->reponse = json_decode($produitsAJ);
        }catch (Exception $e){ 
            $this->reponse['OK'] = false;
            $this->reponse['msg'] = "Problème pour obtenir les données des produits";
        }finally {
            return json_encode($this->reponse);
        }
    }

    function MdlP_getCategorie():string {
        $requete="SELECT DISTINCT categorie FROM produits";
        
        try{
            $instanceModele= modeleDonnees::getInstanceModele();
            $stmt = $instanceModele->executer($requete,[]);
            $this->reponse['OK'] = true;
            $this->reponse['msg'] = "Opération réussie";
            $this->reponse['listeCategories'] = array();
            while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
                $this->reponse['listeCategories'][] = $ligne;
            }
        }catch (Exception $e){ 
            $this->reponse['OK'] = false;
            $this->reponse['msg'] = "Problème pour obtenir les données des produits";
        }finally {
          return json_encode($this->reponse);
        }
    }

//Houssam****************************************************


function MdlP_getByCategory($categorie): string {
    $requete = "SELECT * FROM produits WHERE categorie = ?";
    
    try {
        $instanceModele = modeleDonnees::getInstanceModele();
        $stmt = $instanceModele->executer($requete, [$categorie]);
        $this->reponse['OK'] = true;
        $this->reponse['msg'] = "Opération réussie";
        $this->reponse['listeProduits'] = array();
        while ($ligne = $stmt->fetch(PDO::FETCH_OBJ)) {
            $this->reponse['listeProduits'][] = $ligne;
        }
    } catch (Exception $e) {
        $this->reponse['OK'] = false;
        $this->reponse['msg'] = "Problème pour obtenir les données des produits par catégorie";
    } finally {
        return json_encode($this->reponse);
    }
}


function rechercherParMotCle(array $params): string {
    $instanceModele = modeleDonnees::getInstanceModele();
    $motCle = $params['motCle'];

    try {
        $requete = "SELECT * FROM produits WHERE nom LIKE :motCle OR ingredients LIKE :motCle";
        $stmt = $instanceModele->executer($requete, [':motCle' => '%' . $motCle . '%']);
        $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return json_encode(["OK" => true, "msg" => "Recherche réussie", "resultats" => $resultats]);
    } catch (Exception $e) {
        return json_encode(["OK" => false, "msg" => "Problème de recherche"]);
    }
}


}


?>