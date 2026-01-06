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
		   <div class="col-sm-9 img-fluid">
            <?php
            $panier = array();
            if (isset($_SESSION['panier'])){
                if ($_SESSION['panier'] == ""){
                    echo 'Aucun livre dans le panier !';
                }
                else{
                    for($x = 0; $x < count($_SESSION['panier']); $x++) {
                        echo '<div class="row">
                                <div class="col-md-7">
                                 <a href="http://localhost/bibliodrive/detailLivre.php?titre='.$_SESSION['panier'][$x][3].'"> '.$_SESSION['panier'][$x][1].' '.$_SESSION['panier'][$x][2].', '.$_SESSION['panier'][$x][3].' ('.$_SESSION['panier'][$x][4].')</a><br>
                                </div>
                                <br><br>
                                <div class="col-md-3">
                                    <a href="http://localhost/bibliodrive/supprimeLivre.php?sup='.$_SESSION['panier'][$x][0].'"> <input type="submit" class="btn btn-outline-danger" value="supprimer" > </a>
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
			<div class="col-sm-3" >
				<?php
					require_once("form_connexion.php")
                ?>
			</div>
		</div>
	</div>
    
</body>
</html>