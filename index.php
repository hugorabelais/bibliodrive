<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>barre recherche</title>
	<link rel="stylesheet" type="text/css" href="cssdesfamille.css"/>
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
		   <div class="col-sm-9 img-fluid text-center">
					<?php
						require_once('connexion.php');
						$stmt = $connexion ->prepare("SELECT * from livre order by dateajout desc limit 3")	;
						$stmt->setFetchMode(PDO::FETCH_OBJ);
						$stmt->execute();
						echo "<div id='carouselExample' class='carousel slide d-block w-25' class='text_centrer'>";
						echo "<div class='carousel-inner'>";
						
						if ($enregistrement = $stmt->fetch()){
							echo "<div class='carousel-item active'>";
							echo "<img src='images/". $enregistrement->photo . "' class='d-block w-100' alt='livre 1'>";
							echo "</div>";
						}
						while ($enregistrement = $stmt->fetch()){
							echo "<div class='carousel-item '>";
							echo "<img src='images/". $enregistrement->photo . "' class='d-block w-100' alt='livre 1'>";
							echo "</div>";
						}
					?>
					<button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Previous</span>
					</button>
					<button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Next</span>
					</button>
					</div>
				</div>
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