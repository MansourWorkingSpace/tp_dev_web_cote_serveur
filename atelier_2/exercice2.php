<html><head><title>Formulaire</title></head><body>

<form action="" method="get">
    <label for="nom">nom:  </label>
    <input type="text" name="nom" id="">
    <br><br>
    <label for="prenom">prenom:  </label>
    <input type="text" name="prenom" id="">
    <input type="submit" value="ok">
    <br><br>
</form>
<?php
    if(!Empty($_GET["nom"]) && !Empty($_GET["prenom"])){
        $nom=$_GET["nom"];
        $prenom=$_GET["prenom"];
        echo"bonjour $prenom $nom <br><br>";
    }else{
        echo"parametre manquant <br><br>";
    }
?>
</body></head></html>