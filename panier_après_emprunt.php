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

            unset($_SESSION['panier']);
            $_SESSION['panier'] = array();
            echo '<div class="texteCentrer">
                    <h2> Votre panier </h2>
                    Tout le panier à bien été emprunté
                    <br><br>
                    <a href="http://localhost/bibliodrive/"> <input type="submit" class="btn btn-outline-warning" value="Retour au site" > </a>
            </div>
            ';
        ?>
			</div>
		</div>
	</div>
    
</body>
</html>