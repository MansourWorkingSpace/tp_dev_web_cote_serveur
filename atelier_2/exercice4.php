<html><head><title>Formulaire</title></head><body>
<form action="" method="get">
        <label for="nom">nom:  </label>
        <input type="text" name="nom" id="">
        <br><br>
        <label for="prenom">prenom:  </label>
        <input type="text" name="prenom" id="">
        <br><br>
        <label for="year">année de naissance</label>
        <input type="text" name="d" id="">
        <br><br>
        <input type="submit" value="envoyer">
    </form>
    <?php
        if(!Empty($_GET["d"]) && !Empty($_GET["nom"]) && !Empty($_GET["prenom"])){
        // récupère le paramètre year
            $year = $_GET["d"];
            $nom = $_GET["nom"];
            $prenom = $_GET["prenom"];
            $annee=date("Y") ;
            if(ctype_digit($year)&& $annee-$year<=120 && $annee-$year>=1){
                echo"<br> <br>bonjour: $prenom $nom <br> <br> vous etes né en $year<br> <br>et nous sommes en  $annee<br> <br> donc vous avez environ " . $annee-$year;
            }else if(ctype_digit($year) && ($annee-$year<=120 || $annee-$year>=1)){
                echo"<br> <br>bonjour: $prenom $nom <br> <br> vous etes né en $year<br> <br>et nous sommes en  $annee<br> <br> donc votre age n'est pas raisonable";
            }else{
                echo "<br> <br>l'année est invalide <br><br>";
            }
        
        }else{
            echo "<br> <br>Parametre manquant !<br /><br />";
        }
    ?>
</body></head></html>