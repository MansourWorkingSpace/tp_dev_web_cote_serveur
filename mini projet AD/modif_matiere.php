<?php
require_once('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $mysqli = new mysqli(db_host, db_user, db_password, db_database);

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nomMatiere = $_POST['nomMatiere'];
        $nbhCours_semaine = $_POST['nbhCours_semaine'];
        $nbhTD_semaine = $_POST['nbhTD_semaine'];
        $nbhTP_semaine = $_POST['nbhTP_semaine'];

        $sql = "UPDATE t_matiere SET nomMatiere = '$nomMatiere', nbhCours_semaine = $nbhCours_semaine, 
                nbhTD_semaine = $nbhTD_semaine, nbhTP_semaine = $nbhTP_semaine WHERE codeMatiere = $id";
        
        if ($mysqli->query($sql)) {
            header("Location: affiche_matiere.php");
            exit();
        } else {
            echo "<p style='color:red;'>Erreur lors de la modification : " . $mysqli->error . "</p>";
        }
    }

    $sql = "SELECT * FROM t_matiere WHERE codeMatiere = $id";
    $result = $mysqli->query($sql);
    $matiere = $result->fetch_assoc();
    $mysqli->close();
} else {
    echo "Aucune matière trouvée.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Matière</title>
</head>
<body>
    <h1>Modifier la Matière</h1>

    <form method="post">
        <table border="1">
            <tr>
                <td>Nom de la Matière:</td>
                <td><input type="text" name="nomMatiere" value="<?= $matiere['nomMatiere'] ?>" required></td>
            </tr>
            <tr>
                <td>Nombre d'heures de cours par semaine:</td>
                <td><input type="number" name="nbhCours_semaine" value="<?= $matiere['nbhCours_semaine'] ?>" required></td>
            </tr>
            <tr>
                <td>Nombre d'heures de TD par semaine:</td>
                <td><input type="number" name="nbhTD_semaine" value="<?= $matiere['nbhTD_semaine'] ?>" required></td>
            </tr>
            <tr>
                <td>Nombre d'heures de TP par semaine:</td>
                <td><input type="number" name="nbhTP_semaine" value="<?= $matiere['nbhTP_semaine'] ?>" required></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit">Modifier</button></td>
            </tr>
        </table>
    </form>

    <a href="affiche_matiere.php">Voir la liste des matières</a>
</body>
</html>
