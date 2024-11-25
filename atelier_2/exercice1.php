<html><head><title>Formulaire</title></head><body>
<?php if(!Empty($_GET["d"]) && !Empty($_GET["nom"]) && !Empty($_GET["prenom"])){
        // récupère le paramètre year
        $year = $_GET["d"];
        $nom = $_GET["nom"];
        $prenom = $_GET["prenom"];
        $annee=date("Y") ;
        // Attention les paramètres d’url sont passées sous forme de chaîne de caractères
        echo "<pre>Débogage variable year : "; var_dump($year); echo "</pre>";
        // vérifie que le paramètre year est valide
        if(ctype_digit($year)){
            if($year%4 == 0){
                echo "l'année de naissance de $prenom $nom $year est bissextile<br /><br />";
            }else{
                echo "l'année $prenom $nom  $year n'est pas bissextile<br /><br />";
            }
            echo"l'age de $prenom $nom est " . $annee - $year;
        }else{
            echo "l'année est invalide <br><br>";
        }
    }else{
        echo "Parametre manquant !<br /><br />";
    }?>
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
</body></head></html>