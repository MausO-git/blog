<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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
        //par défaut fetch => fetch(PDO::FETCH_BOTH) donne un tableau associatif + numérique
        //fetch(PDO::FETCH_NIM) donne un tableau numérque indice => $don[1]
        //fetch(PDO::FETCH_ASSOC) donne un tableu associatif => $don['champs']
        while($don=$req->fetch(PDO::FETCH_ASSOC)){
            //var_dump($don);
            echo "<a href='news.php?id=".$don['id']."' class='news'>";
                echo "<h2>".$don['titre']."</h2>";
                echo "<h4>".$don['date']."</h4>";
            echo "</a>";
        };
        $req->closeCursor();
    ?>


</body>
</html>