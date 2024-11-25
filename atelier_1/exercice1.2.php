<?php
    $tab = array(78,50,14,5430);
    function somme ($tab){
        $x=0;
        for($i=0;$i<count($tab);$i++){
            $x+=$tab[$i];
        }
        return $x;
    }
    $x=somme ($tab);
    echo"la somme des nombre du tableau est egale = $x";
?>