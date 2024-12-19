<?php
require_once('emprunt.php');
require_once('livre.php');
$liv=new livre($_POST['numlivre'],null,null,0,null);
$row=$liv->verifnbexemplaire();
echo $row[0];
if($row[0]>0)
{
$em=new emprunt ($_POST['cin'],$_POST['numlivre'],$_POST['date']);
$em->ajoutEmprunt();
}
else
{
    
	echo "livre n'est pas disponible";
}
?>