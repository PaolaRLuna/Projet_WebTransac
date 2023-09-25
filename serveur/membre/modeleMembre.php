<?php
    require_once('../bd/connexion.inc.php');

    function chargerPhoto($nom, $prenom){
        $photo = "avatar_membre.png";
        $dossierPhotos = "photos/";
        $objPhotoRecue = $_FILES['photo'];
        if( $objPhotoRecue['tmp_name'][0]!== ""){ // tester si une photo a été uplodée
            $nouveauNom = sha1($nom.$prenom.time()); // Générateur d'un string unique comme nom du fichier uplodé
            // Nom original du fichier uplodé $objPhotoRecue -> name
            // strrchr : cherche le point (.) dans le nom du fichier à partir de la droit
            $extension = strrchr($objPhotoRecue['name'][0],".");  // Obtenir l'extension du fichier original
            $photo = $nouveauNom.$extension;
            @move_uploaded_file($objPhotoRecue['tmp_name'][0],$dossierPhotos.$photo);
        }
        return $photo;
    }

    function Mdl_Ajouter($membre,$mdp){
        global $connexion;
        $nom = $membre->getNom(); 
        $prenom = $membre->getPrenom();
        $courriel = $membre->getCourriel();
        $sexe = $membre->getSexe();
        $daten = $membre->getDaten();
        $msg = "";
        try{
            // Tester si le courriel existe déjà
            $requete = "SELECT * FROM membres WHERE courriel=?";
            $stmt = $connexion->prepare($requete);
            $stmt->bind_param("s", $courriel);
            $stmt->execute();
            $reponse =   $stmt->get_result();
            if ($reponse->num_rows == 0) { // OK, courriel n'existe pas
                $photo = chargerPhoto($nom,$prenom);
                $requete = "INSERT INTO membres VAlUES (0,?,?,?,?,?,?)";
                $stmt = $connexion->prepare($requete);
                $stmt->bind_param("ssssss", $nom,$prenom,$courriel,$sexe,$daten,$photo);
                $stmt->execute();
                $idm = $connexion->insert_id;

                $requete = "INSERT INTO connexion VAlUES (?,?,?,'M','A')";
                $stmt = $connexion->prepare($requete);
                $stmt->bind_param("iss", $idm,$courriel,$mdp);
                $stmt->execute();
                $msg="Membre ".$membre->getPrenom().", ".$membre->getNom()." bien enregistré";
            } else { // Courriel existe déjà
                $msg = "Ce courriel est déjà utilisé";
            }
        }catch(Exception $e) {
            $msg = 'Erreur : '.$e->getMessage();
        }finally{
            header("Location: ../../index.php?msg=$msg");
            exit();
            
        }
    }
?>