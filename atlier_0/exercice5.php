<?php
    $nbre=15;
    $s=0;
    for ($i=1;$i<=$nbre;$i++) {
        $s+=$i;    
    }
    echo"la somme des entiers entre 1 et $nbre = $s <br>";
    $i=1;
    $s=0;
    while ($i<=$nbre) {
        $s+=$i;
        $i++;  
    }
    echo"la somme des entiers entre 1 et $nbre = $s";
?>