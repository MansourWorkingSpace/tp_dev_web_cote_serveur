<?php
$link = mysqli_connect('127.0.0.1', 'root', '', 'exemple1');
if (!$link)
die('Echec de connexion au serveur de base de données : ' . mysqli_connect_error() . '('
.mysqli_connect_errno() . ') ');
if ($result = mysqli_query($link, "SELECT * from t_personne ;")){
echo "Fonctions mysqli : la requête a retourné ".mysqli_num_rows($result)."
enregistrement(s).<br><br />\n";
while($row = mysqli_fetch_array($result)){
$Nom = $row["nom"];
$Prenom = $row["prenom"];
echo "$Nom - $Prenom<br />";
}
/* Libération des résultats */
mysqli_free_result($result);/*5arej données mil memoire*/
}
mysqli_close($link);
?>