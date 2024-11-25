<?php
    if (!extension_loaded('mysqli'))
    die("L'extension mysqli n'est pas présente !");
    $link = mysqli_connect('localhost', 'root', '', 'test');
    if (!$link)
    die('Echec de connexion au serveur de base de données : ' . mysqli_connect_error);
    echo 'Fonctions mysqli : succès ... ' . mysqli_get_host_info($link) . " - MySQL server version : " .
    $nom=$_GET["nom"];
    $prenom=$_GET["prenom"];
    $cin=$_GET["cin"];
    $query="INSERT INTO personne VALUES('$cin','$nom','$prenom')" ;
    mysqli_query($link,$query) or die ("Echecs de la requete 2") ;
    mysqli_close($link);
?>
