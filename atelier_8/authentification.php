<?php
require_once("users.php");

$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['login']) && !empty($_POST['password'])) {
        $us = new users($_POST['login'], $_POST['password']);
        $res = $us->existuser();
        $row = $res->fetch_array(MYSQLI_NUM);
        if ($res) {
            if ($row[0] == 1) {
                session_start();
                $mysqli=new mysqli(db_host,db_user,db_password,db_database);
                $query="select role from user where login='".$us->login."'";
                $result=$mysqli->query($query);
                $row = $result->fetch_assoc();
                $_SESSION['role'] = $row['role'];                $mysqli->close();
                header('Location: acceuil.php');
                exit();
            } else {
                $errorMessage = "Email ou mot de passe invalide.";
            }
        } else {
            $errorMessage = "Erreur lors de la vérification de l'utilisateur.";
        }
    } else {
        $errorMessage = "Veuillez remplir tous les champs.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion utilisateur</title>
    <style>
        .error-message {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <form name="f1" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <table border="1" align="center">
            <tr>
                <td colspan="2" bgcolor="#FF0000" align="center">
                    S'authentifier
                </td>
            </tr>
            <tr>
                <td>Nom utilisateur</td>
                <td><input type="text" name="login" /></td>
            </tr>
            <tr>
                <td>Mot de passe</td>
                <td><input type="password" name="password" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Se connecter" />
                </td>
            </tr>
        </table>
    </form>
    <?php
    if (!empty($errorMessage)) {
        echo "<div class='error-message'>$errorMessage</div>";
    }
    ?>
</body>
</html>
