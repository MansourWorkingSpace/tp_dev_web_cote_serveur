<?php
require_once("users.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $us = new users($_POST['num'], $_POST['nom']);
    $us->modifuser();
    header('location:accueil.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modification de l'utilisateur</title>
</head>
<body>
    <form name="f1" method="post" action="">
        <table border="1" align="center">
            <tr>
                <td colspan="6" bgcolor="#FF0000" align="center">
                    Veuillez corriger votre nom
                </td>
            </tr>
            <tr>
                <td>Numéro utilisateur</td>
                <td><input type="text" name="num" value="<?php echo $_GET['user_id'] ?>" /></td>
            </tr>
            <tr>
                <td>Nom utilisateur</td>
                <td><input type="text" name="nom" value="" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Modifier" name="mod" />
                </td>
            </tr>
        </table>
    </form>
</body>
</html>