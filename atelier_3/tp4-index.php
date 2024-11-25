<html><head><title>Formulaire</title></head><body>
<form action="ajout.php" method="get">
        <table border="1">
            <thead>
                <th colspan="2">
                    ajouter une personne
                </th>
            </thead>
            <tr>
                <td><label>CIN: </label></td>
                <td><input type="text" name="cin"></td>
            </tr>
            <tr>
                <td><label>Nom: </label></td>
                <td><input type="text" name="nom"></td>
            </tr>
            <tr>
                <td><label>Prenom:</label></td>
                <td><input type="text" name="prenom"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="envoyer"></td>
            </tr>
        </table>
    </form>
    <form action="supprimer.php" method="get">
        <input type="text" name="supcin">
        <input type="submit" value="supprimer">
    </form>
<?php
    $link = mysqli_connect('127.0.0.1', 'root', '', 'test');
    if ($result = mysqli_query($link, "SELECT * from personne ;")){
        echo'<table border="1"><thead><th>CIN</th><th>Prenom</th> <th>Nom</th></thead>';
        while($row = mysqli_fetch_array($result)){
            $nom = $row["nom"];
            $prenom = $row["prenom"];
            $cin=$row["cin"];
            echo"<tr><td>$cin</td><td>$prenom</td><td>$nom</td></tr>";
        }
        echo"</table>";
    }
    mysqli_close($link);
   

?>
</body></head></html>