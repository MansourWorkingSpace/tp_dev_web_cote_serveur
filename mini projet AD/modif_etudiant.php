<?php
require_once('config.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $mysqli = new mysqli(db_host, db_user, db_password, db_database);

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $dateNaiss = $_POST['dateNaiss'];
        $codeClasse = $_POST['codeClasse'];
        $numInscrit = $_POST['numInscrit'];
        $adresse = $_POST['adresse'];
        $mail = $_POST['mail'];
        $tel = $_POST['tel'];

        $sql = "UPDATE t_etudiant SET nom='$nom', prenom='$prenom', dateNaiss='$dateNaiss', codeClasse='$codeClasse', 
                numInscrit='$numInscrit', adresse='$adresse', mail='$mail', tel='$tel' WHERE codeEtudiant=$id";

        if ($mysqli->query($sql)) {
            header("Location: affiche_etudiant.php");
            exit();
        } else {
            echo "<p style='color:red;'>Erreur de mise à jour: " . $mysqli->error . "</p>";
        }
    }

    $sql = "SELECT * FROM t_etudiant WHERE codeEtudiant=$id";
    $result = $mysqli->query($sql);
    $etudiant = $result->fetch_assoc();

    $mysqli->close();
} else {
    echo "Aucun étudiant trouvé.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Etudiant</title>
</head>
<body>
    <h1>Modifier Etudiant</h1>
    <form method="post">
        <table border="1">
            <tr>
                <td>Nom:</td>
                <td><input type="text" name="nom" value="<?= $etudiant['nom'] ?>" required></td>
            </tr>
            <tr>
                <td>Prénom:</td>
                <td><input type="text" name="prenom" value="<?= $etudiant['prenom'] ?>" required></td>
            </tr>
            <tr>
                <td>Date de Naissance:</td>
                <td><input type="date" name="dateNaiss" value="<?= $etudiant['dateNaiss'] ?>" required></td>
            </tr>
            <tr>
                <td>Classe:</td>
                <td><input type="number" name="codeClasse" value="<?= $etudiant['codeClasse'] ?>" required></td>
            </tr>
            <tr>
                <td>Numéro d'Inscription:</td>
                <td><input type="number" name="numInscrit" value="<?= $etudiant['numInscrit'] ?>" required></td>
            </tr>
            <tr>
                <td>Adresse:</td>
                <td><input type="text" name="adresse" value="<?= $etudiant['adresse'] ?>" required></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="mail" value="<?= $etudiant['mail'] ?>" required></td>
            </tr>
            <tr>
                <td>Téléphone:</td>
                <td><input type="number" name="tel" value="<?= $etudiant['tel'] ?>" required></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit">Mettre à jour</button></td>
            </tr>
        </table>
    </form>
    <a href="affiche_etudiant.php">Retour à la liste des étudiants</a>
</body>
</html>
