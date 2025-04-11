<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //permet d'inclure un fichier dans un autre
    include("partials/header.php");
    ?>
    <h1>Test de connexion base de données : blog</h1>
    <?php
        //require est plus puissant que include car s'il y a une erreur dans le require, le rest du code ne fonctionne pas contrairement à l'include, ce qui est plus sécurisant
        //require_once fonctionne comme require mais vérifie si l'élément n'a pas déjà été introduit
        require("connexion.php");
        $req = $bdd->query("SELECT * FROM news");
        $don = $req->fetch();
        var_dump($don);
        $don2 = $req->fetch();
        var_dump($don2);
        $don3 = $req->fetch();
        var_dump($don3);
        $don4 = $req->fetch();
        var_dump($don4);
        var_dump($req);
        $req->closeCursor();
    ?>


</body>
</html>