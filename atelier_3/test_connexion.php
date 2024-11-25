<?php
    if (!extension_loaded('mysqli'))
    die("L'extension mysqli n'est pas présente !");
    $link = mysqli_connect('localhost', 'root', '', 'exemple1');
    if (!$link)
    die('Echec de connexion au serveur de base de données : ' . mysqli_connect_error);
    echo 'Fonctions mysqli : succès ... ' . mysqli_get_host_info($link) . " - MySQL server version : " .
    mysqli_get_server_info($link) . "<br />\n";
    mysqli_close($link);
?>