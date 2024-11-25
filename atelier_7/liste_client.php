<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
require_once('client.php');
$us=new client();
$result=$us->listusers();
echo"<table border = 2>
<tr>
<td>Nom client</td>
<td>prenom client</td>
<td>age</td>
<td>id_region</td>
<td>Modifier</td>
<td>Supprimer</td>
</tr>";
while($row=$result->fetch_array(MYSQLI_ASSOC))
{
echo "<tr><td>$row[nom]</td><td>$row[prenom]</td><td>$row[age]</td><td>$row[ID_region]</td>
<td><a href ='modif.php?id_client=$row[ID_client]'>Modifier</a></td>
<td><a href='sup.php?id_client=$row[ID_client]'>Supprimper</a></td>
</tr>";
}
$result->close();
echo '</table>'
?><a href="ajouter.html">ajouter client</a></body></html>
