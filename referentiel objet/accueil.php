<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
require_once('users.php');
$us=new users();
$result=$us->listusers();
echo"<table border = 2>
<tr>
<td>Numero utilisateur</td>
<td>Nom utilisateur</td>
<td>Modifier</td>
<td>Supprimer</td>
</tr>";
while($row=$result->fetch_array(MYSQLI_ASSOC))
{
echo "<tr><td>$row[user_id]</td><td>$row[user_name]</td>
<td><a href ='modif.php?user_id=$row[user_id]'>Modifier</a></td>
<td><a href='sup.php?user_id=$row[user_id]'>Supprimper</a></td>
</tr>";
}
$result->close();
echo '</table>'
?><a href="inscript.html">Inscription</a></body></html>
