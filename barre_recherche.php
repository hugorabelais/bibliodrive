
<?php 
session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>barre recherche</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</head>


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-9">
                <b>La bibliothèque de moulinsart est fermée au public jusqu'a nouvel ordre. <br/> Mais il vous est possible de reserver et retirer vos livres via notre service Biblio Drive! </b>
                <div class="navbar navbar-light bg-light">
                    <form action="page_recherche.php" class="form-inline" method="get">
                        <input class="form-control mr-sm-2" type="text" placeholder="recherche" name="reponse" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" >recherche</button>
                    </form>
                    <a href="http://localhost/bibliodrive/panier.php"> <button type="button" class="btn btn-primary">panier</button> </a>
                </div>
            </div>
            <div class="col-sm-3">
                <a href="http://localhost/bibliodrive"><img src="petit_chateau.jpg" alt="chateau" width="200"  style="float:right"></a>   
            </div>
        </div>
        <div class="row">
            <?php 
            if (isset ($_SESSION['profil'])){
                if ($_SESSION['profil']==="admin"){
                    ?>
                <nav class="navbar navbar-expand-sm bg-light ">
                    <div class="container-fluid">
                        <ul class="navbar-nav">
                            <li class="nav-item " >
                                <a class="nav-link" href="http://localhost/bibliodrive/index.php">accueil</a>
                            </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/bibliodrive/page_nouveau_membre.php">Ajouter un membre</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/bibliodrive/page_nouveau_livre.php">Ajouter un livre</a>
                        </li>
                        </ul>
                    </div>
                </nav>
            
            <?php
            }
        }
            ?>

    </div>    
