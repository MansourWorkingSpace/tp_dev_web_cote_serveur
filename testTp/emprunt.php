<?php
class emprunt{
	public $cin;
    public $numlivre;
    public $dateEmprunt;
    public function __construct($cin,$numlivre, $dateEmprunt) {
        $this->numlivre = $numLivre;
        $this->cin = $cin;
        $this->dateEmprunt = $dateEmprunt;
    }
function ajoutEmprunt (){
    require_once('config.php');
    $mysqli=new mysqli(db_host,db_user,db_password,db_database);
    $req='insert into Emprunt values ('.$this->cin.",'".$this->numlivre."','".$this->dateEmprunt."')";
    $mysqli->query($req);
    $req="update table livre set NED=NED-1 where numLivre=$this.numlivre";
    $mysqli->query($req);
    echo"emprunt ajouter avec succees";
    $mysqli->close();
}
function supprimer()
{
require_once('config.php');
$mysqli=new mysqli(db_host,db_user,db_password,db_database);
$req='delete from Emprunt where cin='.$this->cin."and numLivre='".$this->numlivre."'and dateEmprunt='".$this->dateEmprunt."'";
$mysqli->query($req);
$mysqli->close();
}
}

?>