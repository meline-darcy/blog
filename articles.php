<?php

session_start();
$idarticle = $_GET['idarticle'];
var_dump($_GET);

$bdd= mysqli_connect("localhost","root","","blog");


$req= mysqli_query($bdd,"SELECT * FROM articles WHERE id = $idarticle");

$res= mysqli_fetch_all($req,MYSQLI_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header>
<?php include("include/header.php") ?></header>
    <h1><?php echo $res[0]['titre'];?></h1>
    <?php
    echo $res[0]['article'];
    ?>

    <legend>Ajouter un commentaire</legend>
            <form method="post" action=<?php echo '"submit.php?idarticle='.$idarticle.'"'?>>
                <label for="text">Votre commentaire : </label>
                <textarea id="text" type="text" name="comm"></textarea>
                <input type="submit" name="envoyer" value="Envoyer">
            </form>

            

        
</body>
</html>