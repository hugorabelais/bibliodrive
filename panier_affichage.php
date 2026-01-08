<?php
    require 'barre_recherche.php';
?>

<div class="row container-fluid"> 
    <div class="col-md-10 container-fluid texteCentrer">  
        <h2> Votre panier </h2>
        
        <?php
            $panier = array();

            if (isset($_SESSION['panier']) && ($_SESSION['panier'] != "")){
                if ($_SESSION['panier'] == array()){
                    echo 'Aucun livre dans le panier !';
                }
                else{
                    for($x = 0; $x < count($_SESSION['panier']); $x++) {

                        echo '<div class="row">
                                <div class="col-md-7">
                                <a href="http://localhost/bibliodrive/description-livre.php?titre='.$_SESSION['panier'][$x][3].'"> '.$_SESSION['panier'][$x][1].' '.$_SESSION['panier'][$x][2].', '.$_SESSION['panier'][$x][3].' ('.$_SESSION['panier'][$x][4].')</a><br>
                                </div>
                                <br><br>
                                <div class="col-md-3">
                                    <a href="http://localhost/bibliodrive/supprimer_livre.php?sup='.$_SESSION['panier'][$x][0].'"> <input type="submit" class="btn btn-outline-danger" value="supprimer" > </a>
                                </div>
                            </div>
                            ';               
                        }

                    echo '
                    <div class="row">
                        <div class="col-md-7">                           
                        <a href="http://localhost/bibliodrive/empruntMultiple.php"> <input type="submit" class="btn btn-outline-primary" value="Emprunter le(s) livre(s)" > </a>
                        <br>
                        </div>
                        ';

                    
                    
                    echo '<div class="col-md-3">
                          <a href="http://localhost/bibliodrive/viderPanier.php"> <input type="submit" class="btn btn-outline-danger" value="Vider le panier" > </a>      
                          </div>
                    </div>
                    ';
                    
                                     
                }
            }
            else{
                echo "veuillez-vous connecter avant d'avoir accès au panier";
            }
            
            if (isset($_POST['supprimer'])){
                echo 'AAAAAAAAA';
            }
        ?>
    
    </div>
    <?php
    require_once 'blocIdentification.php';
    ?>

