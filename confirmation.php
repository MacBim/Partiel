<?php
/**
 * Created by PhpStorm.
 * User: jeanb
 * Date: 22/02/2018
 * Time: 15:09
 */

if(!empty($_POST["salle"]) && !empty($_POST["description"])) {
    require_once("MyPDO.php");
    $servername = MyPDO::SERVER_NAME;
    $username = MyPDO::USERNAME;
    $password = MyPDO::PASSWORD;
    $dbName = MyPDO::DATABASE_NAME;

    $myPDO = new MyPDO("mysql:host=$servername;dbname=$dbName", $username, $password);
    $myPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $nom = $_POST["nom"];
    $salle = $_POST["salle"];
    $description = $_POST["description"];
    $remarques = $_POST["remarques"];

    $query = "INSERT INTO interventions (salles,description,remarques,etat)" .
        "VALUES(:salle,:description,:remarques,false)";

    try {
        $req = $myPDO->prepare($query);
        $req->bindParam(":salle", $salle);
        $req->bindParam(":description", $description);
        $req->bindParam(":remarques", $remarques);
        $req->execute();
        $id = $myPDO->lastInsertId();
        echo "<header style='border: 2px solid black'><h2>Votre demande a bien été enregistrée sous le numéro : $id </h2></header>";
    } catch (PDOException $e) {
        echo "<h3>Erreur :</h3>";
        echo $e->getMessage();
    }
} else {
    echo "<p>Veillez renseigner les champ Bureau et Description.</p>";
}
