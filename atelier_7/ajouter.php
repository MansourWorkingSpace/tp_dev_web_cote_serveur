<?php
require_once('client.php');
$region_id;
switch($_POST['region']){
	case "Mahdia":
		$region_id=1;
		break;
	case "Tunis":
		$region_id=2;
		break;
	case "Gafsa":
		$region_id=3;
		break;
    case "Kef":
		$region_id=4;
		break;
	default:
	    $region_id=5;
}
$us=new client($_POST['prenom'],$_POST['nom'],$_POST['age'],$region_id);
$us->insertuser();
header('location:ajouter.html');
?>