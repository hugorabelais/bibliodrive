<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>barre recherche</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container-fluid">
		<div class="row">
			<div class="col-sm-9">
                <?php
					require_once("barre_recherche.php")
                ?>
			</div>
			<div class="col-sm-3">
					image Moulinsart
			</div>
		</div>
		<div class="row">
		   <div class="col-sm-9">
					carroussel / résultat de la recherche / pages d'admin (ajout d'un livre)
			</div>
			<div class="col-sm-3">
					formulaire de connexion / profil connecté (include)
			</div>
		</div>
	</div>
    
</body>
</html>