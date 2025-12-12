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

        <div class="container-fluid">
                <div class="row" >
                          <div class="col-sm-12">
                                    <?php
                              require_once("barre_recherche.php")
                                    ?>
                          </div>
                </div>
                <div class="row">
                      <div class="col-sm-6">
                          <?php
                            $reponse = $_GET["idlivre"];
                            require_once('connexion.php');
                            $stmt = $connexion ->prepare("SELECT * from livre inner join auteur on (livre.noauteur=auteur.noauteur) where nolivre=:pnumero" )	;
                            $stmt->bindValue(":pnumero", $reponse);
                            $stmt->setFetchMode(PDO::FETCH_OBJ);
                            $stmt->execute();
                            $enregistrement = $stmt->fetch(); 
                            echo "<b>Auteur : ".$enregistrement->nom. " ". $enregistrement->prenom."</br></b>" ;
                            echo "<b>ISBN13 : ".$enregistrement->isbn13."</br></b>";
                            echo "<b>Résumer du livre</br></br></br></b>";
                            echo "<b>".$enregistrement->detail."</br></br></br></b>";
                            $stmt = $connexion ->prepare("SELECT dateretour from emprunter where dateretour is null and nolivre=:pnumero order by dateemprunt desc limit 1" );
                            $stmt->bindValue(":pnumero", $reponse);
                            $stmt->setFetchMode(PDO::FETCH_OBJ);
                            $stmt->execute();
                            $enregistrement2 = $stmt->fetch();
                                if (!isset($enregistrement2))
                                {
                                        echo "<b>disponible</b>";
                                }
                                echo "<b class='text.primary'>vous devez avoir un compte pour reservez le livre </b>";

                        echo "</div>";
                        echo "<div class='col-sm-3'>";
                            echo "<img src='images/". $enregistrement->photo. "' alt='image livre' height='400' width='300'>" ;
                        echo "</div>";


                            ?>

                      <div class="col-sm-3" >
                              <?php
                                require_once("form_connexion.php")
                              ?>
                      </div>
                </div>
        </div>
</body>
</html>