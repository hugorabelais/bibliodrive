<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connexion user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        $reponse = $_GET["idlivre"];
        require_once('connexion.php');
        $stmt = $connexion ->prepare("SELECT * from livre inner join auteur on (livre.noauteur=auteur.noauteur) where nolivre=:pnumero" )	;
        $stmt->bindValue(":pnumero", $reponse);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $enregistrement = $stmt->fetch(); 

        echo "<div class='container-fluid>'";
        echo "<div class='row'>";
        echo "<div class='col-sm-9'>";
        echo "<b>Auteur : ".$enregistrement->nom. " ". $enregistrement->prenom."</br></b>" ;
        echo "<b>ISBN13 : ".$enregistrement->isbn13."</br></b>";
        echo "<b>Résumer du livre</br></br></br></b>";
        echo "<b>".$enregistrement->detail."</b>";
        echo "</div>";
        echo "<div class='col-sm-3'"
        
        echo "</div>"
        echo "</div>";
        echo "</div>";
        ?>
</body>
</html>