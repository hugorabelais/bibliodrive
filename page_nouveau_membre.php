<?php


    include 'barre_recherche.php';
    if ($_SESSION['profil']==="admin") {
?>

<div class="row container-fluid">
    <div class="col-md-9 texteCentrer">
        <form action="nouveau_membre.php" method="post">
            Mail : <input type="email" name="mel">
            <br><br> 
            Mot de Passe : <input type="text" name="motdepasse">
            <br><br> 
            Nom : <input type="text" name="nom">
            <br> <br> 
            Prenom : <input type="text" name="prenom">
            <br><br> 
            Adresse : <input type="text" name="adresse">
            <br> <br> 
            Ville : <input type="text" name="ville">
            <br><br> 
            Code Postal : <input type="number" name="codepostal">
            <br> <br> 
            Profil : <input type="text" name="profil">
            <br>
            <input type="submit" class="btn btn-outline-success" value="Valider" >

        </form>
    </div>
    <div class="col-sm-3">
    <?php
        include_once 'form_connexion.php';
        }
else {
	header ("Location: http://localhost/bibliodrive/"); 
}
    ?>
    </div>
</div>

</body>
</html>