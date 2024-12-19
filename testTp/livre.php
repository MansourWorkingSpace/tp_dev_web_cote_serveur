<?php
class livre{
	public $numLivre;
	public $typeLivre;
    public $titreLivre;
    public $ned;
    public $auteur;
    public function __construct($numLivre, $typeLivre, $titreLivre, $ned, $auteur) {
        $this->numLivre = $numLivre;
        $this->typeLivre = $typeLivre;
        $this->titreLivre = $titreLivre;
        $this->ned = $ned;
        $this->auteur = $auteur;
    }

function AfficheTypeLivre(){
    require_once('config.php');
    $mysqli=new mysqli(db_host,db_user,db_password,db_database);
    $req="select distinct typeLivre from livre";
    $res=$mysqli->query($req);
    $mysqli->close();
    return $res;
}	
function VerifLivre()
{
	require_once('config.php');
	$mysqli=new mysqli(db_host,db_user,db_password,db_database);
	$req='select count(*) from users where NumLivre='.$this->numLivre;
	$res=$mysqli->query($req);
    $row=$mysqli->fetch_array(MYSQLI_NUM);
    if($row[0]==0){
        return 0;
    }else{
        return 1;
    }
    $mysqli->close();
}
function verifnbexemplaire(){
    require_once('config.php');
	$mysqli=new mysqli(db_host,db_user,db_password,db_database);
    $req="SELECT NED FROM livre WHERE NumLivre=$numLivre";
    $res=$mysqli->query($req);
    $row=$res->fetch_array(MYSQLI_NUM);
    echo $row[0];
    return $row[0];
    $mysqli->close();
}
}
