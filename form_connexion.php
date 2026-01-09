<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connexion user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</head>
<?php

if (isset($_SESSION["vara"]) && $_SESSION["vara"]=== 1) {
    if ($_SESSION["profil"] === "admin") {
        header ("Location: http://localhost/bibliodrive/acceuil_admin.php"); 
        $_SESSION["vara"]= 0;
    }elseif ($_SESSION["profil"] === "client"){
        header ("Location: http://localhost/bibliodrive/"); 
        $_SESSION["vara"]= 0;
}}

if (!isset($_SESSION["mel"])) { 
    if (!isset($_POST['btnconnexion'])) { 
        $_SESSION['profil']="";
        $_SESSION['panier'] = "";
        ?> 
        <form method="post" action=""> 
            <h5>votre mail:</h5><input name="mel" class="form-control" type="text">
            <h5>votre Mot de passe:</h5><input name="motdepasse" class="form-control" type="password">
            <div class="text-center">
                <input type="submit" class="btn btn-success" name="btnconnexion" value="Connexion">
                <br>
                <br>
            </div>
            <?php $_SESSION["vara"]= 1 ?>
        </form>
        <?php
    } else {
        require_once ('connexion.php');
        $mel = $_POST['mel']; 
        $motdepasse = $_POST['motdepasse'];

        $stmt = $connexion->prepare("SELECT * FROM utilisateur WHERE mel=:mel AND motdepasse=:motdepasse");
        $stmt->bindValue(":mel", $mel); 
        $stmt->bindValue(":motdepasse", $motdepasse); 
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $enregistrement = $stmt->fetch(); 

        if ($enregistrement) { 
            $_SESSION["mel"] = $mel;
            $_SESSION["prenom"] = $enregistrement->prenom;
            $_SESSION["nom"] = $enregistrement->nom;
            $_SESSION["adresse"] = $enregistrement->adresse;
            $_SESSION["codepostal"] = $enregistrement->codepostal;
            $_SESSION["ville"] = $enregistrement->ville;
            $_SESSION["profil"] = $enregistrement->profil;
            $panier = array();
            $_SESSION['panier'] = $panier;
            $_SESSION['posLibre'] = 0;


        } else { 
            echo'<form method="post" action="index.php"> 
            <h5>votre mail:</h5><input name="mel" class="form-control" type="text">
            <h5>votre Mot de passe:</h5><input name="motdepasse" class="form-control" type="password">
            <div class="text-center">
                <input type="submit" class="btn btn-success" name="btnconnexion" value="Connexion">
                <br>
                <br>
            </div>
        </form>';
            echo "Echec de la connexion.";
            exit();
        }
    }
} else {
    ?>
    <h3 class="text-center"><?php echo $_SESSION["prenom"] . ' ' . $_SESSION["nom"]; ?></h3>
    <h3 class="text-center "><?php echo $_SESSION["mel"]; ?></h3>
    <br>
    <h3 class="text-center"><?php echo $_SESSION["adresse"]; ?></h3>
    <h3 class="text-center"><?php echo $_SESSION["codepostal"] . ', ' . $_SESSION["ville"]; ?></h3>
    
    <?php if ($_SESSION["profil"] === "client"){ 
        echo '<br><h4 class="text-center">Bienvenue client </h4>';
     } 
    
     if ($_SESSION["profil"] === "admin") {
        echo '<br><h4 class="text-center">Bienvenue administrateur </h4>' ;
    } ?>
    
    <?php if (!isset($_POST['deco'])) { ?>
    <form method="post">
        <div class="input-group-btn text-center">
            <button class="btn btn-danger" name="deco" type="submit">Déconnexion</button>
        </div>
    </form>
    <?php } else {
        session_unset();         
        session_destroy();
        require_once ("index.php");
        exit();
    }
} 

ob_end_flush();
?>