<html><head><title>Formulaire</title></head><body>
<FORM ACTION="" method="post">
<SELECT NAME="prenom">
<OPTION VALUE="choisir un prénom" selected>choisir un prénom
<OPTION VALUE="sondes">sondes
<OPTION VALUE="rami">rami
<OPTION VALUE="aymen">aymen
<OPTION VALUE="soumaya">soumaya
<OPTION VALUE="aya">aya
</SELECT>
<INPUT TYPE="submit" VALUE="renseignements">
<?php
    $prenoms=array( "element1"=>array("prenom"=> "sondes", "nom"=>"ben salah","ville"=>"tunis","tel"=>"22987612"),
        "element2"=>array("prenom"=> "rami", "nom"=>"merdassi","ville"=>"mahdia","tel"=>"40332098"),
        "element3"=>array("prenom"=> "aymen" , "nom"=>"sfar","ville"=>"sousse","tel"=>"99659437"),
        "element4"=>array("prenom"=> "soumaya" , "nom"=>"ganzoui","ville"=>"gafsa","tel"=>"97510974"),
        "element5"=>array("prenom"=> "aya" , "nom"=>"moradi","ville"=>"siliana","tel"=>"20934271"));
    if(!empty($_POST["prenom"] && $_POST["prenom"] != "choisir un prénom")){
        $prenom = $_POST["prenom"];
        foreach($prenoms as $element){
            if(in_array("$prenom",$element)){
                echo"<br> <br> prenom: $prenom <br> <br> nom: $element[nom] <br> <br> tel : $element[tel] <br> <br>ville: $element[ville]";
            }
        }
    }else{
        echo"<br> <br> choisir un prenom svp <br>";
    }
?>
</body></head></html>