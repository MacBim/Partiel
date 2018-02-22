<?php
/**
 * Created by PhpStorm.
 * User: jeanb
 * Date: 22/02/2018
 * Time: 14:25
 */
$name = $_POST["nom"];
$salle = $_POST["salle"];
switch ($_POST["probleme"]){
    case 1:
        $description = "Il y a un problème sur un ou plusieurs ordinateurs";
        if($_POST["num_pc"] != ""){
            $description .= " de numéro " . $_POST["num_pc"] ;
        }
        break;
    case 2:
        $description = "Il y a un problème sur tous les ordinateurs";
        break;
    case 3:
        $description = "Il y a un problème sur une imprimante";
        break;
    case 4:
        $description = "Il y a un autre problème";
        break;
}
$num_pc = $_POST["num_pc"];
$remarques = $_POST["remarques"];
?>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="index.css">
    <title>Récapitulatif</title>
</head>
<body>
<div>
    <header>
        <h1>Récapitulatif</h1>
    </header>
    <form method="post" action="confirmation.php">
        Votre nom : <?php echo $name?> <br>
        <input type="hidden" name="nom" value="<?php  echo $name?>">
        Numéro de la salle : <?php echo $salle ?><br>
        <input type="hidden" name="salle" value="<?php  echo $salle?>">
        <br><textarea name="description" rows="4" cols="50"><?php echo $description?></textarea>
        <br><textarea name="remarques" rows="4" cols="50"><?php  echo $remarques?></textarea>
        <br><input type="submit" value="Je confirme ma demande d'intervention">
    </form>
</div>
</body>
</html>
