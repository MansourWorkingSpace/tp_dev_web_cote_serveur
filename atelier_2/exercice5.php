<?php
    $vendeurs = array(
    "dupont" => "M. Dupont",
    "louis" => "M. Louis",
    "martin" => "M. Martin",
    "durand" => "M. Durand"
    );
    echo"liste des vendeurs: <br> <br>";
    echo'<form action="affichage.php" method="post">';
    echo'<label for="nom">Choisissez un nom :</label><br><br>';
    echo'<select name="nom" id="nom">';
    foreach ($vendeurs as $option ){
        echo '<option value="' . $option . '">' . $option . '</option>';
    }
    echo'</select> <br><br>';
    require('exercice5.appele.php');
    echo"liste des produits <br><br>";
    echo'<select name="produit" id="produit">';
    foreach ($products as $product) {
        echo '<option value="' . $product .'">'. $product . '</option>';
    }
    echo'</select> <br><br>';
    echo'Nombre de produits a commander : ';
    echo'<input type="number" name="nombre" id=""> <br><br>';
    echo'<input type="submit" value="soumettre">';
    echo'</form>';
?>