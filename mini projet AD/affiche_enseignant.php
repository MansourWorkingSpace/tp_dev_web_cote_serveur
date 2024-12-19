<?php
require_once('config.php');
$mysqli = new mysqli(db_host, db_user, db_password, db_database);
$sql = "SELECT e.codeEnseignant, e.nom, e.prenom, e.dateRecrutement, e.adresse, e.mail, e.tel, 
        d.nomDepartement, g.nomGrade 
        FROM t_enseignant e
        JOIN t_departement d ON e.codeDepartement = d.codeDepartement
        JOIN t_grade g ON e.codeGrade = g.codeGrade";
$result = $mysqli->query($sql);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Enseignants</title>
</head>
<body>
    <h1>Liste des Enseignants</h1>
    <table border="1">
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de Recrutement</th>
            <th>Adresse</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Département</th>
            <th>Grade</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['codeEnseignant'] ?></td>
            <td><?= $row['nom'] ?></td>
            <td><?= $row['prenom'] ?></td>
            <td><?= $row['dateRecrutement'] ?></td>
            <td><?= $row['adresse'] ?></td>
            <td><?= $row['mail'] ?></td>
            <td><?= $row['tel'] ?></td>
            <td><?= $row['nomDepartement'] ?></td>
            <td><?= $row['nomGrade'] ?></td>
            <td>
            <a href="modif_enseignant.php?id=<?= $row['codeEnseignant'] ?>">Modifier</a>
            <a href="sup_enseignant.php?id=<?= $row['codeEnseignant'] ?>">Supprimer</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="ajouter_enseignant.php">Ajouter un Enseignant</a>
</body>
</html>
<?php
$result->close();
$mysqli->close();
?>
