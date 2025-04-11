<?php
    //besoin de l'id en get pour fonctionner
    if(isset($_GET['id'])){
        //protéger la valeur de l'id parceque mis dans l'url
        $id = htmlspecialchars(($_GET['id']));
    }else{
        header("LOCATION:index.php");
        exit();
    };
    //connexion à la bdd
    require "connexion.php";

    //req à la bdd avec une inconnue (qui est id ?)
    $req = $bdd->prepare("SELECT * FROM news WHERE id=?");
    $req->execute([$id]);
    $don = $req->fetch(PDO::FETCH_ASSOC);
    $req->closeCursor();
?>


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
        include("partials/header.php");
    ?>
    <?php echo "<h2>".$don['titre']."</h2>"; ?>

    <!-- version plus simple -->
    <h2><?= $don['titre'] ?></h2>
    <h4><?= $don['date'] ?></h4>

    <div>
        <?= nl2br($don['contenu']) ?>
    </div>

</body>
</html>