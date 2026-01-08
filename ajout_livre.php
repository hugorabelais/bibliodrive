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
                require_once('connexion.php');

                $noauteur = $_POST['auteur'];
                $titre = $_POST['titre'];
                $isbn = $_POST['isbn'];
                $anneeparution = $_POST['anneeparution'];
                $detail = $_POST['detail'];
                $imageLivre = $_POST['imageLivre'];
                
                $dateactuel = date("Y-m-d");

                $sql = "INSERT INTO livre (noauteur, titre, isbn13, anneeparution, detail, dateajout, photo) 
                                            VALUES (:noauteur, :titre, :isbn13, :anneeparution, :detail, :dateajout, :imageLivre)";
                $stmt = $connexion->prepare($sql);

                
                $stmt->bindValue(":noauteur", $noauteur, PDO::PARAM_INT);
                $stmt->bindValue(":titre", $titre);
                $stmt->bindValue(":isbn13", $isbn); 
                $stmt->bindValue(":anneeparution", $anneeparution);
                $stmt->bindValue(":detail", $detail); 
                $stmt->bindValue(":dateajout", $dateactuel); 
                $stmt->bindValue(":imageLivre", $imageLivre); 

                $stmt->execute();
                $nb_ligne_affectees = $stmt->rowCount();
            
                
            ?>

    <div class="row container-fluid">
        <div class="col-md-10 texteCentrer">
            <h3> le livre à bien été ajouté !</h3>
        </div>

			</div>
			<div class="col-sm-3" >
				<?php
					require_once("form_connexion.php")
                ?>
			</div>
		</div>
	</div>