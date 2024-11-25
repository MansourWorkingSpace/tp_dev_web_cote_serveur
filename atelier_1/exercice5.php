<?php
    $age=20;
    echo"j'ai ". $age . " ans<br>";
    echo"j'ai $age ans<br>";
    $chaine1="Ali";
    $chaine2="Ali";
    $test=$chaine1==$chaine2;
    echo "$test <br>";
    $test=strcmp($chaine1,$chaine2);
    echo "$test<br>";
    $test=strcmp("bonjour","Bonjour");
    echo "$test";
?>