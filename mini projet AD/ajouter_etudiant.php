<?php
require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $dateNaiss = $_POST['dateNaiss'];
    $codeClasse = $_POST['codeClasse'];
    $numInscrit = $_POST['numInscrit'];
    $adresse = $_POST['adresse'];
    $mail = $_POST['mail'];
    $tel = $_POST['tel'];

    $mysqli = new mysqli(db_host, db_user, db_password, db_database);

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $sql = "INSERT INTO t_etudiant (nom, prenom, dateNaiss, codeClasse, numInscrit, adresse, mail, tel) 
            VALUES ('$nom', '$prenom', '$dateNaiss', $codeClasse, $numInscrit, '$adresse', '$mail', $tel)";
    
    if ($mysqli->query($sql)) {
        header("Location: affiche_etudiant.php");
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
    <title>Ajouter Étudiant</title>
</head>
<body>
    <h1>Ajouter un Étudiant</h1>

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
                <td>Date de Naissance:</td>
                <td><input type="date" name="dateNaiss" required></td>
            </tr>
            <tr>
                <td>Classe:</td>
                <td><input type="number" name="codeClasse" required></td>
            </tr>
            <tr>
                <td>Numéro d'Inscription:</td>
                <td><input type="number" name="numInscrit" required></td>
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
                <td colspan="2"><button type="submit">Ajouter</button></td>
            </tr>
        </table>
    </form>

    <a href="affiche_etudiant.php">Voir la liste des étudiants</a>
</body>
</html>
