<?php
require_once('config.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $dateRecrutement = $_POST['dateRecrutement'];
    $adresse = $_POST['adresse'];
    $mail = $_POST['mail'];
    $tel = $_POST['tel'];
    $codeDepartement = $_POST['codeDepartement'];
    $codeGrade = $_POST['codeGrade'];

    $mysqli = new mysqli(db_host, db_user, db_password, db_database);

    if ($mysqli->connect_error) {
        echo "<p style='color:red;'>Erreur de connexion à la base de données : " . $mysqli->connect_error . "</p>";
    } else {
        $sql = "INSERT INTO t_enseignant (nom, prenom, dateRecrutement, adresse, mail, tel, codeDepartement, codeGrade) 
                VALUES ('$nom', '$prenom', '$dateRecrutement', '$adresse', '$mail', '$tel', '$codeDepartement', '$codeGrade')";
        if ($mysqli->query($sql)) {
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "<p style='color:red;'>Erreur lors de l'ajout : " . $mysqli->error . "</p>";
        }
        $mysqli->close();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter Enseignant</title>
</head>
<body>
    <h1>Ajouter un Enseignant</h1>

    <form method="post">
        <table border="1">
            <tr>
                <td>Nom:</td>
                <td><input type="text" name="nom" required></td>
            </tr>
            <tr>
                <td>Prénom:</td>
                <td><input type="text" name="prenom" required></td>
            </tr>
            <tr>
                <td>Date de Recrutement:</td>
                <td><input type="date" name="dateRecrutement" required></td>
            </tr>
            <tr>
                <td>Adresse:</td>
                <td><input type="text" name="adresse" required></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="mail" required></td>
            </tr>
            <tr>
                <td>Téléphone:</td>
                <td><input type="number" name="tel" required></td>
            </tr>
            <tr>
                <td>Département:</td>
                <td>
                    <select name="codeDepartement" required>
                        <option value="">-- Sélectionnez un Département --</option>
                        <?php
                        $mysqli = new mysqli(db_host, db_user, db_password, db_database);
                        if ($mysqli->connect_error) {
                            echo "<option value=''>Erreur de connexion</option>";
                        } else {
                            $sql = "SELECT codeDepartement, nomDepartement FROM t_departement";
                            $result = $mysqli->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['codeDepartement'] . "'>" . $row['nomDepartement'] . "</option>";
                            }
                            $mysqli->close();
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Grade:</td>
                <td>
                    <select name="codeGrade" required>
                        <option value="">-- Sélectionnez un Grade --</option>
                        <?php
                        $mysqli = new mysqli(db_host, db_user, db_password, db_database);
                        if ($mysqli->connect_error) {
                            echo "<option value=''>Erreur de connexion</option>";
                        } else {
                            $sql = "SELECT codeGrade, nomGrade FROM t_grade";
                            $result = $mysqli->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['codeGrade'] . "'>" . $row['nomGrade'] . "</option>";
                            }
                            $mysqli->close();
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit">Ajouter</button></td>
            </tr>
        </table>
    </form>

    <a href="affiche_enseignant.php">Voir la liste des enseignants</a>
</body>
</html>
