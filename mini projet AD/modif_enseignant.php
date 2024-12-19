<?php
require_once('config.php');

// Create a single database connection
$mysqli = new mysqli(db_host, db_user, db_password, db_database);

if ($mysqli->connect_error) {
    die("Erreur de connexion : " . $mysqli->connect_error);
}

// Fetch the enseignant data if 'id' is provided in the URL
if (isset($_GET['id'])) {
    $codeenseignant = $_GET['id'];
    $query = "SELECT * FROM t_enseignant WHERE codeEnseignant = '$codeenseignant'";
    $result = $mysqli->query($query);

    if ($result->num_rows > 0) {
        $enseignant = $result->fetch_assoc();
    } else {
        echo "<p style='color:red;'>Enseignant introuvable.</p>";
        exit();
    }
}

// Handle form submission to update enseignant
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codeenseignant = $_POST['codeenseignant'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $dateRecrutement = $_POST['dateRecrutement'];
    $adresse = $_POST['adresse'];
    $mail = $_POST['mail'];
    $tel = $_POST['tel'];
    $codeDepartement = $_POST['codeDepartement'];
    $codeGrade = $_POST['codeGrade'];

    $query = "UPDATE t_enseignant SET
                nom = '$nom', 
                prenom = '$prenom', 
                dateRecrutement = '$dateRecrutement',
                adresse = '$adresse',
                mail = '$mail',
                tel = '$tel',
                codeDepartement = '$codeDepartement',
                codeGrade = '$codeGrade'
              WHERE codeEnseignant = '$codeenseignant'";

    if ($mysqli->query($query)) {
        header("Location: affiche_enseignant.php");
        exit();
    } else {
        echo "<p style='color:red;'>Erreur lors de la mise à jour : " . $mysqli->error . "</p>";
    }
}

// Fetch departments and grades for the select options
$departments = $mysqli->query("SELECT codeDepartement, nomDepartement FROM t_departement");
$grades = $mysqli->query("SELECT codeGrade, nomGrade FROM t_grade");

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Enseignant</title>
</head>
<body>
    <h1>Modifier un Enseignant</h1>
    
    <form method="post">
        <input type="hidden" name="codeenseignant" value="<?= $enseignant['codeEnseignant'] ?>">
        <table border="1">
            <tr>
                <td>Nom:</td>
                <td><input type="text" name="nom" value="<?= $enseignant['nom'] ?>" required></td>
            </tr>
            <tr>
                <td>Prénom:</td>
                <td><input type="text" name="prenom" value="<?= $enseignant['prenom'] ?>" required></td>
            </tr>
            <tr>
                <td>Date de Recrutement:</td>
                <td><input type="date" name="dateRecrutement" value="<?= $enseignant['dateRecrutement'] ?>" required></td>
            </tr>
            <tr>
                <td>Adresse:</td>
                <td><input type="text" name="adresse" value="<?= $enseignant['adresse'] ?>" required></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="mail" value="<?= $enseignant['mail'] ?>" required></td>
            </tr>
            <tr>
                <td>Téléphone:</td>
                <td><input type="number" name="tel" value="<?= $enseignant['tel'] ?>" required></td>
            </tr>
            <tr>
                <td>Département:</td>
                <td>
                    <select name="codeDepartement" required>
                        <option value="">-- Sélectionnez un Département --</option>
                        <?php while ($row = $departments->fetch_assoc()): ?>
                            <option value="<?= $row['codeDepartement'] ?>" <?= $row['codeDepartement'] == $enseignant['codeDepartement'] ? 'selected' : '' ?>>
                                <?= $row['nomDepartement'] ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Grade:</td>
                <td>
                    <select name="codeGrade" required>
                        <option value="">-- Sélectionnez un Grade --</option>
                        <?php while ($row = $grades->fetch_assoc()): ?>
                            <option value="<?= $row['codeGrade'] ?>" <?= $row['codeGrade'] == $enseignant['codeGrade'] ? 'selected' : '' ?>>
                                <?= $row['nomGrade'] ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit">Modifier</button></td>
            </tr>
        </table>
    </form>

    <a href="affiche_enseignant.php">Retour à la liste des enseignants</a>
</body>
</html>

<?php
$mysqli->close();
?>
