<?php 
    $h1="<h1>Calcul sur les variables</h1>";
    $tva = 0.206;
    $prix = 150;
    $nombre = 10;
    echo"le montant HT est egal a " . $prix*$nombre ." et est " . gettype($prix*$nombre) . "<br>";
    echo"le montant TTC est egal a " . $prix*$nombre + $prix*$nombre*$tva ." et est " . gettype($prix*$nombre + $prix*$nombre*$tva) . "<br>";
    echo"la variable $prix est de type " . gettype($prix) . "<br>";
    echo"la variable $tva est de type " . gettype($tva) . "<br>"; 
    echo"la variable $nombre est de type " . gettype($nombre);
?>