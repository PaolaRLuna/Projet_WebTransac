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
            while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
                $this->reponse['listeMembres'][] = $ligne;
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

    function MdlM_chargerMembre($idMembre) {
        // Préparez la requête SQL pour récupérer les informations du membre spécifique
        $requete = "SELECT * FROM membres m INNER JOIN connexion c ON m.idm = c.idm WHERE m.idm = ?";
    
        try {
            // Obtenez l'instance du modèle de données
            $instanceModele = modeleDonnees::getInstanceModele();
            // Exécutez la requête avec l'ID du membre
            $stmt = $instanceModele->executer($requete, [$idMembre]);
    
            // Si les données sont récupérées avec succès
            if ($ligne = $stmt->fetch(PDO::FETCH_OBJ)) {
                // Stockez les données du membre dans le tableau de réponse
                $this->reponse['OK'] = true;
                $this->reponse['msg'] = "Opération réussie";
                $this->reponse['donneesMembre'] = $ligne; // Contiendra les informations du membre
            } else {
                // Si aucun membre n'est trouvé avec cet ID
                $this->reponse['OK'] = false;
                $this->reponse['msg'] = "Aucun membre trouvé avec l'ID spécifié";
            }
        } catch (Exception $e) {
            // Gestion des erreurs
            $this->reponse['OK'] = false;
            $this->reponse['msg'] = "Problème pour obtenir les données du membre: " . $e->getMessage();
        } finally {
            // Retournez la réponse sous forme de JSON
            return json_encode($this->reponse);
        }
    }


    function MdlM_mettreAJourMembre($idm, $nom, $prenom, $courriel, $sexe, $datenaissance, $photo) {
        // Assurez-vous que la connexion à la base de données est établie
        $instanceModele = modeleDonnees::getInstanceModele();
    
        // Validation et nettoyage des entrées
        $idm = filter_var($idm, FILTER_SANITIZE_NUMBER_INT);
        $nom = filter_var($nom, FILTER_SANITIZE_STRING);
        $prenom = filter_var($prenom, FILTER_SANITIZE_STRING);
        $courriel = filter_var($courriel, FILTER_SANITIZE_EMAIL);
        $sexe = filter_var($sexe, FILTER_SANITIZE_STRING);
        $datenaissance = filter_var($datenaissance, FILTER_SANITIZE_STRING);
    
        // Traitement de la photo si nécessaire
        // ... (Votre logique de traitement d'image ici)
    
        // Préparation de la requête SQL
        $requete = "UPDATE membres SET nom=?, prenom=?, sexe=?, datenaissance=?, photo=? WHERE idm=?";
    
        try {
            // Exécution de la requête
            $stmt = $instanceModele->executer($requete, [$nom, $prenom, $sexe, $datenaissance, $photo, $idm]);
    
            if ($stmt->rowCount() > 0) {
                $reponse['OK'] = true;
                $reponse['msg'] = "Membre mis à jour avec succès";
            } else {
                $reponse['OK'] = false;
                $reponse['msg'] = "Aucune mise à jour nécessaire ou le membre n'existe pas.";
            }
        } catch (Exception $e) {
            $reponse['OK'] = false;
            $reponse['msg'] = "Erreur lors de la mise à jour des données du membre: " . $e->getMessage();
        } finally {
            return json_encode($reponse);
        }
    }
    

}

    
?>