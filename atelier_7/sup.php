<?php
require_once('client.php');
$us=new client(null,null,null,null);
$us-> supprimer($_GET['id_client']);
header('Location:liste_client.php');
exit();
?>