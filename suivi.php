<?php
/**
 * Created by PhpStorm.
 * User: jeanb
 * Date: 22/02/2018
 * Time: 15:48
 */
session_start();
if(empty($_SESSION["authenticated"]) || $_SESSION["authenticated"] != 'true') {
    header('Location: login.php');
}

require_once("MyPDO.php");
$servername = MyPDO::SERVER_NAME;
$username = MyPDO::USERNAME;
$password = MyPDO::PASSWORD;
$dbName = MyPDO::DATABASE_NAME;

$myPDO = new MyPDO("mysql:host=$servername;dbname=$dbName", $username, $password);
?>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="index.css">
    <title>Suivi des demandes d'interventions informatiques</title>
</head>
<body>
<header>
    <h1>Suivi des demandes d'interventions informatiques</h1>
</header>
<table>
    <tr>
        <th></th>
        <th>Num</th>
        <th>Salle</th>
        <th>Description</th>
        <th>Remarques</th>
        <th>Demandée le</th>
        <th>Suivi</th>
    </tr>
    <?php
        $query = "SELECT * FROM interventions ORDER BY num desc";
        $res = $myPDO->query($query);
        while($row = $res->fetch(PDO::FETCH_ASSOC)){ // le resultat de la requete est retourné dans un tableau associatif
            echo "<tr>";
            echo "<td>Voir</td>";
            foreach ($row as $key => $elem){
                if($key == "etat"){ // dans la BDD, 0 = En cours, et 1 = Réparé
                    if($elem == 0){
                        $elem = "En cours";
                    } else {
                        $elem = "Réparé";
                    }
                }
                ?>
                    <td><?php echo $elem ?></td>
                <?php
            }
            echo "</tr>";
        }
    ?>
</table>
</body>
</html>
