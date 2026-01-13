<?php
    include 'barre_recherche.php';
    if ($_SESSION['profil'] ==="admin") {
?>

<div class="row container-fluid">
    <div class="col-sm-9 texteCentrer">
        
        <form action="ajout_livre.php" method="post">

        Auteur : <select name="auteur">
                    <?php
                        require_once('connexion.php');   

                        $stmt = $connexion->prepare("SELECT nom, noauteur FROM auteur");
                        $stmt->setFetchMode(PDO::FETCH_OBJ);
                        $stmt->execute();
                        
                        for ($i = 0; $i <= $stmt->rowcount()-1; $i ++) {
                            $result = $stmt->fetch();
                            echo ' <option value="'.$result->noauteur.'"> '.$result->nom.'</option>';
                        }
                    ?>
                    
                    
                    
                </select>
            <br><br> 
            Titre : <input type="txt" name="titre">
            <br><br> 
            ISBN : <input type="number" name="isbn">
            <br><br> 
            Année de parution : <input type="date" name="anneeparution">
            <br><br> 
            Résumé : <input type="txt" name="detail">
            <br><br> 
            Image : <input type="txt" name="imageLivre">
            <br><br> 
            <input type="submit" class="btn btn-outline-success" value="Valider" >
        </form>
    
    </div>
    <div class="col-sm-3" >
    <?php
        include_once 'form_connexion.php';
            echo '</div>
</div>';
}
        else {
	header ("Location: http://localhost/bibliodrive/"); 
}
    ?>
