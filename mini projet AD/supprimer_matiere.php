<?php
require_once('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $mysqli = new mysqli(db_host, db_user, db_password, db_database);

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $sql = "DELETE FROM t_matiere WHERE codeMatiere = $id";
    
    if ($mysqli->query($sql)) {
        header("Location: affiche_matiere.php");
        exit();
    } else {
        echo "<p style='color:red;'>Erreur lors de la suppression : " . $mysqli->error . "</p>";
    }

    $mysqli->close();
} else {
    echo "Aucune matière trouvée.";
}
?>
