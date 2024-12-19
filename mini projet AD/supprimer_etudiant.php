<?php
require_once('config.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $mysqli = new mysqli(db_host, db_user, db_password, db_database);

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // First, delete the records from t_ligneficheabsence
    $sql = "DELETE FROM t_ligneficheabsence WHERE CodeEtudiant = $id";
    $mysqli->query($sql); // Ignore the result

    // Now, delete the student from t_etudiant
    $sql = "DELETE FROM t_etudiant WHERE codeEtudiant = $id";
    if ($mysqli->query($sql)) {
        header("Location: affiche_etudiant.php");
        exit();
    } else {
        echo "<p style='color:red;'>Erreur lors de la suppression: " . $mysqli->error . "</p>";
    }

    $mysqli->close();
} else {
    echo "Aucun étudiant trouvé.";
}
