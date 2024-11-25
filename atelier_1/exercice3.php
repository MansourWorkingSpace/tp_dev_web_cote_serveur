<?php
    $clients = array( "client 1"=>array("nom 1"=>"Dulong","ville 1"=>"Paris","age 1"=>"35"),
    "client 2"=>array("nom 2"=>"Leparc","ville 2"=>"Lyon","age 2"=>"47"),
    "client 3"=>array("nom 3"=>"Dubos","ville 3"=>"Tours","age 3"=>"58"),
    "client 4"=>array("nom 3"=>"crespo","ville 4"=>"edinburgh","age4"=>"56"));

    echo"<table border='1'> <tr><th>client</th><th>nom</th><th>ville</th><th>age</th></tr>";
    foreach ($clients as $client => $details) {
        echo "<tr><td>$client</td>";
        foreach ($details as $value) {
            echo "<td>$value</td> " ;
        }
        echo "</tr>";
    }
    echo"</table>";
?>