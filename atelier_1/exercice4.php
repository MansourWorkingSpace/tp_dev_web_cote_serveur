<?php
    $ages = array(
        'Mouna' => '20' ,
        'Ali' => '30' ,
        'Salah' => '25' ) ;
    if(array_key_exists( 'Mouna' , $ages )){
            echo "l'age de Mouna est = $ages[Mouna] <br>" ;  
    }
    $identite=array(
        "personne 1"=> array("nom" => "Miled", "prenom"=>"Ali", "age"=>"30"), 
        "personne 2"=> array("nom" => "Sfar", "prenom"=>"Mouna", "age"=>"23"),
        "personne 3"=> array("nom" => "ben Salah", "prenom"=>"Mohamed", "age"=>"36"));
    $identite["personne 4"] = array("nom" => "Yousfi", "prenom" => "Imed", "age" => "48");
    foreach($identite as $personne => $details){
        echo("$details[nom]<br>");
    }
?>