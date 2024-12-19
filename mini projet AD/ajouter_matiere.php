<?php
require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomMatiere = $_POST['nomMatiere'];
    $nbhCours_semaine = $_POST['nbhCours_semaine'];
    $nbhTD_semaine = $_POST['nbhTD_semaine'];
    $nbhTP_semaine = $_POST['nbhTP_semaine'];

    $mysqli = new mysqli(db_host, db_user, db_password, db_database);

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $sql = "INSERT INTO t_matiere (nomMatiere, nbhCours_semaine, nbhTD_semaine, nbhTP_semaine) 
            VALUES ('$nomMatiere', $nbhCours_semaine, $nbhTD_semaine, $nbhTP_semaine)";
    
    if ($mysqli->query($sql)) {
        header("Location: affiche_matiere.php");
        exit();
    } else {
        echo "<p style='color:red;'>Erreur lors de l'ajout : " . $mysqli->error . "</p>";
    }

    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter Matière</title>
</head>
<body>
    <h1>Ajouter une Matière</h1>

    <form method="post">
        <table border="1">
            <tr>
                <td>Nom de la Matière:</td>
                <td><input type="text" name="nomMatiere" required></td>
            </tr>
            <tr>
                <td>Nombre d'heures de cours par semaine:</td>
                <td><input type="number" name="nbhCours_semaine" required></td>
            </tr>
            <tr>
                <td>Nombre d'heures de TD par semaine:</td>
                <td><input type="number" name="nbhTD_semaine" required></td>
            </tr>
            <tr>
                <td>Nombre d'heures de TP par semaine:</td>
                <td><input type="number" name="nbhTP_semaine" required></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit">Ajouter</button></td>
            </tr>
        </table>
    </form>

    <a href="affiche_matiere.php">Voir la liste des matières</a>
</body>
</html>
