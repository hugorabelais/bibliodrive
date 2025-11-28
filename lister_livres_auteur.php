<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lister_livre</title>
</head>
<body>
    <?php
    $reponse = $_GET["reponse"];
    require_once('connexion.php');
    $stmt = $connexion ->prepare("SELECT * from livre INNER JOIN auteur ON (livre.noauteur = auteur.noauteur) where nom=:pnom")	;
    $stmt->bindValue(":pnom", $reponse);
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();
    echo "<table class= table>";
    while ($enregistrement = $stmt->fetch()){
        
        echo "<tr><td>" . $enregistrement->titre . "<tr><td>";
    }
    ?>
    
</body>
</html>