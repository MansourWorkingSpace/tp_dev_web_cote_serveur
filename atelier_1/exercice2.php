<?php
    $semestre=array(1=>"janvier","fevrier","mars","avril","mai","juin");
    echo"parcours du tableau \$semestre <br>";
    $nb=count($semestre);
    for($i=1;$i<=$nb;$i++)//boucle for
    echo"\$semestre[$i] = $semestre[$i]<br>";
    echo"liste des mois du semestre<br>";
    foreach($semestre as $mois)//foreach( array_expression as $value)
    echo"$mois<br>";
    echo"liste des associations(cle,valeur)<br>";
    reset($semestre);
    foreach($semestre as $cle => $valeur)//foreach ( array_expression as $ key => $value)
    echo"$cle ---> $valeur <br>";
?>