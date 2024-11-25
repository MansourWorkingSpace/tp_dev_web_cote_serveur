<?php
require_once('users.php');
$us=new users($_POST['user_id'],$_POST['user_nom']);
$res=$us->existuser();
//$row=$result->fetch_array(MYSQLI_ASSOC);
$row=$res->fetch_array(MYSQLI_NUM);
if($row[0]==0)
{
$us->insertuser();
header('location:inscript.html');
}
else
{
	echo "Utilisateur existe deja";
}
?>
