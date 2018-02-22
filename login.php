<?php
require_once("MyPDO.php");
$servername = MyPDO::SERVER_NAME;
$username = MyPDO::USERNAME;
$password = MyPDO::PASSWORD;
$dbName = MyPDO::DATABASE_NAME;


if ($_SERVER['REQUEST_METHOD'] == 'POST') { // si on viens de charger la page avec un formulaire remplis
    echo "toto";
    if (!empty($_POST["login"]) && !empty($_POST["password"])) { // si les champs son rensigné
        $myPDO = new MyPDO("mysql:host=$servername;dbname=$dbName", $username, $password);
        $formUsername = $_POST["login"]; // login saisi
        $formPassword = $_POST["password"]; // mot de passe saisi
        if ($myPDO->checkUser($formUsername, $formPassword)) { // si ces ids correspondent a un utilisateur
            session_start();
            $_SESSION["authenticated"] = true;
            header("Location: suivi.php");
        } else { // si l'utilisateur n'est pas reconnu, on re-dirige vers la page de login
            header("Location: login.php");
        }
    } else {
        header("Location: login.php");
    }
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="index.css">
    <title>Connexion</title>
</head>
<body>
<header>
    <h1>Consultation d'un intervention</h1>
</header>
<form method="post" action="">
    <p>
        <span>Utilisateur : </span>
        <input type="text" name="login">
    </p>
    <p>
        <span>mott de passe :</span>
        <input type="password" name="password">
    </p>
    <input type="submit" value="Valider">
</form>

</body>
</html>
<?php } ?>