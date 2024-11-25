<?php
session_start();


if (isset($_POST['logout'])) {

    $_SESSION = array();
    session_destroy();
    header('Location: authentification.php');
    exit();
}


echo "<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <title>Bienvenue</title>
</head>";

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == "ens") {
        echo '<body style="background-color: red;"><p>Bienvenue enseignant</p>';
    } elseif ($_SESSION['role'] == "ele") {
        echo '<body style="background-color: green;"><p>Bienvenue élève</p>';
    } else {
        echo '<body style="background-color: white;"><p>Rôle inconnu</p>';
    }
} else {
    header('Location: authentification.php');
}

echo "
    <form method='post' action=''>
        <button type='submit' name='logout'>Déconnecter</button>
    </form>
</body>
</html>";
?>
