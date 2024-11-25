<?php
class client{
	public $user_prenom;
	public $user_name;
   public $age;
   public $region;
function __construct($user_prenom = null, $user_name = null, $age = null, $region = null)
{  
   $this->user_prenom = $user_prenom;
   $this->user_name = $user_name;
   $this->age = $age;
   $this->region = $region;
}
function insertuser()
{
require_once('config.php');
$mysqli=new mysqli(db_host,db_user,db_password,db_database);
$req = 'INSERT INTO `client` (nom, prenom, age, id_region) 
VALUES ("' . $this->user_name . '", "' . $this->user_prenom . '", ' . $this->age . ', ' . $this->region . ')';
$mysqli->query($req);															
$mysqli->close();
}
function supprimer($num)
{
require_once('config.php');
$mysqli=new mysqli(db_host,db_user,db_password,db_database);
$req='delete from client where id_client='.$num;
$mysqli->query($req);
$mysqli->close();
}
function listusers()
{
require_once('config.php');
$mysqli=new mysqli(db_host,db_user,db_password,db_database);
$query='SELECT * FROM `client` ';
$result=$mysqli->query($query);
return $result;
$mysqli->close();
}
function getuser()
{
require_once('config.php');
$mysqli=new mysqli(db_host,db_user,db_password,db_database);
$query='select user_id,user_name from users where user_id='.$this->user_id;
$result=$mysqli->query($query);
return $result;
$mysqli->close();
}

function modifuser($num)
{
require_once('config.php');
$mysqli=new mysqli(db_host,db_user,db_password,db_database);
$query='update client set nom='."'".$this->user_name."'". ' where id_client='.$num;
$mysqli->query($query);
$query='update client set prenom='."'".$this->user_prenom."'". ' where id_client='.$num;
$mysqli->query($query);

}
function existuser()
{
	require_once('config.php');
	$mysqli=new mysqli(db_host,db_user,db_password,db_database);
	$req='select count(*) from client where id_client='.$this->user_id;
	$res=$mysqli->query($req);
	return $res;
}	
}
