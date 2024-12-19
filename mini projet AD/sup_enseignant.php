<?php
require_once('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $mysqli = new mysqli(db_host, db_user, db_password, db_database);

    if ($mysqli->connect_error) {
        die("Erreur de connexion : " . $mysqli->connect_error);
    }

    $sql = "DELETE FROM t_enseignant WHERE codeEnseignant = $id";

    if ($mysqli->query($sql)) {
        header("Location: affiche_enseignant.php");
        exit();
    } else {
        echo "Erreur lors de la suppression: " . $mysqli->error;
    }

    $mysqli->close();
}
?>
