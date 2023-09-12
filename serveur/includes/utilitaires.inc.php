<?php
    function afficherTR(){
        global $tab; // variable global tab
        $lesTR="";
        for($i=0; $i < count($tab); $i++){
            if($tab[$i] % 2 != 0){ //si c'est impair
                $lesTR.="<tr><td>".$tab[$i]."</td></tr>";  //il construit le tr
            }
        }
        return $lesTR;
   }
?>