<?php
class users{
	public $user_id;
	public $user_name;
function __construct()
{
   $num=func_num_args();
   switch($num)
   {
      case 1:
         //un seul param�tre pass�
         $this->user_id=func_get_arg(0);
         break;
      case 2:
         //deux param�tres pass�s
         $this->user_id=func_get_arg(0);
         $this->user_name=func_get_arg(1);
         break;
      default:
   }
}
function insertuser()
{
require_once('config.php');
$mysqli=new mysqli(db_host,db_user,db_password,db_database);
$req='insert into `users` values('.$this->user_id.','."'".$this->user_name."'".')';
$mysqli->query($req);															
$mysqli->close();
}
function supprimer()
{
require_once('config.php');
$mysqli=new mysqli(db_host,db_user,db_password,db_database);
$req='delete from users where user_id='.$this->user_id;
$mysqli->query($req);
$mysqli->close();
}
function listusers()
{
require_once('config.php');
$mysqli=new mysqli(db_host,db_user,db_password,db_database);
$query='SELECT * FROM `users` ';
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

function modifuser()
{
require_once('config.php');
$mysqli=new mysqli(db_host,db_user,db_password,db_database);
$query='update users set user_name='."'".$this->user_name."'". ' where user_id='.$this->user_id;
$mysqli->query($query);
}
function existuser()
{
	require_once('config.php');
	$mysqli=new mysqli(db_host,db_user,db_password,db_database);
	$req='select count(*) from users where user_id='.$this->user_id;
	$res=$mysqli->query($req);
	return $res;
}	
}
