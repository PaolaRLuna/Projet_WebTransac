<?php
    require_once('includes/Membre.inc.php');
    require_once('modeleMembre.php');

    
    if(!empty($_POST["password"]) && $_POST["password"] != "") {
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        if (strlen($_POST["password"]) <= '8' && strlen($_POST["password"]) >= '10') {
            $err .= "Votre mot de passe doit avoir entre 8 et 10 characters !"."<br>";
        }
        elseif(!preg_match("#[0-9]+#",$password)) {
            $err.= "Votre mot de passe doit contenir au moins un chiffre !"."<br>";
        }
        elseif(!preg_match("#[A-Z]+#",$password)) {
            $err .= "Votre mot de passe doit contenir au moins une lettre majuscule !"."<br>";
        } 
        elseif(!preg_match("#[a-z]+#",$password)) {
            $err .= "Votre mot de passe doit contenir au moins une lettre minuscule !"."<br>";
        } 
        elseif(!preg_match('/[\'^£!$%&*()}{@#~?><>,|=_+¬-]/', $_POST["password"])) {
            $err .= "Votre mot de passe doit contenir au moins un character special !"."<br>";
        } 
        elseif (strcmp($password, $cpassword) !== 0) {
            $err .= "Les mots de passe ne correspondent pas !";
        }
    }
    elseif(!empty($_POST["password"]) && empty($_POST["password"])) {
        $err = "Veuillez confirmer votre mot de passe !";
    } else {
        $err = "Rentrez votre mot de passe.";
    }

    if (isset($err)){
        header("Location: ../../index.php?msg=$err");
            exit();
    } else{
        Ctr_Ajouter();
    }

    function Ctr_Ajouter(){
        $nom = $_POST['nom'];
        $prenom=$_POST['prenom'] ;
        $courriel= $_POST['courriel'];
        $sexe=$_POST['sexe'];
        $daten=$_POST['daten'];
        
        $membre = new Membre(0,$nom,$prenom,$courriel,$sexe,$daten," ");
        Mdl_Ajouter($membre,$_POST['password']);
        
    }
    
?>