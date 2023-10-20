<?php
// Au début de PHP: Déclarer les types dans les paramétres des fonctions
declare (strict_types=1);

require_once(__DIR__.'/../ressources/bd/connexion.inc.php');
require_once(__DIR__.'/../ressources/bd/modele.inc.php');

class DaoGestionMembre{
    static private $modelMembre = null;
    
    private $reponse=array();
    private $connexion = null;
	
    private function __construct(){
        
    }
    
// Retourne le singleton du modèle 
	static function  getDaoMembre():DaoGestionMembre {
		if(self::$modelMembre == null){
			self::$modelMembre = new DaoGestionMembre();  
		}
		return self::$modelMembre;
	}

    function MdlM_modifierStatut($idm){
        $requete = "SELECT * FROM connexion WHERE idm=?"; 
        try{
            $instanceModele= modeleDonnees::getInstanceModele();
            $stmt = $instanceModele->executer($requete,[$idm]);
            if ($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
                if($ligne->statut == "A"){
                    $statut = "I";
                } else{ 
                    $statut = "A";
                }
                $requete = "UPDATE connexion SET statut =? WHERE idm=?"; 
                $stmt=$instanceModele->executer($requete,[$statut, $idm]);
                $this->reponse['OK'] = true;
                $this->reponse['msg'] = "Opération réussie";
                
            }
        } catch (Exception $e){ 
            $this->reponse['OK'] = false;
            $this->reponse['msg'] = "Problème pour obtenir les données des membres";
            //echo 'ERREUR: '.$e;
        }finally {
          //unset($connexion);
          return json_encode($this->reponse);
    } 
    }
	
    function MdlM_getAll() {

        $requete="SELECT m.idm, m.nom, m.prenom, m.datenaissance, m.courriel, m.sexe, m.photo, c.statut FROM membres m INNER JOIN connexion c ON m.idm = c.idm";
        try{
            $instanceModele= modeleDonnees::getInstanceModele();
            $stmt = $instanceModele->executer($requete,[]);
            $this->reponse['OK'] = true;
            $this->reponse['msg'] = "Opération réussie";
            $this->reponse['listeMembres'] = array();
            if ($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
                while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
                    $this->reponse['listeMembres'][] = $ligne;
                
                //listerMembres($ligne);
                }
            }
        } catch (Exception $e){ 
            $this->reponse['OK'] = false;
            $this->reponse['msg'] = "Problème pour obtenir les données des membres";
            //echo 'ERREUR: '.$e;
        }finally {
          //unset($connexion);
          return json_encode($this->reponse);
    } 
    
    
    }}
?>