<?php
require_once('config.php');
$mysqli = new mysqli(db_host, db_user, db_password, db_database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$sql = "SELECT * FROM t_etudiant";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Étudiants</title>
</head>
<body>
    <h1>Liste des Étudiants</h1>
    <table border="1">
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de Naissance</th>
            <th>Classe</th>
            <th>Numéro d'Inscription</th>
            <th>Adresse</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['codeEtudiant'] ?></td>
            <td><?= $row['nom'] ?></td>
            <td><?= $row['prenom'] ?></td>
            <td><?= $row['dateNaiss'] ?></td>
            <td><?= $row['codeClasse'] ?></td>
            <td><?= $row['numInscrit'] ?></td>
            <td><?= $row['adresse'] ?></td>
            <td><?= $row['mail'] ?></td>
            <td><?= $row['tel'] ?></td>
            <td>
                <a href="modif_etudiant.php?id=<?= $row['codeEtudiant'] ?>">Modifier</a>
                <a href="supprimer_etudiant.php?id=<?= $row['codeEtudiant'] ?>">Supprimer</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="ajouter_etudiant.php">Ajouter un Étudiant</a>
</body>
</html>

<?php
$mysqli->close();
