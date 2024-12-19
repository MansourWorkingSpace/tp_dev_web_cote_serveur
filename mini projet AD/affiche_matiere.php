<?php
require_once('config.php');
$mysqli = new mysqli(db_host, db_user, db_password, db_database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$sql = "SELECT * FROM t_matiere";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Matières</title>
</head>
<body>
    <h1>Liste des Matières</h1>
    <table border="1">
        <tr>
            <th>#</th>
            <th>Nom de la Matière</th>
            <th>Heures de Cours</th>
            <th>Heures de TD</th>
            <th>Heures de TP</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['codeMatiere'] ?></td>
            <td><?= $row['nomMatiere'] ?></td>
            <td><?= $row['nbhCours_semaine'] ?></td>
            <td><?= $row['nbhTD_semaine'] ?></td>
            <td><?= $row['nbhTP_semaine'] ?></td>
            <td>
                <a href="modif_matiere.php?id=<?= $row['codeMatiere'] ?>">Modifier</a>
                <a href="supprimer_matiere.php?id=<?= $row['codeMatiere'] ?>">Supprimer</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <a href="ajouter_matiere.php">Ajouter une Matière</a>
</body>
</html>

<?php
$result->close();
$mysqli->close();
?>
