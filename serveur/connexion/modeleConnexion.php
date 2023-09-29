<?php
    require_once(__DIR__.'/../bd/connexion.inc.php');

    function Mdl_Connexion($courriel, $mdp){
        global $connexion;
        $msg = "";
        try{
            // Tester si le courriel existe déjà
            $requete = "SELECT * FROM connexion WHERE courriel=? AND pass=?";

            $stmt = $connexion->prepare($requete);
            $stmt->bind_param("ss", $courriel, $mdp);
            $stmt->execute();
            $reponse = $stmt->get_result();

            if ($reponse->num_rows > 0) { // OK, courriel et mot de passe existent
                $ligne = $reponse->fetch_object();
                if($ligne->statut == 'A'){ 
                    $requete = "SELECT * FROM membres WHERE courriel=?";
                    $stmt = $connexion->prepare($requete);
                    $stmt->bind_param("s", $courriel);
                    $stmt->execute();
                    $reponse =   $stmt->get_result();
                    $ligne2 = $reponse->fetch_object();
                    $_SESSION['prenom'] = $ligne2->prenom;
                    $_SESSION['nom'] = $ligne2->nom;
                    $_SESSION['photo'] = "../membre/photos/".$ligne2->photo;
                    //Si c'est un membre
                    if($ligne->role == 'M'){
                        $_SESSION['role'] = 'M';
                        header('Location: ../membre/membre.php');
                        exit();
                    } else { // Dans ce cas c'est un admin
                        $_SESSION['role'] = 'A';
                        header('Location: ../admin/admin.php');
                        exit();
                    }
                } else {// Membre inactif
                    $msg = "SVP contactez l'administrateur";
                } 
            } else {
                $msg = "Mot de passe ou nom d'utilisateur incorrect";
            }
        } catch(Exception $e) {
            $msg = 'Erreur : ' . $e->getMessage();
            //$msg = 'Erreur : '.$e->getMessage().'<br>';
        }finally{
            header("Location: ../../index.php?msg=$msg");
            return $msg;
        }
    }
?>