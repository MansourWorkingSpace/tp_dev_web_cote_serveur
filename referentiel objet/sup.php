<?php
require_once('users.php');
$us=new users($_GET['user_id']);
$us-> supprimer();
header('Location:accueil.php');
exit();
?>